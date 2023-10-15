@extends('front.layout.master')
@section('content')
        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="text-dark">{{__('admin.Web.news')}}</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('admin.Web.home')}}</a></li>
                                <li class=" text-dark" aria-current="page"> / {{__('admin.Web.news')}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Categories Start -->
        <div class="container-fluid team ">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <h3 class="">{{__('admin.Web.news')}}</h3>
                </div>
                <div class="row g-5">
                    <div class="col-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="news-tab" data-bs-toggle="tab" data-bs-target="#news" type="button" role="tab" aria-controls="home" aria-selected="true">{{__('admin.Web.news')}}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#pictures" type="button" role="tab" aria-controls="contact" aria-selected="false">{{__('admin.Web.photos')}}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button" role="tab" aria-controls="profile" aria-selected="false">{{__('admin.Web.videos')}}</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="news" class="tab-pane fade show active mt-5" role="tabpanel" aria-labelledby="news-tab">
                        @foreach($news as $new)
                        <div class="row g-5 mb-3">
                            <div class="col-lg-4 col-xl-5">
                                <div class="team-img">
                                    <img src="{{$new->getFirstMediaUrl('photo')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-7">
                                <div class="team-item pt-5">
                                    <h4>{{(app()->getLocale() == 'ar')?$new->title_ar : $new->title_en}}</h4>
                                    <p class="mb-4">
                                    @if(app()->getLocale() == 'ar')
                                    {!! $new->description !!}
                                     @else
                                     {!! $new->description_en !!}
                                     @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div id="pictures" class="tab-pane fade mt-5" role="tabpanel" aria-labelledby="pictures-tab">
                        <div class="row g-5 mb-3">
                            @foreach($images as $image)
                            <div class="col-lg-4 col-xl-4">
                                <div class="team-img">
                                    <img src="{{$image->getFirstMediaUrl('photo')}}" class="img-fluid" alt="">
                                </div>
                                <h4 class="text-center pt-3">{{(app()->getLocale() == 'ar')?$image->title_ar : $image->title_en}}</h4>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="videos" class="tab-pane fade mt-5" role="tabpanel" aria-labelledby="videos-tab">
                        <div class="row g-5 mb-3">
                            @foreach($videos as $video)
                            <div class="col-lg-4 col-xl-4">
                                <div class="team-img position-relative">
                                    <img src="{{$video->getFirstMediaUrl('photo')}}" class="img-fluid" alt="">
                                    <button class="btn show_video" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">{{(app()->getLocale() == 'ar')? 'شاهد الفيديو' : 'see video'}}</button>
                                </div>
                                <h4 class="text-center pt-3">{{(app()->getLocale() == 'ar')?$video->title_ar : $video->title_en}}</h4>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Categories End -->
@endsection