@extends('partials.layout')

@section('title', trans('page.office'))

@section('description', trans('page.meta_offices_title'))

@section('keywords', trans('page.meta_offices_description'))

@section('content')

    <body>
    <!-- header start -->
    <header id="header">
        @include('partials.nav')
    </header>
    <!-- header end -->

    <!-- banner start -->
    <section id="banner">
      <div class="home">
        <h1 class="home-title" style="font-size: 40px;">
  <span class="pe-1" style="font-weight: 500;">{{$data[0]['data']['subtitle']}}</span>
</h1>

      </div>
    </section>
    <!-- banner end -->

    <!-- packets start -->
    <section id="officeThree">
      <div class="container">
        <div class="row officeTwo m-0">
            <div class="col-12 col-lg-6 officeTwo-left">
              <div class="container">
                      <div class="mt-5 d-flex justify-content-center align-items-center">
                          <h4 class="w-75">{{$data[1]['data']['slider_office'][0]['title']}}</h4>
                      </div>
                      <div class="col-lg-12 office-officeTwo-left-offer my-5">
                          <div class="office-officeTwo-left-offer-img">
                          <img src="{{ asset('storage/' . $data[1]['data']['slider_office'][0]['image']) }}" alt="" />
                          <h4 class="text-start">{{$data[1]['data']['slider_office'][0]['content_title']}}</h4>
                          </div>
                          <div class="office-officeTwo-left-offer-text mt-3">
                          <p class="mb-5">
                              {{$data[1]['data']['slider_office'][0]['content_description']}}
                          </p>
                          </div>
                      </div>
              </div>
              <div class="row w-100">
                  <div class="col-12 position-relative">
                    <div class="">
                      <div id="carouselExampleIndicators" class="carousel slide position-absolute" data-bs-ride="carousel" data-bs-interval="3000" style="padding-right: 10px;">
                        <div class="carousel-indicators" style="bottom: 650px;">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            @foreach($data[1]['data']['slider_office'][0]['product_images'] as $images)
                              <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                                <img src="{{ asset('storage/' . $images['product_image']) }}" class="d-block w-100" alt="...">
                              </div>
                            @endforeach

                        </div>
                        <div class="officeTwo-left-content p-5 text-center">
                          <h4 class="officeTwo-left-content-title">{{$data[1]['data']['slider_office'][0]['product_sub_title']}}</h4>
                          <p class="officeTwo-left-content-paragrafOne"> {{$data[1]['data']['slider_office'][0]['product_title']}}</p>
                          <p class="officeTwo-left-content-paragrafTwo">{{$data[1]['data']['slider_office'][0]['product_description']}}</p>
                          <a href="{{$data[1]['data']['slider_office'][0]['product_link']}}"><i class="fa-solid fa-arrow-right-long"></i>{{$data[1]['data']['slider_office'][0]['button_text']}}</a>
                        </div>
                      </div>
                    </div>

                  </div>
              </div>
          </div>
          <div class="col-12 col-lg-6 officeTwo-right">
              <div class="container">
                  <div class="mt-5 d-flex justify-content-center align-items-center">
                      <h4 class="w-75">{{$data[1]['data']['slider_office'][1]['title']}}</h4>
                  </div>
                  <div class="col-lg-12 office-officeTwo-left-offer my-5">
                      <div class="office-officeTwo-left-offer-img">
                          <img src="{{ asset('storage/' . $data[1]['data']['slider_office'][1]['image']) }}" alt="" />
                          <h4 class="text-start">{{$data[1]['data']['slider_office'][1]['content_title']}}</h4>
                      </div>
                      <div class="office-officeTwo-left-offer-text mt-3">
                      <p class="mb-5">
                          {{$data[1]['data']['slider_office'][1]['content_description']}}
                      </p>
                      </div>
                  </div>
              </div>
              <div class="row w-100">
                  <div class="col-12 position-relative">
                    <div id="carouselExampleIndicators2" class="carousel slide position-absolute" data-bs-ride="carousel" data-bs-interval="3000" style="padding-left: 10px;">
                      <div class="carousel-indicators" style="bottom: 650px;">
                        <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="2" aria-label="Slide 3"></button>
                      </div>
                      <div class="carousel-inner">
                          @foreach($data[1]['data']['slider_office'][1]['product_images'] as $images)
                              <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                                  <img src="{{ asset('storage/' . $images['product_image']) }}" class="d-block w-100" alt="...">
                              </div>
                          @endforeach
                      </div>
                        <div class="officeTwo-left-content p-5 text-center">
                            <h4 class="officeTwo-left-content-title">{{$data[1]['data']['slider_office'][1]['product_sub_title']}}</h4>
                            <p class="officeTwo-left-content-paragrafOne"> {{$data[1]['data']['slider_office'][1]['product_title']}}</p>
                            <p class="officeTwo-left-content-paragrafTwo">{{$data[1]['data']['slider_office'][1]['product_description']}}</p>
                            <a href="{{$data[1]['data']['slider_office'][1]['product_link']}}"><i class="fa-solid fa-arrow-right-long"></i>{{$data[1]['data']['slider_office'][1]['button_text']}}</a>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
      </div>

    </section>
    <!-- packets end -->
   <div class="slider py-5">
        <div class="slider-track">
           @foreach ($data[6]['data']['galleries'] as $events)
              <div class="slider-item">
                  <img src="{{ asset('storage/' . $events['image']) }}" alt="" />
              </div>
            @endforeach

        </div>
    </div>
        <!-- blogs start -->
    <section id="blog" class="my-5">
      <div class="container">
          <div class="blog-title pb-5 pt-5 mb-3">
              <h2>{{$data[2]['data']['title']}}</h2>
              <p>{{$data[2]['data']['description']}}</p>
          </div>
          <div class="blog-card">
              <input type="checkbox" id="imgTap" />
              <input type="radio" name="select" id="tap-1" checked />
              <div class="sliders">
                  <label for="tap-1" class="tap tap-1"></label>
              </div>
              <div class="inner-part">
                  <label for="imgTap" class="img">
                      <img class="img-1" src="{{ asset('storage/' . $data[2]['data']['image']) }}" alt="" />
                  </label>
                  <div class="content content-1">
                      <div class="title">{{$data[2]['data']['content_title']}}</div>
                      <div class="text">
                          {{$data[2]['data']['content_description']}}
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <!-- blogs end -->


    <!-- collaboration start -->
    <section id="collaboration" class="my-5">
      <div class="container">
        <div class="row collaborations">
          <div class="col-12 collaboration">
            <h4>{{ trans('page.performance_text') }}</h4>
            <div class="row">
                @foreach ($data[3]['data']['events'] as $events)
                  <div class="col-6 col-md-3 col-lg-2 my-3">
                    <div class="card">
                      <img src="{{ asset('storage/' . $events['image']) }}" alt="" />
                      <p>{{$events['title']}}</p>
                    </div>
                  </div>
                @endforeach

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- collaboration end -->


    <!-- solutions start -->
    <section id="solutions" class="my-5">
      <div class="slider my-5">
       <div class="slider-track">
            @foreach ($data[6]['data']['galleries'] as $events)
              <div class="slider-item">
                  <img src="{{ asset('storage/' . $events['image']) }}" alt="" />
              </div>
            @endforeach
        </div>
      </div>
      <div class="container">
        <div class="solutions-title">
          <h2 class="mb-5">{{ trans('page.corporate_solution') }}</h2>
          <p>
              {{ trans('page.corporate_solution_text') }}
          </p>
        </div>
        <div class="solutions row">
            @foreach ($data[4]['data']['solutions'] as $key => $node)
              <div class="col-12 col-lg-4 solution solution-{{$key}}">
                <div class="row mt-5">
                  <div class="col-12 solution-header">
                    <p>{{$node['title']}}</p>
                  </div>
                  <div class="col-12 solution-footer">
                    <ul>
                        @foreach ($node['items'] as $item)
                            <li>{{$item['titles']}}</li>
                        @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            @endforeach

          <div class="col-12 mt-5">
          </div>
        </div>
      </div>
    </section>
    <!-- solutions end -->

    <section id="magazine-text" class="my-5 py-5">
        <div class="container">
            <div>
                <div class="magazine-text-title">
                    <h2>
                        {{$data[5]['data']['title']}}
                    </h2>
                </div>
                <div class="magazine-text-text">
                    <p>
                        {{$data[5]['data']['description']}}
                    </p>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-4 magazine-text-left p-0">
                    <div
                        class="col-12 magazine-text-left-header d-flex flex-column justify-content-center align-items-start">
                        <span>{{$data[5]['data']['content_title']}}</span>
                    </div>
                    <div class="col-12 magazine-text-left-footer d-flex flex-column justify-content-start align-items-start">
                        <p class="paragraf-one">
                            {{$data[5]['data']['content_description']}}
                        </p>
                    </div>
                </div>
                <div class="col-lg-8 magazine-text-right p-0">
                    <div class="img">
                        <img src="{{ asset('storage/' . $data[5]['data']['image']) }}" alt="">
                        <div class="tree">
                            <img src="{{ asset('storage/' . $data[5]['data']['sub_image']) }}" alt="">
                        </div>
                    </div>
                    <div class="slider">
                        <div class="slider-track">
                            @foreach ($data[6]['data']['galleries'] as $events)
              <div class="slider-item">
                  <img src="{{ asset('storage/' . $events['image']) }}" alt="" />
              </div>
            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    {!!  $data[5]['data']['content'] !!}
                </div>
            </div>
    </section>
    <!-- magazine text end -->

    <!-- transport start -->
    @include('partials.transport')
      <!-- transport end -->

    <!-- footer start -->
@endsection
