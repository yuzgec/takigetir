@extends('frontend.layout.app')
@section('content')
    @include('backend.layout.alert')
    <div class="container overflow-hidden mt-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-img-hero overflow-hidden">
                    <div class="js-slick-carousel"
                         data-autoplay="true"
                         data-speed="5000"
                      >
                        @foreach($Slider as $item)
                        <div class="js-slide bg-img-hero-center">
                            <div class="" data-scs-animation-in="fadeIn">
                                <a href="{{$item->button_link}}" title="Taki Getir">
                                    <img src="{{ $item->getFirstMediaUrl('page') }}" class="img-fluid" alt="Taki Getir">
                                </a>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="mb-5 mt-3">
            <div class="row">
                <div class="col-12">
                    <ul class="row list-unstyled products-group no-gutters">
                        @foreach($Product as $item)
                            <li class="col-6 col-md-4 product-item mb-1">
                                <div class="js-slide products-group">
                                    <div class="product-item__outer h-100">
                                        <div class="product-item__inner px-xl-4 p-1">
                                            <div class="product-item__body ">
                                                <h5 class="mb-1 product-item__title">
                                                    <a href="{{ route('urun', $item->slug) }}" class="text-gray-60  font-weight-bold" title="{{ $item->title }}"> {{ $item->title }}</a>
                                                </h5>
                                                <div class="mb-2">
                                                    <a href="{{ route('urun', $item->slug) }}" class="d-block text-center" title="{{ $item->title }}">
                                                        <img class="img-fluid"
                                                             src="{{ (!$item->getFirstMediaUrl('page')) ? '/frontend/resimyok.jpg': $item->getFirstMediaUrl('page', 'thumb')}}"
                                                             alt="{{ $item->title }}"
                                                        >
                                                    </a>
                                                </div>

                                                <div class="flex-center-between">
                                                    <div class="prodcut-price">
                                                        <div class="text-gray-100"> <b>{{ money($item->price) }}₺</b>
                                                            @if($item->old_price > 0) -
                                                            <del class="font-size-1">
                                                                {{ money($item->old_price) }}
                                                            </del>
                                                            @endif</div>
                                                    </div>
                                                    @if($item->offer == 1)
                                                        <div class="font-size-1 badge badge-cyan text-white">KAMPANYA</div>
                                                    @endif
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

