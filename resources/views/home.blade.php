@extends('frontend-jbc::components.layout')

@section('title', config('frontend-jbc.site_name'))
@section('meta_description', config('frontend-jbc.tagline'))

@section('content')

    {{-- Hero --}}
    <div class="mb-16">
        <img src="{{ asset('vendor/frontend-jbc/images/hero.jpg') }}" alt="{{ __('frontend-jbc::ui.home.hero_alt') }}" class="w-full border-2 grayscale transition-all duration-3000 hover:grayscale-0" style="border-color: var(--color-brand);">
    </div>

    <x-frontend-jbc::divider />

    {{-- About --}}
    <section class="mb-16">
        <h2 class="mb-4 text-4xl" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.home.about_title') }}</h2>
        <p class="max-w-3xl leading-relaxed text-lg">{{ __('frontend-jbc::ui.home.about_text') }}</p>
    </section>

    <x-frontend-jbc::divider />

    {{-- Latest Posts --}}
    <section id="favorites" class="mb-16">
        <h2 class="mb-2 text-4xl" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.home.latest_posts') }}</h2>
        <p class="mb-8 text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.home.latest_posts_desc') }}</p>

        @if ($latestPosts->isNotEmpty())
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($latestPosts as $post)
                    <x-frontend-jbc::post-card :post="$post" />
                @endforeach
            </div>
        @else
            <p class="text-[var(--color-text-muted)] italic">{{ __('frontend-jbc::ui.blog.no_posts') }}</p>
        @endif
    </section>

    <x-frontend-jbc::divider />

    {{-- Team --}}
    <section id="team" class="space-y-20">
        <div>
            <h2 class="mb-2 text-4xl" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.home.team_title') }}</h2>
            <p class="max-w-3xl leading-relaxed text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.home.team_desc') }}</p>
        </div>

        <x-frontend-jbc::team-card
            image="{{ asset('vendor/frontend-jbc/images/team-me.jpg') }}"
            title="{{ __('frontend-jbc::ui.home.team_me_title') }}"
            text="{{ __('frontend-jbc::ui.home.team_me_text') }}"
        />

        <x-frontend-jbc::team-card
            image="{{ asset('vendor/frontend-jbc/images/team-family.jpg') }}"
            title="{{ __('frontend-jbc::ui.home.team_family_title') }}"
            text="{{ __('frontend-jbc::ui.home.team_family_text') }}"
            :reverse="true"
        />

        <x-frontend-jbc::team-card
            image="{{ asset('vendor/frontend-jbc/images/team-cats.jpg') }}"
            title="{{ __('frontend-jbc::ui.home.team_cats_title') }}"
            text="{{ __('frontend-jbc::ui.home.team_cats_text') }}"
        />
    </section>

@endsection
