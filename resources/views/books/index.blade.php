@extends('frontend-jbc::components.layout')

@section('title', __('frontend-jbc::ui.books.title'))
@section('meta_description', __('frontend-jbc::ui.books.description'))

@section('content')

    {{-- Hero --}}
    <section class="py-12 md:py-20">
        <div class="grid items-center gap-12 lg:grid-cols-5">
            <div class="lg:col-span-3">
                <span class="inline-block border px-3 py-1 text-xs uppercase tracking-[0.3em]" style="border-color: var(--color-brand); color: var(--color-brand);">
                    {{ __('frontend-jbc::ui.books.badge') }}
                </span>
                <h1 class="mt-6 text-4xl font-semibold md:text-5xl" style="color: var(--color-brand);">
                    {{ __('frontend-jbc::ui.books.title') }}
                </h1>
                <p class="mt-6 text-lg leading-relaxed text-[var(--color-text-secondary)]">
                    {{ __('frontend-jbc::ui.books.description') }}
                </p>
            </div>
            <div class="flex justify-center lg:col-span-2 lg:justify-end">
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex h-32 w-32 flex-col items-center justify-center border p-4 text-center" style="border-color: var(--color-brand);">
                        <p class="text-3xl font-light tracking-tight" style="color: var(--color-brand);">{{ $totalBooksRead }}</p>
                        <p class="mt-1 text-xs uppercase tracking-wider text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.books.total_read') }}</p>
                    </div>
                    <div class="flex h-32 w-32 flex-col items-center justify-center border p-4 text-center" style="border-color: var(--color-border-muted);">
                        <p class="text-3xl font-light tracking-tight" style="color: var(--color-brand);">{{ number_format($totalPagesRead, 0, ',', '.') }}</p>
                        <p class="mt-1 text-xs uppercase tracking-wider text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.books.total_pages') }}</p>
                    </div>
                    <div class="flex h-32 w-32 flex-col items-center justify-center border p-4 text-center" style="border-color: var(--color-border-muted);">
                        <p class="text-3xl font-light tracking-tight" style="color: var(--color-brand);">{{ $booksThisYear }}</p>
                        <p class="mt-1 text-xs uppercase tracking-wider text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.books.this_year', ['year' => date('Y')]) }}</p>
                    </div>
                    <div class="flex h-32 w-32 flex-col items-center justify-center border p-4 text-center" style="border-color: var(--color-brand);">
                        <p class="text-xs uppercase tracking-wider" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.books.latest') }}</p>
                        @if ($latestBook)
                            <p class="mt-1 text-sm font-medium leading-snug" style="color: var(--color-brand-foreground);">{{ Str::limit($latestBook->title, 30) }}</p>
                        @else
                            <p class="mt-1 text-xs text-[var(--color-text-muted)]">{{ __('frontend-jbc::ui.books.no_book') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Currently Reading --}}
    @if ($readingBooks->isNotEmpty())
        <section class="py-16 md:py-24">
            <div class="mb-8 flex items-center gap-3">
                <svg class="h-6 w-6" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
                <h2 class="text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.books.currently_reading') }}</h2>
            </div>
            <p class="mb-8 text-lg text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.books.currently_reading_desc') }}</p>

            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($readingBooks as $book)
                    <div class="group flex border p-5 transition hover:-translate-y-1" style="border-color: var(--color-brand);">
                        @if ($book->cover_image)
                            <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="mr-4 h-44 w-28 shrink-0 object-cover">
                        @else
                            <div class="mr-4 flex h-44 w-28 shrink-0 items-center justify-center border" style="border-color: var(--color-border-muted); background-color: var(--color-surface);">
                                <span class="text-xs text-[var(--color-text-muted)]">{{ __('frontend-jbc::ui.books.no_cover') }}</span>
                            </div>
                        @endif
                        <div class="flex flex-col">
                            <h3 class="text-lg font-medium leading-snug transition group-hover:text-[var(--color-brand)]" style="color: var(--color-brand-foreground);">{{ $book->title }}</h3>
                            @if ($book->author)
                                <p class="mt-1 text-base text-[var(--color-text-secondary)]">{{ $book->author }}</p>
                            @endif
                            @if ($book->genre)
                                <span class="mt-2 inline-block border px-2 py-0.5 text-xs tracking-wide text-[var(--color-text-muted)]" style="border-color: var(--color-border-muted);">{{ $book->genre }}</span>
                            @endif
                            @if ($book->pages)
                                <p class="mt-2 text-sm text-[var(--color-text-muted)]">{{ $book->pages }} {{ __('frontend-jbc::ui.books.pages') }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>
    @endif

    {{-- Read Books --}}
    @if ($readBooks->isNotEmpty())
        <section class="py-16 md:py-24">
            <div class="mb-8 flex items-center gap-3">
                <svg class="h-6 w-6" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                <h2 class="text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.books.read_title') }}</h2>
            </div>

            @foreach ($readBooks as $year => $months)
                <div class="mb-12">
                    <div class="mb-6 flex items-center gap-4">
                        <span class="text-xl font-semibold" style="color: var(--color-brand);">{{ $year }}</span>
                        <div class="h-px flex-1" style="background-color: var(--color-border-muted);"></div>
                    </div>

                    @foreach ($months as $month => $books)
                        <div class="mb-8">
                            <h3 class="mb-4 text-base font-medium uppercase tracking-wider text-[var(--color-text-muted)]">{{ $month }}</h3>
                            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                                @foreach ($books as $book)
                                    <div class="group border p-4 transition hover:-translate-y-1" style="border-color: var(--color-border-muted);">
                                        <div class="mb-3 flex justify-center">
                                            @if ($book->cover_image)
                                                <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="h-48 w-32 object-cover">
                                            @else
                                                <div class="flex h-48 w-32 items-center justify-center border" style="border-color: var(--color-border-muted); background-color: var(--color-surface);">
                                                    <span class="text-xs text-[var(--color-text-muted)]">{{ __('frontend-jbc::ui.books.no_cover') }}</span>
                                                </div>
                                            @endif
                                        </div>
                                        <h4 class="text-center text-base font-medium leading-snug transition group-hover:text-[var(--color-brand)]" style="color: var(--color-brand-foreground);">{{ $book->title }}</h4>
                                        @if ($book->author)
                                            <p class="mt-1 text-center text-sm text-[var(--color-text-muted)]">{{ $book->author }}</p>
                                        @endif
                                        <div class="mt-2 flex justify-center gap-3 text-xs text-[var(--color-text-muted)]">
                                            @if ($book->genre)
                                                <span>{{ $book->genre }}</span>
                                            @endif
                                            @if ($book->pages)
                                                <span>{{ $book->pages }} {{ __('frontend-jbc::ui.books.pages') }}</span>
                                            @endif
                                        </div>
                                        @if ($book->read_date)
                                            <p class="mt-2 text-center text-xs text-[var(--color-text-muted)]">{{ $book->read_date->format('d.m.Y') }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </section>

        <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>
    @endif

    {{-- Unread Books --}}
    @if ($unreadBooks->isNotEmpty())
        <section class="py-16 md:py-24">
            <div class="mb-8 flex items-center gap-3">
                <svg class="h-6 w-6" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                </svg>
                <h2 class="text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.books.unread_title') }}</h2>
            </div>
            <p class="mb-8 text-lg text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.books.unread_desc') }}</p>

            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                @foreach ($unreadBooks as $book)
                    <div class="group flex flex-col border p-4 transition hover:-translate-y-1" style="border-color: var(--color-border-muted);">
                        <div class="mb-3 flex justify-center">
                            @if ($book->cover_image)
                                <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="h-48 w-32 object-cover">
                            @else
                                <div class="flex h-48 w-32 items-center justify-center border" style="border-color: var(--color-border-muted); background-color: var(--color-surface);">
                                    <span class="text-xs text-[var(--color-text-muted)]">{{ __('frontend-jbc::ui.books.no_cover') }}</span>
                                </div>
                            @endif
                        </div>
                        <h4 class="mt-auto text-center text-base font-medium leading-snug transition group-hover:text-[var(--color-brand)]" style="color: var(--color-brand-foreground);">{{ $book->title }}</h4>
                        @if ($book->author)
                            <p class="mt-1 text-center text-sm text-[var(--color-text-muted)]">{{ $book->author }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    @if ($readBooks->isEmpty() && $readingBooks->isEmpty() && $unreadBooks->isEmpty())
        <div class="py-24 text-center">
            <svg class="mx-auto h-12 w-12 text-[var(--color-text-muted)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
            </svg>
            <p class="mt-6 text-lg text-[var(--color-text-muted)]">{{ __('frontend-jbc::ui.books.none') }}</p>
        </div>
    @endif

@endsection
