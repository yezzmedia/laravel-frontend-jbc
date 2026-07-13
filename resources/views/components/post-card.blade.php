@props(['post'])

<a href="{{ route('frontend.blog.show', $post) }}" class="group block overflow-hidden border transition-all hover:-translate-y-1" style="border-color: var(--color-border-muted);">
    @if ($post->featured_image)
        <div class="h-48 w-full bg-cover bg-center grayscale transition-all duration-700 group-hover:grayscale-0" style="background-image: url('{{ $post->featured_image }}');"></div>
    @endif
    <div class="p-5">
        <h3 class="mb-2 text-xl transition group-hover:text-[var(--color-brand)]" style="color: var(--color-brand-foreground);">
            {{ $post->title }}
        </h3>
        @if ($post->excerpt)
            <p class="mb-3 line-clamp-3 text-sm leading-relaxed text-gray-400">{{ $post->excerpt }}</p>
        @endif
        <div class="flex items-center justify-between text-xs text-gray-500">
            @if ($post->author_name)
                <span>{{ $post->author_name }}</span>
            @endif
            @if ($post->published_at)
                <span>{{ $post->published_at->translatedFormat('d M Y') }}</span>
            @endif
        </div>
    </div>
</a>
