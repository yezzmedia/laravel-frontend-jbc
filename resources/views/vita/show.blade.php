@extends('frontend-jbc::components.layout')

@section('title', __('frontend-jbc::ui.vita.title'))
@section('meta_description', __('frontend-jbc::ui.vita.description'))

@section('content')

    {{-- Hero --}}
    <section class="py-12 md:py-20">
        <div class="mx-auto max-w-3xl text-center">
            <span class="inline-block border px-3 py-1 text-xs uppercase tracking-[0.3em]" style="border-color: var(--color-brand); color: var(--color-brand);">
                {{ __('frontend-jbc::ui.vita.badge') }}
            </span>
            <h1 class="mt-6 text-4xl font-semibold md:text-5xl" style="color: var(--color-brand);">
                {{ __('frontend-jbc::ui.vita.title') }}
            </h1>
            <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-[var(--color-text-primary)]">
                {{ __('frontend-jbc::ui.vita.intro') }}
            </p>
        </div>
        <div class="mt-12 overflow-hidden border" style="border-color: var(--color-brand);">
            <img src="{{ asset('vendor/frontend-jbc/images/vita_main.jpg') }}" alt="{{ __('frontend-jbc::ui.vita.hero_alt') }}" class="w-full object-cover">
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Profil: Julia --}}
    <section id="julia" class="py-16 md:py-24">
        <div class="grid gap-12 lg:grid-cols-5">
            <div class="flex flex-col items-center lg:col-span-1">
                <div class="h-44 w-44 overflow-hidden rounded-full border-4" style="border-color: var(--color-brand);">
                    <img src="{{ asset('vendor/frontend-jbc/images/team-me.jpg') }}" alt="{{ __('frontend-jbc::ui.vita.julia_name') }}" class="h-full w-full object-cover">
                </div>
                <h3 class="mt-5 text-2xl font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.julia_name') }}</h3>
                <p class="mt-1 text-base text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.vita.julia_nickname') }}</p>
                <div class="mt-4 flex flex-wrap justify-center gap-2">
                    <span class="border px-2.5 py-1 text-xs tracking-wide text-[var(--color-text-secondary)]" style="border-color: var(--color-border-muted);">#Bloggerin</span>
                    <span class="border px-2.5 py-1 text-xs tracking-wide text-[var(--color-text-secondary)]" style="border-color: var(--color-border-muted);">#Mama</span>
                    <span class="border px-2.5 py-1 text-xs tracking-wide text-[var(--color-text-secondary)]" style="border-color: var(--color-border-muted);">#Grafikerin</span>
                </div>
            </div>
            <div class="lg:col-span-4">
                <h2 class="mb-8 text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">
                    {{ __('frontend-jbc::ui.vita.julia_title') }}
                </h2>

                <div class="space-y-8">
                    <div class="flex gap-6">
                        <div class="hidden shrink-0 pt-1 text-right sm:block" style="width: 80px;">
                            <span class="text-sm font-semibold" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.julia_year_80s') }}</span>
                        </div>
                        <div class="border-l-2 pb-2 pl-6" style="border-color: var(--color-border-muted);">
                            <p class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.vita.julia_text_80s') }}</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="hidden shrink-0 pt-1 text-right sm:block" style="width: 80px;">
                            <span class="text-sm font-semibold" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.julia_year_2000s') }}</span>
                        </div>
                        <div class="border-l-2 pb-2 pl-6" style="border-color: var(--color-border-muted);">
                            <p class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.vita.julia_text_2000s') }}</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="hidden shrink-0 pt-1 text-right sm:block" style="width: 80px;">
                            <span class="text-sm font-semibold" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.julia_year_2010s') }}</span>
                        </div>
                        <div class="border-l-2 pb-2 pl-6" style="border-color: var(--color-border-muted);">
                            <p class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.vita.julia_text_2010s') }}</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="hidden shrink-0 pt-1 text-right sm:block" style="width: 80px;">
                            <span class="text-sm font-semibold" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.julia_year_2022') }}</span>
                        </div>
                        <div class="border-l-2 pb-2 pl-6" style="border-color: var(--color-brand);">
                            <p class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.vita.julia_text_2022') }}</p>
                        </div>
                    </div>
                </div>

                <p class="mt-8 text-lg text-[var(--color-text-secondary)] italic">
                    {{ __('frontend-jbc::ui.vita.julia_cta') }}
                </p>
            </div>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Profil: YezzMedia --}}
    <section id="yezzmedia" class="py-16 md:py-24">
        <div class="grid gap-12 lg:grid-cols-5">
            <div class="flex flex-col items-center lg:col-span-1">
                <div class="h-44 w-44 overflow-hidden rounded-full border-4" style="border-color: var(--color-brand);">
                    <img src="{{ asset('vendor/frontend-jbc/images/team-ye.jpg') }}" alt="{{ __('frontend-jbc::ui.vita.yezz_name') }}" class="h-full w-full object-cover">
                </div>
                <h3 class="mt-5 text-2xl font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.yezz_name') }}</h3>
                <p class="mt-1 text-base text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.vita.yezz_role') }}</p>
                <div class="mt-4 flex flex-wrap justify-center gap-2">
                    <span class="border px-2.5 py-1 text-xs tracking-wide text-[var(--color-text-secondary)]" style="border-color: var(--color-border-muted);">#Programmierer</span>
                    <span class="border px-2.5 py-1 text-xs tracking-wide text-[var(--color-text-secondary)]" style="border-color: var(--color-border-muted);">#Papa</span>
                    <span class="border px-2.5 py-1 text-xs tracking-wide text-[var(--color-text-secondary)]" style="border-color: var(--color-border-muted);">#Bastler</span>
                </div>
            </div>
            <div class="lg:col-span-4">
                <h2 class="mb-8 text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">
                    {{ __('frontend-jbc::ui.vita.yezz_title') }}
                </h2>

                <div class="space-y-8">
                    <div class="flex gap-6">
                        <div class="hidden shrink-0 pt-1 text-right sm:block" style="width: 80px;">
                            <span class="text-sm font-semibold" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.yezz_year_80s') }}</span>
                        </div>
                        <div class="border-l-2 pb-2 pl-6" style="border-color: var(--color-border-muted);">
                            <p class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.vita.yezz_text_80s') }}</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="hidden shrink-0 pt-1 text-right sm:block" style="width: 80px;">
                            <span class="text-sm font-semibold" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.yezz_year_career') }}</span>
                        </div>
                        <div class="border-l-2 pb-2 pl-6" style="border-color: var(--color-border-muted);">
                            <p class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.vita.yezz_text_career') }}</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="hidden shrink-0 pt-1 text-right sm:block" style="width: 80px;">
                            <span class="text-sm font-semibold" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.yezz_year_hobbies') }}</span>
                        </div>
                        <div class="border-l-2 pb-2 pl-6" style="border-color: var(--color-brand);">
                            <p class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.vita.yezz_text_hobbies') }}</p>
                        </div>
                    </div>
                </div>

                <a href="https://yezzmedia.com" target="_blank" rel="noopener" class="mt-8 inline-flex items-center gap-2 text-lg transition hover:gap-3" style="color: var(--color-brand);">
                    yezzmedia.com
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                </a>
            </div>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Media-Kit --}}
    <section id="mediakit" class="py-16 md:py-24">
        <h2 class="mb-4 text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">
            {{ __('frontend-jbc::ui.vita.mediakit_title') }}
        </h2>
        <p class="mb-10 text-lg text-[var(--color-text-secondary)]">
            {{ __('frontend-jbc::ui.vita.mediakit_intro') }}
        </p>

        {{-- Stats --}}
        <div class="mb-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="border p-6 text-center" style="border-color: var(--color-brand);">
                <p class="text-4xl font-light tracking-tight" style="color: var(--color-brand);">{{ $totalPosts }}</p>
                <p class="mt-2 text-xs uppercase tracking-wider text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.vita.stat_posts') }}</p>
            </div>
            <div class="border p-6 text-center" style="border-color: var(--color-border-muted);">
                <p class="text-4xl font-light tracking-tight" style="color: var(--color-brand);">{{ $totalBooksRead }}</p>
                <p class="mt-2 text-xs uppercase tracking-wider text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.vita.stat_books') }}</p>
            </div>
            <div class="border p-6 text-center" style="border-color: var(--color-border-muted);">
                <p class="text-4xl font-light tracking-tight" style="color: var(--color-brand);">{{ number_format($totalPagesRead, 0, ',', '.') }}</p>
                <p class="mt-2 text-xs uppercase tracking-wider text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.vita.stat_pages') }}</p>
            </div>
            <div class="border p-6 text-center" style="border-color: var(--color-border-muted);">
                <p class="text-4xl font-light tracking-tight" style="color: var(--color-brand);">{{ $yearsActive }}+</p>
                <p class="mt-2 text-xs uppercase tracking-wider text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.vita.stat_years') }}</p>
            </div>
        </div>

        {{-- Downloads --}}
        <div class="grid gap-6 sm:grid-cols-2">
            <a href="{{ asset('vendor/frontend-jbc/images/logo.svg') }}" download class="flex items-center gap-4 border p-5 transition hover:border-[var(--color-brand)]" style="border-color: var(--color-border-muted);">
                <svg class="h-8 w-8 shrink-0" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                <div>
                    <p class="text-lg font-medium" style="color: var(--color-brand-foreground);">{{ __('frontend-jbc::ui.vita.download_logo') }}</p>
                    <p class="text-sm text-gray-500">SVG</p>
                </div>
            </a>
            <a href="{{ asset('vendor/frontend-jbc/images/team-me.jpg') }}" download class="flex items-center gap-4 border p-5 transition hover:border-[var(--color-brand)]" style="border-color: var(--color-border-muted);">
                <svg class="h-8 w-8 shrink-0" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                <div>
                    <p class="text-lg font-medium" style="color: var(--color-brand-foreground);">{{ __('frontend-jbc::ui.vita.download_portrait') }}</p>
                    <p class="text-sm text-gray-500">JPG</p>
                </div>
            </a>
        </div>

        <div class="mt-8 border-l-2 p-5" style="border-color: var(--color-brand); background-color: rgba(255,127,80,0.05);">
            <p class="text-lg leading-relaxed text-[var(--color-text-primary)]">
                {{ __('frontend-jbc::ui.vita.mediakit_cooperation') }}
            </p>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Timeline --}}
    <section class="py-16 md:py-24">
        <h2 class="mb-10 text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">
            {{ __('frontend-jbc::ui.vita.timeline_title') }}
        </h2>

        <div class="mx-auto max-w-3xl">
            <div class="space-y-10">
                <div class="flex gap-6">
                    <div class="hidden shrink-0 pt-1 text-right sm:block" style="width: 80px;">
                        <span class="text-sm font-semibold" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.tl_80s') }}</span>
                    </div>
                    <div class="border-l-2 pb-2 pl-6" style="border-color: var(--color-brand);">
                        <p class="text-lg font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.tl_80s_title') }}</p>
                        <p class="mt-1 text-base text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.vita.tl_80s_text') }}</p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="hidden shrink-0 pt-1 text-right sm:block" style="width: 80px;">
                        <span class="text-sm font-semibold" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.tl_2000s') }}</span>
                    </div>
                    <div class="border-l-2 pb-2 pl-6" style="border-color: var(--color-border-muted);">
                        <p class="text-lg font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.tl_2000s_title') }}</p>
                        <p class="mt-1 text-base text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.vita.tl_2000s_text') }}</p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="hidden shrink-0 pt-1 text-right sm:block" style="width: 80px;">
                        <span class="text-sm font-semibold" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.tl_2010') }}</span>
                    </div>
                    <div class="border-l-2 pb-2 pl-6" style="border-color: var(--color-border-muted);">
                        <p class="text-lg font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.tl_2010_title') }}</p>
                        <p class="mt-1 text-base text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.vita.tl_2010_text') }}</p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="hidden shrink-0 pt-1 text-right sm:block" style="width: 80px;">
                        <span class="text-sm font-semibold" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.tl_2017') }}</span>
                    </div>
                    <div class="border-l-2 pb-2 pl-6" style="border-color: var(--color-border-muted);">
                        <p class="text-lg font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.tl_2017_title') }}</p>
                        <p class="mt-1 text-base text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.vita.tl_2017_text') }}</p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="hidden shrink-0 pt-1 text-right sm:block" style="width: 80px;">
                        <span class="text-sm font-semibold" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.tl_2022') }}</span>
                    </div>
                    <div class="border-l-2 pb-2 pl-6" style="border-color: var(--color-brand);">
                        <p class="text-lg font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.tl_2022_title') }}</p>
                        <p class="mt-1 text-base text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.vita.tl_2022_text') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Social --}}
    <section class="py-16 md:py-24">
        <h2 class="mb-4 text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">
            {{ __('frontend-jbc::ui.vita.social_title') }}
        </h2>
        <p class="mb-10 text-lg text-[var(--color-text-secondary)]">
            {{ __('frontend-jbc::ui.vita.social_intro') }}
        </p>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <a href="{{ config('frontend-jbc.social.instagram') }}" target="_blank" rel="noopener" class="border p-6 text-center transition hover:-translate-y-1 hover:border-[var(--color-brand)]" style="border-color: var(--color-border-muted);">
                <svg class="mx-auto h-8 w-8" style="color: var(--color-brand);" fill="currentColor" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                <p class="mt-4 text-lg font-medium" style="color: var(--color-brand-foreground);">Instagram</p>
                <p class="mt-1 text-sm text-gray-500">@julisbookcorner</p>
            </a>
            <a href="{{ config('frontend-jbc.social.facebook') }}" target="_blank" rel="noopener" class="border p-6 text-center transition hover:-translate-y-1 hover:border-[var(--color-brand)]" style="border-color: var(--color-border-muted);">
                <svg class="mx-auto h-8 w-8" style="color: var(--color-brand);" fill="currentColor" viewBox="0 0 320 512"><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5 16.3 0 29.4.4 37 1.2V7.9C291.4 4 256.4 0 236.2 0 129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg>
                <p class="mt-4 text-lg font-medium" style="color: var(--color-brand-foreground);">Facebook</p>
                <p class="mt-1 text-sm text-gray-500">@julisbookcorner</p>
            </a>
            <a href="{{ config('frontend-jbc.social.twitter') }}" target="_blank" rel="noopener" class="border p-6 text-center transition hover:-translate-y-1 hover:border-[var(--color-brand)]" style="border-color: var(--color-border-muted);">
                <svg class="mx-auto h-8 w-8" style="color: var(--color-brand);" fill="currentColor" viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                <p class="mt-4 text-lg font-medium" style="color: var(--color-brand-foreground);">X / Twitter</p>
                <p class="mt-1 text-sm text-gray-500">@julisbookcorner</p>
            </a>
            <a href="{{ config('frontend-jbc.wishlist_url') }}" target="_blank" rel="noopener" class="border p-6 text-center transition hover:-translate-y-1 hover:border-[var(--color-brand)]" style="border-color: var(--color-border-muted);">
                <svg class="mx-auto h-8 w-8" style="color: var(--color-brand);" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm5.657 15.657A8 8 0 016.343 6.343a8 8 0 0111.314 0 8 8 0 010 11.314zM13.414 7.586l-1.414-1.414L6.586 11.586l1.414 1.414 5.414-5.414z"/></svg>
                <p class="mt-4 text-lg font-medium" style="color: var(--color-brand-foreground);">{{ __('frontend-jbc::ui.navigation.wishlist') }}</p>
                <p class="mt-1 text-sm text-gray-500">Amazon</p>
            </a>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Projekte --}}
    <section class="py-16 md:py-24">
        <h2 class="mb-4 text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">
            {{ __('frontend-jbc::ui.vita.projects_title') }}
        </h2>
        <p class="mb-10 text-lg text-[var(--color-text-secondary)]">
            {{ __('frontend-jbc::ui.vita.projects_intro') }}
        </p>

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <div class="border p-6 transition hover:-translate-y-1" style="border-color: var(--color-border-muted);">
                <div class="flex justify-center">
                    <img src="{{ asset('vendor/frontend-jbc/images/logo.svg') }}" alt="Julisbookcorner" class="h-10">
                </div>
                <h3 class="mt-6 text-center text-xl font-medium" style="color: var(--color-brand);">{{ config('frontend-jbc.site_name') }}</h3>
                <p class="mt-3 text-center text-base leading-relaxed text-[var(--color-text-secondary)]">
                    {{ __('frontend-jbc::ui.vita.project_jbc_desc') }}
                </p>
            </div>

            <div class="border p-6 transition hover:-translate-y-1" style="border-color: var(--color-border-muted);">
                <div class="flex justify-center">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full" style="background-color: rgba(255,127,80,0.12);">
                        <svg class="h-5 w-5" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z" />
                        </svg>
                    </div>
                </div>
                <h3 class="mt-6 text-center text-xl font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.project_cover_title') }}</h3>
                <p class="mt-3 text-center text-base leading-relaxed text-[var(--color-text-secondary)]">
                    {{ __('frontend-jbc::ui.vita.project_cover_desc') }}
                </p>
                <p class="mt-2 text-center text-xs uppercase tracking-wider" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.project_wip') }}</p>
            </div>

            <div class="border p-6 transition hover:-translate-y-1" style="border-color: var(--color-border-muted);">
                <div class="flex justify-center">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full" style="background-color: rgba(255,127,80,0.12);">
                        <svg class="h-5 w-5" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                        </svg>
                    </div>
                </div>
                <h3 class="mt-6 text-center text-xl font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.project_yezz_title') }}</h3>
                <p class="mt-3 text-center text-base leading-relaxed text-[var(--color-text-secondary)]">
                    {{ __('frontend-jbc::ui.vita.project_yezz_desc') }}
                </p>
                <p class="mt-2 text-center text-xs uppercase tracking-wider" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.vita.project_wip') }}</p>
            </div>
        </div>
    </section>

@endsection
