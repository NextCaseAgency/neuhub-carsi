@extends('partials.layout')

@section('title', trans('page.events'))

@push('head')
    @php
        $currentEventsPage = app(\App\Services\CurrentPageResolver::class)->resolve();
        $eventItems = [];
        $listPosition = 1;

        foreach (($data[1]['data']['galleries'] ?? []) as $gallery) {
            $schemaEvent = event_schema_from_gallery($gallery);

            if ($schemaEvent === null) {
                continue;
            }

            $eventItems[] = [
                '@type' => 'ListItem',
                'position' => $listPosition++,
                'item' => $schemaEvent,
            ];
        }

        $eventsSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => trans('page.events_page_h1'),
            'description' => $currentEventsPage?->seo?->description ?: trans('page.meta_events_description'),
            'url' => url()->current(),
            'isPartOf' => [
                '@type' => 'WebSite',
                'name' => 'Polat Piyalepaşa Çarşı',
                'url' => config('app.url'),
            ],
            'mainEntity' => [
                '@type' => 'ItemList',
                'itemListElement' => $eventItems,
            ],
        ];
    @endphp
    <script type="application/ld+json">{!! json_encode($eventsSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')

    <header id="header">
        @include('partials.nav')
    </header>
    <!-- header end -->

<!-- offer start -->
<section id="offer-banner" style="background:url({{ asset('storage/' .$data[0]['data']['image']) }});">
    <div class="page-hero-head">
        <h1 class="page-hero-title">{{ trans('page.events_page_h1') }}</h1>
        @include('partials.breadcrumb', ['variant' => 'hero'])
    </div>
</section>
<!-- offer end -->



    <section id="offer-cards-section" class="my-3">
        <div class="container border-bottom pb-5">
            @php
                $galleries = $data[1]['data']['galleries'];
            @endphp

            @foreach(array_chunk($galleries, 2) as $chunk)
                <div class="row offer-cards temmuz active">
                    @foreach($chunk as $index => $item)
                        @php
                            $eventTitle = event_gallery_name($item);
                            $eventAlt = $eventTitle !== '' ? $eventTitle : 'Etkinlik görseli';
                        @endphp
                        <div class="col-md-6 col-12 offer-card mt-5">
                            @if($eventTitle !== '')
                                <h2 class="offer-card-title">{{ $eventTitle }}</h2>
                            @endif
                            @if(isset($item['video']) && $item['video']) {{-- Video varsa --}}
                            <a
                                href="{{ $item['video'] }}"
                                data-fancybox="gallery"
                                data-caption="{{ $eventAlt }}"
                            >
                                {!! picture_asset('storage/' . $item['image'], $eventAlt, '', 'width: 100%; border-radius: 10px;') !!}
                            </a>
                            @else {{-- Sadece görselse --}}
                            <div class="offer-card-img">
                                {!! picture_asset('storage/' . $item['image'], $eventAlt, '', 'width: 100%; border-radius: 10px;') !!}
                            </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endforeach
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
                        {!! picture_asset('storage/' . $data[2]['data']['image'], $data[2]['data']['title'] ?? '') !!}
                        <div class="tree">
                            {!! picture_asset('storage/' . $data[2]['data']['sub_image'], '') !!}
                        </div>
                    </div>
                    <div class="slider">
                        <div class="slider-track">
                            @for($i = 0; $i < 6; $i++)
                            <div class="slider-item">
                                {!! picture_asset('img/hanSpaceLogo1.png', 'HAN Space') !!}
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5 cms-content">
                    {!! normalize_content_headings($data[2]['data']['content'] ?? '') !!}
                </div>
            </div>
    </section>
    <!-- magazine text end -->

    <!-- transport start -->
    @include('partials.transport')

      <!-- transport end -->

    <!-- footer start -->
@endsection
