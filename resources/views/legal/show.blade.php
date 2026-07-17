@extends('frontend-jbc::components.layout')

@section('title', $page?->seo_title ?: $page?->title ?: __('frontend-jbc::ui.legal.'.$slug.'_title'))
@section('meta_description', $page?->meta_description ?: '')

@section('content')

    <style>
        .legal-content h2 {
            color: var(--color-brand);
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 2.5rem;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--color-border-muted);
        }
        .legal-content h2:first-child {
            margin-top: 0;
        }
        .legal-content p {
            color: var(--color-text-primary);
            line-height: 1.75;
            margin-bottom: 1.25rem;
            font-size: 1.125rem;
        }
        .legal-content a {
            color: var(--color-brand);
            transition: opacity 0.2s;
        }
        .legal-content a:hover {
            opacity: 0.8;
        }
        .legal-content br {
            display: block;
            content: "";
            margin-bottom: 0.25rem;
        }
    </style>

    {{-- Hero --}}
    <section class="py-12 md:py-20">
        <div class="mx-auto max-w-3xl text-center">
            <span class="inline-block border px-3 py-1 text-xs uppercase tracking-[0.3em]" style="border-color: var(--color-brand); color: var(--color-brand);">
                {{ __('frontend-jbc::ui.legal.badge') }}
            </span>
            <h1 class="mt-6 text-4xl font-semibold md:text-5xl" style="color: var(--color-brand);">
                {{ $page?->title ?: __('frontend-jbc::ui.legal.'.$slug.'_title') }}
            </h1>
            <p class="mx-auto mt-4 max-w-xl text-lg leading-relaxed text-[var(--color-text-secondary)]">
                {{ __('frontend-jbc::ui.legal.'.$slug.'_intro') }}
            </p>
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Content --}}
    <section class="py-16 md:py-24">
        <div class="mx-auto max-w-3xl">
            @if ($page && $page->content)
                <div class="legal-content">
                    {!! $page->content !!}
                </div>
            @else
                <div class="py-16 text-center">
                    <svg class="mx-auto h-12 w-12 text-[var(--color-text-muted)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <p class="mt-6 text-lg text-[var(--color-text-muted)]">{{ __('frontend-jbc::ui.legal.not_found') }}</p>
                </div>
            @endif
        </div>
    </section>

    <div class="h-px w-full" style="background-color: var(--color-border-muted);"></div>

    {{-- Cross Links --}}
    <section class="py-8 md:py-12">
        <div class="mx-auto flex max-w-3xl flex-col items-center justify-between gap-4 sm:flex-row">
            @if ($slug === 'privacy')
                <p class="text-lg text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.legal.to_imprint_hint') }}</p>
                <a href="{{ route('frontend.imprint') }}" class="inline-flex items-center gap-2 border px-5 py-3 text-sm font-medium transition hover:border-[var(--color-brand)] hover:text-[var(--color-brand)]" style="border-color: var(--color-border-muted); color: var(--color-brand-foreground);">
                    {{ __('frontend-jbc::ui.legal.to_imprint') }}
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" /></svg>
                </a>
            @else
                <p class="text-lg text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.legal.to_privacy_hint') }}</p>
                <a href="{{ route('frontend.privacy') }}" class="inline-flex items-center gap-2 border px-5 py-3 text-sm font-medium transition hover:border-[var(--color-brand)] hover:text-[var(--color-brand)]" style="border-color: var(--color-border-muted); color: var(--color-brand-foreground);">
                    {{ __('frontend-jbc::ui.legal.to_privacy') }}
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" /></svg>
                </a>
            @endif
        </div>
    </section>

@endsection
