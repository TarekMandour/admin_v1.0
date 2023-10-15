@extends('front.layout.master')
@section('content')
        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="text-dark">{{__('admin.Web.education')}}</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('admin.Web.home')}}</a></li>
                                <li class=" text-dark" aria-current="page"> / {{__('admin.Web.education')}}</li>
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
                    <h3 class="">{{__('admin.Web.education')}}</h3>
                </div>
                <div class="row g-5">
                    <div class="col-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="books-tab" data-bs-toggle="tab" data-bs-target="#books" type="button" role="tab" aria-controls="home" aria-selected="true">{{__('admin.Web.books')}}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button" role="tab" aria-controls="profile" aria-selected="false">{{__('admin.Web.videos')}}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#pictures" type="button" role="tab" aria-controls="contact" aria-selected="false">{{__('admin.Web.photos')}}</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="books" class="tab-pane fade show active mt-5" role="tabpanel" aria-labelledby="books-tab">
                        @foreach($books as $book)
                        <div class="row g-5 mb-3">
                            <div class="col-lg-4 col-xl-5">
                                <div class="team-img">
                                    <img src="{{$book->getFirstMediaUrl('photo')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-7">
                                <div class="team-item pt-5">
                                    <h4>{{(app()->getLocale() == 'ar')? $book->title_ar : $book->title_en}}</h4>
                                    <p class="mb-4">
                                        @if(app()->getLocale() == 'ar'){!! $book->description !!}
                                     @else
                                     {!! $book->description_en !!}
                                     @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div id="videos" class="tab-pane fade mt-5" role="tabpanel" aria-labelledby="videos-tab">
                        @foreach($videos as $video)
                        <div class="row g-5 mb-3">
                            <div class="col-lg-4 col-xl-5">
                                <div class="team-img">
                                    <iframe width="560" height="315" src="{{$video->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-7">
                                <div class="team-item pt-5">
                                    <h4>{{(app()->getLocale() == 'ar')? $video->title_ar : $video->title_en}}</h4>
                                    <p class="mb-4">
                                        @if(app()->getLocale() == 'ar')
                                        {!! $video->description !!}
                                        @else
                                        {!! $video->description_en !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div id="pictures" class="tab-pane fade mt-5" role="tabpanel" aria-labelledby="pictures-tab">
                        @foreach($images as $image)
                        <div class="row g-5 mb-3">
                            <div class="col-lg-4 col-xl-5">
                                <div class="team-img">
                                    <img src="{{$image->getFirstMediaUrl('photo')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-7">
                                <div class="team-item pt-5">
                                    <h4>{{(app()->getLocale() == 'ar')? $image->title_ar : $image->title_en}}</h4>
                                    <p class="mb-4">
                                        @if(app()->getLocale() == 'ar')
                                        {!! $image->description !!}
                                        @else
                                        {!! $image->description_en !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Categories End -->
        @endsection