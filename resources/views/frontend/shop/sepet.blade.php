@extends('frontend.layout.app')
@section('title', 'Sepetim  | '.config('app.name'))
@section('content')
    @include('backend.layout.alert')

    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('home') }}">Anasayfa</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Sepetim</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
{{--

        @if(Cart::total() > CARGO_LIMIT)
            <div class="bg-gray-7 mb-6 py-7">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-lg-3 col-wd-2">
                            <div class="max-width-244">
                                <div class="d-flex border-bottom border-color-1 mb-3">
                                    <h3 class="section-title mb-0 pb-2 font-size-22">Haftanın <b>İndirimli</b> Ürünleri</h3>
                                </div>
                                <div class="mb-3 mb-md-2 text-center text-md-left">
                                    <h6 class="text-gray-2 mb-2">Sepetiniz 50₺ geçtiği için aşağıdaki ürünleri %70'e varan indirim ile alabilirsiniz</h6>
                                    <div class="js-countdown d-flex mx-n2 justify-content-center justify-content-md-start"
                                         data-end-date="{{ \Carbon\Carbon::tomorrow()->toDateString() }}"
                                         data-hours-format="%H"
                                         data-minutes-format="%M"
                                         data-seconds-format="%S">
                                        <div class="text-lh-1 px-2 text-center">
                                            <div class="bg-white rounded-sm border border-width-2 border-primary py-2 px-2 min-width-46">
                                                <div class="text-gray-2 font-size-20 mb-2">
                                                    <span class="js-cd-hours"></span>
                                                </div>
                                                <div class="text-gray-2 font-size-8 text-center">SAAT</div>
                                            </div>
                                        </div>
                                        <div class="text-lh-1 px-2 text-center">
                                            <div class="bg-white rounded-sm border border-width-2 border-primary py-2 px-2 min-width-46">
                                                <div class="text-gray-2 font-size-20 mb-2">
                                                    <span class="js-cd-minutes"></span>
                                                </div>
                                                <div class="text-gray-2 font-size-8 text-center">DAKİKA</div>
                                            </div>
                                        </div>
                                        <div class="text-lh-1 px-2 text-center">
                                            <div class="bg-white rounded-sm border border-width-2 border-primary py-2 px-2 min-width-46">
                                                <div class="text-gray-2 font-size-20 mb-2">
                                                    <span class="js-cd-seconds"></span>
                                                </div>
                                                <div class="text-gray-2 font-size-8 text-center">SANİYE</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-9 col-wd-10">
                            <div class="">
                                <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-5 pt-2 px-1"
                                     data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 pt-1"
                                     data-slides-show="5"
                                     data-slides-scroll="1"
                                     data-responsive='[{
                                      "breakpoint": 1400,
                                      "settings": {
                                        "slidesToShow": 4
                                      }
                                    }, {
                                        "breakpoint": 1200,
                                        "settings": {
                                          "slidesToShow": 3
                                        }
                                    }, {
                                      "breakpoint": 992,
                                      "settings": {
                                        "slidesToShow": 2
                                      }
                                    }, {
                                      "breakpoint": 768,
                                      "settings": {
                                        "slidesToShow": 4
                                      }
                                    }, {
                                      "breakpoint": 554,
                                      "settings": {
                                        "slidesToShow": 4
                                      }
                                    }]'>
                                    @foreach($Products->whereNotNull('campagin_price') as $item)
                                        <div class="js-slide products-group">
                                            <div class="product-item__outer h-100">
                                                <div class="product-item__inner px-xl-4 p-3">
                                                    <div class="product-item__body pb-xl-2">
                                                        <h5 class="mb-1 product-item__title">
                                                            <a href="{{ route('urun', $item->slug) }}" class="text-blue font-weight-bold" title="{{ $item->title }}"> </a>
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
                                                                        {{ money($item->campagin_price) }}₺ -
                                                                        <del class="font-size-1">
                                                                            {{ money($item->price) }}
                                                                        </del>
                                                                    </ins>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
--}}

        <div class="mb-10 cart-table">
             <table class="table" cellspacing="0">
                <thead>
                <tr>
                    <th class="product-remove">&nbsp;</th>
                    <th class="product-thumbnail">&nbsp;</th>
                    <th class="product-name">Ürün</th>
                    <th class="product-price">Fiyat</th>
                    <th class="product-quantity w-lg-15">Adet</th>
                    <th class="product-subtotal">Toplam</th>
                </tr>
                </thead>
                <tbody>
                    @foreach(Cart::content() as $cart)
                    <tr class="mb-1" style="border:1px solid gray;border-radius:5px">
                        <td class="text-center">
                            <form action="{{ route('sepetcikar', $cart->rowId) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger text-white-size-16">Sepetten Çıkar</button>
                            </form>
                        </td>
                        <td class="d-none d-md-table-cell">
                            <a href="{{ route('urun', seo($cart->name)) }}">
                                <img class="img-fluid max-width-100 p-1 border border-color-1" src="{{ $cart->options->image }}" alt="{{ $cart->name }}">
                            </a>
                        </td>
                        <td data-title="Ürün Adı">
                            <a href="{{ route('urun', seo($cart->name)) }}" class="text-gray-90">{{ $cart->name }}</a>
                        </td>
                        <td data-title="Fiyat">
                            <span class="">{{ money($cart->price)}}₺</span>
                        </td>

                        <td data-title="Adet">
                            <span class="sr-only">Adet</span>
                            <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="text" value="{{ $cart->qty }}">
                                    </div>
                                    <div class="col-auto pr-1">
                                        <form action="{{ route('sepeteekle') }}" method="POST">
                                            <input  type="hidden" name="id" value="{{ $cart->id }}">
                                            <input  type="hidden" name="update" value="1">
                                            <input  type="hidden" name="qty" value="1">
                                            @csrf
                                            <button class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" type="submit">
                                                <small class="fas fa-plus btn-icon__inner"></small>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td data-title="Total">
                            <span class="">{{ money($cart->price * $cart->qty) }}₺</span>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6" class="border-top space-top-2 justify-content-center">
                            <div class="pt-md-3">
                                <div class="d-block d-md-flex flex-center-between">
                                    <div class="mb-3 mb-md-0 w-xl-40">
                                        <form class="js-focus-state">
                                            <label class="sr-only" for="subscribeSrEmailExample1">Kupon Kodu</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="text" id="subscribeSrEmailExample1" placeholder="Varsa Kupon Kodunuz" aria-label="Coupon code" aria-describedby="subscribeButtonExample2" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-block btn-dark px-4" type="button" id="subscribeButtonExample2"><i class="fas fa-tags d-md-none"></i><span class="d-none d-md-inline">Kupon Uygula</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="d-md-flex">
                                        <form action="{{ route('sepetbosalt') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">
                                                Sepeti Boşalt
                                            </button>
                                        </form>
                                        <a href="{{ route('siparis') }}" class="btn btn-primary-dark-w mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Siparişi Tamamla</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mb-8 cart-total">
            <div class="row">
                <div class="col-xl-5 col-lg-6 offset-lg-6 offset-xl-7 col-md-8 offset-md-4">
                    <div class="border-bottom border-color-1 mb-3">
                        <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Sipariş Toplam</h3>
                    </div>
                    <table class="table mb-3 mb-md-0">
                        <tbody>
                        <tr class="cart-subtotal">
                            <th>Ara Toplam</th>
                            <td data-title="Ara Toplam"><span class="amount">{{ money(Cart::subtotal()) }}₺</span></td>
                        </tr>
                        <tr class="shipping">
                            <th>Kargo</th>
                            <td data-title="Kargo">
                                <span class="amount">{{ cargo(Cart::total()) }}</span>
                            </td>
                        </tr>
                        <tr class="order-total">
                            <th>Toplam</th>
                            <td data-title="Toplam"><strong><span class="amount">{{cargoToplam(Cart::total())}}₺</span></strong></td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('siparis') }}"  type="button" class="btn btn-dark mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto d-md-none">Siparişi Tamamla</a>
                </div>
            </div>
        </div>


    </div>
@endsection
