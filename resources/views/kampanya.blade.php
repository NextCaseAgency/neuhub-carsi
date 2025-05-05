@extends('partials.layout')

@section('title',trans('page.campaigns'))

@section('description', trans('page.meta_campaigns_title'))

@section('keywords', trans('page.meta_campaigns_description'))

@section('content')

    <body>
    <!-- header start -->
    <header id="header">
        @include('partials.nav')
    </header>
    <!-- header end -->

    <!-- offer start -->

    <section id="offer-banner" style="background:url({{ asset('storage/' .$data[0]['data']['image']) }});">
        <h1 style="position: absolute; top: 160px; color: #fff; font-weight: 500; font-size: 40px;"> {{$data[0]['data']['subtitle']}}</h1>
      <div class="offer-home">
          <p id="avm" class="offer-home-text">{{$data[3]['data']['title']}}</p>
          <p id="magaza" class="offer-home-text">{{$data[4]['data']['title']}}</p>
      </div>
    </section>
    <!-- offer end -->

<!-- AVM Kampanyası başlangıç-->
    <!-- offer cards start -->
    <section id="offer-cards-section" class="my-3">
        <div class="container border-bottom pb-5">
            <div class="row offer-cards">
                @foreach ($data[1]['data']['campaigns'] as $slider)
                    <div class="col-md-6 col-12 offer-card {{ $slider['category'] }} mt-5">
                        <div class="offer-card-img">
                            <img src="{{ asset('storage/' . $slider['image']) }}" alt="{{ $slider['title'] }}">
                        </div>
                        <div class="offer-card-text mt-3">
                            <h4>{{ $slider['title'] }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- offer cards end -->
<!-- Mağaza Kampanyası bitiş-->


    <!-- magazine text start -->
    <section id="magazine-text" class="my-5 py-5">
        <div class="container">
            <div>
                <div class="magazine-text-title">
                    <h2>
                        {{$data[2]['data']['title']}}
                    </h2>
                </div>
                <div class="magazine-text-text">
                    <p>
                        {{$data[2]['data']['description']}}
                    </p>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-4 magazine-text-left p-0">
                    <div
                        class="col-12 magazine-text-left-header d-flex flex-column justify-content-center align-items-start">
                        <span>{{$data[2]['data']['content_title']}}</span>
                    </div>
                    <div class="col-12 magazine-text-left-footer d-flex flex-column justify-content-start align-items-start">
                        <p class="paragraf-one">
                            {{$data[2]['data']['content_description']}}
                        </p>
                    </div>
                </div>
                <div class="col-lg-8 magazine-text-right p-0">
                    <div class="img">
                        <img src="{{ asset('storage/' . $data[2]['data']['image']) }}" alt="">
                        <div class="tree">
                            <img src="{{ asset('storage/' . $data[2]['data']['sub_image']) }}" alt="">
                        </div>
                    </div>
                    <div class="slider">
                        <div class="slider-track">
                            <div class="slider-item">
                                <img src="{{ asset('img/hanSpaceLogo1.png')}}" alt="">
                            </div>
                            <div class="slider-item">
                                <img src="{{ asset('img/hanSpaceLogo1.png') }}" alt="">
                            </div>
                            <div class="slider-item">
                                <img src="{{ asset('img/hanSpaceLogo1.png') }}" alt="">
                            </div>
                            <div class="slider-item">
                                <img src="{{ asset('img/hanSpaceLogo1.png') }}" alt="">
                            </div>
                            <div class="slider-item">
                                <img src="{{ asset('img/hanSpaceLogo1.png') }}" alt="">
                            </div>
                            <div class="slider-item">
                                <img src="{{ asset('img/hanSpaceLogo1.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    {!!  $data[2]['data']['content'] !!}
                </div>
            </div>
    </section>
    <!-- magazine text end -->

       <!-- transport start -->
    @include('partials.transport')
    <!-- transport end -->

    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const avmTab = document.getElementById('avm');
                const magazaTab = document.getElementById('magaza');

                const avmCards = document.querySelectorAll('.offer-card.avm');
                const magazaCards = document.querySelectorAll('.offer-card.magaza');

                // Sayfa yüklendiğinde AVM içeriklerinin aktif olması için
                avmTab.classList.add('active');
                magazaTab.classList.remove('active');

                // İlk başta yalnızca AVM kartlarını gösteriyoruz
                avmCards.forEach(card => card.style.display = 'block');
                magazaCards.forEach(card => card.style.display = 'none');

                // AVM sekmesine tıklanırsa
                avmTab.addEventListener('click', function () {
                    avmTab.classList.add('active');
                    magazaTab.classList.remove('active');

                    // AVM kartlarını göster, mağaza kartlarını gizle
                    avmCards.forEach(card => card.style.display = 'block');
                    magazaCards.forEach(card => card.style.display = 'none');
                });

                // Mağaza sekmesine tıklanırsa
                magazaTab.addEventListener('click', function () {
                    magazaTab.classList.add('active');
                    avmTab.classList.remove('active');

                    // Mağaza kartlarını göster, AVM kartlarını gizle
                    magazaCards.forEach(card => card.style.display = 'block');
                    avmCards.forEach(card => card.style.display = 'none');
                });
            });

        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modal = document.getElementById('videoModal');
                const iframe = document.getElementById('videoIframe');
                const closeBtn = document.querySelector('.close-transport');
                const items = document.querySelectorAll('.transport-header-right-item');

                items.forEach(item => {
                    item.addEventListener('click', function() {
                        const videoSrc = this.getAttribute('data-video');
                        iframe.src = videoSrc;
                        modal.style.display = 'block';
                    });
                });

                closeBtn.addEventListener('click', function() {
                    modal.style.display = 'none';
                    iframe.src = '';
                });

                window.addEventListener('click', function(event) {
                    if (event.target == modal) {
                        modal.style.display = 'none';
                        iframe.src = '';
                    }
                });
            });

        </script>
        <script>
            // Modal ve iframe elementleri
            const modal = document.getElementById('transport-header-right-modal');
            const videoFrame = document.getElementById('transport-header-right-video-frame');
            const closeButton = document.querySelector('.transport-header-right-close');

            // Transport itemlere tıklama olayları
            document.querySelectorAll('.transport-header-right-item').forEach(item => {
                item.addEventListener('click', function() {
                    // Tıklanan divin data-video değerini al ve iframe src'sini güncelle
                    const videoUrl = this.getAttribute('data-video');
                    videoFrame.src = videoUrl;

                    // Modalı göster (display: flex ile)
                    modal.style.display = 'flex';
                });
            });

            // Modalı kapatma
            closeButton.onclick = function() {
                modal.style.display = 'none';
                videoFrame.src = '';  // Videoyu durdurmak için src'yi boşalt
            }

            // Modal dışında bir yere tıklayınca kapatma
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                    videoFrame.src = '';  // Videoyu durdurmak için src'yi boşalt
                }
            }
        </script>
    @endpush
    <!-- footer start -->
@endsection
