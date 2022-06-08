@extends('frontend.layout.app')
@section('content')
    @include('backend.layout.alert')
    <div class="container overflow-hidden">
        <div class="py-2 border-top">
                    <div class="js-slick-carousel u-slick my-1"
                         data-slides-show="1"
                         data-slides-scroll="1"
                         data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y"
                         data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9"
                         data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right"
                         data-responsive='[{
                        "breakpoint": 992,
                        "settings": {
                            "slidesToShow": 1
                        }
                    }, {
                        "breakpoint": 768,
                        "settings": {
                            "slidesToShow": 1
                        }
                    }, {
                        "breakpoint": 554,
                        "settings": {
                            "slidesToShow": 1
                        }
                    }]'>
                        @foreach($Slider as $item)
                        <div class="js-slide">
                            <a href="{{ $item->button_link }}">
                                <img class="img-fluid m-auto" src="{{ (!$item->getFirstMediaUrl('page')) ? '/frontend/resimyok.jpg': $item->getFirstMediaUrl('page')}}" alt="{{ config('app.name') }}" style="border-radius: 10px">
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
    </div>

    <div class="container">
        <div class="mb-5 mt-3">
            <div class="row">
                <div class="col-12">
                    <ul class="row list-unstyled products-group no-gutters">
                        @foreach($Product as $item)
                            <li class="col-6 col-md-4 product-item p-1">
                                <div class="js-slide products-group">
                                    <div class="product-item__outer h-100">
                                        <div class="product-item__inner px-xl-4 p-3 border border-width-1 border-purple borders-radius-5">
                                            <div class="product-item__body pb-xl-2">
                                                <h5 class="mb-1 product-item__title">
                                                    <a href="{{ ($item->external == null) ? route('urun', $item->slug) : route($item->external)}}" class="text-gray-60  font-weight-bold" title="{{ $item->title }}"> {{ $item->title }}</a>
                                                </h5>
                                                <div class="mb-2">
                                                    <a href="{{ ($item->external == null) ? route('urun', $item->slug) : route($item->external)}}" class="d-block text-center" title="{{ $item->title }}">
                                                        <img class="img-fluid" src="{{ (!$item->getFirstMediaUrl('page')) ? '/frontend/resimyok.jpg': $item->getFirstMediaUrl('page', 'thumb')}}" alt="{{ $item->title }}">
                                                    </a>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center mb-1 text-center">
                                                    <div class="prodcut-priceflex-wrap position-relative text-center">
                                                        <div class="text-center">
                                                            <ins class="font-size-20 text-black text-decoration-none mr-2 font-weight-bold text-center">
                                                                {{ money($item->price) }}₺
                                                                @if($item->old_price > 0) -
                                                                    <del class="font-size-1">
                                                                        {{ money($item->old_price) }}
                                                                    </del>
                                                              @endif
                                                            </ins>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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

{{--
    <div class="container">
        <div class="mb-5">
            <div class="row">
                <div class="col">
                    <ul class="row list-unstyled products-group no-gutters">
                        @foreach($Product->slice(6) as $item)
                            <li class="col-6 col-md-3 product-item p-1">
                                <div class="js-slide products-group">
                                    <div class="product-item__outer h-100">
                                        <div class="product-item__inner px-xl-4 p-3 border border-width-1 border-purple borders-radius-5">
                                            <div class="product-item__body pb-xl-2">
                                                <h5 class="mb-1 product-item__title">
                                                    <a href="{{ route('urun', $item->slug) }}" class="text-gray-60  font-weight-bold" title="{{ $item->title }}"> {{ $item->title }}</a>
                                                </h5>
                                                <div class="mb-2">
                                                    <a href="{{ route('urun', $item->slug) }}" class="d-block text-center" title="{{ $item->title }}">
                                                        <img class="img-fluid" src="{{ (!$item->getFirstMediaUrl('page')) ? '/frontend/resimyok.jpg': $item->getFirstMediaUrl('page', 'thumb')}}" alt="{{ $item->title }}">
                                                    </a>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center mb-1 text-center">
                                                    <div class="prodcut-priceflex-wrap position-relative text-center">
                                                        <div class="text-center">
                                                            <ins class="font-size-20 text-black text-decoration-none mr-2 font-weight-bold text-center">
                                                                {{ money($item->price) }}₺  @if($item->old_price > 0) -
                                                                <del class="font-size-1">
                                                                    {{ money($item->old_price) }}
                                                                </del>
                                                                @endif
                                                            </ins>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
--}}


@endsection

