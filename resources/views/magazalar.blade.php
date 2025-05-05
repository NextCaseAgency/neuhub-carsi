@extends('partials.layout')

@section('title', trans('page.stores'))

@section('description', trans('page.meta_stores_title'))

@section('keywords', trans('page.meta_stores_description'))

@section('content')

    <body>
    <!-- header start -->
    <header id="header">
        @include('partials.nav')
    </header>
    <!-- header end -->
    <!-- floor plan start -->
    <section id="floor-banner" style="background:url({{ asset('storage/' .$data[0]['data']['image']) }});">
      <h2>{{$data[0]['data']['subtitle']}}</h2>
      <div class="floor-home">
        <p class="floor-home-text active" data-filter="&"><i class="fa-solid fa-globe"></i></p>
        <p class="floor-home-text" data-filter="A">A</p>
        <p class="floor-home-text" data-filter="B">B</p>
        <p class="floor-home-text" data-filter="C">C</p>
        <p class="floor-home-text" data-filter="D">D</p>
        <p class="floor-home-text" data-filter="E">E</p>
        <p class="floor-home-text" data-filter="F">F</p>
        <p class="floor-home-text" data-filter="G">G</p>
        <p class="floor-home-text" data-filter="H">H</p>
        <p class="floor-home-text" data-filter="I">I</p>
        <p class="floor-home-text" data-filter="İ">İ</p>
        <p class="floor-home-text" data-filter="J">J</p>
        <p class="floor-home-text" data-filter="K">K</p>
        <p class="floor-home-text" data-filter="L">L</p>
        <p class="floor-home-text" data-filter="M">M</p>
        <p class="floor-home-text" data-filter="N">N</p>
        <p class="floor-home-text" data-filter="O">O</p>
        <p class="floor-home-text" data-filter="Ö">Ö</p>
        <p class="floor-home-text" data-filter="P">P</p>
        <p class="floor-home-text" data-filter="R">R</p>
        <p class="floor-home-text" data-filter="S">S</p>
        <p class="floor-home-text" data-filter="Ş">Ş</p>
        <p class="floor-home-text" data-filter="T">T</p>
        <p class="floor-home-text" data-filter="V">V</p>
        <p class="floor-home-text" data-filter="Y">Y</p>
        <p class="floor-home-text" data-filter="Z">Z</p>
      </div>
    </section>
    <!-- floor plan end -->

  <section id="brands-section" class="my-5">
      <div class=" my-5" id="brand-details" style="display: none;">
        <div class="container">
          <div class="row floor-two-banner mx-0">
            <div class="col-12 col-lg-8 floor-two-banner-left order-2 order-lg-1">
                <img src="" alt="" class="brand-details-location-img" id="brand-location-img" style="cursor: pointer;">
            </div>
            <div class="col-12 col-lg-4 floor-two-banner-right order-1 order-lg-w">
                <img src="" alt="" id="brand-img" style="width: 140px; height: 100px;">
                <a href="#" id="brand-name" class="mt-3"></a>
                <p id="brand-info"></p>
                        <a id="brand-link" href="#" data-translation="{{ trans('page.click_for') }}">
    {{ trans('page.click_for') }}
</a>
            </div>
          </div>
        </div>
      </div>
        <div class="container border-bottom pb-5">
          <div class="">
            <div class="row brands">
                @foreach ($data[2]['data']['stores'] as $slider)
                    <div class="col-lg-2 col-md-3 col-6 brand" data-brand="{{$slider['title']}}" data-text="{{$slider['phone']}}" data-img="{{ asset('storage/' . $slider['image']) }}" data-link="{{$slider['link']}}">
                        <div class="brand-img">
                            <img src="{{ asset('storage/' . $slider['image']) }}" alt="">
                            <img src="{{ asset('storage/' . $slider['store_image']) }}" alt="" class="brand-location-img d-none">
                        </div>
                        <div class="brand-text">
                            <p>{{$slider['title']}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Modal HTML -->
            <div id="brandModal" class="modal">
              <div class="modal-content">
                  <p id="modalText" class="m-0"></p>
                  <span class="close">&times;</span>
              </div>
            </div>
          </div>
    </section>
    <!-- Modal -->
    <div id="myModal" class="modal" style="display: none;">
      <span class="close" id="myModalClose" style="position: absolute; top: 158px; right: 350px; color: #fff; font-size: 40px; font-weight: bold; cursor: pointer;z-index: 9999999;">&times;</span>
      <img class="modal-content" id="img01" style="margin: auto; display: block; width: 80%; max-width: 700px;">
      <div id="caption" style="margin: auto; display: block; width: 80%; max-width: 700px; text-align: center; color: #ccc; padding: 10px 0; height: 150px;"></div>
    </div>
    <!-- brands end -->

    <!-- magazine text start -->
    <section id="magazine-text" class="my-5 py-5">
      <div class="container">
        <div>
          <div class="magazine-text-title">
            <h2>
                {{$data[1]['data']['title']}}
            </h2>
          </div>
          <div class="magazine-text-text">
            <p>
                {{$data[1]['data']['description']}}
            </p>
          </div>
        </div>
        <div class="row my-5">
          <div class="col-lg-4 magazine-text-left p-0">
            <div
              class="col-12 magazine-text-left-header d-flex flex-column justify-content-center align-items-start">
                <span>{{$data[1]['data']['content_title']}}</span>
            </div>
            <div class="col-12 magazine-text-left-footer d-flex flex-column justify-content-start align-items-start">
              <p class="paragraf-one">
                  {{$data[1]['data']['content_description']}}
              </p>
            </div>
          </div>
          <div class="col-lg-8 magazine-text-right p-0">
              <div class="img">
                  <img src="{{ asset('storage/' . $data[1]['data']['image']) }}" alt="">
                  <div class="tree">
                      <img src="{{ asset('storage/' . $data[1]['data']['sub_image']) }}" alt="">
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
            {!!  $data[1]['data']['content'] !!}
        </div>
      </div>
    </section>
    <!-- magazine text end -->

     <!-- location finish -->

    @include('partials.transport')
  <!-- transport end -->
   <!-- footer start -->
    @push('js')
        <script>
            // Kat filtreleme ve etkinleştirme
            document.querySelectorAll('.floor-home-text').forEach(filter => {
                filter.addEventListener('click', function() {
                    document.querySelectorAll('.floor-home-text').forEach(item => item.classList.remove('active'));
                    this.classList.add('active');

                    let filterValue = this.getAttribute('data-filter').toLowerCase(); // Küçük harfe çevir
                    document.querySelectorAll('.brand').forEach(brand => {
                        let brandValue = brand.getAttribute('data-brand').toLowerCase(); // Küçük harfe çevir
                        if (filterValue === '&') {
                            brand.style.display = 'block';
                        } else {
                            brand.style.display = brandValue.startsWith(filterValue) ? 'block' : 'none';
                        }
                    });
                });
            });

            // Marka detaylarını gösterme
            document.querySelectorAll('.brand').forEach(brand => {
                brand.addEventListener('click', function() {
                    const brandName = this.getAttribute('data-brand');
                    const brandText = this.getAttribute('data-text');
                    const brandImg = this.getAttribute('data-img');
                    const brandLocationImg = this.querySelector('.brand-location-img').getAttribute('src');
                    const brandLink = this.getAttribute('data-link');
                    
                  const translation = document.getElementById('brand-link').getAttribute('data-translation');

                    document.getElementById('brand-name').textContent = brandName;
                    document.getElementById('brand-info').textContent = brandText;
                    document.getElementById('brand-img').src = brandImg;
                    document.getElementById('brand-location-img').src = brandLocationImg;
                    document.getElementById('brand-link').href = brandLink;
                    document.getElementById('brand-link').textContent = translation;

                    document.getElementById('brand-details').style.display = 'block';
                    document.getElementById('brand-details').scrollIntoView({ behavior: 'smooth', block: 'start' });
                });
            });

            // Video modal kontrolü
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

            // Transport modal kontrolü
            const transportModal = document.getElementById('transport-header-right-modal');
            const transportVideoFrame = document.getElementById('transport-header-right-video-frame');
            const transportCloseButton = document.querySelector('.transport-header-right-close');

            document.querySelectorAll('.transport-header-right-item').forEach(item => {
                item.addEventListener('click', function() {
                    const videoUrl = this.getAttribute('data-video');
                    transportVideoFrame.src = videoUrl;
                    transportModal.style.display = 'flex';
                });
            });

            transportCloseButton.onclick = function() {
                transportModal.style.display = 'none';
                transportVideoFrame.src = '';
            }

            window.onclick = function(event) {
                if (event.target == transportModal) {
                    transportModal.style.display = 'none';
                    transportVideoFrame.src = '';
                }
            }
        </script>
    @endpush
@endsection
