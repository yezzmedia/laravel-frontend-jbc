@props(['image', 'title', 'text', 'reverse' => false])

<div @class(['flex flex-col items-center gap-10 md:flex-row', 'md:flex-row-reverse' => $reverse])>
    <div class="shrink-0">
        <div class="h-48 w-48 overflow-hidden rounded-full border-2" style="border-color: var(--color-brand);">
            <img src="{{ $image }}" alt="{{ $title }}" class="h-full w-full object-cover">
        </div>
    </div>
    <div>
        <h3 class="mb-3 text-3xl" style="color: var(--color-brand);">{{ $title }}</h3>
        <p class="max-w-xl leading-relaxed text-[var(--color-text-primary)]">{{ $text }}</p>
    </div>
</div>
