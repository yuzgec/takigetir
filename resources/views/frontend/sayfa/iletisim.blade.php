@extends('frontend.layout.app')
@section('title', 'İletişim | '.config('app.name'))
@section('content')
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('home') }}">Anasayfa</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Bize Ulaşın</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row mb-10">
            <div class="col-md-8 col-xl-9">
                <div class="mr-xl-6">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title mb-0 pb-2 font-size-25">Bize Mesaj Gönderin</h3>
                    </div>
                    <p class="max-width-830-xl text-gray-90">
                        Ürünlerimiz veya siparişleriniz hakkında bilgi almak için aşapıdaki formu kullanarak bize hızlı bir şekilde ulaşabilirsiniz.
                        Temsilcilerimiz en kısa zamanda sizlere dönüş yapacaktır.
                    </p>
                    <form class="js-validate" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="js-form-message mb-4">
                                    <label class="form-label">
                                        Adınız
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="firstName" placeholder="" aria-label="" required="" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="js-form-message mb-4">
                                    <label class="form-label">
                                        Soyadınız
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="lastName" placeholder="" aria-label="" required="" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="js-form-message mb-4">
                                    <label class="form-label">
                                        Konu
                                    </label>
                                    <input type="text" class="form-control" name="Subject" placeholder="" aria-label="" data-msg="Please enter subject." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="js-form-message mb-4">
                                    <label class="form-label">
                                        Mesajınız
                                    </label>

                                    <div class="input-group">
                                        <textarea class="form-control p-5" rows="4" name="text" placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary-dark-w px-5">Mesajı Gönder</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="border-bottom border-color-1 mb-5">
                    <h3 class="section-title mb-0 pb-2 font-size-25">İletişim bilgileri</h3>
                </div>
                <div class="mr-xl-6">
                    <address class="mb-6">
                        {{ config('settings.adres1') }}
                    </address>
                    <h5 class="font-size-14 font-weight-bold mb-3">Mesai Saatleri</h5>
                    <ul class="list-unstyled mb-6">
                        <li class="flex-center-between mb-1"><span class="">Pazartesi:</span><span class="">08:00 - 19:00</span></li>
                        <li class="flex-center-between mb-1"><span class="">Salı:</span><span class="">08:00 - 19:00</span></li>
                        <li class="flex-center-between mb-1"><span class="">Çarşamba:</span><span class="">08:00 - 19:00</span></li>
                        <li class="flex-center-between mb-1"><span class="">Perşembe:</span><span class="">08:00 - 19:00</span></li>
                        <li class="flex-center-between mb-1"><span class="">Cuma:</span><span class="">08:00 - 19:00</span></li>
                        <li class="flex-center-between mb-1"><span class="">Cumartesi:</span><span class="">08:00 - 19:00</span></li>
                        <li class="flex-center-between"><span class="">Pazar</span><span class="">08:00 - 19:00</span></li>
                    </ul>
                    <h5 class="font-size-14 font-weight-bold mb-3">Toptan Satış</h5>
                    <p class="text-gray-90">Tanıtım Kampanyası oyunlarını toptan almak için lütfen bizimle iletişime geçiniz:
                        <a class="text-blue text-decoration-on" href="mailto:contact@yourstore.com">info@takigetir.com</a>
                    </p>
                </div>
            </div>
        </div>

    </div>
    @endsection
