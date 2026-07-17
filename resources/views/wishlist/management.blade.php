<div class="p-6">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-white">{{ __('frontend-jbc::ui.wishlist.mgmt_title') }}</h1>
            <p class="mt-1 text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.wishlist.mgmt_desc') }}</p>
        </div>
        <div>
            <button wire:click="import" wire:loading.attr="disabled" class="inline-flex items-center gap-2 rounded-lg px-5 py-3 text-sm font-medium text-white transition" style="background-color: var(--color-brand);">
                <span wire:loading.remove wire:target="import">{{ __('frontend-jbc::ui.wishlist.import_btn') }}</span>
                <span wire:loading wire:target="import">{{ __('frontend-jbc::ui.wishlist.mgmt_importing') }}</span>
            </button>
        </div>
    </div>

    @if ($importResult)
        <div class="mb-6 border-l-2 p-4 text-sm" style="border-color: var(--color-brand); background-color: rgba(255,127,80,0.08); color: var(--color-brand);">
            {{ $importResult }}
        </div>
    @endif

    @if ($projectId === null)
        <div class="py-12 text-center text-[var(--color-text-muted)]">
            {{ __('frontend-jbc::ui.wishlist.mgmt_select_project') }}
        </div>
    @elseif (count($wishlistBooks) === 0)
        <div class="py-12 text-center">
            <p class="text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.wishlist.mgmt_empty') }}</p>
            <p class="mt-2 text-sm text-[var(--color-text-muted)]">{{ __('frontend-jbc::ui.wishlist.mgmt_empty_hint') }}</p>
        </div>
    @else
        <div class="overflow-hidden border" style="border-color: var(--color-border-muted);">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b text-[var(--color-text-secondary)]" style="border-color: var(--color-border-muted);">
                        <th class="p-4 font-medium">{{ __('frontend-jbc::ui.wishlist.mgmt_col_cover') }}</th>
                        <th class="p-4 font-medium">{{ __('frontend-jbc::ui.wishlist.mgmt_col_title') }}</th>
                        <th class="p-4 font-medium">{{ __('frontend-jbc::ui.wishlist.mgmt_col_author') }}</th>
                        <th class="p-4 font-medium">{{ __('frontend-jbc::ui.wishlist.mgmt_col_price') }}</th>
                        <th class="p-4 font-medium">{{ __('frontend-jbc::ui.wishlist.mgmt_col_rating') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y" style="border-color: var(--color-border-muted);">
                    @foreach ($wishlistBooks as $book)
                        <tr class="text-[var(--color-text-primary)]">
                            <td class="p-4">
                                @if (!empty($book['cover_url']))
                                    <img src="{{ $book['cover_url'] }}" alt="{{ $book['title'] }}" class="h-16 w-12 object-contain">
                                @endif
                            </td>
                            <td class="p-4">{{ $book['title'] }}</td>
                            <td class="p-4 text-[var(--color-text-secondary)]">{{ $book['author'] ?: __('frontend-jbc::ui.wishlist.mgmt_na') }}</td>
                            <td class="p-4">{{ $book['price'] ?: __('frontend-jbc::ui.wishlist.mgmt_na') }}</td>
                            <td class="p-4">
                                @if (!empty($book['rating']))
                                    {{ number_format((float) $book['rating'], 1, ',', '.') }}
                                    @if (!empty($book['rating_count']))
                                        <span class="text-[var(--color-text-muted)]">({{ $book['rating_count'] }})</span>
                                    @endif
                                @else
                                    {{ __('frontend-jbc::ui.wishlist.mgmt_na') }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p class="mt-4 text-sm text-[var(--color-text-muted)]">{{ count($wishlistBooks) }} {{ __('frontend-jbc::ui.wishlist.mgmt_count') }}</p>
    @endif
</div>
