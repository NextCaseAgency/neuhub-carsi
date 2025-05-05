@extends('partials.layout')

@section('title', trans('page.events'))

@section('description', trans('page.meta_events_title'))

@section('keywords', trans('page.meta_events_description'))

@section('content')

    <body>
    <!-- header start -->
    <header id="header">
        @include('partials.nav')
    </header>
    <!-- header end -->

<!-- offer start -->
<section id="offer-banner" style="background:url({{ asset('storage/' .$data[0]['data']['image']) }});">
<h1 style="position: absolute; top: 160px; color: #fff; font-weight: 500; font-size: 40px;">{{$data[0]['data']['subtitle']}}</h1>
  <div class="offer-home">
      <p class="offer-home-text active" id="temmuz-tab">{{$data[0]['data']['subtitle']}}</p>
  </div>
</section>
<!-- offer end -->



<section id="offer-cards-section" class="my-3">
  <div class="container border-bottom pb-5">
    <div class="row offer-cards temmuz active">
      <!-- Görsel 1 -->
      <div class="col-md-6 col-12 offer-card mt-5">
        <div class="offer-card-img">
          <img src="{{ asset('storage/' . $data[1]['data']['galleries'][0]['image']) }}" alt="Görsel 1" style="width: 100%; border-radius: 10px;">
        </div>
      </div>
      <!-- Video -->
      <div class="col-md-6 col-12 offer-card mt-5">
        <a
          href="https://www.youtube.com/watch?v=CezjhvKcLt0"
          data-fancybox="gallery"
          data-caption="Etkinlik Videosu"
        >
            @if(isset($data[1]['data']['galleries'][1]['image']))
                <img
                        src="{{ asset('storage/' . $data[1]['data']['galleries'][1]['image']) }}"
                        alt="Video Kapak Görseli"
                        style="width: 100%; border-radius: 10px;"
                />
            @endif


        </a>
      </div>
    </div>
  </div>
</section>


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
@endsection
