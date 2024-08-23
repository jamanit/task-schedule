<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('/') }}assets/images/application/logo.jpg" alt="" width="45">
                        <h2 class="brand-text mb-0">{{ config('app.name', 'TITLE') }}</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                            data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>

        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

                @foreach ($menu_byidlevel as $firstmenu)
                    {{-- first menu --}}
                    @if (empty($firstmenu['children']))
                        <li data-menu="" class="@if (Request::is($firstmenu['link']) || Request::is($firstmenu['link'] . '/*')) active @endif">
                            <a href="{{ url($firstmenu['link']) }}" data-i18n="{{ $firstmenu['name'] }}"><i class="{{ $firstmenu['icon'] }}"></i>{{ $firstmenu['name'] }}</a>
                        </li>
                    @else
                        <li class="dropdown nav-item" data-menu="dropdown">
                            <a class="dropdown-toggle nav-link" href="{{ url($firstmenu['link']) }}" data-toggle="dropdown"><i class="{{ $firstmenu['icon'] }}"></i><span data-i18n="{{ $firstmenu['name'] }}">{{ $firstmenu['name'] }}</span></a>
                            <ul class="dropdown-menu">
                                {{-- second menu --}}
                                @foreach ($firstmenu['children'] as $secondmenu)
                                    @if (empty($secondmenu['children']))
                                        <li data-menu="" class="@if (Request::is($secondmenu['link']) || Request::is($secondmenu['link'] . '/*')) active @endif">
                                            <a class="dropdown-item" href="{{ url($secondmenu['link']) }}" data-toggle="dropdown" data-i18n="{{ $secondmenu['name'] }}"><i class="{{ $secondmenu['icon'] }}"></i>{{ $secondmenu['name'] }}</a>
                                        </li>
                                    @else
                                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle" href="{{ url($secondmenu['link']) }}" data-toggle="dropdown" data-i18n="{{ $secondmenu['name'] }}"><i class="{{ $secondmenu['icon'] }}"></i>{{ $secondmenu['name'] }}</a>
                                            <ul class="dropdown-menu">
                                                {{-- third menu --}}
                                                @foreach ($secondmenu['children'] as $thirdmenu)
                                                    @if (empty($thirdmenu['children']))
                                                        <li data-menu="" class="@if (Request::is($thirdmenu['link']) || Request::is($thirdmenu['link'] . '/*')) active @endif">
                                                            <a class="dropdown-item" href="{{ url($thirdmenu['link']) }}" data-toggle="dropdown" data-i18n="{{ $thirdmenu['name'] }}"><i class="{{ $thirdmenu['icon'] }}"></i>{{ $thirdmenu['name'] }}</a>
                                                        </li>
                                                    @else
                                                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu">
                                                            <a class="dropdown-item dropdown-toggle" href="{{ url($thirdmenu['link']) }}" data-toggle="dropdown" data-i18n="{{ $thirdmenu['name'] }}"><i class="{{ $thirdmenu['icon'] }}"></i>{{ $thirdmenu['name'] }}</a>
                                                            <ul class="dropdown-menu">
                                                                {{-- fourth menu --}}
                                                                @foreach ($thirdmenu['children'] as $fourthmenu)
                                                                    @if (empty($fourthmenu['children']))
                                                                        <li data-menu="" class="@if (Request::is($thirdmenu['link']) || Request::is($thirdmenu['link'] . '/*')) active @endif">
                                                                            <a class="dropdown-item" href="{{ url($fourthmenu['link']) }}" data-toggle="dropdown" data-i18n="{{ $fourthmenu['name'] }}"><i class="{{ $fourthmenu['icon'] }}"></i>{{ $fourthmenu['name'] }}</a>
                                                                        </li>
                                                                    @else
                                                                        {{-- end menu --}}
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>

    </div>
</div>
