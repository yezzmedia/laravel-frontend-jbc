@extends('frontend-jbc::components.layout')

@section('title', __('frontend-jbc::ui.rating.title'))
@section('meta_description', __('frontend-jbc::ui.rating.description'))

@section('content')

    {{-- Hero --}}
    <section class="py-12 md:py-20">
        <div class="mx-auto max-w-3xl text-center">
            <span class="inline-block border px-3 py-1 text-xs uppercase tracking-[0.3em]" style="border-color: var(--color-brand); color: var(--color-brand);">
                {{ __('frontend-jbc::ui.rating.badge') }}
            </span>
            <h1 class="mt-6 text-4xl font-semibold md:text-5xl" style="color: var(--color-brand);">
                {{ __('frontend-jbc::ui.rating.title') }}
            </h1>
            <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-[var(--color-text-primary)]">
                {{ __('frontend-jbc::ui.rating.intro') }}
            </p>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- How It Works --}}
    <section class="py-16 md:py-24">
        <div class="grid gap-12 md:grid-cols-2">
            <div>
                <h2 class="mb-6 text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">
                    {{ __('frontend-jbc::ui.rating.how_title') }}
                </h2>
                <p class="text-lg leading-relaxed text-[var(--color-text-secondary)]">
                    {{ __('frontend-jbc::ui.rating.how_text') }}
                </p>

                <div class="mt-8 flex items-center gap-4">
                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full border-2 text-center" style="border-color: var(--color-brand);">
                        <span class="text-sm font-semibold" style="color: var(--color-brand);">1-10</span>
                    </div>
                    <svg class="h-6 w-6 text-[var(--color-text-muted)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" /></svg>
                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full border-2 text-center" style="border-color: var(--color-brand); background-color: rgba(255,127,80,0.08);">
                        <span class="text-sm font-semibold" style="color: var(--color-brand);">&divide; 2</span>
                    </div>
                    <svg class="h-6 w-6 text-[var(--color-text-muted)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" /></svg>
                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full border-2 text-center" style="border-color: var(--color-brand);">
                        <span class="text-sm font-semibold" style="color: var(--color-brand);">1-5</span>
                    </div>
                </div>
                <p class="mt-4 text-sm text-[var(--color-text-muted)]">{{ __('frontend-jbc::ui.rating.how_conversion') }}</p>
            </div>
            <div class="flex items-center">
                <div class="border-l-2 p-5" style="border-color: var(--color-brand); background-color: rgba(255,127,80,0.05);">
                    <div class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 shrink-0" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        <div>
                            <p class="text-lg font-medium" style="color: var(--color-brand-foreground);">{{ __('frontend-jbc::ui.rating.spoiler_title') }}</p>
                            <p class="mt-2 text-base leading-relaxed text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.rating.spoiler_text') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Rating Categories --}}
    <section class="py-16 md:py-24">
        <h2 class="mb-4 text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">
            {{ __('frontend-jbc::ui.rating.categories_title') }}
        </h2>
        <p class="mb-10 text-lg text-[var(--color-text-secondary)]">
            {{ __('frontend-jbc::ui.rating.categories_intro') }}
        </p>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            {{-- Cover --}}
            <div class="border p-6" style="border-color: var(--color-brand);">
                <div class="mb-4 flex items-center justify-between">
                    <svg class="h-6 w-6" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z" />
                    </svg>
                    <span class="text-xs font-semibold uppercase tracking-wider" style="color: var(--color-brand);">/10</span>
                </div>
                <h3 class="mb-3 text-lg font-medium" style="color: var(--color-brand-foreground);">{{ __('frontend-jbc::ui.rating.cat_cover') }}</h3>
                <ul class="space-y-2 text-base leading-relaxed text-[var(--color-text-secondary)]">
                    <li>{{ __('frontend-jbc::ui.rating.cat_cover_1') }}</li>
                    <li>{{ __('frontend-jbc::ui.rating.cat_cover_2') }}</li>
                    <li>{{ __('frontend-jbc::ui.rating.cat_cover_3') }}</li>
                </ul>
            </div>

            {{-- Plot --}}
            <div class="border p-6" style="border-color: var(--color-brand);">
                <div class="mb-4 flex items-center justify-between">
                    <svg class="h-6 w-6" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                    <span class="text-xs font-semibold uppercase tracking-wider" style="color: var(--color-brand);">/10</span>
                </div>
                <h3 class="mb-3 text-lg font-medium" style="color: var(--color-brand-foreground);">{{ __('frontend-jbc::ui.rating.cat_plot') }}</h3>
                <ul class="space-y-2 text-base leading-relaxed text-[var(--color-text-secondary)]">
                    <li>{{ __('frontend-jbc::ui.rating.cat_plot_1') }}</li>
                    <li>{{ __('frontend-jbc::ui.rating.cat_plot_2') }}</li>
                    <li>{{ __('frontend-jbc::ui.rating.cat_plot_3') }}</li>
                    <li>{{ __('frontend-jbc::ui.rating.cat_plot_4') }}</li>
                </ul>
            </div>

            {{-- Characters --}}
            <div class="border p-6" style="border-color: var(--color-brand);">
                <div class="mb-4 flex items-center justify-between">
                    <svg class="h-6 w-6" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                    <span class="text-xs font-semibold uppercase tracking-wider" style="color: var(--color-brand);">/10</span>
                </div>
                <h3 class="mb-3 text-lg font-medium" style="color: var(--color-brand-foreground);">{{ __('frontend-jbc::ui.rating.cat_characters') }}</h3>
                <ul class="space-y-2 text-base leading-relaxed text-[var(--color-text-secondary)]">
                    <li>{{ __('frontend-jbc::ui.rating.cat_characters_1') }}</li>
                    <li>{{ __('frontend-jbc::ui.rating.cat_characters_2') }}</li>
                    <li>{{ __('frontend-jbc::ui.rating.cat_characters_3') }}</li>
                </ul>
            </div>

            {{-- Worldbuilding --}}
            <div class="border p-6" style="border-color: var(--color-brand);">
                <div class="mb-4 flex items-center justify-between">
                    <svg class="h-6 w-6" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg>
                    <span class="text-xs font-semibold uppercase tracking-wider" style="color: var(--color-brand);">/10</span>
                </div>
                <h3 class="mb-3 text-lg font-medium" style="color: var(--color-brand-foreground);">{{ __('frontend-jbc::ui.rating.cat_worldbuilding') }}</h3>
                <ul class="space-y-2 text-base leading-relaxed text-[var(--color-text-secondary)]">
                    <li>{{ __('frontend-jbc::ui.rating.cat_worldbuilding_1') }}</li>
                    <li>{{ __('frontend-jbc::ui.rating.cat_worldbuilding_2') }}</li>
                </ul>
            </div>

            {{-- Writing Style --}}
            <div class="border p-6" style="border-color: var(--color-brand);">
                <div class="mb-4 flex items-center justify-between">
                    <svg class="h-6 w-6" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    <span class="text-xs font-semibold uppercase tracking-wider" style="color: var(--color-brand);">/10</span>
                </div>
                <h3 class="mb-3 text-lg font-medium" style="color: var(--color-brand-foreground);">{{ __('frontend-jbc::ui.rating.cat_style') }}</h3>
                <ul class="space-y-2 text-base leading-relaxed text-[var(--color-text-secondary)]">
                    <li>{{ __('frontend-jbc::ui.rating.cat_style_1') }}</li>
                    <li>{{ __('frontend-jbc::ui.rating.cat_style_2') }}</li>
                    <li>{{ __('frontend-jbc::ui.rating.cat_style_3') }}</li>
                </ul>
            </div>

            {{-- Info Cards (no score) --}}
            <div class="border p-6" style="border-color: var(--color-border-muted);">
                <div class="mb-4 flex items-center justify-between">
                    <svg class="h-6 w-6 text-[var(--color-text-muted)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    <span class="text-xs uppercase tracking-wider text-[var(--color-text-muted)]">{{ __('frontend-jbc::ui.rating.cat_info') }}</span>
                </div>
                <h3 class="mb-3 text-lg font-medium" style="color: var(--color-brand-foreground);">{{ __('frontend-jbc::ui.rating.cat_author') }}</h3>
                <ul class="space-y-2 text-base leading-relaxed text-[var(--color-text-secondary)]">
                    <li>{{ __('frontend-jbc::ui.rating.cat_author_1') }}</li>
                    <li>{{ __('frontend-jbc::ui.rating.cat_author_2') }}</li>
                </ul>
            </div>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Additional info cards --}}
    <section class="py-16 md:py-24">
        <div class="grid gap-6 sm:grid-cols-2">
            <div class="border p-6" style="border-color: var(--color-border-muted);">
                <div class="mb-4">
                    <svg class="h-6 w-6" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.455 2.456L21.75 6l-1.036.259a3.375 3.375 0 00-2.455 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                    </svg>
                </div>
                <h3 class="mb-3 text-lg font-medium" style="color: var(--color-brand-foreground);">{{ __('frontend-jbc::ui.rating.cat_special') }}</h3>
                <p class="text-base leading-relaxed text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.rating.cat_special_text') }}</p>
            </div>
            <div class="border p-6" style="border-color: var(--color-border-muted);">
                <div class="mb-4">
                    <svg class="h-6 w-6" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                </div>
                <h3 class="mb-3 text-lg font-medium" style="color: var(--color-brand-foreground);">{{ __('frontend-jbc::ui.rating.cat_conclusion') }}</h3>
                <p class="text-base leading-relaxed text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.rating.cat_conclusion_text') }}</p>
            </div>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Review Process --}}
    <section class="py-16 md:py-24">
        <h2 class="mb-4 text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">
            {{ __('frontend-jbc::ui.rating.process_title') }}
        </h2>
        <p class="mb-10 text-lg text-[var(--color-text-secondary)]">
            {{ __('frontend-jbc::ui.rating.process_intro') }}
        </p>

        <div class="mx-auto max-w-3xl">
            <div class="space-y-8">
                <div class="flex gap-6">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border-2 text-sm font-semibold" style="border-color: var(--color-brand); color: var(--color-brand);">1</div>
                    <div>
                        <p class="text-lg font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.rating.process_1_title') }}</p>
                        <p class="mt-1 text-base text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.rating.process_1_text') }}</p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border-2 text-sm font-semibold" style="border-color: var(--color-brand); color: var(--color-brand);">2</div>
                    <div>
                        <p class="text-lg font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.rating.process_2_title') }}</p>
                        <p class="mt-1 text-base text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.rating.process_2_text') }}</p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border-2 text-sm font-semibold" style="border-color: var(--color-brand); color: var(--color-brand);">3</div>
                    <div>
                        <p class="text-lg font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.rating.process_3_title') }}</p>
                        <p class="mt-1 text-base text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.rating.process_3_text') }}</p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border-2 text-sm font-semibold" style="border-color: var(--color-brand); color: var(--color-brand);">4</div>
                    <div>
                        <p class="text-lg font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.rating.process_4_title') }}</p>
                        <p class="mt-1 text-base text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.rating.process_4_text') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Social Media Note --}}
    <section class="py-16 md:py-24">
        <div class="border-l-2 p-5" style="border-color: var(--color-brand); background-color: rgba(255,127,80,0.05);">
            <div class="flex items-start gap-3">
                <svg class="mt-0.5 h-5 w-5 shrink-0" style="color: var(--color-brand);" fill="currentColor" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                <div>
                    <p class="text-lg font-medium" style="color: var(--color-brand-foreground);">{{ __('frontend-jbc::ui.rating.social_title') }}</p>
                    <p class="mt-1 text-base leading-relaxed text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.rating.social_text') }}</p>
                </div>
            </div>
        </div>
    </section>

@endsection
