@php
    $styleVersion = @filemtime(public_path('css/style.css')) ?: '1';
    $swiperVersion = @filemtime(public_path('css/swiper-bundle.css')) ?: '1';
    $faVersion = @filemtime(public_path('css/font-awesome.min.css')) ?: '1';
    $fontUrl = 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap';
@endphp

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<style>{!! file_get_contents(public_path('css/critical.css')) !!}</style>

<link rel="preload" href="{{ $fontUrl }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ $fontUrl }}"></noscript>

<link rel="preload" href="{{ asset('css/swiper-bundle.css') }}?v={{ $swiperVersion }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ asset('css/swiper-bundle.css') }}?v={{ $swiperVersion }}"></noscript>

<link rel="preload" href="{{ asset('css/style.css') }}?v={{ $styleVersion }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ $styleVersion }}"></noscript>

<link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></noscript>

<link rel="preload" href="{{ asset('webfonts/fa-solid-900.woff2') }}" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="{{ asset('css/font-awesome.min.css') }}?v={{ $faVersion }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}?v={{ $faVersion }}"></noscript>
