<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Support;

use DOMDocument;
use DOMXPath;
use Illuminate\Support\Facades\Http;
use YezzMedia\FrontendJbc\Models\WishlistBook;

class WishlistImporter
{
    public function import(int $projectId): array
    {
        $url = config('frontend-jbc.wishlist_url');

        if ($url === null || $url === '') {
            return ['imported' => 0, 'error' => 'No wishlist URL configured.'];
        }

        $response = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            'Accept-Language' => 'de-DE,de;q=0.9',
        ])->get($url);

        if (! $response->successful()) {
            return ['imported' => 0, 'error' => 'HTTP '.$response->status()];
        }

        $books = $this->parse($response->body());

        if ($books === []) {
            return ['imported' => 0, 'error' => 'No books found on page.'];
        }

        $imported = 0;

        foreach ($books as $index => $book) {
            $data = array_merge($book, [
                'project_id' => $projectId,
                'sort_order' => $index + 1,
            ]);

            $asin = $data['asin'] ?? null;

            if ($asin !== null && $asin !== '' && $asin !== '0') {
                WishlistBook::query()->updateOrCreate(
                    ['asin' => $asin],
                    $data,
                );
            } else {
                WishlistBook::query()->updateOrCreate(
                    ['project_id' => $projectId, 'amazon_url' => $data['amazon_url'] ?? ''],
                    $data,
                );
            }

            $imported++;
        }

        return ['imported' => $imported];
    }

    /**
     * @return array<int, array<string, string|null>>
     */
    private function parse(string $html): array
    {
        $internalErrors = libxml_use_internal_errors(true);

        $dom = new DOMDocument;
        $dom->loadHTML($html);
        libxml_clear_errors();
        libxml_use_internal_errors($internalErrors);

        $xpath = new DOMXPath($dom);
        $books = [];

        $items = $xpath->query('//li[contains(@class, "g-item-sortable")]');

        if ($items === false || $items->length === 0) {
            $items = $xpath->query('//div[@data-item-cta]');
        }

        if ($items === false || $items->length === 0) {
            return $this->parseFromJsonData($html);
        }

        foreach ($items as $item) {
            $book = $this->extractBookData($xpath, $item);
            if ($book['title'] !== null) {
                $books[] = $book;
            }
        }

        return $books;
    }

    /**
     * @return array<string, string|null>
     */
    private function extractBookData(DOMXPath $xpath, \DOMNode $item): array
    {
        $titleNode = $xpath->query('.//*[contains(@id, "itemName_")]', $item)?->item(0);
        $title = $titleNode?->textContent !== null ? trim($titleNode->textContent) : null;

        $asin = null;
        $dataAsin = $item instanceof \DOMElement ? $item->getAttribute('data-asin') : null;
        if ($dataAsin !== null && $dataAsin !== '') {
            $asin = $dataAsin;
        }

        $authorNode = $xpath->query('.//*[contains(@class, "author")]', $item)?->item(0);
        $author = $authorNode?->textContent !== null ? trim(str_replace('by ', '', $authorNode->textContent)) : null;

        $priceNode = $xpath->query('.//*[contains(@class, "a-price")]//*[contains(@class, "a-offscreen")]', $item)?->item(0);
        $price = $priceNode?->textContent !== null ? trim($priceNode->textContent) : null;

        $ratingNode = $xpath->query('.//*[contains(@class, "a-icon-alt")]', $item)?->item(0);
        $ratingText = $ratingNode?->textContent !== null ? trim($ratingNode->textContent) : null;
        $rating = null;
        $ratingCount = null;

        if ($ratingText !== null) {
            if (preg_match('/([\d.,]+)\s*(?:von|out of|von)\s*5/', $ratingText, $m)) {
                $rating = (float) str_replace(',', '.', $m[1]);
            }
            if (preg_match('/([\d.,]+)/', $ratingText, $m)) {
                $ratingCount = (int) str_replace(['.', ','], '', $m[1]);
            }
        }

        $imgNode = $xpath->query('.//img', $item)?->item(0);
        $coverUrl = null;
        if ($imgNode instanceof \DOMElement) {
            $src = $imgNode->getAttribute('src');
            if ($src !== '' && ! str_contains($src, 'pixel')) {
                $coverUrl = $this->normalizeImageUrl($src);
            }
        }

        $linkNode = $xpath->query('.//a[contains(@href, "/dp/") or contains(@href, "/product/")]', $item)?->item(0);
        $amazonUrl = null;
        if ($linkNode instanceof \DOMElement) {
            $href = $linkNode->getAttribute('href');
            if ($href !== '') {
                $amazonUrl = str_starts_with($href, 'http') ? $href : 'https://www.amazon.de'.$href;
            }
        }

        return [
            'asin' => $asin,
            'title' => $title,
            'author' => $author,
            'cover_url' => $coverUrl,
            'amazon_url' => $amazonUrl,
            'price' => $price,
            'rating' => $rating,
            'rating_count' => $ratingCount,
        ];
    }

    private function normalizeImageUrl(string $src): string
    {
        $src = preg_replace('/\._[A-Z0-9_]+_\.(jpg|jpeg|png|gif)/i', '.$1', $src);

        return $src;
    }

    /**
     * @return array<int, array<string, string|null>>
     */
    private function parseFromJsonData(string $html): array
    {
        $books = [];

        if (preg_match('/"items":\s*(\[.*?\}\])\s*\]/s', $html, $m)) {
            $data = json_decode(trim($m[1]), true);
            if (is_array($data)) {
                foreach ($data as $entry) {
                    $item = $entry['item'] ?? $entry;
                    $asin = $item['asin'] ?? null;

                    $priorityNode = $item['priorityNode'] ?? [];
                    $title = $priorityNode['title'] ?? $item['title'] ?? null;

                    $byLine = $priorityNode['byLine'] ?? $item['byLine'] ?? null;
                    $author = $byLine !== null ? str_replace('by ', '', $byLine) : null;

                    $coverUrl = null;
                    if (isset($item['imageLargeUrl'])) {
                        $coverUrl = $item['imageLargeUrl'];
                    } elseif (isset($item['imageUrl'])) {
                        $coverUrl = $item['imageUrl'];
                    }

                    $amazonUrl = null;
                    if ($asin !== null) {
                        $amazonUrl = 'https://www.amazon.de/dp/'.$asin;
                    }

                    $price = $item['priceString'] ?? $item['price'] ?? null;

                    $rating = null;
                    if (isset($item['averageRating'])) {
                        $rating = (float) $item['averageRating'];
                    }

                    $ratingCount = null;
                    if (isset($item['totalReviews'])) {
                        $ratingCount = (int) $item['totalReviews'];
                    }

                    if ($title !== null) {
                        $books[] = [
                            'asin' => $asin,
                            'title' => $title,
                            'author' => $author,
                            'cover_url' => $coverUrl,
                            'amazon_url' => $amazonUrl,
                            'price' => $price,
                            'rating' => $rating !== null ? number_format($rating, 1) : null,
                            'rating_count' => $ratingCount,
                        ];
                    }
                }
            }
        }

        return $books;
    }
}
