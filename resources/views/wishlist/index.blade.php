@extends('frontend-jbc::components.layout')

@section('title', __('frontend-jbc::ui.wishlist.title'))
@section('meta_description', __('frontend-jbc::ui.wishlist.description'))

@section('content')

    {{-- Hero --}}
    <section class="py-12 md:py-20">
        <div class="grid items-center gap-12 lg:grid-cols-5">
            <div class="lg:col-span-3">
                <h1 class="text-4xl font-semibold md:text-5xl" style="color: var(--color-brand);">
                    {{ __('frontend-jbc::ui.wishlist.title') }}
                </h1>
                <p class="mt-6 text-lg leading-relaxed text-gray-400">
                    {{ __('frontend-jbc::ui.wishlist.intro') }}
                </p>
            </div>
            <div class="flex justify-center lg:col-span-2 lg:justify-end">
                <div class="flex h-64 w-64 flex-col items-center justify-center rounded-full border-4 p-8 text-center" style="border-color: var(--color-brand);">
                    <p class="text-4xl font-light tracking-tight" style="color: var(--color-brand);">{{ $totalBooks }}</p>
                    <p class="mt-2 text-sm uppercase tracking-wider text-gray-400">{{ __('frontend-jbc::ui.wishlist.total') }}</p>
                    @if ($averageRating !== null)
                        <div class="mt-3 flex items-center gap-1 text-sm text-gray-400">
                            <svg class="h-4 w-4" style="color: var(--color-brand);" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <span>O {{ number_format($averageRating, 1, ',', '.') }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Amazon Wishlist CTA --}}
    <section class="py-8 md:py-10">
        <div class="flex flex-col items-center justify-between gap-4 sm:flex-row">
            <p class="text-lg text-gray-400">
                {{ __('frontend-jbc::ui.wishlist.amazon_cta') }}
            </p>
            @if (config('frontend-jbc.wishlist_url'))
                <a href="{{ config('frontend-jbc.wishlist_url') }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-lg px-6 py-3 text-sm font-medium text-white transition" style="background-color: var(--color-brand);">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm5.657 15.657A8 8 0 016.343 6.343a8 8 0 0111.314 0 8 8 0 010 11.314zM13.414 7.586l-1.414-1.414L6.586 11.586l1.414 1.414 5.414-5.414z"/></svg>
                    {{ __('frontend-jbc::ui.wishlist.amazon_btn') }}
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                </a>
            @endif
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Wishlist Grid --}}
    <section class="py-16 md:py-24">
        @if ($books->isNotEmpty())
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($books as $book)
                    <div class="group flex flex-col border p-5 transition hover:-translate-y-1" style="border-color: var(--color-border-muted);">
                        @if ($book->cover_url)
                            <div class="mb-4 flex justify-center">
                                <img src="{{ $book->cover_url }}" alt="{{ $book->title }}" class="h-56 object-contain" loading="lazy">
                            </div>
                        @else
                            <div class="mb-4 flex h-56 items-center justify-center border" style="border-color: var(--color-border-muted);">
                                <span class="text-sm text-gray-600">{{ __('frontend-jbc::ui.books.no_cover') }}</span>
                            </div>
                        @endif

                        <h3 class="text-xl font-medium leading-snug transition group-hover:text-[var(--color-brand)]" style="color: var(--color-brand-foreground);">
                            {{ $book->title }}
                        </h3>

                        @if ($book->author)
                            <p class="mt-2 text-base text-gray-400">{{ $book->author }}</p>
                        @endif

                        <div class="mt-3 flex items-center gap-3 text-sm">
                            @if ($book->rating !== null)
                                <div class="flex items-center gap-1 text-gray-400">
                                    <svg class="h-4 w-4" style="color: var(--color-brand);" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                    <span>{{ number_format((float) $book->rating, 1, ',', '.') }}</span>
                                </div>
                            @endif
                            @if ($book->price)
                                <span class="text-gray-500">{{ $book->price }}</span>
                            @endif
                        </div>

                        @if (config('frontend-jbc.wishlist_url'))
                            <div class="mt-auto pt-4">
                                <a href="{{ config('frontend-jbc.wishlist_url') }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 border px-4 py-2 text-sm transition hover:border-[var(--color-brand)] hover:text-[var(--color-brand)]" style="border-color: var(--color-border-muted); color: var(--color-brand-foreground);">
                                    {{ __('frontend-jbc::ui.wishlist.view_on_wishlist') }}
                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                                </a>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="py-20 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                </svg>
                <p class="mt-6 text-lg text-gray-600">{{ __('frontend-jbc::ui.wishlist.empty') }}</p>
                <p class="mt-2 text-base text-gray-600">{{ __('frontend-jbc::ui.wishlist.empty_hint') }}</p>
            </div>
        @endif
    </section>

@endsection
