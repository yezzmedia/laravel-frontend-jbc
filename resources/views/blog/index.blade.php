@extends('frontend-jbc::components.layout')

@section('title', __('frontend-jbc::ui.blog.title'))
@section('meta_description', __('frontend-jbc::ui.blog.description'))

@section('content')

    <h1 class="mb-4 text-4xl" style="color: var(--color-brand);">{{ __('frontend-jbc::ui.blog.title') }}</h1>
    <p class="mb-10 text-[var(--color-text-secondary)]">{{ __('frontend-jbc::ui.blog.description') }}</p>

    @if ($posts->isNotEmpty())
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
                <x-frontend-jbc::post-card :post="$post" />
            @endforeach
        </div>
        <div class="mt-10">
            {{ $posts->links() }}
        </div>
    @else
        <p class="text-[var(--color-text-muted)] italic">{{ __('frontend-jbc::ui.blog.no_posts') }}</p>
    @endif

@endsection
