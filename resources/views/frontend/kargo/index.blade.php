@extends('frontend.layout.app')
@section('title', 'Kargo Sorgulama |  Kıblegah Aile Oyunları Online Satış Sitesi')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <form method="GET">
                <small><b>Telefon numaranızı başında 0 olmadan giriniz...</b></small>
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <input type="text" name="har_kod" class="form-control form-control-lg @if($errors->has('phone')) is-invalid @endif" placeholder="10 Haneli Telefon Numarası Giriniz...">
                        @if($errors->has('har_kod'))
                            <div class="invalid-feedback">{{$errors->first('har_kod')}}</div>
                        @endif
                    </div>
                    <div class="form-group col-lg-6">
                        <button class="btn btn-primary btn-block btn-lg" type="submit" name="action">Kargo Sorgula</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(request('har_kod'))
    <iframe src="https://kargotakip.kiblegahdagitim.com:543/hareket.asp?har_kod={{request('har_kod')}}&action=" frameborder="0" width="100%" height="750px"></iframe>
    @endif
</div>
@endsection
