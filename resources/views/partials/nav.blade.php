<nav
    class="header navbar navbar-expand-lg navbar-light bg-light px-lg-5 px-2 py-0">
    <div class="container header-container">
        @php
                use Datlechin\FilamentMenuBuilder\Models\Menu;
                $locale = App::getLocale();
                $menu_location = 'header_' . $locale;
                $web_menu = Menu::location($menu_location);
                $settings = \Joaopaulolndev\FilamentGeneralSettings\Models\GeneralSetting::find(1);
                    $homeUrl = ($locale == 'en') ? '/en' : '/';

        @endphp
        <a class="navbar-brand" href="{{ $homeUrl }}"
        ><img src="{{ asset('storage/' . $settings['site_logo']) }}" alt="" />
        </a>
        <div class="navbar-location">
            <a href="#location">
              <span class="navbar-location-icon me-3">
                <i class="fa-solid fa-location-dot"></i>
              </span>
                <span class="navbar-location-span">{{ trans('page.how_to_get') }} </span>
            </a>
        </div>
        <!-- mobil header start  -->
        <button
            class="navbar-toggler mobil-header-toggle"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample"
            aria-controls="offcanvasExample"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span
                class="navbar-toggler-icon me-3"
                style="color: #fff !important"></span>
        </button>
        <div
            class="offcanvas offcanvas-start mobil-header-menu w-100"
            tabindex="-1"
            id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div
                class="offcanvas-header"
                style="border-bottom: 2px solid #732031">
                <img src="{{asset('img/logo.png')}}" alt="" />
                <button
                    type="button"
                    class="btn-close mobil-header-close-btn"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="mobil-menu-list">
                    @foreach($web_menu->menuItems as $item)
                        <li class="mobil-menu-item">
                                <?php
                                $urlParts = parse_url($item->url);
                                $path = $urlParts['path'] ?? '/';
                                $segments = explode('/', ltrim($path, '/'));
                                if (in_array($segments[0], ['en', 'tr'])) {
                                    array_shift($segments);
                                }
                                $newPath = implode('/', $segments);
                                if ($locale) {
                                    if ($locale === 'en') {
                                        $newPath = $locale . '/' . $newPath;
                                    }
                                }
                                $finalUrl = url($newPath);
                                ?>
                            <a class="nav-mobil-link" href="{{ $finalUrl }}">{{ $item->title }}</a>
                        </li>
                    @endforeach

{{--                    <li class="mobil-menu-item">--}}
{{--                        <a href="en/events" class="languageFirs">--}}
{{--                            EN </a>--}}
{{--                    </li>--}}

                    <li class="mobil-menu-item">
                        @if (App::getLocale() == 'en')
                            <a href="{{ route('setlocale', ['locale' => 'tr']) }}" class="languageFirs">
                                TR
                            </a>
                        @else
                            <a href="{{ route('setlocale', ['locale' => 'en']) }}" class="languageFirs">
                                EN
                            </a>
                        @endif
                    </li>
                </ul>
                </li>
                </ul>
                <div>
                    <div class="navbar-location-mobile mt-3">
                        <a href="#location">
                    <span class="navbar-location-icon me-3">
                      <i class="fa-solid fa-location-dot"></i>
                    </span>
                            <span class="navbar-location-span">{{ trans('page.how_to_get') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobil header finish  -->
        <div
            class="collapse navbar-collapse justify-content-end"
            id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 text-center">
                @foreach($web_menu->menuItems as $item)
                    <li class="nav-item">
                        <?php
                            $urlParts = parse_url($item->url);
                            $path = $urlParts['path'] ?? '/';
                            $segments = explode('/', ltrim($path, '/'));
                            if (in_array($segments[0], ['en', 'tr'])) {
                                array_shift($segments);
                            }
                            $newPath = implode('/', $segments);
                            if ($locale) {
                                if ($locale === 'en') {
                                    $newPath = $locale . '/' . $newPath;
                                }
                            }
                            $finalUrl = url($newPath);
                            ?>
                        <a class="nav-link" href="{{ $finalUrl }}">{{ $item->title }}</a>
                    </li>
                @endforeach

                <li class="nav-item language">
                    @if (App::getLocale() == 'en')
                        <a href="{{ route('setlocale', ['locale' => 'tr']) }}" class="languageFirs">
                            TR
                            <span class="ps-2"
                            ><i class="fa-solid fa-angle-down"></i></span
                            ></a>
                    @else
                        <a href="{{ route('setlocale', ['locale' => 'en']) }}" class="languageFirs">
                            EN
                            <span class="ps-2"
                            ><i class="fa-solid fa-angle-down"></i></span
                            ></a>
                    @endif



                </li>
            </ul>
        </div>
    </div>
</nav>
