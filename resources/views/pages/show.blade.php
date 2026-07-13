@extends('frontend-jbc::components.layout')

@section('title', $page->seo_title ?: $page->title)
@section('meta_description', $page->meta_description)

@section('content')

    <article class="mx-auto max-w-3xl">
        <h1 class="mb-8 text-4xl underline decoration-2 underline-offset-4" style="color: var(--color-brand); text-decoration-color: var(--color-brand);">
            {{ $page->title }}
        </h1>

        <div class="prose prose-invert max-w-none leading-relaxed">
            {!! $page->content !!}
        </div>
    </article>

@endsection
