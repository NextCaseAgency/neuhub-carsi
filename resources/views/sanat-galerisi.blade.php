@extends('partials.layout')

@section('title', trans('page.art'))

@section('description', trans('page.meta_galleries_title'))

@section('keywords', trans('page.meta_galleries_description'))

@section('content')

    <body>
    <!-- header start -->
    <header id="header">
        @include('partials.nav')
    </header>
    <!-- header end -->

    <!-- galery start -->
    <section id="galery-banner" class="mb-5">
      <div class="galery-home">
        <div class="container" style="padding: 0 48px;">
            <h2 class="galery-home-title" style="font-weight: 500;">{{ $data[3]['data']['title'] }}</h2>
            <span>{{ $data[4]['data']['title'] }}</span>
            <div class="galery-exhibition my-4">
                <p class="galery-exhibition-category">{{$nearestArt['location']}}</p>
                <p class="galery-exhibition-name"><i class="fa-solid fa-arrow-right"></i>{{$nearestArt['title']}}</p>
                <p class="galery-exhibition-date">{{$nearestArt['date_range']}}</p>
            </div>
        </div>
        <img src="{{ asset('storage/' . $nearestArt['image']) }}" alt="">
      </div>
    </section>
    <!-- galery end -->

    <!-- fair start -->
    <section id="fair" class="py-lg-5 py-0">
        <div class="container" style="padding: 0 48px;">
          <div class="fair-form">
              <p class="fair-home-text active" data-filter="&"><i class="fa-solid fa-globe"></i></p>
              <p class="fair-home-text" data-filter="category1">ArtOn</p>
              <p class="fair-home-text" data-filter="category2">.artSümer</p>
              <p class="fair-home-text" data-filter="category3">DG Art Project</p>
              <p class="fair-home-text" data-filter="category4">Eylül Deniz Artist Studio</p>
              <p class="fair-home-text" data-filter="category5">Merkür</p>
              <p class="fair-home-text" data-filter="category6">Pi Artworks İstanbul</p>
              <p class="fair-home-text" data-filter="category7">Zilberman</p>
          </div>
          <div class="row fair-items mt-5">
              @foreach ($data[1]['data']['art'] as $art)
                  <div class="col-lg-4 col-md-6 col-12 fair-item" data-filter="{{$art['category']}}">
                      <div class="card p-3" style="height: 400px;">
                          <img src="{{ asset('storage/' . $art['image']) }}" class="card-img-top" alt="..." style="height: 200px;">
                          <div class="card-body">
                              <h5 class="card-title">{{$art['title']}}</h5>
                               <p class="card-text fair-item-p1">{{$art['branc']}}</p>
                              <p class="fair-item-p2">{{$art['date_range']}}</p>
                              <p class="fair-item-p3">{{$art['location']}}</p>
                          </div>
                      </div>
                  </div>
            @endforeach

          </div>
        </div>
    </section>
    <!-- fair end -->

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

    <!-- footer start -->

    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const filterButtons = document.querySelectorAll('.fair-home-text');
                const fairItemsContainer = document.querySelector('.fair-items');
                const fairItems = Array.from(document.querySelectorAll('.fair-item'));
                const referenceDate = new Date('2024-06-22');

                // Function to parse date from the text
                const parseDate = (text) => {
                    const [day, month, year] = text.split('.');
                    return new Date(`${year}-${month}-${day}`);
                };

                // Sort fair items based on date proximity to reference date
                fairItems.sort((a, b) => {
                    const dateA = parseDate(a.querySelector('.fair-item-p2').textContent.trim());
                    const dateB = parseDate(b.querySelector('.fair-item-p2').textContent.trim());
                    const diffA = Math.abs(referenceDate - dateA);
                    const diffB = Math.abs(referenceDate - dateB);
                    return diffA - diffB;
                });

                // Append sorted items back to the container
                fairItems.forEach(item => fairItemsContainer.appendChild(item));

                filterButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        filterButtons.forEach(btn => btn.classList.remove('active'));
                        button.classList.add('active');

                        const filter = button.getAttribute('data-filter');

                        fairItems.forEach(item => {
                            if (filter === '&' || item.getAttribute('data-filter') === filter) {
                                item.classList.remove('hidden');
                            } else {
                                item.classList.add('hidden');
                            }
                        });
                    });
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
@endsection
