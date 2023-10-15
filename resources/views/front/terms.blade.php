@extends('front.layout.master')
@section('content')
        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="text-dark">{{__('admin.Web.terms')}}</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="index.html">{{('admin.Web.home')}}</a></li>
                                <li class="text-dark" aria-current="page"> / {{__('admin.Web.terms')}}</li>
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
                        <h1 class="mb-4">{{__('admin.Web.terms')}}</h1>
                        <p class="mb-4">
                            @if(app()->getLocale() == 'ar')
                            {!! $terms->description_ar !!}
                            @else
                            {!! $terms->description_en !!}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Terms End -->

@endsection