<div class="p-6">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-white">Wishlist Import</h1>
            <p class="mt-1 text-gray-400">Import books from your Amazon wishlist and manage them.</p>
        </div>
        <div>
            <button wire:click="import" wire:loading.attr="disabled" class="inline-flex items-center gap-2 rounded-lg px-5 py-3 text-sm font-medium text-white transition" style="background-color: var(--color-brand);">
                <span wire:loading.remove wire:target="import">{{ __('frontend-jbc::ui.wishlist.import_btn') }}</span>
                <span wire:loading wire:target="import">Importing...</span>
            </button>
        </div>
    </div>

    @if ($importResult)
        <div class="mb-6 border-l-2 p-4 text-sm" style="border-color: var(--color-brand); background-color: rgba(255,127,80,0.08); color: var(--color-brand);">
            {{ $importResult }}
        </div>
    @endif

    @if ($projectId === null)
        <div class="py-12 text-center text-gray-500">
            Select a project to manage the wishlist.
        </div>
    @elseif (count($wishlistBooks) === 0)
        <div class="py-12 text-center">
            <p class="text-gray-400">No books imported yet.</p>
            <p class="mt-2 text-sm text-gray-500">Click "Import" to fetch books from the configured Amazon wishlist.</p>
        </div>
    @else
        <div class="overflow-hidden border" style="border-color: var(--color-border-muted);">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b text-gray-400" style="border-color: var(--color-border-muted);">
                        <th class="p-4 font-medium">Cover</th>
                        <th class="p-4 font-medium">Title</th>
                        <th class="p-4 font-medium">Author</th>
                        <th class="p-4 font-medium">Price</th>
                        <th class="p-4 font-medium">Rating</th>
                    </tr>
                </thead>
                <tbody class="divide-y" style="border-color: var(--color-border-muted);">
                    @foreach ($wishlistBooks as $book)
                        <tr class="text-gray-300">
                            <td class="p-4">
                                @if (!empty($book['cover_url']))
                                    <img src="{{ $book['cover_url'] }}" alt="{{ $book['title'] }}" class="h-16 w-12 object-contain">
                                @endif
                            </td>
                            <td class="p-4">{{ $book['title'] }}</td>
                            <td class="p-4 text-gray-400">{{ $book['author'] ?? 'N/A' }}</td>
                            <td class="p-4">{{ $book['price'] ?? 'N/A' }}</td>
                            <td class="p-4">
                                @if (!empty($book['rating']))
                                    {{ number_format((float) $book['rating'], 1, ',', '.') }}
                                    @if (!empty($book['rating_count']))
                                        <span class="text-gray-500">({{ $book['rating_count'] }})</span>
                                    @endif
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p class="mt-4 text-sm text-gray-500">{{ count($wishlistBooks) }} books imported.</p>
    @endif
</div>
