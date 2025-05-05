<div id="location" class="mt-5">
    <div class="location-bg">
        <div class="container">
            <div class="location-title">
                <h2>{{ $footer[0]['data']['title'] }}</h2><span>{{ $footer[2]['data']['subtitle'] }}</span>
            </div>
            <div class="location-content">
                <div class="row location-content-row">
                    <div class="col-lg-7 location-content-left pt-5">
                        <h4>{{ $footer[2]['data']['title'] }}</h4>
                        <p class="mt-5">

                            {!! $footer[2]['data']['leftContent'] !!}
                        </p>
                        <p>
                            {!! $footer[2]['data']['rightContent'] !!}
                        </p>
                        <div class="row location-info mx-0 mt-5">
                            <div class="col-6 location-info-left">
                                <div class="location-info-left-bg">
                                    {!! $footer[3]['data']['content'] !!}
                                    <div class="location-info-left-icon"><i class="fa-solid fa-bus"></i></div>
                                </div>
                            </div>
                            <div class="col-6 location-info-right">
                                <div class="location-info-right-bg">
                                    {!! $footer[4]['data']['content'] !!}
                                    <div class="location-info-right-icon"><i class="fa-solid fa-train"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 location-content-right">
                        <img src="{{ asset('storage/' . $footer[1]['data']['image']) }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="transport">
    <div class="container">
        <div class="transport row">
            <div class="col-lg-6 col-12 transport-header-left mb-5 mt-3">
                <i class="fa-solid fa-bus"></i>
                <h4 style="font-size: 40px;">
                    {{ $footer[5]['data']['title'] }}
                </h4>
                <p style="color: #fff;font-weight: bold;font-size: 30px;">{{ $footer[6]['data']['title'] }}</p>
            </div>
            <div class="col-lg-6 col-12 transport-header-right mb-5 mt-3">
                @foreach ($footer[7]['data']['events'] as $event)
                    <div class="transport-header-right-item" data-video="{{$event['link']}}">
                        <div>
                            <img src="{{ asset('storage/' . $event['image']) }}" alt="" />
                        </div>
                        <p>{{$event['title']}}</p>
                    </div>
                @endforeach
            </div>
            <!-- Modal Yapısı -->
            <div id="transport-header-right-modal" class="transport-header-right-modal">
                <div class="transport-header-right-modal-content">
                    <span class="transport-header-right-close">&times;</span>
                    <iframe id="transport-header-right-video-frame" width="100%" height="315" src="" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-6 col-12 transport-center-left my-5">
                <div>
                    <img src="{{ asset('storage/' . $footer[9]['data']['image']) }}" alt="" class="transport-center-left-img" style="width: 100%;height: 100%;border-radius: 20px;">
                </div>
                <article class="new-item">
                    <!-- İçerik buraya gelir -->
                </article>
                <div class="my-3" style="color: #fff !important; text-align: center; font-weight: 600; padding: 16px 35px 0px 35px;">
                    {!! $footer[18]['data']['content'] !!}
                </div>
            </div>
            <div class="col-lg-6 col-12 transport-center-right my-5">
                <div class="row">
                    <div class="col-12 text-center" style="background-color: #FAFF09;border-radius: 20px 20px 0 0;">
                        <h4 style="color: #732031;padding: 10px;font-weight: 700;">   {{ $footer[8]['data']['stations'][0]['title'] }}</h4>
                    </div>
                    <div class="col-6 text-center p-0" style="background-color: #fff;border-right: 1px solid #DCDCDC;">
                        <div style="background-color: #F7F7F7;padding: 2px 0;"><p style="margin-top: 5px;font-weight: 600;"> {{ $footer[8]['data']['stations'][0]['stations'][0]['title'] }}</p></div>
                        @foreach ($footer[8]['data']['stations'][0]['stations'][0]['stations'] as $event)
                            <div><p style="font-weight: 600;">{{$event['title']}}</p></div>
                        @endforeach

                    </div>
                    <div class="col-6 text-center p-0" style="background-color: #fff;">
                        <div style="background-color: #F7F7F7;padding: 2px 0;">
                            <p style="margin-top: 5px;font-weight: 600;">{{ $footer[8]['data']['stations'][0]['stations'][1]['title'] }}</p>
                        </div>
                        @foreach ($footer[8]['data']['stations'][0]['stations'][1]['stations'] as $event)
                            <div><p style="font-weight: 600;">{{$event['title']}}</p></div>
                        @endforeach

                    </div>
                    <div class="col-12 text-center" style="background-color: #FAFF09;">
                        <h6 style="color: #000;padding: 10px;font-weight: 600;"> {{ $footer[8]['data']['stations'][1]['title'] }}</h6>
                    </div>
                    <div class="col-12 p-0 text-center">
                        <div class="col-12 text-center" style="background-color: #fff;border-radius: 0 0 20px 20px;">
                            <div style="background-color: #F7F7F7;">
                                <p style="color: #000;padding: 10px 0;font-weight: 600;"> {{ $footer[8]['data']['stations'][1]['stations'][0]['title'] }}</p>
                            </div>
                            @foreach ($footer[8]['data']['stations'][1]['stations'][0]['stations'] as $event)
                                <div><p style="font-weight: 600;">{{$event['title']}}</p></div>
                            @endforeach
                        </div>
                    </div>
                    <article class="new-item">
                        <!-- İçerik buraya gelir -->
                    </article>
                    <div class="my-3" style="color: #fff;text-align: center;font-weight: 600;padding: 0 35px 0px 35px"> {!! $footer[17]['data']['content'] !!}
                    </div>
                </div>
            </div>
            <!-- Beyoğlu Ring Start -->
            <div class="beyoglu_Ring my-5">
                <h4 class="beyoglu_Ring_title mb-5">{{$footer[10]['data']['title']}}</h4>
                <div class="beyoglu_Ring_row row">
                    <div class="col-md-6 col-12 beyoglu_Ring_left h-100 ">
                        <h4 class=" my-4">{{$footer[11]['data']['title']}}</h4>
                <table id="beyogluRing">
    <caption>{{ $footer[13]['data']['stations'][0]['title'] }}</caption>
    <thead>
        <tr>
            @foreach ($footer[13]['data']['stations'][0]['stations'] as $station)
                <th>{{ $station['title'] }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @php
            // Her duraktaki maksimum saat sayısını hesapla
            $maxRows = max(array_map(function($station) {
                return count($station['stations']);
            }, $footer[13]['data']['stations'][0]['stations']));
        @endphp

        @for ($i = 0; $i < $maxRows; $i++)
            <tr>
                @foreach ($footer[13]['data']['stations'][0]['stations'] as $station)
                    <td>
                        {{ isset($station['stations'][$i]) ? trim($station['stations'][$i]['title']) : '' }}
                    </td>
                @endforeach
            </tr>
        @endfor
    </tbody>
</table>

                    </div>
                    <div class="col-md-6 col-12 beyoglu_Ring_right h-100 p-0">
                        <h4 class="my-4">{{$footer[12]['data']['title']}}</h4>
                        <div class="beyoglu_Ring_right_img">
                            <img src="{{ asset('storage/' . $footer[14]['data']['image']) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="beyoglu_Ring_footer my-5">
                    <p> {!! $footer[15]['data']['content'] !!}</p>
                </div>
            </div>
            <!-- Beyoğlu Ring Finish -->
        </div>
    </div>
    <div class="map-piyalepasa">
        {!! $footer[16]['data']['google_map'] !!}
    </div>
</section>
