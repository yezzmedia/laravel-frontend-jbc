<header
    x-data="{ mobile: false, mega: false }"
    x-on:keydown.escape.window="mobile = false; mega = false"
    class="sticky top-0 z-50 bg-[var(--color-surface)]"
>
    <div class="mx-auto max-w-7xl border-b-2 px-4" style="border-color: var(--color-brand);">
        <div class="flex h-20 items-end justify-between pb-2 lg:h-24">

            {{-- Logo --}}
            <a href="{{ route('frontend.home') }}" class="flex shrink-0 items-end">
                <img src="{{ asset('vendor/frontend-jbc/images/logo.svg') }}" alt="{{ config('frontend-jbc.site_name') }}" class="block h-8 -translate-y-3 lg:h-10 lg:-translate-y-4">
            </a>

            {{-- Desktop Links --}}
            <nav class="hidden items-center gap-2 lg:flex">
                <a href="/#favorites" class="rounded-md px-4 py-2.5 text-[15px] font-medium tracking-wide text-[var(--color-text-nav)] transition-all hover:bg-white/[0.04] hover:text-[var(--color-brand)]">
                    {{ __('frontend-jbc::ui.navigation.favorites') }}
                </a>
                <a href="/#team" class="rounded-md px-4 py-2.5 text-[15px] font-medium tracking-wide text-[var(--color-text-nav)] transition-all hover:bg-white/[0.04] hover:text-[var(--color-brand)]">
                    {{ __('frontend-jbc::ui.navigation.aboutme') }}
                </a>

                {{-- Mega Menu --}}
                <div class="relative" x-on:click.away="mega = false">
                    <button
                        x-on:click="mega = !mega"
                        :class="mega ? 'bg-white/[0.06] text-[var(--color-brand)]' : ''"
                        class="flex items-center gap-1.5 rounded-md px-4 py-2.5 text-[15px] font-medium tracking-wide text-[var(--color-text-nav)] transition-all hover:bg-white/[0.04] hover:text-[var(--color-brand)]"
                    >
                        {{ __('frontend-jbc::ui.navigation.more') }}
                        <svg class="h-3.5 w-3.5 transition-transform" :class="mega && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    {{-- Mega Panel --}}
                    <div
                        x-show="mega"
                        x-cloak
                        x-transition:enter="transition duration-200 ease-out"
                        x-transition:enter-start="-translate-y-3 opacity-0 scale-95"
                        x-transition:enter-end="translate-y-0 opacity-100 scale-100"
                        x-transition:leave="transition duration-150 ease-in"
                        x-transition:leave-start="translate-y-0 opacity-100 scale-100"
                        x-transition:leave-end="-translate-y-3 opacity-0 scale-95"
                        class="absolute right-0 top-full z-50 mt-3 w-[580px] overflow-hidden border shadow-2xl"
                        style="border-color: var(--color-brand); background-color: var(--color-surface-alt);"
                    >
                        <div class="h-1 w-full" style="background: linear-gradient(to right, var(--color-brand), transparent 70%);"></div>

                        <div class="grid grid-cols-2 divide-x p-6" style="border-color: var(--color-border-muted);">
                            <div class="pr-6">
                                <p class="mb-4 text-xs font-semibold uppercase tracking-[0.3em]" style="color: var(--color-brand);">
                                    {{ __('frontend-jbc::ui.navigation.mega_books') }}
                                </p>
                                <div class="space-y-0.5">
                                    @if (in_array('frontend', $activeAddonKeys ?? []))
                                        <a href="{{ route('frontend.blog') }}" class="group flex items-center gap-3 rounded-lg px-3 py-3 text-sm transition-all hover:bg-white/[0.04]">
                                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-md text-xs font-bold" style="background-color: rgba(255,127,80,0.12); color: var(--color-brand);">B</span>
                                            <span class="font-medium text-[var(--color-text-nav)] transition group-hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.blog') }}</span>
                                            <span class="ml-auto text-xs text-gray-600 opacity-0 transition group-hover:opacity-100">&rarr;</span>
                                        </a>
                                    @endif
                                    @if (in_array('booklist', $activeAddonKeys ?? []))
                                        <a href="{{ route('frontend.books') }}" class="group flex items-center gap-3 rounded-lg px-3 py-3 text-sm transition-all hover:bg-white/[0.04]">
                                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-md text-xs font-bold" style="background-color: rgba(255,127,80,0.12); color: var(--color-brand);">BL</span>
                                            <span class="font-medium text-[var(--color-text-nav)] transition group-hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.booklist') }}</span>
                                            <span class="ml-auto text-xs text-gray-600 opacity-0 transition group-hover:opacity-100">&rarr;</span>
                                        </a>
                                    @endif
                                    <a href="{{ url('/proofreading') }}" class="group flex items-center gap-3 rounded-lg px-3 py-3 text-sm transition-all hover:bg-white/[0.04]">
                                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-md text-xs font-bold" style="background-color: rgba(255,127,80,0.12); color: var(--color-brand);">K</span>
                                        <span class="font-medium text-[var(--color-text-nav)] transition group-hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.proofreading') }}</span>
                                        <span class="ml-auto text-xs text-gray-600 opacity-0 transition group-hover:opacity-100">&rarr;</span>
                                    </a>
                                    <a href="{{ route('frontend.wishlist') }}" class="group flex items-center gap-3 rounded-lg px-3 py-3 text-sm transition-all hover:bg-white/[0.04]">
                                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-md text-xs font-bold" style="background-color: rgba(255,127,80,0.12); color: var(--color-brand);">W</span>
                                        <span class="font-medium text-[var(--color-text-nav)] transition group-hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.wishlist') }}</span>
                                        <span class="ml-auto text-xs text-gray-600 opacity-0 transition group-hover:opacity-100">&rarr;</span>
                                    </a>
                                </div>
                            </div>
                            <div class="pl-6" style="border-color: var(--color-border-muted);">
                                <p class="mb-4 text-xs font-semibold uppercase tracking-[0.3em]" style="color: var(--color-brand);">
                                    {{ __('frontend-jbc::ui.navigation.mega_social') }}
                                </p>
                                <div class="space-y-0.5">
                                    <a href="{{ url('/vita') }}" class="group flex items-center gap-3 rounded-lg px-3 py-3 text-sm transition-all hover:bg-white/[0.04]">
                                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-md text-xs font-bold" style="background-color: rgba(255,127,80,0.12); color: var(--color-brand);">V</span>
                                        <span class="font-medium text-[var(--color-text-nav)] transition group-hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.vita') }} / {{ __('frontend-jbc::ui.navigation.mediakit') }}</span>
                                        <span class="ml-auto text-xs text-gray-600 opacity-0 transition group-hover:opacity-100">&rarr;</span>
                                    </a>
                                    <a href="{{ url('/rating') }}" class="group flex items-center gap-3 rounded-lg px-3 py-3 text-sm transition-all hover:bg-white/[0.04]">
                                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-md text-xs font-bold" style="background-color: rgba(255,127,80,0.12); color: var(--color-brand);">B</span>
                                        <span class="font-medium text-[var(--color-text-nav)] transition group-hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.rating') }}</span>
                                        <span class="ml-auto text-xs text-gray-600 opacity-0 transition group-hover:opacity-100">&rarr;</span>
                                    </a>
                                    <a href="{{ url('/privacy') }}" class="group flex items-center gap-3 rounded-lg px-3 py-3 text-sm transition-all hover:bg-white/[0.04]">
                                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-md text-xs font-bold" style="background-color: rgba(255,127,80,0.12); color: var(--color-brand);">D</span>
                                        <span class="font-medium text-[var(--color-text-nav)] transition group-hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.privacy') }}</span>
                                        <span class="ml-auto text-xs text-gray-600 opacity-0 transition group-hover:opacity-100">&rarr;</span>
                                    </a>
                                    <a href="{{ route('frontend.consent') }}" class="group flex items-center gap-3 rounded-lg px-3 py-3 text-sm transition-all hover:bg-white/[0.04]">
                                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-md text-xs font-bold" style="background-color: rgba(255,127,80,0.12); color: var(--color-brand);">C</span>
                                        <span class="font-medium text-[var(--color-text-nav)] transition group-hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.consent') }}</span>
                                        <span class="ml-auto text-xs text-gray-600 opacity-0 transition group-hover:opacity-100">&rarr;</span>
                                    </a>
                                    <a href="{{ url('/imprint') }}" class="group flex items-center gap-3 rounded-lg px-3 py-3 text-sm transition-all hover:bg-white/[0.04]">
                                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-md text-xs font-bold" style="background-color: rgba(255,127,80,0.12); color: var(--color-brand);">I</span>
                                        <span class="font-medium text-[var(--color-text-nav)] transition group-hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.imprint') }}</span>
                                        <span class="ml-auto text-xs text-gray-600 opacity-0 transition group-hover:opacity-100">&rarr;</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Language Switcher --}}
                <div class="ml-5 flex items-center gap-1 border-l pl-5" style="border-color: var(--color-border-muted);">
                    <a href="{{ route('frontend.lang.switch', 'de') }}" class="rounded-lg px-2 py-1.5 text-xs font-medium transition {{ app()->getLocale() === 'de' ? '' : 'text-[var(--color-text-muted)]' }}" style="{{ app()->getLocale() === 'de' ? 'color: var(--color-brand);' : '' }}">DE</a>
                    <span class="text-xs text-[var(--color-text-muted)]">|</span>
                    <a href="{{ route('frontend.lang.switch', 'en') }}" class="rounded-lg px-2 py-1.5 text-xs font-medium transition {{ app()->getLocale() === 'en' ? '' : 'text-[var(--color-text-muted)]' }}" style="{{ app()->getLocale() === 'en' ? 'color: var(--color-brand);' : '' }}">EN</a>
                </div>

                {{-- Theme Toggle --}}
                <div class="ml-5 flex items-center gap-1 border-l pl-5" style="border-color: var(--color-border-muted);">
                    <button onclick="var r=document.documentElement;r.classList.toggle('light');localStorage.setItem('theme',r.classList.contains('light')?'light':'dark')" class="rounded-lg p-2.5 text-[var(--color-text-secondary)] transition hover:bg-white/[0.04] hover:text-[var(--color-brand)]" aria-label="Toggle theme">
                        <svg class="h-4 w-4 block dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" /></svg>
                    </button>
                </div>

                {{-- Social Icons --}}
                <div class="ml-5 flex items-center gap-1 border-l pl-5" style="border-color: var(--color-border-muted);">
                    <a href="{{ config('frontend-jbc.social.facebook') }}" target="_blank" rel="noopener" class="rounded-lg p-2.5 text-[var(--color-text-secondary)] transition hover:bg-white/[0.04] hover:text-[var(--color-brand)]" aria-label="Facebook">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 320 512"><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5 16.3 0 29.4.4 37 1.2V7.9C291.4 4 256.4 0 236.2 0 129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg>
                    </a>
                    <a href="{{ config('frontend-jbc.social.twitter') }}" target="_blank" rel="noopener" class="rounded-lg p-2.5 text-[var(--color-text-secondary)] transition hover:bg-white/[0.04] hover:text-[var(--color-brand)]" aria-label="Twitter">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                    </a>
                    <a href="{{ config('frontend-jbc.social.instagram') }}" target="_blank" rel="noopener" class="rounded-lg p-2.5 text-[var(--color-text-secondary)] transition hover:bg-white/[0.04] hover:text-[var(--color-brand)]" aria-label="Instagram">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                    </a>
                </div>
            </nav>

            {{-- Mobile Burger --}}
            <button
                x-on:click="mobile = !mobile"
                :class="mobile ? 'bg-white/[0.06] text-[var(--color-brand)]' : 'text-[var(--color-text-secondary)]'"
                class="rounded-lg p-2.5 transition hover:text-[var(--color-brand)] lg:hidden"
                aria-label="{{ __('frontend-jbc::ui.navigation.menu') }}"
            >
                <svg x-show="!mobile" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="mobile" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div
            x-show="mobile"
            x-cloak
            x-transition:enter="transition duration-200 ease-out"
            x-transition:enter-start="-translate-y-2 opacity-0"
            x-transition:enter-end="translate-y-0 opacity-100"
            class="border-t pb-6 pt-3 lg:hidden"
            style="border-color: var(--color-border-muted);"
        >
            <nav class="flex flex-col gap-0.5">
                <a href="/#favorites" x-on:click="mobile = false" class="rounded-lg px-4 py-3.5 text-base font-medium text-[var(--color-text-nav)] transition hover:bg-white/[0.04] hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.favorites') }}</a>
                <a href="/#team" x-on:click="mobile = false" class="rounded-lg px-4 py-3.5 text-base font-medium text-[var(--color-text-nav)] transition hover:bg-white/[0.04] hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.aboutme') }}</a>
                <hr class="my-2" style="border-color: var(--color-border-muted);">
                @if (in_array('frontend', $activeAddonKeys ?? []))
                    <a href="{{ route('frontend.blog') }}" x-on:click="mobile = false" class="rounded-lg px-4 py-3.5 text-base font-medium text-[var(--color-text-nav)] transition hover:bg-white/[0.04] hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.blog') }}</a>
                @endif
                @if (in_array('booklist', $activeAddonKeys ?? []))
                    <a href="{{ route('frontend.books') }}" x-on:click="mobile = false" class="rounded-lg px-4 py-3.5 text-base font-medium text-[var(--color-text-nav)] transition hover:bg-white/[0.04] hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.booklist') }}</a>
                @endif
                <a href="{{ url('/proofreading') }}" x-on:click="mobile = false" class="rounded-lg px-4 py-3.5 text-base font-medium text-[var(--color-text-nav)] transition hover:bg-white/[0.04] hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.proofreading') }}</a>
                <a href="{{ url('/vita') }}" x-on:click="mobile = false" class="rounded-lg px-4 py-3.5 text-base font-medium text-[var(--color-text-nav)] transition hover:bg-white/[0.04] hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.vita') }}</a>
                <a href="{{ url('/rating') }}" x-on:click="mobile = false" class="rounded-lg px-4 py-3.5 text-base font-medium text-[var(--color-text-nav)] transition hover:bg-white/[0.04] hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.rating') }}</a>
                <hr class="my-2" style="border-color: var(--color-border-muted);">
                <div class="flex gap-4 px-4 py-2">
                    <a href="{{ config('frontend-jbc.social.facebook') }}" target="_blank" rel="noopener" class="rounded-lg p-2 text-[var(--color-text-secondary)] transition hover:bg-white/[0.04] hover:text-[var(--color-brand)]" aria-label="Facebook">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 320 512"><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5 16.3 0 29.4.4 37 1.2V7.9C291.4 4 256.4 0 236.2 0 129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg>
                    </a>
                    <a href="{{ config('frontend-jbc.social.twitter') }}" target="_blank" rel="noopener" class="rounded-lg p-2 text-[var(--color-text-secondary)] transition hover:bg-white/[0.04] hover:text-[var(--color-brand)]" aria-label="Twitter">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                    </a>
                    <a href="{{ config('frontend-jbc.social.instagram') }}" target="_blank" rel="noopener" class="rounded-lg p-2 text-[var(--color-text-secondary)] transition hover:bg-white/[0.04] hover:text-[var(--color-brand)]" aria-label="Instagram">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                    </a>
                </div>
            </nav>
        </div>
    </div>
</header>
