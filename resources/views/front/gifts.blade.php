@extends('front.layout.master')
@section('content')
        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="text-dark">{{__('admin.Web.gift_title')}}</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('admin.Web.home')}}</a></li>
                                <li class="text-dark" aria-current="page"> / {{__('admin.Web.gift_title')}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Events Start -->
        <div class="container-fluid event py-5">
            <div class="container py-5">
                <h3 class="mb-5 wow fadeIn" data-wow-delay="0.1s"><span class="text-primary">{{__('admin.Web.gifts')}} </span>{{__('admin.Web.branch')}}</h3>
                @foreach($gifts as $gift)
                <div class="row g-4 event-item wow fadeIn mb-5" data-wow-delay="0.1s">
                    <div class="col-4 col-lg-4">
                        <div class="overflow-hidden">
                            <img src="{{$gift->getFirstMediaUrl('gifts')}}" class="img-fluid gift_img" alt="">
                        </div>
                    </div>
                    <div class="col-8 col-lg-8 pb-5 text-start d-flex justify-content-center flex-column">
                        <div class="text-end">
                            <h5 class="">{{(app()->getLocale() == 'ar')?$gift->title_ar : $gift->title_en}}</h5>
                            <p class="">{{(app()->getLocale() == 'ar')? $gift->description_ar : $gift->description_en}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        <!-- Events End -->
        @endsection