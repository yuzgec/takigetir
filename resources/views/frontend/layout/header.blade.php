<header id="header" class="u-header u-header-left-aligned-nav">
    <div class="u-header__section">
        <div class="u-header-topbar py-2 d-none d-xl-block">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="topbar-left">
                        <a class="text-gray-110 font-size-14 u-header-topbar__nav-link"><b>Takı Getir</b> Online Satış Sitesi</a>
                    </div>
                    <div class="topbar-right ml-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                <a href="#" class="u-header-topbar__nav-link"><i class="ec ec-home mr-1"></i> Hakkımızda</a>
                            </li>
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                <a href="tel:{{ config('settings.telefon1') }}" class="u-header-topbar__nav-link"><i class="ec ec-phone mr-1"></i>
                                    {{ config('settings.telefon1') }}</a>
                            </li>
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                <a href="{{ route('iletisim') }}" class="u-header-topbar__nav-link">
                                    <i class="ec ec-map-pointer mr-1"></i> İletişim
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-2 py-xl-3">
            <div class="container my-0dot5 my-xl-0">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <nav class="navbar navbar-expand u-header__navbar py-0 justify-content-xl-between">
                            <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center" href="{{ route('home') }}" aria-label="{{ config('app.name') }}">
                                <img src="/frontend/assets/img/logo1.png" alt="{{ config('app.name') }}" class="img-fluid" style="width: 100px">
                            </a>
                            <button id="sidebarHeaderInvokerMenu"
                                    type="button"
                                    class="navbar-toggler d-block btn u-hamburger mr-3 mr-xl-0 d-xl-none "
                                    aria-controls="sidebarHeader"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    data-unfold-event="click"
                                    data-unfold-hide-on-scroll="false"
                                    data-unfold-target="#sidebarHeader1"
                                    data-unfold-type="css-animation"
                                    data-unfold-animation-in="fadeInLeft"
                                    data-unfold-animation-out="fadeOutLeft"
                                    data-unfold-duration="500">
                                    <span id="hamburgerTriggerMenu" class="u-hamburger__box">
                                        <span class="u-hamburger__inner"></span>
                                    </span>
                            </button>
                        </nav>
                        @include('frontend.layout.mobile-menu')
                    </div>

                    <div class="col d-none d-xl-block">
                        <form action="{{ route('search') }}" method="GET" class="js-focus-state">
                            <label class="sr-only" for="searchproduct">Arama</label>
                            <div class="input-group">

                                <input type="text" class="form-control py-2 pl-5 font-size-15 border-right-0
                                height-40 border-width-2 rounded-left-pill border-primary  @if($errors->has('q')) is-invalid @endif"
                                       name="q"
                                       id="searchproduct-item"
                                       placeholder="Ürün adı ve Ürün Kodu Giriniz"
                                       aria-label="Ürün adı ve Ürün Kodu Giriniz"
                                >

                                <div class="input-group-append">
                                    <select class="js-select selectpicker dropdown-select custom-search-categories-select"
                                            data-style="btn height-40 text-gray-60 font-weight-normal border-top border-bottom border-left-0 rounded-0 border-primary border-width-2 pl-0 pr-5 py-2">
                                        <option value="" selected>Tüm Kategoriler</option>
                                        @foreach($Product_Categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-primary height-40 py-2 px-3 rounded-right-pill" type="submit" id="searchProduct1">
                                        <span class="ec ec-search font-size-24"></span>
                                    </button>
                                </div>
                                @if($errors->has('q'))
                                    <div class="invalid-feedback text-center align-items-center">{{$errors->first('q')}}</div>
                                @endif
                            </div>
                        </form>

                       {{-- <div class="d-flex justify-content-center align-items-center mt-1">
                            <span class="mr-2">
                                <i class="text-black ec ec-transport font-size-20"></i> Aynı Gün Kargo
                            </span>
                            <span class="mr-2">
                                <i class="text-black ec ec-payment font-size-20"></i> Kapıda Ödeme Kolaylığı
                            </span>
                            <span>
                                <i class="fa fa-life-ring font-size-14" aria-hidden="true"></i> Güvenli Alışveriş
                            </span>
                        </div>--}}
                    </div>

                    <div class="col col-xl-auto text-right text-xl-left pl-0 pl-xl-3 position-static">
                        <div class="d-inline-flex">
                            <ul class="d-flex list-unstyled mb-0 align-items-center">
                                <li class="col d-xl-none px-2 px-sm-3 position-static">
                                    <a id="searchClassicInvoker" class="font-size-22 text-gray-90 text-lh-1 btn-text-secondary" href="javascript:;" role="button"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="Search"
                                       aria-controls="searchClassic"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       data-unfold-target="#searchClassic"
                                       data-unfold-type="css-animation"
                                       data-unfold-duration="300"
                                       data-unfold-delay="300"
                                       data-unfold-hide-on-scroll="true"
                                       data-unfold-animation-in="slideInUp"
                                       data-unfold-animation-out="fadeOut">
                                        <span class="ec ec-search"></span>
                                    </a>
                                    <div id="searchClassic" class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2" aria-labelledby="searchClassicInvoker">
                                        <form class="js-focus-state input-group px-3">
                                            <input class="form-control" type="search" placeholder="Ürün adı ve Ürün Kodu Giriniz">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary px-3" type="button"><i class="font-size-18 ec ec-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="col d-none d-xl-block">
                                    <a href="{{ route('sepet') }}" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Favori">
                                        <i class="font-size-22 ec ec-favorites"></i>
                                    </a>
                                </li>
                                <li class="col px-2 px-sm-3">
                                    <a href="{{ route('login') }}" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="{{ (auth()->user()) ? auth()->user()->name :  'Giriş Yap' }}">
                                        <i class="font-size-22 ec ec-user"></i>
                                    </a>
                                </li>
                                @livewire('front.header-count')
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="d-none d-xl-block bg-primary ">
            <div class="container">
                <div class="min-height-37 ">
                    <nav class=" navbar navbar-expand-md u-header__navbar u-header__navbar--wide u-header__navbar--no-space">
                        <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                            <ul class="navbar-nav u-header__navbar-nav  justify-content-center">
                                <li class="nav-item  u-header__nav-item ml-4">
                                    <a class="nav-link u-header__nav-link u-header__nav-link-toggle"
                                       href="{{ route('home')}}"
                                       aria-haspopup="true" aria-expanded="false">Anasayfa
                                    </a>
                                </li>
                                @foreach($Product_Categories as $item)
                                    <li class="nav-item hs-has-mega-menu u-header__nav-item ">
                                        <a class="nav-link u-header__nav-link u-header__nav-link-toggle" href="{{ route('kategori', $item->slug) }}">
                                            <div  class=" justify-content-center">
                                                {{ $item->title }}
                                            </div>
                                        </a>
                                    </li>
                                @endforeach

                                <li class="nav-item hs-has-mega-menu u-header__nav-item" style="background: #000">
                                    <a class="nav-link u-header__nav-link text-white" href="{{ route('kargosorgulama') }}" >
                                        <i class="text-black ec ec-transport font-size-30 text-white" ></i> Kargo Sorgulama</a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </div>
</header>
