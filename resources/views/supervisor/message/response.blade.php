@extends('supervisor.layout.master')

@php
    $route = 'supervisor.messages';
    $viewPath = 'supervisor.message';
@endphp


@section('breadcrumb')
<div class="d-flex align-items-center" id="kt_header_nav">
    <!--begin::Page title-->
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_header_nav'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <a  href="{{url('/supervisors')}}">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
                الرئيسية
            </h1>
        </a>
        <span class="h-20px border-gray-300 border-start mx-4"></span>
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item text-muted px-2">
                <a  href="{{route($route. '.index')}}" class="text-muted text-hover-primary">الرسائل</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-300 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted px-2">
               الرد على الرسالة
            </li>
        </ul>
    </div>
    <!--end::Page title-->
</div>
@endsection

@section('content')

    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card">

<div class="card-header">
    <h1>الرسالة:</h1>
</div>
            <div class="card-body p-9">

                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="w-100">
                            @if ($data->getMedia('messages')->count())
                                <img src="{{$data->getFirstMediaUrl('messages')}}" class="w-100">
                                <a class="m-5 btn btn-success" href="{{$data->getFirstMediaUrl('messages')}}" download>تحميل الصورة</a>
                            @else
                                <img src="{{asset('assets/media/svg/avatars/blank.svg')}}" class="w-100">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-8">

                    </div>
                </div>

                <div class="row mb-8">
                    <div class="col-xl-2">
                        <div class="fs-6 fw-semibold">الاسم</div>
                    </div>
                    <div class="col-lg-9">
                        <div class="fw-bold fs-5">{{$data->name}}</div>
                    </div>
                </div>

                <div class="row mb-8">
                    <div class="col-xl-2">
                        <div class="fs-6 fw-semibold">البريد الالكتروني</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <div class="fw-bold fs-5">{{$data->email}}</div>
                    </div>
                </div>
                <div class="row mb-8">
                    <div class="col-xl-2">
                        <div class="fs-6 fw-semibold">رقم الهاتف</div>
                    </div>
                    <div class="col-lg-9">
                        <div class="fw-bold fs-5">{{$data->phone}}</div>
                    </div>
                </div>
                <div class="row mb-8">
                    <div class="col-xl-2">
                        <div class="fs-6 fw-semibold">محتوى الرسالة</div>
                    </div>
                    <div class="col-lg-9">
                        <div class="fw-bold fs-5">{!! $data->description !!}</div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    @if(!empty($data->responses))
    @foreach($data->responses as $response)
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="card">
                <div class="card-header">
                    <h1>الردود على الرسالة:</h1>
                </div>
                <div class="card-body p-9">

                    <div class="row mb-8">
                        <div class="col-xl-3">
                            <div class="w-100">
                                @if ($data->getMedia('messages')->count())
                                    <img src="{{$response->getFirstMediaUrl('messages')}}" class="w-100">
                                    <a class="m-5 btn btn-success" href="{{$response->getFirstMediaUrl('messages')}}" download>تحميل الصورة</a>
                                @else
                                    <img src="{{asset('assets/media/svg/avatars/blank.svg')}}" class="w-100">
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-8">

                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="col-xl-2">
                            <div class="fs-6 fw-semibold">محتوى الرسالة</div>
                        </div>
                        <div class="col-lg-9">
                            <div class="fw-bold fs-5">{!! $response->response !!}</div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    @endforeach
    @endif

    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card mb-5 mb-xl-10">
            <div class="card-header">
                <h1>ارسال رد</h1>
            </div>
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                <form action="{{route($route. '.send_response', $data->id)}}" method="POST" enctype="multipart/form-data" id="kt_account_profile_details_form" class="form">
                    @csrf

                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">

                        @include($viewPath. '.responseForm')

                    </div>

                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">حفظ</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
    </div>

@endsection

@section('script')
@endsection
