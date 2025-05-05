@extends('partials.layout')


@section('content')

    <body>
    <!-- header start -->
    <header id="header">
        @include('partials.nav')
    </header>
    <!-- header end -->

    <!-- magazine start -->
    <section class="magazine-banner"
             style="background: url({{ isset($data[2]['data']['image']) ? asset('storage/' . $data[2]['data']['image']) : asset('img/banner.png') }});">        <div class="magazine-home">
            @if(!empty($data[0]['data']['title']))
                <h1 class="magazine-home-title" style="font-weight: 500; font-size: 40px;">
                    {{ $data[0]['data']['title'] }}
                </h1>
            @endif
        </div>
    </section>
    <!-- magazine end -->

    <!-- news start -->
    <section id="news" class="my-5 border-bottom pb-5">
        <div class="container">
            <div class="row new-list">
                @if(!empty($data[1]['data']['content']))
                    {!! $data[1]['data']['content'] !!}
                @endif
            </div>
        </div>
    </section>
    <!-- news end -->

    

    <!-- transport start -->
    @include('partials.transport')
    <!-- location end -->


    <!-- footer start -->
@endsection
