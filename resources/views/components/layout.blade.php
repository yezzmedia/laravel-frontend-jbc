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
            --color-brand: #FF7F50;
            --color-brand-foreground: #FFF;
            --color-border-muted: #565454;
        }
    </style>
</head>
<body class="min-h-screen text-lg antialiased md:text-2xl" style="background-color: var(--color-surface); color: var(--color-brand-foreground); font-family: 'Yanone Kaffeesatz', sans-serif;">

    <x-frontend-jbc::navigation />

    <main class="mx-auto max-w-7xl px-4 py-8 lg:py-12">
        @yield('content')
    </main>

    <x-frontend-jbc::footer />

</body>
</html>
