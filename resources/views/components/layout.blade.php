<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @hasSection('meta_keywords')
        <meta name="keywords" content="@yield('meta_keywords')">
    @endif

    @hasSection('meta_description')
        <meta name="description" content="@yield('meta_description')">
    @endif

    @hasSection('meta_author')
        <meta name="author" content="@yield('meta_author')">
    @endif

    <title>@yield('title', config('frontend-jbc.site_name')) — {{ config('frontend-jbc.site_name') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=yanone-kaffeesatz:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])

    <style>
        :root {
            --color-surface: #212529;
            --color-surface-alt: #1a1d21;
            --color-brand: #FF7F50;
            --color-brand-foreground: #fff;
            --color-border-muted: #565454;
            --color-text-primary: #d1d5db;
            --color-text-secondary: #9ca3af;
            --color-text-muted: #6b7280;
            --color-text-nav: #e5e7eb;
        }

        :root.light {
            --color-surface: #dbcfbc;
            --color-surface-alt: #d3c7b4;
            --color-brand: #b85d1a;
            --color-brand-foreground: #1a1a2e;
            --color-border-muted: #b8ad9e;
            --color-text-primary: #374151;
            --color-text-secondary: #6b7280;
            --color-text-muted: #9ca3af;
            --color-text-nav: #374151;
        }
    </style>

    <script>
        (function () {
            var stored = localStorage.getItem('theme');
            if (stored === 'light') {
                document.documentElement.classList.add('light');
            } else if (stored === 'dark') {
                document.documentElement.classList.remove('light');
            }
        })();
    </script>
</head>
<body class="min-h-screen text-lg antialiased md:text-2xl" style="background-color: var(--color-surface); color: var(--color-brand-foreground); font-family: 'Yanone Kaffeesatz', sans-serif;">

    <x-frontend-jbc::navigation />

    <main class="mx-auto max-w-7xl px-4 py-8 lg:py-12">
        @yield('content')
    </main>

    <x-frontend-jbc::footer />

</body>
</html>
