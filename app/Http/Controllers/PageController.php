<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Z3d0X\FilamentFabricator\Models\Page;
class PageController extends Controller
{
    public function home()
    {
        $locale = App::getLocale();
        $slug = ltrim(request()->path(), '/');
        $data = Page::where('layout', 'home')
            ->when($locale == 'en', function ($query) use ($locale,$slug) {
                return $query->where('slug', $slug);
            })
            ->first()
            ->blocks;

        $footer = Page::where('layout', 'art')
            ->when($locale == 'en', function ($query) use ($locale) {
                return $query->where('slug', 'footer-' . $locale);
            }, function ($query) {
                return $query->where('slug', 'footer-tr');
            })
            ->first()
            ->blocks;


        return view('index', compact('data', 'footer'));
    }

    public function events()
    {
        $locale = App::getLocale();
        $slug = ltrim(request()->path(), '/');
        $data = Page::where('layout', 'events')
            ->when($locale == 'en', function ($query) use ($locale,$slug) {
                return $query->where('slug',$slug);
            })->first()->blocks;

        $footer = Page::where('layout', 'art')
            ->when($locale == 'en', function ($query) use ($locale) {
                return $query->where('slug', 'footer-' . $locale);
            }, function ($query) {
                return $query->where('slug', 'footer-tr');
            })
            ->first()
            ->blocks;
        return view('etkinlikler',compact('data', 'footer'));
    }

    public function stores()
    {
        $locale = App::getLocale();
        $slug = ltrim(request()->path(), '/');
        $data = Page::where('layout', 'stores')
            ->when($locale == 'en', function ($query) use ($locale,$slug) {
                return $query->where('slug',$slug);
            })->first()->blocks;


        $footer = Page::where('layout', 'art')
            ->when($locale == 'en', function ($query) use ($locale) {
                return $query->where('slug', 'footer-' . $locale);
            }, function ($query) {
                return $query->where('slug', 'footer-tr');
            })
            ->first()
            ->blocks;
        return view('magazalar',compact('data', 'footer'));
    }

    public function restaurants()
    {
        $locale = App::getLocale();
        $slug = ltrim(request()->path(), '/');
        $data = Page::where('layout', 'restaurant')
            ->when($locale == 'en', function ($query) use ($locale,$slug) {
                return $query->where('slug', $slug);
            })->first()->blocks;

        $footer = Page::where('layout', 'art')
            ->when($locale == 'en', function ($query) use ($locale) {
                return $query->where('slug', 'footer-' . $locale);
            }, function ($query) {
                return $query->where('slug', 'footer-tr');
            })
            ->first()
            ->blocks;
        return view('restoranlar',compact('data', 'footer'));
    }

    public function campaigns()
    {
        $locale = App::getLocale();
        $slug = ltrim(request()->path(), '/');
        $data = Page::where('layout', 'campaign')
            ->when($locale == 'en', function ($query) use ($locale,$slug) {
                return $query->where('slug', $slug);
            })->first()->blocks;

        $footer = Page::where('layout', 'art')
            ->when($locale == 'en', function ($query) use ($locale) {
                return $query->where('slug', 'footer-' . $locale);
            }, function ($query) {
                return $query->where('slug', 'footer-tr');
            })
            ->first()
            ->blocks;
        return view('kampanya',compact('data', 'footer'));
    }

    public function lighting()
    {
        $locale = App::getLocale();
        $slug = ltrim(request()->path(), '/');
        $data = Page::where('layout', 'lighting')
            ->when($locale == 'en', function ($query) use ($locale,$slug) {
                return $query->where('slug',$slug);
            })->first();

        $footer = Page::where('layout', 'art')
            ->when($locale == 'en', function ($query) use ($locale) {
                return $query->where('slug', 'footer-' . $locale);
            }, function ($query) {
                return $query->where('slug', 'footer-tr');
            })
            ->first()
            ->blocks;
        return view('aydinlatma',compact('data', 'footer'));
    }

    public function cookie()
    {
        $locale = App::getLocale();
        $slug = ltrim(request()->path(), '/');
        $data = Page::where('layout', 'cookie')
            ->when($locale == 'en', function ($query) use ($locale,$slug) {
                return $query->where('slug',$slug);
            })->first();

        $footer = Page::where('layout', 'art')
            ->when($locale == 'en', function ($query) use ($locale) {
                return $query->where('slug', 'footer-' . $locale);
            }, function ($query) {
                return $query->where('slug', 'footer-tr');
            })
            ->first()
            ->blocks;
        return view('cerez',compact('data', 'footer'));
    }

    public function art()
    {
        dd('Art Gallery Page');
        $locale = App::getLocale();
        $slug = ltrim(request()->path(), '/');
        $data = Page::where('layout', 'art')
            ->when($locale == 'en', function ($query) use ($locale,$slug) {
                return $query->where('slug',$slug);
            })->first()->blocks;


        foreach ($data[1]['data']['art'] as $key => $item) {
            $startDate = \Carbon\Carbon::parse($item['start_date']);
            $endDate = \Carbon\Carbon::parse($item['end_date']);

            $startDateFormatted = $startDate->locale($locale)->isoFormat('D MMMM YYYY');
            $endDateFormatted = $endDate->locale($locale)->isoFormat('D MMMM YYYY');

            $data[1]['data']['art'][$key]['date_range'] = "{$startDateFormatted} - {$endDateFormatted}";
        }

        shuffle($data[1]['data']['art']);
        $nearestArt = $data[1]['data']['art'][0];

        $startDateFormatted = \Carbon\Carbon::parse($nearestArt['start_date'])->locale($locale)->isoFormat('D MMMM YYYY');
        $endDateFormatted = \Carbon\Carbon::parse($nearestArt['end_date'])->locale($locale)->isoFormat('D MMMM YYYY');

        $dateRange = "{$startDateFormatted} - {$endDateFormatted}";
        $nearestArt['date_range'] = $dateRange;

        $categoryNames = [
            'category1' => 'ArtOn',
            'category2' => '.artSümer',
            'category3' => 'DG Art Project',
            'category4' => 'Eylül Deniz Artist Studio',
            'category6' => 'Merkür',
            'category7' => 'Pi Artworks İstanbul',
            'category8' => 'Zilberman',
        ];

        $categoryName = $categoryNames[$nearestArt['category']] ?? 'Kategori Bulunamadı';

        $nearestArt['category_name'] = $categoryName;

        $footer = Page::where('layout', 'art')
            ->when($locale == 'en', function ($query) use ($locale) {
                return $query->where('slug', 'footer-' . $locale);
            }, function ($query) {
                return $query->where('slug', 'footer-tr');
            })
            ->first()
            ->blocks;
        return view('sanat-galerisi', compact('data', 'nearestArt', 'footer'));
    }


    public function office()
    {
        $locale = App::getLocale();
        $slug = ltrim(request()->path(), '/');
        $data = Page::where('layout', 'office')
            ->when($locale == 'en', function ($query) use ($locale,$slug) {
                return $query->where('slug', $slug);
            })->first()->blocks;

        $footer = Page::where('layout', 'art')
            ->when($locale == 'en', function ($query) use ($locale) {
                return $query->where('slug', 'footer-' . $locale);
            }, function ($query) {
                return $query->where('slug', 'footer-tr');
            })
            ->first()
            ->blocks;

        return view('ofis',compact('data', 'footer'));
    }

    public function magazines()
    {
        $locale = App::getLocale();
        $slug = ltrim(request()->path(), '/');
        $data = Page::where('layout', 'magazines')
            ->when($locale == 'en', function ($query) use ($locale,$slug) {
                return $query->where('slug',$slug);
            })->first()->blocks;

        $footer = Page::where('layout', 'art')
            ->when($locale == 'en', function ($query) use ($locale) {
                return $query->where('slug', 'footer-' . $locale);
            }, function ($query) {
                return $query->where('slug', 'footer-tr');
            })
            ->first()
            ->blocks;
        return view('dergiler',compact('data', 'footer'));
    }

    public function page()
    {
        dd('Page Not Found');
        $locale = App::getLocale();

        $slug = ltrim(request()->path(), '/');
        $data = Page::where('slug', $slug)
            ->when($locale == 'en', function ($query) use ($locale,$slug) {
                return $query->where('slug',$slug);
            })->first()->blocks;

        $footer = Page::where('layout', 'art')
            ->when($locale == 'en', function ($query) use ($locale) {
                return $query->where('slug', 'footer-' . $locale);
            }, function ($query) {
                return $query->where('slug', 'footer-tr');
            })
            ->first()
            ->blocks;
        return view('page',compact('data', 'footer'));
    }
}
