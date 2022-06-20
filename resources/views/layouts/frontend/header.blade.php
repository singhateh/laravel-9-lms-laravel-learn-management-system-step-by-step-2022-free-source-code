<header id="header-part">

    <div class="header-top d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="header-contact text-lg-left text-center">
                        <ul>
                            <li><img src="{{ asset('jambasangsang/frontend/images/all-icon/map.png') }}"
                                    alt="icon"><span>{{ Config::get('settings.address') }}</span></li>
                            <li><img src="{{ asset('jambasangsang/frontend/images/all-icon/email.png') }}"
                                    alt="icon"><span>{{ Config::get('settings.contact_email') }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="header-opening-time text-lg-right text-center">
                        <p>@lang('Opening Hours : Monday to Saturay - 8 Am to 5 Pm')</p>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header top -->

    <div class="header-logo-support pt-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="logo">
                        <a href="/">
                            <img src="{{ Config::get('settings.logo') }}" width="80" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="support-button float-right d-none d-md-block">
                        <div class="support float-left">
                            <div class="icon">
                                <img src="{{ asset('jambasangsang/frontend/images/all-icon/support.png') }}"
                                    alt="icon">
                            </div>
                            <div class="cont">
                                <p>@lang('Need Help? call us free')</p>
                                <span>{{ Config::get('settings.phone') }}</span>
                            </div>
                        </div>
                        @guest
                            <div class="button float-left">
                                <a href="#globalloginModal" data-toggle="modal" class="main-btn">@lang('Login Now')</a>
                            </div>
                        @endguest

                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header logo support -->

    <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 col-8">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="{{ is_active('/') }}" href="{{ url('/') }}">@lang('Home')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="{{ is_active('aboutUs.*') }}"
                                        href="{{ route('aboutUs.index') }}">@lang('About us')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="{{ is_active('Courses.*') }}  {{ is_active('Categories.*') }}"
                                        href="{{ route('Courses.index') }}">@lang('Courses')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="{{ is_active('Events.*') }}"
                                        href="{{ route('Events.index') }}">@lang('Events')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="{{ is_active('teachers.*') }}"
                                        href="{{ route('teachers.index') }}">@lang('Our teachers')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="{{ is_active('contactUs.*') }}"
                                        href="{{ route('contactUs.index') }}">@lang('Contact')</a>
                                </li>
                            </ul>
                        </div>
                    </nav> <!-- nav -->
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-4">
                    <div class="right-icon text-right">
                        <ul>
                            <li><a href="#" id="search"><i class="fa fa-search"></i></a></li>
                            <li><a href="#" data-toggle="modal" data-target="#globalloginModal"><i
                                        class="fa fa-shopping-bag"></i><span>0</span></a></li>
                            @auth
                                <li><a href="{{ route('home') }}"><i class="fa fa-user"></i>
                                        @lang('Account')</a></li>
                            @endauth
                            @guest
                                <li><a href="#" data-toggle="modal" data-target="#globalloginModal"><i
                                            class="fa fa-signin"></i>
                                        @lang('Login')</a></li>
                            @endguest
                        </ul>
                    </div> <!-- right icon -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>

</header>

@livewire('global-login')
