@extends('frontend.layout.app')
@section('title', $Detay->title.' | Kurumsal Sayfalar')
@section('content')

    <div class="container">
        <div class="mb-5">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="d-flex justify-content-between border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0">
                        <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">{{ $Detay->title }}</h3>
                    </div>
                    <div class="page-title">
                        {!! $Detay->desc !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
