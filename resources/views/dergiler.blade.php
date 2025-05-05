@extends('partials.layout')

@section('title', trans('page.magazines'))

@section('description', trans('page.meta_magazines_title'))

@section('keywords', trans('page.meta_magazines_description'))

@section('content')

    <body>
    <!-- header start -->
    <header id="header">
        @include('partials.nav')
    </header>
    <!-- header end -->

    <!-- magazine start -->
    <section class="magazine-banner" style="background:url({{ asset('storage/' .$data[0]['data']['image']) }});">
      <div class="magazine-home">
<h1 class="magazine-home-title" style="font-weight: 500; font-size: 40px;"> {{$data[0]['data']['subtitle']}}</h1>
      </div>
    </section>
    <!-- magazine end -->

     <!-- news start -->
<section id="news" class="my-5 border-bottom pb-5">
  <div class="container">
    <div class="row new-list">
        @foreach ($data[2]['data']['files'] as $item)
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


    <!-- news end -->

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

    <!-- transport start -->
    @include('partials.transport')
    <!-- location end -->


    <!-- footer start -->
@endsection
