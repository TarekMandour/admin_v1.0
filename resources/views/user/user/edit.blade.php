@extends('user.layout.master')
@php
    $route = 'user.users';
    $viewPath = 'user.user';
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
                    <a  href="{{route($route.'.index')}}" class="text-muted text-hover-primary">المشتركين</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted px-2">
                    تعديل
                </li>
            </ul>
        </div>
        <!--end::Page title-->
    </div>
@endsection

@section('content')

    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card mb-5 mb-xl-10">
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                <form action="{{route($route.'.update')}}" method="POST" enctype="multipart/form-data" id="kt_account_profile_details_form" class="form">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}" />
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-semibold fs-6">صورة المشترك</label>
                            <div class="col-lg-8">
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('assets/media/svg/avatars/blank.svg')}})">
                                    @if ($data->getMedia('profile')->count())
                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{$data->getFirstMediaUrl('profile', 'thumb')}})"></div>
                                    @else
                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{asset('dash/assets/media/avatars/blank.png')}})"></div>
                                    @endif
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="photo" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                    </label>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>

                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mb-6">
                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">اسم</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="name" placeholder="الاسم" value="{{$data->name}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-2 col-form-label fw-semibold fs-6">
                                        <span class="required">رقم الهاتف</span>
                                    </label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="tel" name="phone" placeholder="رقم الهاتف" value="{{$data->phone}}" class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-2 col-form-label fw-semibold fs-6">
                                        كلمة المرور
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Min 6 characters"></i>
                                    </label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="password" name="password" placeholder="كلمة المرور" value="" class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-2 col-form-label fw-semibold fs-6"> البريد الالكتروني</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="email" placeholder="البريد الالكتروني" value="{{$data->email}}" class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <label class="col-lg-2 col-form-label fw-semibold fs-6"> الحالة</label>
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                            <input class="form-check-input w-45px h-30px" type="checkbox" name="is_active" value="1" id="allowmarketing" @if($data->is_active == 1) checked="checked" @endif />
                                            <label class="form-check-label" for="allowmarketing"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-6">
                                    <label class="col-lg-2 col-form-label fw-semibold fs-6">
                                        <span class="">العنوان</span>
                                    </label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="address" name="address" placeholder="العنوان" value="{{$data->address}}" class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">الدولة  </label>
                                    <!--end::Label-->
                                    <div class="col-lg-8 fv-row">
                                        <select  data-control="select2" data-placeholder="اختر الدولة" id="country_id" class=" input-text form-control  form-select  mb-3 mb-lg-0"  name="country_id">
                                            <option value="">اختر الدولة</option>
                                            @foreach(\App\Models\Country::whereNull('deleted_at')->get() as $country)
                                                <option @if(isset($data) && $data->country_id == $country->id) selected @endif value="{{$country->id}}">
                                                    {{$country->title_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">المدينة  </label>
                                    <!--end::Label-->
                                    <div class="col-lg-8 fv-row">
                                        <select  data-control="select2" data-placeholder="اختر المدينه" id="city_id" class=" input-text form-control  form-select  mb-3 mb-lg-0"  name="city_id">
                                            <option value="">اختر المدينه</option>
                                            @foreach(\App\Models\City::whereNull('deleted_at')->get() as $city)
                                                <option @if(isset($data) && $data->city_id == $city->id) selected @endif value="{{$city->id}}">
                                                    {{$city->title_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">االجنسية  </label>
                                    <!--end::Label-->
                                    <div class="col-lg-8 fv-row">
                                        <select  data-control="select2" data-placeholder="اختر الجنسية" id="nationality" class=" input-text form-control  form-select  mb-3 mb-lg-0"  name="nationality">
                                            <option value="">اختر الجنسية</option>
                                            @foreach(\App\Models\Country::whereNull('deleted_at')->get() as $country)
                                                <option @if(isset($data) && $data->country_id == $country->id) selected @endif value="{{$country->id}}">
                                                    {{$country->nationality_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">الفرع  </label>
                                    <!--end::Label-->
                                    <div class="col-lg-8 fv-row">
                                        <select  data-control="select2" data-placeholder="اختر فرع المسابقة" id="branch_id" class=" input-text form-control  form-select  mb-3 mb-lg-0"  name="branch_id">
                                            <option value="">اختر فرع المسابقة</option>
                                            @foreach(\App\Models\Branch::whereNull('deleted_at')->get() as $branch)
                                                <option @if(isset($data) && $data->branch_id == $branch->id) selected @endif value="{{$branch->id}}">
                                                    {{$branch->title_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Input-->
                                </div>
                            </div>
                        </div>

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
