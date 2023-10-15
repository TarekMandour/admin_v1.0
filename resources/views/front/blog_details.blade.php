@extends('front.layout.master')
@section('content')
        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="text-dark">{{__('admin.Web.news_show')}}</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('admin.Web.home')}}</a></li>
                                <li class="text-dark" aria-current="page"> / {{__('admin.Web.news_show')}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Terms Start -->
        <div class="container-fluid py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h1 class="mb-4">{{(app()->getLocale() == 'ar')? $blog->title_ar : $blog->title_en}}</h1>
                        <div class="mb-4">
                        <img src="{{$blog->getFirstMediaUrl('photo')}}" class="w-100">
                        </div>
                        <p class="mb-4">
                            {{(app()->getLocale() == 'ar')? $blog->description : $blog->description_en}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Terms End -->

@endsection