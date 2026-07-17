@extends('frontend-jbc::components.layout')

@section('title', __('frontend-jbc::ui.proofreading.title'))
@section('meta_description', __('frontend-jbc::ui.proofreading.description'))

@section('content')

    {{-- Hero --}}
    <section class="py-12 md:py-20">
        <div class="grid items-center gap-12 lg:grid-cols-5">
            <div class="lg:col-span-3">
                <span class="inline-block border px-3 py-1 text-xs uppercase tracking-[0.3em] text-[var(--color-text-primary)]" style="border-color: var(--color-brand);">
                    {{ __('frontend-jbc::ui.proofreading.badge') }}
                </span>
                <h1 class="mt-6 text-4xl font-semibold md:text-5xl" style="color: var(--color-brand);">
                    {{ __('frontend-jbc::ui.proofreading.title') }}
                </h1>
                <p class="mt-6 text-lg leading-relaxed text-[var(--color-text-primary)]">
                    {{ __('frontend-jbc::ui.proofreading.intro') }}
                </p>
                <p class="mt-4 text-lg leading-relaxed text-[var(--color-text-secondary)]">
                    {{ __('frontend-jbc::ui.proofreading.pricing_note') }}
                </p>
                <div class="mt-8 border-l-2 p-5" style="border-color: var(--color-brand); background-color: rgba(255,127,80,0.05);">
                    <p class="text-lg leading-relaxed text-[var(--color-text-primary)]">
                        <span style="color: var(--color-brand);">--</span> {{ __('frontend-jbc::ui.proofreading.pricing_detail') }}
                    </p>
                </div>
                <p class="mt-6 text-base text-[var(--color-text-muted)]">
                    {{ __('frontend-jbc::ui.proofreading.contact_hint') }}
                </p>
            </div>
            <div class="flex justify-center lg:col-span-2 lg:justify-end">
                <div class="flex h-64 w-64 items-center justify-center rounded-full border-4 p-8 text-center" style="border-color: var(--color-brand);">
                    <div>
                        <svg class="mx-auto h-10 w-10" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        <p class="mt-4 text-lg font-medium" style="color: var(--color-brand-foreground);">{{ __('frontend-jbc::ui.home.proofreading_tag_line1') }}</p>
                        <p class="text-lg font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.home.proofreading_tag_line2') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Comparison --}}
    <section class="py-16 md:py-24">
        <h2 class="mb-4 text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">
            {{ __('frontend-jbc::ui.proofreading.comparison_title') }}
        </h2>
        <p class="mb-10 text-lg text-[var(--color-text-secondary)]">
            {{ __('frontend-jbc::ui.proofreading.comparison_intro') }}
        </p>

        <div class="grid gap-6 md:grid-cols-2">
            <div class="border p-6" style="border-color: var(--color-brand);">
                <h3 class="mb-5 text-xl font-semibold" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.proofreading.korrektorat_label') }}</h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-[var(--color-text-muted)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                        <span class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.korrektorat_spelling') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-[var(--color-text-muted)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                        <span class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.korrektorat_punctuation') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-[var(--color-text-muted)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                        <span class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.korrektorat_grammar') }}</span>
                    </li>
                </ul>
            </div>
            <div class="border p-6" style="border-color: var(--color-border-muted);">
                <h3 class="mb-5 text-xl font-semibold text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.lektorat_label') }}</h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-[var(--color-text-muted)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                        <span class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.lektorat_tone') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-[var(--color-text-muted)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                        <span class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.lektorat_flow') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-[var(--color-text-muted)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                        <span class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.lektorat_repetition') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-[var(--color-text-muted)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                        <span class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.lektorat_sentence') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-[var(--color-text-muted)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                        <span class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.lektorat_clarity') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Lektorat Detail --}}
    <section class="py-16 md:py-24">
        <h2 class="mb-6 text-2xl font-semibold md:text-3xl text-[var(--color-text-primary)]">
            {{ __('frontend-jbc::ui.proofreading.lektorat_title') }}
        </h2>
        <p class="mb-8 text-lg leading-relaxed text-[var(--color-text-secondary)]">
            {{ __('frontend-jbc::ui.proofreading.lektorat_description') }}
        </p>

        <ul class="space-y-4">
            <li class="flex items-start gap-4">
                <svg class="mt-1 h-5 w-5 shrink-0" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
                <span class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.lektorat_item_tone') }}</span>
            </li>
            <li class="flex items-start gap-4">
                <svg class="mt-1 h-5 w-5 shrink-0" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
                <span class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.lektorat_item_clarity') }}</span>
            </li>
            <li class="flex items-start gap-4">
                <svg class="mt-1 h-5 w-5 shrink-0" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
                <span class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.lektorat_item_repetition') }}</span>
            </li>
            <li class="flex items-start gap-4">
                <svg class="mt-1 h-5 w-5 shrink-0" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
                <span class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.lektorat_item_sentence') }}</span>
            </li>
            <li class="flex items-start gap-4">
                <svg class="mt-1 h-5 w-5 shrink-0" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
                <span class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.lektorat_item_flow') }}</span>
            </li>
            <li class="flex items-start gap-4">
                <svg class="mt-1 h-5 w-5 shrink-0" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
                <span class="text-lg leading-relaxed text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.lektorat_item_pc') }}</span>
            </li>
        </ul>
    </section>

    {{-- Image --}}
    <div class="overflow-hidden border" style="border-color: var(--color-brand);">
        <img src="{{ asset('vendor/frontend-jbc/images/proofreading_header.jpg') }}" alt="{{ __('frontend-jbc::ui.proofreading.image_alt') }}" class="w-full object-cover">
    </div>

    {{-- Korrektorat Detail --}}
    <section class="py-16 md:py-24">
        <div class="mb-8 border-l-2 p-5" style="border-color: var(--color-brand); background-color: rgba(255,127,80,0.05);">
            <p class="text-lg leading-relaxed text-[var(--color-text-primary)]">
                {{ __('frontend-jbc::ui.proofreading.korrektorat_focus_question') }}
            </p>
        </div>

        <h2 class="mb-6 text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">
            {{ __('frontend-jbc::ui.proofreading.korrektorat_title') }}
        </h2>
        <p class="mb-8 text-lg leading-relaxed text-[var(--color-text-secondary)]">
            {{ __('frontend-jbc::ui.proofreading.korrektorat_description') }}
        </p>

        <ul class="space-y-4">
            <li class="flex items-start gap-4">
                <svg class="mt-1 h-5 w-5 shrink-0 text-[var(--color-text-muted)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                <span class="text-lg leading-relaxed text-[var(--color-text-primary)]"><span style="color: var(--color-brand);">{{ __('frontend-jbc::ui.proofreading.korrektorat_item_spelling') }}</span> &mdash; {{ __('frontend-jbc::ui.proofreading.korrektorat_item_spelling_desc') }}</span>
            </li>
            <li class="flex items-start gap-4">
                <svg class="mt-1 h-5 w-5 shrink-0 text-[var(--color-text-muted)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                <span class="text-lg leading-relaxed text-[var(--color-text-primary)]"><span style="color: var(--color-brand);">{{ __('frontend-jbc::ui.proofreading.korrektorat_item_punctuation') }}</span> &mdash; {{ __('frontend-jbc::ui.proofreading.korrektorat_item_punctuation_desc') }}</span>
            </li>
            <li class="flex items-start gap-4">
                <svg class="mt-1 h-5 w-5 shrink-0 text-[var(--color-text-muted)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                <span class="text-lg leading-relaxed text-[var(--color-text-primary)]"><span style="color: var(--color-brand);">{{ __('frontend-jbc::ui.proofreading.korrektorat_item_grammar') }}</span> &mdash; {{ __('frontend-jbc::ui.proofreading.korrektorat_item_grammar_desc') }}</span>
            </li>
        </ul>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Contact Form --}}
    <section class="py-16 md:py-24">
        <div class="mx-auto max-w-2xl">
            <h2 class="mb-6 text-center text-2xl font-semibold md:text-3xl" style="color: var(--color-brand);">
                {{ __('frontend-jbc::ui.proofreading.form_title') }}
            </h2>
            <p class="mb-10 text-center text-lg leading-relaxed text-[var(--color-text-secondary)]">
                {{ __('frontend-jbc::ui.proofreading.form_intro') }}
            </p>

            @if (session('form_success'))
                <div class="border-l-2 p-6 text-center" style="border-color: var(--color-brand); background-color: rgba(255,127,80,0.05);">
                    <svg class="mx-auto h-8 w-8" style="color: var(--color-brand);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                    <p class="mt-4 text-lg font-medium" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.proofreading.form_success') }}</p>
                    <p class="mt-2 text-base text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.proofreading.form_success_detail') }}</p>
                </div>
            @elseif ($contactForm)
                <form method="POST" action="{{ route('frontend.proofreading.contact') }}" class="border p-6" style="border-color: var(--color-brand);">
                    @csrf
                    @if ($hpField)
                        <input type="text" name="{{ $hpField }}" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;" aria-hidden="true">
                    @endif

                    <div class="mb-5">
                        <label class="mb-1.5 block text-sm font-medium text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.form_name') }} *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required maxlength="200" class="w-full border bg-transparent px-4 py-2.5 text-lg text-[var(--color-text-primary)] transition focus:outline-none" style="border-color: var(--color-border-muted);" placeholder="{{ __('frontend-jbc::ui.proofreading.form_name_placeholder') }}">
                        @error('name') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-5">
                        <label class="mb-1.5 block text-sm font-medium text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.form_email') }} *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required maxlength="200" class="w-full border bg-transparent px-4 py-2.5 text-lg text-[var(--color-text-primary)] transition focus:outline-none" style="border-color: var(--color-border-muted);" placeholder="{{ __('frontend-jbc::ui.proofreading.form_email_placeholder') }}">
                        @error('email') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="mb-1.5 block text-sm font-medium text-[var(--color-text-primary)]">{{ __('frontend-jbc::ui.proofreading.form_message') }} *</label>
                        <textarea name="message" rows="5" required maxlength="5000" class="w-full border bg-transparent px-4 py-2.5 text-lg text-[var(--color-text-primary)] transition focus:outline-none" style="border-color: var(--color-border-muted);" placeholder="{{ __('frontend-jbc::ui.proofreading.form_message_placeholder') }}">{{ old('message') }}</textarea>
                        @error('message') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="w-full py-3 text-base font-medium transition" style="background-color: var(--color-brand); color: white;">
                        {{ __('frontend-jbc::ui.proofreading.form_submit') }}
                    </button>
                </form>
            @endif
        </div>
    </section>

@endsection
