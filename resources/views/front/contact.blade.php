@extends('front.layout.master')
@section('content')
        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="text-dark">{{__('admin.Web.contact_us')}}</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('admin.Web.home')}}</a></li>
                                <li class="text-dark" aria-current="page"> / {{__('admin.Web.contact_us')}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <form action="{{route('contactsubmit')}}" method="POST">
                @csrf
            <div class="container py-5">
                <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <p class="fs-5 text-uppercase text-primary">{{(app()->getLocale() == 'ar')? 'ابق على تواصل' : 'Get In Touch'}}</p>
                    <h3 class="">{{(app()->getLocale() == 'ar')? 'اتصل بنا' : 'Contact Us'}}</h3>
                    </div>
                <div class="row g-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="col-sm-6">
                        <input type="text" name="name" class="form-control bg-transparent p-3" placeholder="{{(app()->getLocale() == 'ar')? 'اسمك' : 'Your name'}}">
                    </div>
                    <div class="col-sm-6">
                        <input type="email" name="email" class="form-control bg-transparent p-3" placeholder="{{(app()->getLocale() == 'ar')? 'لبريد الالكتروني' : 'email'}}">
                    </div>
                    <div class="col-12">
                        <input type="text" name="content" class="form-control bg-transparent p-3" placeholder="{{(app()->getLocale() == 'ar')? 'لموضوع' : 'subject'}}">
                    </div>
                    <div class="col-12">
                        <textarea class="w-100 form-control bg-transparent p-3" rows="6" cols="10" placeholder="{{(app()->getLocale() == 'ar')? 'الرسالة' : 'message'}}"></textarea>
                    </div>
                    <div class="col-12 text-center">
                        <button class="btn btn-primary border-0 py-3 px-5" type="submit">{{(app()->getLocale() == 'ar')? 'ارسال رسالة' : 'send message'}}</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <!-- Contact Start -->


@endsection