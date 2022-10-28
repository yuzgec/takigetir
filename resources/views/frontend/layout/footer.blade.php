<footer>


    <div class="pt-8 pb-4 bg-gray-13">
        <div class="container mt-1">
            <div class="row">
                <div class="col-lg-3">
                    <div class="mb-6">
                        <a href="{{ route('home') }}" class="d-inline-block">
                            <img src="/frontend/assets/img/logo1.png" alt="{{ config('app.name') }}" class="img-fluid" width="300px">
                        </a>
                    </div>
                    <div class="mb-4">
                        <div class="row no-gutters">
                            <div class="col-auto">
                                <i class="ec ec-support text-primary font-size-56"></i>
                            </div>
                            <div class="col pl-3">
                                <div class="font-size-13 font-weight-medium">Çağrı Merkezi Destek Hattı </div>
                                <a href="tel:{{ config('settings.telefon1') }}" class="font-size-20 text-gray-90">{{ config('settings.telefon1') }} </a>
                                <p>Sitemizden satın aldığınız tüm aksesuar grubu ürünlerinde,
                                    ürünlerin niteliği itibariyle iade ya da değişim işlemi yapılmamaktadır.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h6 class="mb-1 font-weight-bold">İletişim Bilgileri</h6>
                        <address class="">
                            {{ config('settings.adres1') }}
                        </address>
                    </div>
                    <div class="my-4 my-md-4">
                        <ul class="list-inline mb-0 opacity-7">

                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" target="_blank"  href="https://www.facebook.com/getirtaki">
                                    <span class="fab fa-facebook-f btn-icon__inner"></span>
                                </a>
                            </li>

                          {{--  <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" target="_blank"  href="https://www.youtube.com/c/{{ config('settings.instagram') }}">
                                    <span class="fab fa-youtube btn-icon__inner"></span>
                                </a>
                            </li>--}}
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" target="_blank" href="https://www.instagram.com/taki.getir/">
                                    <span class="fab fa-instagram btn-icon__inner"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-12 col-md mb-4 mb-md-0">
                            <h6 class="mb-3 font-weight-bold">Ürün Kategorileri</h6>
                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                @foreach($Product_Categories as $item)
                                <li>
                                    <a class="list-group-item list-group-item-action" href="{{ route('kategori', $item->slug) }}">
                                        {{ $item->title }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-12 col-md mb-4 mb-md-0">
                            <h6 class="mb-3 font-weight-bold">Müşteri Hizmetleri</h6>

                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                @foreach($Pages->where('category', 2) as $item)
                                    <li>
                                        <a class="list-group-item list-group-item-action" href="{{ route('kurumsal', $item->slug) }}">
                                            {{ $item->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-12 col-md mb-4 mb-md-0">
                            <h6 class="mb-3 font-weight-bold">Müşteri Hizmetleri</h6>
                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                <li><a class="list-group-item list-group-item-action" href="{{ route('login') }}">Hesabım</a></li>
                                <li><a class="list-group-item list-group-item-action" href="{{ route('sepet') }}">Sepetim</a></li>
                                <li><a class="list-group-item list-group-item-action" href="{{ route('kargosorgulama') }}">Kargo Sorgulama</a></li>
                                <li><a class="list-group-item list-group-item-action" href="">Favorilerim</a></li>
                                <li><a class="list-group-item list-group-item-action" href="">S.S.S.</a></li>
                                <li><a class="list-group-item list-group-item-action" href="">Blog</a></li>
                                <li><a class="list-group-item list-group-item-action" href="">İnsan Kaynakları</a></li>
                                <li><a class="list-group-item list-group-item-action" href="">Hakkımızda</a></li>
                                <li><a class="list-group-item list-group-item-action" href="{{ route('iletisim') }}">İletişim</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-14 py-2">
        <div class="container">
            <div class="flex-center-between d-block d-md-flex">
                <div class="mb-3 mb-md-0">© <a href="{{ route('home') }}" class="font-weight-bold text-gray-90">
                        {{ config('settings.siteName') }}</a> -Tüm Hakları Saklıdır
                </div>
                <div class="text-md-right">
                    <img src="/frontend/assets/img/iyzico.png" alt="İyzico Ödeme" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

</footer>
