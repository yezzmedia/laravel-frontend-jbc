@extends('frontend-jbc::components.layout')

@section('title', config('frontend-jbc.site_name'))

@section('content')

    {{-- Hero --}}
    <section class="py-16 md:py-24">
        <div class="mx-auto max-w-3xl text-center">
            <h1 class="text-5xl font-semibold md:text-6xl" style="color: var(--color-brand-foreground);">
                {{ config('frontend-jbc.site_name') }}
            </h1>
            <p class="mx-auto mt-4 max-w-xl text-lg leading-relaxed text-[var(--color-text-secondary)]">
                {{ Str::limit(__('frontend-jbc::ui.home.about_text'), 180) }}
            </p>
        </div>
    </section>

    {{-- Latest Posts --}}
    <section class="pb-16 md:pb-24">
        <div class="mb-10 flex items-center justify-between">
            <h2 class="text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">
                {{ __('frontend-jbc::ui.home.latest_posts') }}
            </h2>
            <a href="{{ route('frontend.blog') }}" class="text-sm text-[var(--color-text-muted)] transition hover:text-[var(--color-brand)]">
                {{ __('frontend-jbc::ui.home.view_all') }} &rarr;
            </a>
        </div>

        @if ($latestPosts->isNotEmpty())
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($latestPosts as $post)
                    <a href="{{ route('frontend.blog.show', $post) }}" class="group block overflow-hidden border transition hover:-translate-y-1" style="border-color: var(--color-border-muted);">
                        @if ($post->featured_image)
                            <div class="h-52 w-full bg-cover bg-center transition duration-700 group-hover:scale-105" style="background-image: url('{{ $post->featured_image }}');"></div>
                        @else
                            <div class="flex h-52 w-full items-center justify-center border-b" style="border-color: var(--color-border-muted); background-color: var(--color-surface);">
                                <span class="text-sm text-[var(--color-text-muted)]">{{ __('frontend-jbc::ui.blog.no_image') }}</span>
                            </div>
                        @endif
                        <div class="p-5">
                            <div class="mb-2 flex items-center gap-2 text-xs text-[var(--color-text-muted)]">
                                @if ($post->author_name)
                                    <span>{{ $post->author_name }}</span>
                                @endif
                                @if ($post->published_at)
                                    <span>&middot;</span>
                                    <span>{{ $post->published_at->translatedFormat('d. M Y') }}</span>
                                @endif
                            </div>
                            <h3 class="text-2xl font-medium leading-snug transition group-hover:text-[var(--color-brand)]" style="color: var(--color-brand-foreground);">
                                {{ $post->title }}
                            </h3>
                            @if ($post->excerpt)
                                <p class="mt-2 line-clamp-2 text-sm leading-relaxed text-[var(--color-text-secondary)]">{{ $post->excerpt }}</p>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p class="py-16 text-center text-[var(--color-text-muted)]">{{ __('frontend-jbc::ui.blog.no_posts') }}</p>
        @endif
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- About --}}
    <section class="py-16 md:py-24">
        <div class="grid items-center gap-12 md:grid-cols-2">
            <div>
                <h2 class="text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">
                    {{ __('frontend-jbc::ui.home.about_title') }}
                </h2>
                <p class="mt-6 text-lg leading-relaxed text-[var(--color-text-primary)]">
                    {{ __('frontend-jbc::ui.home.about_text') }}
                </p>
                <div class="mt-6">
                    <x-frontend-jbc::social-links
                        :facebook="config('frontend-jbc.social.facebook')"
                        :twitter="config('frontend-jbc.social.twitter')"
                        :instagram="config('frontend-jbc.social.instagram')"
                    />
                </div>
            </div>
            <div class="flex justify-center md:justify-end">
                <div class="h-64 w-64 overflow-hidden rounded-full border-4" style="border-color: var(--color-brand);">
                    <img src="{{ asset('vendor/frontend-jbc/images/team-me.jpg') }}" alt="Julia" class="h-full w-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Proofreading --}}
    <section class="py-16 md:py-24">
        <div class="grid items-center gap-12 md:grid-cols-2">
            <div class="flex justify-center md:justify-start">
                <div class="flex h-56 w-56 items-center justify-center rounded-full border-4 p-8 text-center" style="border-color: var(--color-brand);">
                    <div>
                        <svg class="mx-auto h-10 w-10" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        <p class="mt-4 text-lg font-medium" style="color: var(--color-brand-foreground);">{{ __('frontend-jbc::ui.home.proofreading_tag_line1') }}</p>
                        <p class="text-lg font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.home.proofreading_tag_line2') }}</p>
                    </div>
                </div>
            </div>
            <div>
                <h2 class="text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.home.proofreading_title') }}</h2>
                <p class="mt-5 text-lg leading-relaxed text-[var(--color-text-primary)]">
                    {{ __('frontend-jbc::ui.home.proofreading_text_1') }}
                </p>
                <p class="mt-4 text-lg leading-relaxed text-[var(--color-text-secondary)]">
                    {{ __('frontend-jbc::ui.home.proofreading_text_2') }}
                </p>
                <a href="{{ url('/proofreading') }}" class="mt-6 inline-flex items-center gap-1 text-sm transition hover:gap-2" style="color: var(--color-brand);">
                    {{ __('frontend-jbc::ui.home.proofreading_cta') }} &rarr;
                </a>
            </div>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    @if (in_array('booklist', $activeAddonKeys ?? []))
        {{-- Books --}}
        <section class="py-16 md:py-24">
            <h2 class="mb-10 text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">
                {{ __('frontend-jbc::ui.books.title') }}
            </h2>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                {{-- Total Books Read --}}
                <div class="border p-6 text-center" style="border-color: var(--color-border-muted);">
                    <p class="text-4xl font-light tracking-tight" style="color: var(--color-brand);">{{ $totalBooksRead }}</p>
                    <p class="mt-2 text-xs uppercase tracking-wider text-[var(--color-text-muted)]">{{ __('frontend-jbc::ui.books.total_read') }}</p>
                </div>

                {{-- Pages Read --}}
                <div class="border p-6 text-center" style="border-color: var(--color-border-muted);">
                    <p class="text-4xl font-light tracking-tight" style="color: var(--color-brand);">{{ number_format($totalPagesRead, 0, ',', '.') }}</p>
                    <p class="mt-2 text-xs uppercase tracking-wider text-[var(--color-text-muted)]">{{ __('frontend-jbc::ui.books.total_pages') }}</p>
                </div>

                {{-- This Year --}}
                <div class="border p-6 text-center" style="border-color: var(--color-border-muted);">
                    <p class="text-4xl font-light tracking-tight" style="color: var(--color-brand);">{{ $booksThisYear }}</p>
                    <p class="mt-2 text-xs uppercase tracking-wider text-[var(--color-text-muted)]">{{ __('frontend-jbc::ui.books.this_year', ['year' => date('Y')]) }}</p>
                </div>

                {{-- Latest Book --}}
                <div class="border p-6 text-center" style="border-color: var(--color-brand);">
                    <p class="text-xs uppercase tracking-wider" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.books.latest') }}</p>
                    @if ($latestBook)
                        <p class="mt-2 text-lg font-medium leading-snug" style="color: var(--color-brand-foreground);">{{ $latestBook->title }}</p>
                        <p class="mt-1 text-base text-[var(--color-text-muted)]">{{ $latestBook->author }}</p>
                    @else
                        <p class="mt-2 text-sm text-[var(--color-text-muted)]">{{ __('frontend-jbc::ui.books.no_book') }}</p>
                    @endif
                </div>
            </div>

            <div class="mt-10 text-center">
                <a href="{{ route('frontend.books') }}" class="inline-flex items-center gap-1 text-sm transition hover:gap-2" style="color: var(--color-brand);">
                    {{ __('frontend-jbc::ui.home.view_all_books') }} &rarr;
                </a>
            </div>
        </section>
    @endif

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Team --}}
    <section class="py-16 md:py-24">
        <h2 class="mb-10 text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">
            {{ __('frontend-jbc::ui.home.team_title') }}
        </h2>

        <div class="grid gap-10 md:grid-cols-3">
            <div class="text-center">
                <div class="mx-auto h-36 w-36 overflow-hidden rounded-full border-4" style="border-color: var(--color-brand);">
                    <img src="{{ asset('vendor/frontend-jbc/images/team-me.jpg') }}" alt="" class="h-full w-full object-cover">
                </div>
                <h3 class="mt-5 text-2xl font-medium" style="color: var(--color-brand-foreground);">
                    {{ __('frontend-jbc::ui.home.team_me_title') }}
                </h3>
                <p class="mt-3 text-lg leading-relaxed text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.home.team_me_text') }}</p>
            </div>
            <div class="text-center">
                <div class="mx-auto h-36 w-36 overflow-hidden rounded-full border-4" style="border-color: var(--color-brand);">
                    <img src="{{ asset('vendor/frontend-jbc/images/team-family.jpg') }}" alt="" class="h-full w-full object-cover">
                </div>
                <h3 class="mt-5 text-2xl font-medium" style="color: var(--color-brand-foreground);">
                    {{ __('frontend-jbc::ui.home.team_family_title') }}
                </h3>
                <p class="mt-3 text-lg leading-relaxed text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.home.team_family_text') }}</p>
            </div>
            <div class="text-center">
                <div class="mx-auto h-36 w-36 overflow-hidden rounded-full border-4" style="border-color: var(--color-brand);">
                    <img src="{{ asset('vendor/frontend-jbc/images/team-cats.jpg') }}" alt="" class="h-full w-full object-cover">
                </div>
                <h3 class="mt-5 text-2xl font-medium" style="color: var(--color-brand-foreground);">
                    {{ __('frontend-jbc::ui.home.team_cats_title') }}
                </h3>
                <p class="mt-3 text-lg leading-relaxed text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.home.team_cats_text') }}</p>
            </div>
        </div>
    </section>

@endsection
