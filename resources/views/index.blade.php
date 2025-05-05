@extends('partials.layout')

@section('description', trans('page.meta_home_title'))

@section('keywords', trans('page.meta_home_description'))

@section('content')

<body>
    <!-- header start -->
    <header id="header">
        @include('partials.nav')
    </header>
    <!-- header end -->
    <!-- homeTwoSlider start -->
     <div>
      <div class="container px-md-0 px-2">
          <div class="hero mt-md-4 mt-3 mb-4 position-relative">
            <div class="hero-text-list swiper position-absolute start-0 top-0 text-white m-xxl-5 m-4 p-lg-4 p-md-3 p-1">
              <div class="swiper-wrapper">
                  @foreach ($data[0]['data']['sliders'] as $slider)
                      <div class="swiper-slide {{ $loop->first ? 'ms-4' : '' }}">
                          <div class="subtitle fs-4 pb-2">{{ $slider['subtitle'] }}</div>
                          <div class="title lh-sm">{{ $slider['title'] }}</div>
                      </div>
                  @endforeach
              </div>
              <div class="swiper-pagination ms-4"></div>
            </div>
            <div class="hero-list swiper">
              <div class="swiper-wrapper">
                  @foreach ($data[0]['data']['sliders'] as $slider)
                      <div class="swiper-slide">
                          <img src="{{ asset('storage/' . $slider['open_image']) }}" class="hero-img position-absolute end-0 bottom-0 me-md-5 me-4">
                          <div class="gradient position-absolute start-0 top-0 w-100 h-100"></div>
                          <img src="{{ asset('storage/' . $slider['image']) }}" class="hero-bg w-100 h-100">
                      </div>
                  @endforeach
              </div>
            </div>
            <div class="hero-content">
              <div class="hero-box position-relative">
                <div class="mask-content w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                  <div class="w-100 p-lg-5 p-4 text-white fs-3 fw-light">
                    <span class="fw-semibold">{{$data[0]['data']['sliders'][0]['description']}}</span>
                  </div>
                  <button class="border-top bg-transparent border-0 shadow-none w-100 p-lg-5 p-4 d-flex align-items-center justify-content-center gap-3"  style="border-top: 1px solid #8D2D41 !important;;">
                    <div class="icon flex-shrink-0">
                      <svg width="56" height="57" viewBox="0 0 56 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.9723 41.139L40.5465 28.5556L20.9723 15.9722V41.139ZM27.9631 56.5187C24.0949 56.5187 20.4597 55.7847 17.0575 54.3166C13.6553 52.8485 10.6959 50.8562 8.1792 48.3395C5.66252 45.8228 3.67015 42.8634 2.20209 39.4612C0.734031 36.059 0 32.4238 0 28.5556C0 24.6874 0.734031 21.0522 2.20209 17.65C3.67015 14.2478 5.66252 11.2884 8.1792 8.77173C10.6959 6.25505 13.6553 4.26268 17.0575 2.79462C20.4597 1.32656 24.0949 0.592529 27.9631 0.592529C31.8313 0.592529 35.4665 1.32656 38.8687 2.79462C42.2709 4.26268 45.2303 6.25505 47.747 8.77173C50.2636 11.2884 52.256 14.2478 53.7241 17.65C55.1921 21.0522 55.9262 24.6874 55.9262 28.5556C55.9262 32.4238 55.1921 36.059 53.7241 39.4612C52.256 42.8634 50.2636 45.8228 47.747 48.3395C45.2303 50.8562 42.2709 52.8485 38.8687 54.3166C35.4665 55.7847 31.8313 56.5187 27.9631 56.5187ZM27.9631 50.9261C34.2082 50.9261 39.4979 48.7589 43.8321 44.4247C48.1664 40.0904 50.3335 34.8007 50.3335 28.5556C50.3335 22.3105 48.1664 17.0208 43.8321 12.6866C39.4979 8.35228 34.2082 6.18515 27.9631 6.18515C21.718 6.18515 16.4283 8.35228 12.094 12.6866C7.75976 17.0208 5.59262 22.3105 5.59262 28.5556C5.59262 34.8007 7.75976 40.0904 12.094 44.4247C16.4283 48.7589 21.718 50.9261 27.9631 50.9261Z" fill="#FF916F"/>
                        </svg>
                    </div>
                      <a href="{{$data[0]['data']['sliders'][0]['link']}}" class="fs-3 fw-lighter tanitimFlim" style="color:#FF916F;text-decoration: none;font-size: 25px!important;" id="play-video">{{$data[0]['data']['sliders'][0]['link_title']}}</a>
                  </button>
                </div>
                <div class="mask">
                </div>
                <div class="box-t position-absolute top-0 start-0">
                  <img src="{{asset('img/box.svg')}}" class="w-100 h-100">
                </div>
              </div>
            </div>
          </div>
       </div>
     </div>
    <!-- Modal -->
    <div id="tanitimFlim-modal" class="tanitimFlim-modal">
      <div class="tanitimFlim-modal-content">
          <span class="tanitimFlim-close">&times;</span>
          <iframe id="tanitimFlim-video" width="100%" height="400" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
    <!-- homeTwoSlider end -->

    <!-- activity start -->
    <div id="activity" class="my-3">
      <div class="container">
          <div class="row activity p-3" style="background:url(../img/activityBg.png),  url({{ asset('storage/' .$data[1]['data']['grids'][0]['image']) }}); background-repeat: no-repeat;
    background-size: cover, cover;
    background-position: center, center;">
          <div class="col-12 p-5">
            <span>{{$data[1]['data']['grids'][0]['title']}}</span>
            <p>
                {{$data[1]['data']['grids'][0]['description']}}
            </p>
            <a href="{{$data[1]['data']['grids'][0]['url']}}"><i class="fa-solid fa-arrow-right-long"></i>{{$data[1]['data']['grids'][0]['button_name']}}</a>
          </div>
        </div>
      </div>
    </div>
    <!-- activity end -->

    <!-- store start -->
    <section id="stores" class="my-5">
      <div class="container">
        <div class="stores row">
          <div class="col-12 mb-5">
            <div class="row">
              <div class="col-12">
                <div
                  class="store-text mb-5 d-md-flex justify-content-between align-items-center">
                  <div>
                    <h4>{{ $data[8]['data']['titles'][0]['title'] }}</h4>
                    <span style="font-weight: 500;color: #1A191B;">
                       {{ $data[8]['data']['titles'][1]['title'] }}
                      </span>
                  </div>
                  <div>
                    <a href="{{ url(App::getLocale() === 'en' ? 'en/stores' : 'magazalar') }}" class="mt-4 mt-md-0"
                      >{{ $data[8]['data']['titles'][2]['title'] }}<i class="fa-solid fa-arrow-right-long"></i
                    ></a>
                  </div>
                </div>
              </div>
              <div class="col-12 new d-lg-flex">
                  @foreach ($data[2]['data']['events'] as $slider)
                    <div class="col-lg-2 col-md-3 col-sm-6 col-12 store">
                  <div class="card me-md-3 mb-4">
                    <div class="image">
                      <img src="{{ asset('storage/' . $slider['image']) }}" />
                    </div>
                    <div class="details">
                      <div class="center w-100" style="display: flex;justify-content: center;align-items: center;">
                          <h1>{{$slider['title']}}</h1>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
          </div>
          <div class="col-12">
            <div class="row">
              <div class="col-12">
                <div
                  class="store-text mb-5 d-md-flex justify-content-between align-items-center">
                  <div>
                <h4>     {{ $data[8]['data']['titles'][3]['title'] }}</h4>
                    <span style="font-weight: 500;color: #1A191B;">
                          {{ $data[8]['data']['titles'][4]['title']  }}
                      </span>
                  </div>
                  <div class="mt-4 mt-md-0">
                    <a href="{{ url(App::getLocale() === 'en' ? 'en/restaurants' : 'restoranlar') }}"
                      >{{ $data[8]['data']['titles'][2]['title']  }}<i class="fa-solid fa-arrow-right-long"></i
                    ></a>
                  </div>
                </div>
              </div>
              <div class="col-12 new d-lg-flex">
                  @foreach ($data[3]['data']['events'] as $slider)
                  <div class="col-lg-2 col-md-3 col-sm-6 col-12 store">
                  <div class="card me-md-3 mb-4">
                    <div class="image">
                      <img src="{{ asset('storage/' . $slider['image']) }}" />
                    </div>
                    <div class="details">
                      <div class="center w-100" style="display: flex;justify-content: center;align-items: center;">
                          <h1>{{$slider['title']}}</h1>
                      </div>
                    </div>
                  </div>
                </div>
                  @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- store end -->


    <!-- services start -->
    <div id="services" class="my-5">
      <div class="container">
        <h2 class="mb-5"> {{ $data[8]['data']['titles'][5]['title']  }}</h2>
        <div class="row services">
            @foreach ($data[4]['data']['services'] as $services)
                <div class="col-lg-4 col-md-6 col-12 service">
            <div class="service-card">
              <h4>{{$services['title']}}</h4>
              <p>
                  {{$services['address']}}
              </p>
              <img src="{{ asset('storage/' . $services['image']) }}" alt="" />
            </div>
          </div>
            @endforeach
        </div>
      </div>
    </div>
    <!-- services end -->

    <!-- officeTwo start -->
    <div id="officeTwo">
      <div class="container">
        <div class="officeTwo row">
          <div class="col-12 my-5 officeTwo-title">
            <h4> {{ $data[8]['data']['titles'][6]['title']  }}</h4>
            <p>
                {{ $data[8]['data']['titles'][7]['title']  }}
            </p>
          </div>
          <div class="col-12 officeTwo-logo my-5">
            <img src="{{asset('img/hanSpacesGrey.png')}}" alt="" />
          </div>
          <div class="col-12 officTwo-galery mt-5">
            <div class="row">
              <div class="col-12">
                <div class="row">
                    @foreach ($data[5]['data']['galleries'] as $galleries)
                         <div class="col-lg-4 col-md-6 col-12 my-2">
                    <div class="gallery-item">
                        <img src="{{ asset('storage/' . $galleries['image']) }}" alt="" />
                    </div>
                  </div>
                    @endforeach
                </div>
              </div>
              <div class="col-12 mt-4">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        {!! $data[9]['data']['content'] !!}

                      </div>
                      <div class="col-lg-8 col-12">
                        <p class="text" style="color: #1A191B;">
                            {{ $data[8]['data']['titles'][8]['title']  }}
                        </p>
                      </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- officeTwo end -->
    <!-- Modal Structure -->
    <div id="imageModal" class="modal">
      <img class="modal-content" id="modalImage">
      <div class="modal-caption" id="modalCaption"></div>
      <div class="modal-navigation">
          <span class="prev">&#10094;</span>
          <span class="next">&#10095;</span>
      </div>
    </div>

    <!-- magazine text start -->
    <section id="magazine-text">
        <div class="container">
          <div>
            <div class="magazine-text-title">
              <h2>
                  {{$data[6]['data']['title']}}
              </h2>
            </div>
            <div class="magazine-text-text">
              <p>
                  {{$data[6]['data']['description']}}
              </p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col-lg-4 magazine-text-left p-0">
              <div
                class="col-12 magazine-text-left-header d-flex flex-column justify-content-center align-items-start">
                <span>{{$data[6]['data']['content_title']}}</span>
              </div>
              <div class="col-12 magazine-text-left-footer d-flex flex-column justify-content-start align-items-start">
                <p class="paragraf-one">
                    {{$data[6]['data']['content_description']}}
                </p>
              </div>
            </div>
            <div class="col-lg-8 magazine-text-right p-0">
              <div class="img">
                  <img src="{{ asset('storage/' . $data[6]['data']['image']) }}" alt="">
                  <div class="tree">
                      <img src="{{ asset('storage/' . $data[6]['data']['sub_image']) }}" alt="">
                  </div>
              </div>
              <div class="slider">
                  <div class="slider-track">
                    <div class="slider-item">
                      <img src="{{asset('img/hanSpaceLogo1.png')}}" alt="">
                    </div>
                    <div class="slider-item">
                      <img src="{{asset('img/hanSpaceLogo1.png')}}" alt="">
                    </div>
                    <div class="slider-item">
                      <img src="{{asset('img/hanSpaceLogo1.png')}}" alt="">
                    </div>
                    <div class="slider-item">
                      <img src="{{asset('img/hanSpaceLogo1.png')}}" alt="">
                    </div>
                    <div class="slider-item">
                      <img src="{{asset('img/hanSpaceLogo1.png')}}" alt="">
                    </div>
                    <div class="slider-item">
                      <img src="{{asset('img/hanSpaceLogo1.png')}}" alt="">
                    </div>
                  </div>
                </div>
          </div>
          <div class="col-12 mt-5">
            {!!  $data[6]['data']['content'] !!}
          </div>
        </div>
    </section>
    <!-- magazine text end -->

    <!-- news start -->
<section id="news" class="my-5 border-bottom pb-5">
  <div class="container">
       <h2 style="font-size: 65px;font-weight: 600;">{{$data[8]['data']['titles'][9]['title']}}</h2>
    <div class="row new-list">
         @foreach ($data[7]['data']['files'] as $item)
        <div class="col-md-3 col-lg-2 col-6 new-item">
        <a href="{{ asset('storage/' . $item['attachments']) }}" target="_blank">
          <img src="{{ asset('storage/' . $item['image']) }}" alt="" />
        </a>
        <a href="{{ asset('storage/' . $item['attachments']) }}" download target="_blank">
            {{ trans('page.pdf_download') }}<i class="fa-solid fa-chevron-down"></i>
        </a>
      </div>
        @endforeach

    </div>
  </div>
</section>
    <!-- news end -->

<!-- Modal için gerekli yapı -->
<div id="imageModal" style="display:none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.8);">
    <span id="closeModal" style="position: absolute; top: 20px; right: 35px; color: white; font-size: 40px; font-weight: bold; cursor: pointer;">&times;</span>
    <img id="modalContent" style="margin: auto; display: block; max-width: 80%; max-height: 80%;">
</div>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
    // Görsele tıklanınca büyüme işlemi
    document.getElementById('pdfImage').addEventListener('click', function() {
        var modal = document.getElementById("imageModal");
        var modalImg = document.getElementById("modalContent");
        modal.style.display = "block";
        modalImg.src = this.src;
    });

    // Modalı kapatma işlemi
    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById("imageModal").style.display = "none";
    });
</script>

     <!-- location finish -->


    <!-- location end -->


    <!-- transport start -->

    @include('partials.transport')
    <!-- transport end -->

    <!-- footer start -->

@endsection
