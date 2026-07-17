@extends('frontend-jbc::components.layout')

@section('title', __('frontend-jbc::ui.consent.title'))
@section('meta_description', __('frontend-jbc::ui.consent.description'))

@php
    $requiredCats = [];
    $optionalCats = [];
    foreach ($categories as $cat) {
        if ($cat['is_required']) $requiredCats[] = $cat; else $optionalCats[] = $cat;
    }
@endphp

@section('content')

    {{-- Hero --}}
    <section class="py-12 md:py-20">
        <div class="mx-auto max-w-3xl text-center">
            <span class="inline-block border px-3 py-1 text-xs uppercase tracking-[0.3em]" style="border-color: var(--color-brand); color: var(--color-brand);">
                {{ __('frontend-jbc::ui.consent.badge') }}
            </span>
            <h1 class="mt-6 text-4xl font-semibold md:text-5xl" style="color: var(--color-brand);">
                {{ __('frontend-jbc::ui.consent.title') }}
            </h1>
            <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-[var(--color-text-secondary)]">
                {{ __('frontend-jbc::ui.consent.intro') }}
            </p>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    <div id="consent-app">
        <div id="consent-flash" class="mx-auto mb-4 max-w-3xl" style="display:none"></div>

        {{-- Required Categories --}}
        @if ($requiredCats)
            <section class="py-16 md:py-24">
                <div class="mx-auto max-w-3xl">
                    <h2 class="mb-6 flex items-center gap-3 text-xl font-semibold md:text-2xl" style="color: var(--color-brand);">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                        {{ __('frontend-jbc::ui.consent.required_heading') }}
                    </h2>
                    <p class="mb-6 text-lg text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.consent.required_desc') }}</p>
                    <div class="space-y-4">
                        @foreach ($requiredCats as $cat)
                            <div class="flex items-start gap-4 border-l-2 p-5" style="border-color: var(--color-brand); background-color: rgba(255,127,80,0.03);">
                                <svg class="mt-0.5 h-5 w-5 shrink-0" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-lg font-medium" style="color: var(--color-brand-foreground);">{{ $cat['label'] }}</span>
                                        <span class="border px-2 py-0.5 text-xs font-medium" style="border-color: var(--color-brand); color: var(--color-brand);">{{ __('frontend-jbc::ui.consent.always_active') }}</span>
                                    </div>
                                    <p class="mt-1 text-base leading-relaxed text-[var(--color-text-secondary)]">{{ $cat['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- Optional Categories --}}
        @if ($optionalCats)
            <section class="py-16 md:py-24">
                <div class="mx-auto max-w-3xl">
                    <h2 class="mb-6 flex items-center gap-3 text-xl font-semibold md:text-2xl" style="color: var(--color-brand);">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" /></svg>
                        {{ __('frontend-jbc::ui.consent.optional_heading') }}
                    </h2>
                    <p class="mb-6 text-lg text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.consent.optional_desc') }}</p>
                    <div class="space-y-3" id="consent-categories">
                        @foreach ($optionalCats as $cat)
                            <div class="flex items-start gap-4 border p-5 transition cursor-pointer consent-toggle" data-slug="{{ $cat['slug'] }}" style="border-color: var(--color-border-muted);">
                                <div class="mt-0.5 flex h-6 w-10 shrink-0 items-center rounded-full p-0.5 transition consent-switch consent-switch-{{ $cat['slug'] }}" style="{{ ($cat['granted'] ?? true) ? 'background-color: rgba(255,127,80,0.5);' : 'background-color: var(--color-text-muted);' }}">
                                    <div class="h-5 w-5 rounded-full bg-white shadow transition transform consent-knob consent-knob-{{ $cat['slug'] }}" style="{{ ($cat['granted'] ?? true) ? 'transform: translateX(1rem);' : '' }}"></div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-lg font-medium" style="color: var(--color-brand-foreground);">{{ $cat['label'] }}</p>
                                    <p class="mt-1 text-base leading-relaxed text-[var(--color-text-secondary)]">{{ $cat['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- Actions --}}
        <section class="pb-16 md:pb-24">
            <div class="mx-auto flex max-w-3xl flex-wrap gap-3">
                <button id="consent-btn-accept" class="inline-flex items-center gap-2 px-6 py-3 text-base font-medium transition" style="background-color: var(--color-brand); color: white;">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                    {{ __('frontend-jbc::ui.consent.accept_all') }}
                </button>
                <button id="consent-btn-reject" class="inline-flex items-center gap-2 border px-6 py-3 text-base font-medium transition hover:bg-[rgba(255,255,255,0.04)]" style="border-color: var(--color-border-muted); color: var(--color-text-secondary);">
                    {{ __('frontend-jbc::ui.consent.reject_all') }}
                </button>
                <button id="consent-btn-save" class="inline-flex items-center gap-2 border px-6 py-3 text-base font-medium transition hover:border-[var(--color-brand)] hover:text-[var(--color-brand)]" style="border-color: var(--color-border-muted); color: var(--color-text-primary);">
                    {{ __('frontend-jbc::ui.consent.save') }}
                </button>
                <span class="flex-1"></span>
                <button id="consent-btn-reset" class="inline-flex items-center gap-2 border px-6 py-3 text-base font-medium transition hover:bg-[rgba(255,127,80,0.05)]" style="border-color: rgba(255,127,80,0.3); color: var(--color-brand);">
                    {{ __('frontend-jbc::ui.consent.reset_all') }}
                </button>
            </div>
        </section>

        <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

        <section class="py-8 md:py-12">
            <div class="mx-auto flex max-w-3xl flex-col items-center justify-between gap-4 sm:flex-row">
                <p class="text-lg text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.consent.privacy_hint') }}</p>
                <a href="{{ route('frontend.privacy') }}" class="inline-flex items-center gap-2 border px-5 py-3 text-sm font-medium transition hover:border-[var(--color-brand)] hover:text-[var(--color-brand)]" style="border-color: var(--color-border-muted); color: var(--color-brand-foreground);">
                    {{ __('frontend-jbc::ui.legal.to_privacy') }}
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" /></svg>
                </a>
            </div>
        </section>
    </div>

    <script>
    (function () {
        var decisions = {};
        {!! $categoriesJson !!}.forEach(function (cat) {
            decisions[cat['slug']] = cat['granted'] != null ? cat['granted'] : !cat['is_required'];
        });

        var flashEl = document.getElementById('consent-flash');
        var flashT = null;

        function flash(msg) {
            if (flashT) clearTimeout(flashT);
            flashEl.innerHTML = '<div class="border-l-2 p-4 text-sm" style="border-color: var(--color-brand); background-color: rgba(255,127,80,0.08); color: var(--color-brand);">' + msg + '</div>';
            flashEl.style.display = 'block';
            flashT = setTimeout(function () { flashEl.style.display = 'none'; }, 4000);
        }

        function setLoading(v) {
            ['consent-btn-accept','consent-btn-reject','consent-btn-save','consent-btn-reset'].forEach(function (id) {
                var b = document.getElementById(id); if (b) b.disabled = v;
            });
        }

        function updateSwitch(slug) {
            var sw = document.querySelector('.consent-switch-' + slug);
            var kn = document.querySelector('.consent-knob-' + slug);
            if (!sw || !kn) return;
            if (decisions[slug]) {
                sw.style.backgroundColor = 'rgba(255,127,80,0.5)';
                kn.style.transform = 'translateX(1rem)';
            } else {
                sw.style.backgroundColor = 'var(--color-text-muted)';
                kn.style.transform = '';
            }
        }

        function toggleCategory(slug) {
            decisions[slug] = !decisions[slug];
            updateSwitch(slug);
        }

        function getAllDecisions() {
            var d = {};
            Object.keys(decisions).forEach(function (k) {
                d[k] = decisions[k];
            });
            return d;
        }

        function xhr(method, url, body, cb) {
            setLoading(true);
            var r = new XMLHttpRequest();
            r.open(method, url, true);
            if (body) r.setRequestHeader('Content-Type', 'application/json');
            r.onload = function () {
                setLoading(false);
                if (r.status >= 200 && r.status < 300) {
                    cb(r);
                }
            };
            r.onerror = function () { setLoading(false); };
            r.send(body ? JSON.stringify(body) : null);
        }

        function acceptAll() {
            xhr('POST', '/__consent/grant-all', null, function () {
                Object.keys(decisions).forEach(function (k) { decisions[k] = true; updateSwitch(k); });
                flash('{{ __('user-consent::messages.preferences_saved') }}');
            });
        }

        function rejectAll() {
            xhr('POST', '/__consent/revoke-all', null, function () {
                Object.keys(decisions).forEach(function (k) { decisions[k] = false; updateSwitch(k); });
                flash('{{ __('user-consent::messages.preferences_saved') }}');
            });
        }

        function saveSettings() {
            xhr('POST', '/__consent/save', { decisions: getAllDecisions() }, function () {
                flash('{{ __('user-consent::messages.preferences_saved') }}');
            });
        }

        function resetAll() {
            if (!confirm('{{ __('user-consent::messages.reset_confirm') }}')) return;
            xhr('POST', '/__consent/reset', null, function () {
                location.reload();
            });
        }

        document.querySelectorAll('.consent-toggle').forEach(function (el) {
            el.addEventListener('click', function () {
                var slug = el.getAttribute('data-slug');
                if (slug) toggleCategory(slug);
            });
        });

        document.getElementById('consent-btn-accept').addEventListener('click', acceptAll);
        document.getElementById('consent-btn-reject').addEventListener('click', rejectAll);
        document.getElementById('consent-btn-save').addEventListener('click', saveSettings);
        document.getElementById('consent-btn-reset').addEventListener('click', resetAll);
    })();
    </script>

@endsection
