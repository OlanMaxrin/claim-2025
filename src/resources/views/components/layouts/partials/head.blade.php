@php
    use Illuminate\Support\Facades\Storage;

    $ogImagePath = $seo->og_image ?? null;

    // Gunakan disk 'public' (default-nya Laravel pakai 'public' untuk storage:link)
    $backgroundImageUrl = (filled($ogImagePath) && Storage::disk('public')->exists($ogImagePath))
        ? Storage::url($ogImagePath)
        : asset('images/hero.png');

            // Logika untuk Footer Image
    $footerImagePath = $seo->footer_image ?? null; // Pastikan Anda punya kolom 'footer_image'
    $footerImageUrl = (filled($footerImagePath) && Storage::disk('public')->exists($footerImagePath))
        ? Storage::url($footerImagePath)
        : asset('images/footer.png'); // Siapkan gambar fallback ini

@endphp

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Livewire Landing Page') }}</title>
    {{-- <meta name="description" content="{{ $seo->description }}">
    <meta name="keywords" content="{{ $seo->keywords }}">
    <meta name="author" content="djambred">
    <meta name="robots" content="{{ $seo->robots }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Canonical -->
    <link rel="canonical" href="{{ $seo->canonical_url }}">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $title ?? $seo->title }}">
    <meta property="og:description" content="{{ $seo->description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('storage/' . $seo->og_image) }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ config('app.name', 'Livewire Landing Page') }}">
    <meta name="twitter:description" content="{{ $description ?? 'Livewire Landing Page' }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $seo->og_image) }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('storage/' . $seo->og_image) }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('storage/' . $seo->og_image) }}" type="image/x-icon"> --}}


    <!-- Tailwind & DaisyUI -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.1/dist/full.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
        }

       .hero {
            /* background-image: url('{{ Storage::url($seo->og_image ?? 'images/hero.jpg') }}'); */
            background-image: url('{{ $backgroundImageUrl }}');
            background-size: cover;
            background-position: center;
        }

        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.6);
        }

        .footer-background {
        background-image: url('{{ $footerImageUrl }}');
        background-size: cover; /* Sesuaikan sesuai kebutuhan: 'contain', 'auto', dll. */
        background-position: center;
    }
    </style>
    <!-- Livewire Styles -->
    @livewireStyles
</head>