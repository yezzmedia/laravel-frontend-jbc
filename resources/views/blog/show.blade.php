@extends('frontend-jbc::components.layout')

@section('title', $post->title)
@section('meta_description', $post->excerpt)

@section('content')

    <article class="mx-auto max-w-3xl">
        @if ($post->featured_image)
            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="mb-8 w-full border-2 object-cover" style="border-color: var(--color-brand);">
        @endif

        <h1 class="mb-4 text-4xl underline decoration-2 underline-offset-4" style="color: var(--color-brand); text-decoration-color: var(--color-brand);">
            {{ $post->title }}
        </h1>

        <div class="mb-8 flex items-center gap-4 text-sm text-[var(--color-text-secondary)]">
            @if ($post->author_name)
                <span>{{ __('frontend-jbc::ui.blog.created_by') }} <strong style="color: var(--color-brand);">{{ $post->author_name }}</strong></span>
            @endif
            @if ($post->published_at)
                <span>| {{ $post->published_at->translatedFormat('d F Y') }}</span>
            @endif
        </div>

        <div class="prose prose-invert max-w-none leading-relaxed">
            {!! $post->content !!}
        </div>

        <div class="mt-12 border-t pt-8" style="border-color: var(--color-border-muted);">
            <a href="{{ route('frontend.blog') }}" class="text-sm transition hover:text-[var(--color-brand)]" style="color: var(--color-brand);">
                &larr; {{ __('frontend-jbc::ui.blog.back_to_blog') }}
            </a>
        </div>
    </article>

@endsection
