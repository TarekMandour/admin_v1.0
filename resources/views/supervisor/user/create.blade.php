@extends('supervisor.layout.master')
@php
    $route = 'supervisor.users';
    $viewPath = 'supervisor.user';
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
                    اضف جديد
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
                <form action="{{route($route.'.store')}}" method="POST" enctype="multipart/form-data" id="kt_account_profile_details_form" class="form">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body  p-9">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mb-6">
                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">اسم</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="name" placeholder="الاسم" value="" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <label class="col-lg-2 col-form-label fw-semibold fs-6">
                                        <span class="required">رقم الهاتف</span>
                                    </label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="tel" name="phone" placeholder="رقم الهاتف" value="" class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-2 col-form-label fw-semibold fs-6 required">
                                        كلمة المرور
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="لا يقل عن 6 حروف"></i>
                                    </label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="password" name="password" placeholder="كلمة المرور" value="" class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <label class="col-lg-2 col-form-label fw-semibold fs-6">البريد الالكتروني </label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="email" placeholder="البريد الالكتروني" value="" class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>



                                <div class="row mb-6">
                                    <label class="col-lg-2 col-form-label fw-semibold fs-6">الحالة</label>
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                            <input class="form-check-input w-45px h-30px" type="checkbox" name="is_active" value="1" id="allowmarketing" checked="checked" />
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
                                        <input type="text" name="address" placeholder="العنوان" value="" class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">الدولة  </label>
                                    <!--end::Label-->
                                    <div class="col-lg-8 fv-row">
                                        <select  data-control="select2" data-placeholder="اختر الدولة" id="country" class=" input-text form-control  form-select  mb-3 mb-lg-0"  name="country_id">
                                            <option value="">الدولة</option>
                                            @foreach(\App\Models\Country::whereNull('deleted_at')->get() as $country)
                                                <option value="{{$country->id}}">{{$country->title_ar}}</option>
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
                                        <select  data-control="select2" data-placeholder="اختر المدينه" id="city" class=" input-text form-control  form-select  mb-3 mb-lg-0"  name="city_id">
                                            <option value="">اختر المدينه</option>
                                            @foreach(\App\Models\City::whereNull('deleted_at')->get() as $city)
                                                <option value="{{$city->id}}">
                                                    {{$city->title_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Input-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">الجنسية  </label>
                                    <!--end::Label-->
                                    <div class="col-lg-8 fv-row">
                                        <select  data-control="select2" data-placeholder="اختر الجنسية" id="nationality" class=" input-text form-control  form-select  mb-3 mb-lg-0"  name="nationality">
                                            <option value="">اختر الجنسية</option>
                                            @foreach(\App\Models\Country::whereNull('deleted_at')->get() as $country)
                                                <option value="{{$country->id}}">
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
                                            <option value="">اختر الجنسية</option>
                                            @foreach(\App\Models\Branch::all() as $branch)
                                                <option value="{{$branch->id}}">
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
