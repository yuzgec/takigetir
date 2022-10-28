@extends('frontend.layout.app')
@section('title', $Detay->title.' | '.config('app.name'))
@section('content')

    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('home') }}">Anasayfa</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{ $Detay->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mb-8">
            <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                <div class="mb-6 border border-width-2 border-color-3 borders-radius-6">
                    <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all">
                        <li><div class="dropdown-title">ÜRÜN <b>KATEGORİLERİ</b></div></li>
                        @foreach($Product_Categories as $item)
                            <a class="ml-2 p-2" href="{{ route('kategori', $item->slug)}}"><i class="fa fa-angle-right"></i> {{ $item->title }}
                                <span class="text-gray-25 font-size-12 font-weight-normal"> ({{ $item->cat()->count() }})</span>
                            </a>
                        @endforeach
                    </ul>
                </div>

                <div class="mb-8">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">En Çok Satılan Ürünler</h3>
                    </div>
                    <ul class="list-unstyled">

                        @foreach($Product->where('bestselling', 1) as $item)
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="{{ route('urun', $item->slug) }}" title="{{ $item->title }}" class="d-block width-75">
                                            <img class="img-fluid" src="{{ (!$item->getFirstMediaUrl('page')) ? '/frontend/resimyok.jpg': $item->getFirstMediaUrl('page', 'small')}}" alt="{{ $item->title }}">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0">
                                            <a href="{{ route('urun', $item->slug) }}" title="{{ $item->title }}">{{ $item->title }}</a>
                                        </h3>

                                        <div class="font-weight-bold">
                                            <del class="font-size-13 text-gray-9 d-block"> {{ money($item->old_price)}}₺</del>
                                            <ins class="font-size-18 text-red text-decoration-none d-block">{{ money($item->price)}}₺</ins>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-wd-9gdot5">
                <div class="bg-gray-1 flex-center-between borders-radius-9 py-1">
                    <div class="d-xl-none">
                        <a id="sidebarNavToggler1" class="btn btn-sm py-1 font-weight-normal" href="javascript:;" role="button"
                           aria-controls="sidebarContent1"
                           aria-haspopup="true"
                           aria-expanded="false"
                           data-unfold-event="click"
                           data-unfold-hide-on-scroll="false"
                           data-unfold-target="#sidebarContent1"
                           data-unfold-type="css-animation"
                           data-unfold-animation-in="fadeInLeft"
                           data-unfold-animation-out="fadeOutLeft"
                           data-unfold-duration="500">
                            <i class="fas fa-sliders-h"></i> <span class="ml-1">Filtrele</span>
                        </a>
                    </div>

                    <div class="px-3 d-none d-xl-block">
                        <p class="font-size-14 text-gray-90 mb-0"><b>{{$ProductList->total()}}</b> adet ürün listelendi</p>
                    </div>
                    <div class="d-flex">
                        <form method="get">
                            <select class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                                <option value="" selected>Sıralama</option>
                                <option value="two">Artan Fiyata Göre Sırala</option>
                                <option value="three">Azalan Fiyata Göre Sırala</option>
                                <option value="four">Son Ekleme Tarihine Göre Sırala</option>
                            </select>
                        </form>
                        <form method="POST" class="ml-2 d-none d-xl-block">
                            <select class="js-select selectpicker dropdown-select max-width-200"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                                <option value="one" selected>20 Ürün Göster</option>
                                <option value="two">40 Ürün Göster</option>
                                <option value="three">Hepsini Göster</option>
                            </select>
                        </form>
                    </div>
                    <nav class="px-3 flex-horizontal-center text-gray-20 d-none d-xl-flex align-items-center align-items-center">
                        <div class="pt-3">
                            {{ $ProductList->appends(['sirala' => 'urun'])->links() }}
                        </div>
                    </nav>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                        <ul class="row list-unstyled products-group no-gutters">
                            @foreach($ProductList as $item)
                                <li class="col-6 col-md-4 product-item">
                                    <div class="product-item__outer h-100">
                                        <div class="product-item__inner px-xl-4 p-3 border border-width-1 border-purple borders-radius-5">
                                            <div class="product-item__body pb-xl-2">
                                                <h5 class="mb-1 product-item__title">
                                                    <a href="{{ route('urun', $item->slug) }}" class="text-gray-60 font-weight-bold" title="{{ $item->title }}"> {{ $item->title }}</a>
                                                </h5>
                                                <div class="mb-2">
                                                    <a href="{{ route('urun', $item->slug) }}" class="d-block text-center" title="{{ $item->title }}">
                                                        <img class="img-fluid" src="{{ (!$item->getFirstMediaUrl('page')) ? '/frontend/resimyok.jpg': $item->getFirstMediaUrl('page','thumb')}}" alt="{{ $item->title }}">
                                                    </a>
                                                </div>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price d-flex align-items-center flex-wrap position-relative">
                                                        <ins class="font-size-20 text-black text-decoration-none mr-2 font-weight-bold">{{ money($item->price) }}₺
                                                            @if($item->old_price > 0) -
                                                            <del class="font-size-1">
                                                                {{ money($item->old_price) }}
                                                            </del>
                                                            @endif
                                                        </ins>
                                                    </div>
                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        <a href="{{ route('urun', $item->slug) }}" class="btn px-2 btn-sm transition-3d-hover">
                                                            <i class="ec ec-add-to-cart mr-2 font-size-16"></i> İncele
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="d-flex justify-content-center align-items-center text-center">
                            {{ $ProductList->appends(['sirala' => 'urun'])->links() }}
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>


    <aside id="sidebarContent1" class="u-sidebar u-sidebar--left" aria-labelledby="sidebarNavToggler1">
        <div class="u-sidebar__scroller">
            <div class="u-sidebar__container">
                <div class="">

                    <div class="d-flex align-items-center pt-3 px-4 bg-white">
                        <button type="button" class="close ml-auto"
                                aria-controls="sidebarContent1"
                                aria-haspopup="true"
                                aria-expanded="false"
                                data-unfold-event="click"
                                data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent1"
                                data-unfold-type="css-animation"
                                data-unfold-animation-in="fadeInLeft"
                                data-unfold-animation-out="fadeOutLeft"
                                data-unfold-duration="500">
                            <span aria-hidden="true"><i class="ec ec-close-remove"></i></span>
                        </button>
                    </div>

                    <div class="js-scrollbar u-sidebar__body">
                        <div class="u-sidebar__content u-header-sidebar__content px-4">
                            <div class="mb-6 border border-width-2 border-color-3 borders-radius-6">
                                <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all">
                                    <li><div class="dropdown-title">ÜRÜN <b>KATEGORİLERİ</b></div></li>
                                    @foreach($Product_Categories as $item)
                                        <a class="ml-2 p-2" href="{{ route('kategori', $item->slug)}}"><i class="fa fa-angle-right"></i> {{ $item->title }}
                                            <span class="text-gray-25 font-size-12 font-weight-normal"> ({{ $item->cat()->count() }})</span>
                                        </a>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mb-6">
                                <div class="border-bottom border-color-1 mb-5">
                                    <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">En Çok Satılanlar</h3>
                                </div>
                                <ul class="list-unstyled">
                                    @foreach($Product->where('bestselling', 1) as $item)
                                        <li class="mb-4">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <a href="{{ route('urun', $item->slug) }}" title="{{ $item->title }}" class="d-block width-75">
                                                        <img class="img-fluid" src="{{ (!$item->getFirstMediaUrl('page')) ? '/frontend/resimyok.jpg': $item->getFirstMediaUrl('page', 'small')}}" alt="{{ $item->title }}">
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <h3 class="text-lh-1dot2 font-size-14 mb-0">
                                                        <a href="{{ route('urun', $item->slug) }}" title="{{ $item->title }}">{{ $item->title }}</a>
                                                    </h3>
                                                    <div class="font-weight-bold">
                                                        <del class="font-size-13 text-gray-9 d-block"> {{ money($item->old_price)}}₺</del>
                                                        <ins class="font-size-18 text-red text-decoration-none d-block">{{ money($item->price)}}₺</ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
@endsection
