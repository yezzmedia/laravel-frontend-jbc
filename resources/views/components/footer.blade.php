<footer class="mx-auto max-w-7xl px-4 pb-8">
    <div class="my-8 border-t-2" style="border-color: var(--color-brand);"></div>
    <div class="flex flex-col items-center justify-between gap-4 text-lg text-[var(--color-text-secondary)] sm:flex-row">
        <p>&copy; {{ date('Y') }} {{ config('frontend-jbc.site_name', 'Julisbookcorner') }}</p>
        <nav class="flex gap-6">
            <a href="{{ route('frontend.blog') }}" class="transition hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.blog') }}</a>
            <a href="{{ route('frontend.consent') }}" class="transition hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.navigation.consent') }}</a>
            <a href="{{ url('/privacy') }}" class="transition hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.footer.privacy') }}</a>
            <a href="{{ url('/imprint') }}" class="transition hover:text-[var(--color-brand)]">{{ __('frontend-jbc::ui.footer.contact') }}</a>
        </nav>
    </div>
</footer>
