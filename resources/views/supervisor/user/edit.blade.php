@extends('admin.layout.master')

@section('css')
@endsection

@section('style')
    
@endsection

@section('breadcrumb')
<div class="d-flex align-items-center" id="kt_header_nav">
    <!--begin::Page title-->
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_header_nav'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <a  href="{{url('/admin')}}">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
                لوحة التحكم
            </h1>
        </a>
        <span class="h-20px border-gray-300 border-start mx-4"></span>
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item text-muted px-2">
                <a  href="{{route('admin.users.index')}}" class="text-muted text-hover-primary">العملاء</a>
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
                <form action="{{route('admin.users.update')}}" method="POST" enctype="multipart/form-data" id="kt_account_profile_details_form" class="form">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}" />
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">النوع  </label>
                                    <!--end::Label-->
                                    <div class="col-lg-8 fv-row">
                                        <select  data-control="select2" data-placeholder="اختر نوع الحساب" class=" input-text form-control  form-select  mb-3 mb-lg-0"  name="type">
                                            <option value="">اختر نوع الحساب</option>
                                            <option value="user" @if($data->type == "user") selected @endif>عميل</option>
                                            <option value="provider" @if($data->type == "provider") selected @endif>مالك</option>
                                        </select>
                                    </div>
                                    <!--end::Input-->
                                </div>

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
                                    <label class="col-lg-2 col-form-label fw-semibold fs-6"> is_active</label>
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
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">المدينة  </label>
                                    <!--end::Label-->
                                    <div class="col-lg-8 fv-row">
                                        <select  data-control="select2" data-placeholder="اختر المدينه" id="city" class=" input-text form-control  form-select  mb-3 mb-lg-0"  name="city_id">
                                            <option value="">اختر المدينه</option>
                                            @foreach(\App\Models\City::all() as $city)
                                                <option @if(isset($data) && $data->city_id == $city->id) selected @endif value="{{$city->id}}">
                                                    {{$city->title}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">الحي  </label>
                                    <!--end::Label-->
                                    <div class="col-lg-8 fv-row">
                                        <select  data-control="select2" data-placeholder="اختر الحي" id="neighborhood" class=" input-text form-control  form-select  mb-3 mb-lg-0"  name="neighborhood_id">
                                            <option value="">اختر الحي</option>
                                            @foreach(\App\Models\Neighborhood::all() as $neighborhood)
                                                <option @if(isset($data) && $data->neighborhood_id == $neighborhood->id) selected @endif value="{{$neighborhood->id}}">
                                                    {{$neighborhood->title}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-2 col-form-label fw-semibold fs-6">
                                        <span class="">العنوان</span>
                                    </label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="address" name="address" placeholder="العنوان" value="{{$data->address}}" class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-2 col-form-label fw-semibold fs-6">
                                        <span class="">الرقم الضريبي</span>
                                    </label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="number" name="tax_num" placeholder="الرقم الضريبي" value="{{$data->tax_num}}" class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-2 col-form-label fw-semibold fs-6">
                                        <span class="">رقم الهوية</span>
                                    </label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="number" name="national_id" placeholder="رقم الهوية" value="{{$data->national_id}}" class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-2 col-form-label fw-semibold fs-6">
                                        <span class="">تاريخ انتهاء الهوية</span>
                                    </label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="date" name="id_num_expired" placeholder="تاريخ انتهاء الهوية" value="{{$data->id_num_expired}}" class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-2 col-form-label fw-semibold fs-6">
                                        <span class="">مصدر الهوية</span>
                                    </label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="id_num_export" placeholder="مصدر الهوية" value="{{$data->id_num_export}}" class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-2 col-form-label fw-semibold fs-6">
                                        <span class="">الجنسية</span>
                                    </label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="nationality" placeholder="الجنسية" value="{{$data->nationality}}" class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save</button>
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