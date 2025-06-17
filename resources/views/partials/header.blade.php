<!DOCTYPE html>
<html lang="tr">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PKGPDTVHY9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-PKGPDTVHY9');
    </script>
    <!-- Mobile Specific Meta -->
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" />
    <!-- Author Meta -->
    <meta name="author" content="codepixer" />
    <!-- Meta Description -->
    <meta name="description" content="@yield('description')">
    <!-- Meta Canonical -->
    <link rel="canonical" href="{{ request()->url() }}">
    <!-- Meta Keyword -->
    <meta name="keywords" content="@yield('keywords')">
    <!-- meta character set -->
    <meta charset="UTF-8" />
    <!-- Site Title -->
    <title>
        @if (Request::is('/') || Request::is('/en'))
            Piyalepasa
        @else
            @yield('title', 'Piyalepasa') | Piyalepasa
        @endif
    </title>
    @php
        $settings = \Joaopaulolndev\FilamentGeneralSettings\Models\GeneralSetting::find(1);
    @endphp

    @if(isset($settings['more_configs']['header']))
        {!! $settings['more_configs']['header'] !!}
    @endif
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <!-- styls css -->
    <link rel="stylesheet" href="{{asset('css/swiper-bundle.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <!-- bootstrap css -->


    @stack('css')
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous" />
    <!-- font awasome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        /* Modal styles */
        #imageModal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.9);
            opacity: 0;
            transition: opacity 0.5s;
            overflow-y: hidden;
        }

        #imageModal .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            height: 80%;
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.5s, transform 0.5s;
        }

        #imageModal .modal-caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        #imageModal .modal-navigation {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        #imageModal .prev,
        #imageModal .next {
            cursor: pointer;
            color: #fff;
            font-size: 60px;
            font-weight: bold;
            transition: 0.3s;
            padding: 16px;
        }

        #imageModal .prev:hover,
        #imageModal .next:hover {
            color: #bbb;
        }

        #imageModal .show {
            opacity: 1 !important;
            transform: scale(1) !important;
        }
        .indexArticle{

            display: flex;
            justify-content: center;
            align-items: center;
        }
        .indexArticle article{
            width: 75px;
            height: 1px;
            background-color: #fff;
        }

        @media (max-width: 992px) {
            #imageModal .prev,
            #imageModal .next {
                padding: 0!important;
            }
            .hero {
                height: auto!important;
                border-radius: 30px!important;
            }
            .hero .hero-text-list {
                width: 90%!important;
            }
            .hero .hero-text-list .title {
                font-size: 36px!important;
                font-weight: 600!important;
            }
            .hero-list {
                height: 400px !important;
            }
            .hero-list .hero-img {
                height: 175px!important;
            }
            .hero-content {
                position: relative !important;
            }
            .hero-content .hero-box {
                border-radius: 0!important;
                width: 100%!important;
                height: auto!important;
                background: #732031!important;
            }
            .hero-box .mask-content {
                padding-top: 0!important;
            }
            .mask {
                display: none!important;
            }
            .box-t {
                display: none!important;
            }
            .transport-header-right-modal-content {
                height: 50%!important;
            }
            .transport-header-right .transport-header-right-item p{
                font-size: 10px!important;
            }
        }
        .swiper-pagination {
            position: absolute;
            bottom: 10px;
            text-align: center;
            width: 100%;
            z-index: 10;
        }
        .hero {
            border-radius: 72px;
            height: 850px;
            overflow: hidden;
        }
        .hero .hero-text-list {
            z-index: 99;
            width: 50%;
        }
        .hero .hero-text-list .subtitle {
            color: #ffb0b7;
            font-weight: 200;
        }
        .hero .hero-text-list .title {
            font-size: 44px;
            font-weight: 600;
            width: 70%;
        }
        .hero .gradient {
            background: linear-gradient(283.99deg, rgba(115, 32, 49, 0) 27.58%, #732031 95.57%);
            z-index: 2;
        }
        .hero .hero-bg {
            object-fit: cover;
        }

        .hero .hero-img {
            z-index: 3;
            height: 600px;
            transition: all 1s ease;
            transform: translateX(-50px);
        }
        .hero-list {
            width: 100%;
            height: 100%;
        }
        .hero-list .swiper-slide.swiper-slide-active .hero-img {
            transform: translateX(0px);
        }
        .hero-text-list .swiper-pagination {
            position: relative;
            text-align: left;
            margin-top: 50px;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .hero-text-list .swiper-pagination .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background: #e37a90;
            opacity: 1;
        }
        .hero-text-list .swiper-pagination .swiper-pagination-bullet-active {
            width: 16px;
            height: 16px;
            background: #fff;
        }
        .hero-content {
            position: absolute;
            left: 0;
            bottom: 0;
            z-index: 29;
        }
        .hero-content .hero-box {
            border-radius: 60px;
            width: 370px;
            height: 500px;
        }
        .hero-box .mask {
            background: #732031;
            -webkit-mask-image: url(../img/mask.svg);
            mask-image: url(../img/mask.svg);
            -webkit-mask-size: contain;
            mask-size: contain;
            -webkit-mask-position: center;
            mask-position: center;
            -webkit-mask-repeat: no-repeat;
            mask-repeat: no-repeat;
            width: 376px;
            height: 100%;

            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
        }
        .hero-box .mask-content {
            padding-top: 80px;
            position: relative;
            z-index: 22;
        }
        .hero-box .box-t {
            z-index: 21;
            width: 447.5px;
            height: 500px;
        }
        .hero-box .box-r-b {
            z-index: 21;
        }
        .hero-box .box-rounded-r-b {
            z-index: 21;
        }

        .fw-semibold {
            font-weight: 600;
        }
        .tanitimFlim-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }

        .tanitimFlim-modal-content {
            width: 75%;
            height: 75%;
            background-color: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #tanitimFlim-video {
            width: 100%;
            height: 100%;
            border: none;
        }

        .tanitimFlim-close {
            position: absolute;
            right: 10px;
            top: 10px;
            font-size: 24px;
            cursor: pointer;
            color: #fff;
            z-index: 1001;
        }
        .transport-header-right-modal {
            display: none; /* Modal başlangıçta gizli */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .transport-header-right-modal-content {
            position: relative;
            width: 75%;
            height: 75%;
            border-radius: 10px;
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .transport-header-right-close {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
        }

        #transport-header-right-video-frame {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Beyoğlu Ring Start */
        .beyoglu_Ring_title{
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            text-align: center;
        }
        .beyoglu_Ring_left{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .beyoglu_Ring_left h4{
            color: #fff;
            font-weight: bold;
            font-size: 30px;
        }
        .beyoglu_Ring_left_img{
            width: 100%;
            height: 100%;
        }
        .beyoglu_Ring_left img{
            width: 100%;
            height: 600px;
        }
        .beyoglu_Ring_right{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .beyoglu_Ring_right h4{
            color: #fff;
            font-weight: bold;
            font-size: 30px;
        }
        .beyoglu_Ring_right_img{
            width: 100%;
            height: 100%;
        }
        .beyoglu_Ring_right img{
            width: 100%;
            height: 648px;
            border-radius: 20px;
        }
        .beyoglu_Ring_footer{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .beyoglu_Ring_footer p{
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            text-emphasis: center;
        }
        @media (max-width: 992px){
            .beyoglu_Ring_title{
                font-size: 40px;
            }
            .beyoglu_Ring_right h4{
                font-size: 30px;
            }
            .beyoglu_Ring_left h4{
                font-size: 30px;
            }
            #beyogluRing th, #beyogluRing td {
                font-size: 10px;
            }
            .beyoglu_Ring_right img{
                border-radius: inherit;
            }
        }
        /* Tablo stilleri */
        #beyogluRing {
            border-collapse: collapse; /* Hücre sınırlarını birleştir */
            margin: 0 auto;
            border: 1px solid rgba(115, 32, 49, 1); /* Dış sınır */
            border-radius: 20px; /* Kenarları yuvarla */
            overflow: hidden; /* Köşelerde taşmayı önle */
            width: 100%;
            height: 600px;
        }

        #beyogluRing caption {
            caption-side: top;
            background-color: red;
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
            text-align: center;
            display: table-caption; /* Taşma sorununu çözer */
            border: 2px solid rgba(115, 32, 49, 1);
            border-bottom: none;
        }

        #beyogluRing th, #beyogluRing td {
            border: 2px solid rgba(115, 32, 49, 1);
            text-align: center;
            padding: 10px;
        }

        #beyogluRing th {
            background-color: #fff;
            color: rgba(115, 32, 49, 1);
            font-weight: bold;
            border-top: none;
        }

        #beyogluRing td {
            background-color: #f9f9f9;
            color: rgba(115, 32, 49, 1);
            font-weight: 600;
        }
        /* Beyoğlu Ring Finish */
    </style>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16701083436"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-16701083436');
    </script>


    <!-- Event snippet for Nasıl Giderim Buton conversion page -->
    <script>
        gtag('event', 'conversion', {'send_to': 'AW-16701083436/bBP4CILrvNMZEKye2Zs-'});
    </script>


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PKGPDTVHY9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-PKGPDTVHY9');
    </script>


    <script id="cookie-bundle" src=" https://cdn.cookiesuit.com/sdk/cookie-bundle.js?key=BbvQ31717060782239 " type="text/javascript"></script>

    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '916174191927141');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=916174191927141&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Meta Pixel Code -->

    <script type="text/plain" data-cookie-category=“adds” async="" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/944312178/?random=1727686195642&amp;cv=9&amp;fst=1727686195642&amp;num=1&amp;guid=ON&amp;resp=GooglemKTybQhCsO&amp;eid=375603261%2C466465925%2C512247838&amp;u_h=900&amp;u_w=1440&amp;u_ah=816&amp;u_aw=1440&amp;u_cd=30&amp;u_his=2&amp;u_tz=180&amp;u_java=false&amp;u_nplug=5&amp;u_nmime=2&amp;sendb=1&amp;ig=1&amp;frm=0&amp;url=https%3A%2F%2Fwww.piyalepasa.com.tr%2F&amp;ref=https%3A%2F%2Fwww.google.com%2F&amp;tiba=Piyalepasa%20Istanbul%20-%20Polat%20Holding%20g%C3%BCvencesiyle..&amp;hn=www.googleadservices.com&amp;uaa=arm&amp;uab=64&amp;uam=&amp;uap=macOS&amp;uapv=15.0.0&amp;uaw=0&amp;uafvl=Google%2520Chrome%3B129.0.6668.60%7CNot%253DA%253FBrand%3B8.0.0.0%7CChromium%3B129.0.6668.60&amp;rfmt=3&amp;fmt=4"></script>

    <script type="text/plain" data-cookie-category="adds" src="https://www.googleadservices.com/pagead/conversion_async.js" charset="utf-8"></script>

    @if(app()->getLocale() === 'tr')
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "Organization",
                 "name": "Polat Piyalepaşa Çarşı",
                "url": "{{ url()->current() }}",
                "logo": "https://polatpiyalepasacarsi.com/storage/assets/site_logo.png",
                "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+90 850 756 90 00",
                "contactType": "customer service",
                "areaServed": "TR",
                "availableLanguage": "Turkish"
                },
                "sameAs": [
                    "https://www.instagram.com/polatpiyalepasacarsi/",
                    "https://www.facebook.com/polatpiyalepasacarsi",
                    "https://www.youtube.com/c/piyalepa%C5%9Faistanbul"
                ]
            }
        </script>
    @else
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "Organization",
                "name": "Polat Piyalepaşa Çarşı",
                "url": "{{ url()->current() }}",
                "logo": "https://polatpiyalepasacarsi.com/storage/assets/site_logo.png",
                "contactPoint": {
                  "@type": "ContactPoint",
                  "telephone": "+90 850 756 90 00",
                  "contactType": "customer service",
                  "areaServed": "Worldwide",
                  "availableLanguage": "English"
                },
               "sameAs": [
                    "https://www.instagram.com/polatpiyalepasacarsi/",
                    "https://www.facebook.com/polatpiyalepasacarsi",
                    "https://www.youtube.com/c/piyalepa%C5%9Faistanbul"
                ]
            }
        </script>
    @endif
</head>
