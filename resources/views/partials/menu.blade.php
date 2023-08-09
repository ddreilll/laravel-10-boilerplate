<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar bg-white">
            <div class="container-xl">
                <ul class="navbar-nav">
                    @isset($navigation)
                        @foreach ($navigation as $section)
                            <li class="nav-item {{ sizeOf($section['children']) >= 1 ? 'dropdown' : '' }}">
                                <a class="nav-link {{ sizeOf($section['children']) >= 1 ? 'dropdown-toggle' : '' }}"
                                    href="{{ $section['url'] }}"
                                    @if (sizeOf($section['children']) >= 1) data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" @endif>
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <i class="{{ $section['icon_class'] }}"></i>
                                    </span>
                                    <span class="nav-link-title">
                                        {{ $section['title'] }}
                                    </span>
                                </a>

                                @if (sizeOf($section['children']) >= 1)
                                    <div class="dropdown-menu">
                                        <div class="dropdown-menu-columns">
                                            <div class="dropdown-menu-column">
                                                @foreach ($section['children'] as $menu)
                                                    @if (sizeOf($menu['children']) >= 1)
                                                        <div class="dropend">
                                                            <a class="dropdown-item dropdown-toggle"
                                                                href="{{ $menu['url'] }}" data-bs-toggle="dropdown"
                                                                data-bs-auto-close="outside" role="button"
                                                                aria-expanded="false">
                                                                {{ $menu['title'] }}
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                @foreach ($menu['children'] as $sub_menu)
                                                                    <a href="{{ $sub_menu['url'] }}" class="dropdown-item">
                                                                        {{ $sub_menu['title'] }}
                                                                    </a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @else
                                                        <a class="dropdown-item" href="{{ $menu['url'] }}">
                                                            {{ $menu['title'] }}
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                @endif
                            </li>
                        @endforeach
                    @endisset
                </ul>
                {{-- <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                    <form action="./" method="get" autocomplete="off" novalidate>
                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                    <path d="M21 21l-6 -6" />
                                </svg>
                            </span>
                            <input type="text" value="" class="form-control" placeholder="Search…"
                                aria-label="Search in website">
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
</header>
