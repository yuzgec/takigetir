@extends('frontend.layout.app')
@section('title', $Detay->title. '| '.config('app.name'))
@section('content')
    @include('backend.layout.alert')
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

    <div class="container ">
        <div class="mb-xl-5 mb-2">
            <div class="row">

                <div class="col-md-6 col-lg-3 col-xl-4 mb-4 mb-md-0">
                    <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2"
                         data-infinite="true"
                         data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                         data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                         data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                         data-nav-for="#sliderSyncingThumb">
                        <div class="js-slide">
                            <img src="{{ (!$Detay->getFirstMediaUrl('page')) ? '/backend/resimyok.jpg': $Detay->getFirstMediaUrl('page')}}"  class="img-fluid" alt="{{ $Detay->title }}">
                        </div>
                        @foreach($Detay->getMedia('gallery') as $item)
                            <div class="js-slide">
                                <img src="{{ $item->getUrl() }}"  class="img-fluid" alt="{{ $Detay->title }}">
                            </div>
                        @endforeach
                    </div>
                    <div id="sliderSyncingThumb"
                         class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                         data-infinite="true"
                         data-slides-show="3"
                         data-is-thumbs="true"
                         data-nav-for="#sliderSyncingNav">
                        <div class="js-slide" style="cursor: pointer;">
                            <img src="{{ (!$Detay->getFirstMediaUrl('page', 'small')) ? '/backend/resimyok.jpg': $Detay->getFirstMediaUrl('page','small')}}"  class="img-fluid" alt="{{ $Detay->title }}">
                        </div>
                        @foreach($Detay->getMedia('gallery') as $item)
                            <div class="js-slide" style="cursor: pointer;">
                                <img src="{{ $item->getUrl('small') }}"  class="img-fluid" alt="{{ $Detay->title }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mx-md-auto mx-lg-0 col-md-6 col-lg-4 col-xl-3">
                    <div class="mb-2">
                        <div class="card p-4 border-width-2 border-color-1 borders-radius-17">
                            <div class="text-gray-9 font-size-14 pb-2 border-color-1 border-bottom mb-3">
                                Stok Durumu: <span class="text-green font-weight-bold">Stokta Mevcut</span></div>
                            <div class="mb-3">
                                <h4><b>{{ $Detay->title }}</b></h4>

                                @if($Detay->old_price > 0)
                                    <div class="d-flex align-items-center">
                                        <del class="font-size-20">  {{ money($Detay->old_price) }}₺ -</del>
                                        @endif
                                        <div class="font-size-28 font-weight-bold">{{ money($Detay->price) }}₺</div>
                                    </div>
                                <p>{!!  $Detay->short !!}</p>

                            </div>
                            <span>
                                <i class="fa fa-eye"></i> Bugün <b>({{$Count}})</b> kişi baktı<br>
                                <i class="ec ec-transport mr-1"></i> Aynı gün kargoda<br>
                            </span>
                            @if(@auth()->user()->is_admin == 1)
                                <a href="{{ route('product.edit', $Detay->id) }}" target="_blank" class="btn btn-secondary text-white mt-2"><i class="fas fa-edit"></i> Ürün Düzenle</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 col-xl-5 mb-md-6 mb-lg-0">
                    <div class="mb-2">

                        <form action="{{ route('kaydet') }}" method="POST">
                            @csrf()
                            <input type="hidden" name="id" value="{{$Detay->id}}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="pb-2 mb-2">
                                        <div class="border-bottom border-color-1 mb-5">
                                            <h3 class="section-title mb-0 pb-2 font-size-25">Online Kayıt <b>Formu</b></h3>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="js-form-message mb-3">
                                                    <label class="form-label">
                                                        Adınız
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="{{old('name')}}" type="text" class="form-control  @if($errors->has('name')) is-invalid @endif" name="name" placeholder="Adınız" autocomplete="off">
                                                    @if($errors->has('name'))
                                                        <div class="invalid-feedback">{{$errors->first('name')}}</div>
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="js-form-message mb-3">
                                                    <label class="form-label">
                                                        Soyadınız
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="{{old('surname')}}" type="text" class="form-control @if($errors->has('surname')) is-invalid @endif" name="surname" placeholder="Soyadınız" autocomplete="off">
                                                    @if($errors->has('surname'))
                                                        <div class="invalid-feedback">{{$errors->first('surname')}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="w-100"></div>
                                            <div class="col-md-6">
                                                <div class="js-form-message mb-3">
                                                    <label class="form-label">
                                                        Email Adresiniz
                                                    </label>
                                                    <input value="{{old('email')}}" type="text" class="form-control @if($errors->has('email')) is-invalid @endif"  name="email" placeholder="Email. Zorunlu Değildir">
                                                    @if($errors->has('email'))
                                                        <div class="invalid-feedback">{{$errors->first('email')}}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="js-form-message mb-3">
                                                    <label class="form-label">
                                                        Telefon Numaranız <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="{{old('phone')}}" type="text" class="form-control @if($errors->has('phone')) is-invalid @endif" name="phone" placeholder="Telefon Numaranız">
                                                    @if($errors->has('phone'))
                                                        <div class="invalid-feedback">{{$errors->first('phone')}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="js-form-message mb-3">
                                                    <label class="form-label">
                                                        Açık Adresiniz<span class="text-danger">*</span>
                                                    </label>

                                                    <div class="input-group">
                                                        <textarea class="form-control p-5 @if($errors->has('address')) is-invalid @endif" rows="4" name="address" placeholder="Açık Adresinizi Yazınız">{{old('address')}}</textarea>
                                                        @if($errors->has('address'))
                                                            <div class="invalid-feedback">{{$errors->first('address')}}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        İl
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <select class="form-control @if($errors->has('province')) is-invalid @endif" name="province">
                                                        <option value="">İl Seçiniz</option>
                                                        @foreach($Province as $item)
                                                            <option value="{{ $item->sehir_title }}" {{ (old('province') == $item->sehir_title) ? 'selected' : null }} }}>{{ $item->sehir_title }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('province'))
                                                        <div class="invalid-feedback">{{$errors->first('province')}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="js-form-message mb-3">
                                                    <label class="form-label">
                                                        İlçe <span class="text-danger">*</span>
                                                    </label>
                                                    <input value="{{old('city')}}" type="text" class="form-control @if($errors->has('city')) is-invalid @endif"  name="city" placeholder="İlçe">
                                                    @if($errors->has('city'))
                                                        <div class="invalid-feedback">{{$errors->first('city')}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary-dark-w text-white btn-block btn-pill font-size-20 mb-3 py-3">
                                                {{ ($Detay->price == 0) ? 'KAMPANYAYA KATIL' : 'SİPARİŞİ TAMAMLA' }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                                <li class="col-6 col-md-3 product-item p-1">
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
                                                                    {{ money($item->price) }}₺ -
                                                                    <del class="font-size-1">
                                                                        {{ money($item->old_price) }}
                                                                    </del>
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

        <div class="pt-6 pb-3 mb-6 bg-gray-7">
            <div class="container">
                <div class="js-scroll-nav">
                    <div class="bg-white pt-4 pb-6 px-xl-11 px-md-5 px-4 mb-6">
                        <div id="Accessories" class="mx-md-2">
                            <div class="position-relative mb-6">
                                <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-lg-down-bottom-0 pb-1 pb-xl-0 mb-n1 mb-xl-0">
                                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                        <a class="nav-link active" href="#Aciklama">
                                            <div class="d-md-flex justify-content-md-center align-items-md-center">
                                                Ürün Açıklaması
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mx-md-2 pt-1">
                                <div class="row ">
                                    <div class="col mb-6 mb-md-0">
                                        {!! $Detay->desc !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
