@extends('frontend-jbc::components.layout')

@section('title', __('frontend-jbc::ui.books.title'))
@section('meta_description', __('frontend-jbc::ui.books.description'))

@section('content')

    <h1 class="mb-2 text-3xl font-semibold md:text-4xl" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.books.title') }}</h1>
    <p class="mb-12 text-gray-400">{{ __('frontend-jbc::ui.books.description') }}</p>

    @foreach ($readBooks as $year => $months)
        <section class="mb-12">
            <h2 class="mb-6 text-xl font-medium" style="color: var(--color-brand);">{{ $year }}</h2>
            @foreach ($months as $month => $books)
                <h3 class="mb-3 text-base text-gray-500">{{ $month }}</h3>
                <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                    @foreach ($books as $book)
                        <div class="flex flex-col items-center text-center">
                            @if ($book->cover_image)
                                <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="mb-3 h-52 w-36 border object-cover shadow-lg" style="border-color: var(--color-border-muted);">
                            @else
                                <div class="mb-3 flex h-52 w-36 items-center justify-center border" style="border-color: var(--color-border-muted); background-color: var(--color-surface);">
                                    <span class="text-xs text-gray-600">{{ __('frontend-jbc::ui.books.no_cover') }}</span>
                                </div>
                            @endif
                            <p class="text-sm leading-snug" style="color: var(--color-brand-foreground);">{{ $book->title }}</p>
                            @if ($book->author)
                                <p class="mt-1 text-xs text-gray-500">{{ $book->author }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endforeach
        </section>
    @endforeach

    @if ($readingBooks->isNotEmpty())
        <div class="my-12 h-px w-full" style="background-color: var(--color-border-muted);"></div>

        <h2 class="mb-2 text-xl font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.books.currently_reading') }}</h2>
        <p class="mb-6 text-gray-500">{{ __('frontend-jbc::ui.books.currently_reading_desc') }}</p>

        <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
            @foreach ($readingBooks as $book)
                <div class="flex flex-col items-center text-center">
                    @if ($book->cover_image)
                        <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="mb-3 h-52 w-36 border object-cover shadow-lg" style="border-color: var(--color-border-muted);">
                    @else
                        <div class="mb-3 flex h-52 w-36 items-center justify-center border" style="border-color: var(--color-border-muted); background-color: var(--color-surface);">
                            <span class="text-xs text-gray-600">{{ __('frontend-jbc::ui.books.no_cover') }}</span>
                        </div>
                    @endif
                    <p class="text-sm leading-snug" style="color: var(--color-brand-foreground);">{{ $book->title }}</p>
                    @if ($book->author)
                        <p class="mt-1 text-xs text-gray-500">{{ $book->author }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    @endif

    @if ($unreadBooks->isNotEmpty())
        <div class="my-12 h-px w-full" style="background-color: var(--color-border-muted);"></div>

        <h2 class="mb-2 text-xl font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.books.unread_title') }}</h2>
        <p class="mb-6 text-gray-500">{{ __('frontend-jbc::ui.books.unread_desc') }}</p>

        <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
            @foreach ($unreadBooks as $book)
                <div class="flex flex-col items-center text-center">
                    @if ($book->cover_image)
                        <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="mb-3 h-52 w-36 border object-cover shadow-lg" style="border-color: var(--color-border-muted);">
                    @else
                        <div class="mb-3 flex h-52 w-36 items-center justify-center border" style="border-color: var(--color-border-muted); background-color: var(--color-surface);">
                            <span class="text-xs text-gray-600">{{ __('frontend-jbc::ui.books.no_cover') }}</span>
                        </div>
                    @endif
                    <p class="text-sm leading-snug" style="color: var(--color-brand-foreground);">{{ $book->title }}</p>
                    @if ($book->author)
                        <p class="mt-1 text-xs text-gray-500">{{ $book->author }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    @endif

    @if ($readBooks->isEmpty() && $readingBooks->isEmpty() && $unreadBooks->isEmpty())
        <p class="py-16 text-center text-gray-600">{{ __('frontend-jbc::ui.books.none') }}</p>
    @endif

@endsection
