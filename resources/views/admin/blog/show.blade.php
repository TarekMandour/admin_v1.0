@extends('admin.layout.master')


@section('breadcrumb')
<div class="page-title d-flex flex-column justify-content-center gap-1 me-3 pt-6">
    <!--begin::Title-->
    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">المدونات والأخبار </h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="{{route('admin.users.index')}}" class="text-muted text-hover-primary">المدونات والأخبار</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">عرض</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
</div>
@endsection

@section('content')

<div id="kt_app_content_container" class="app-container container-fluid">
    <div class="card">


            <div class="card-body p-9">

                <div class="row mb-8">
                            @if ($data->getMedia('photo')->count())
                                @foreach($data->getMedia('photo') as $media)
                            <div class="col-xl-3">
                                <div class="w-100">
                                    <img src="{{$media->getUrl('thumb')}}" class="w-100 pl-5 pb-5">
{{--                                    <a class="m-5 btn btn-success" href="{{$media->getUrl('thumb')}}" download>تحميل الصورة</a>--}}
                                </div>
                            </div>
                                    @endforeach
                            @else
                        <div class="col-xl-3">
                            <div class="w-100">
                                <img src="{{asset('assets/media/svg/avatars/blank.svg')}}" class="w-100">
                            </div>
                        </div>
                        <div class="col-xl-8"></div>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="row mb-8">
                    <div class="col-xl-2">
                        <div class="fs-6 fw-semibold">العنوان عربي</div>
                    </div>
                    <div class="col-lg-9">
                        <div class="fw-bold fs-5">{{$data->title_ar}}</div>
                    </div>
                </div>

                <div class="row mb-8">
                    <div class="col-xl-2">
                        <div class="fs-6 fw-semibold">العنوان انجليزي</div>
                    </div>
                    <div class="col-lg-9">
                        <div class="fw-bold fs-5">{{$data->title_en}}</div>
                    </div>
                </div>

                <div class="row mb-8">
                    <div class="col-xl-2">
                        <div class="fs-6 fw-semibold">الوصف عربي</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <div class="fw-bold fs-5">{!! $data->description !!}</div>
                    </div>
                </div>

                <div class="row mb-8">
                    <div class="col-xl-2">
                        <div class="fs-6 fw-semibold">الوصف انجليزي</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <div class="fw-bold fs-5">{!! $data->description_en !!}</div>
                    </div>
                </div>

                <div class="row mb-8">
                    <div class="col-xl-2">
                        <div class="fs-6 fw-semibold">التصنيف</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <div class="fw-bold fs-5">{{$data->category->name_ar}}</div>
                    </div>
                </div>
                <div class="row mb-8">
                    <div class="col-xl-2">
                        <div class="fs-6 fw-semibold">نوع المقال</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        @if($data->type == 'news')
                            <div class="badge badge-light-success fw-bold">عام</div>
                        @elseif($data->type == 'image')
                            <div class="badge badge-light-danger fw-bold">معرض صور</div>
                        @else
                            <div class="badge badge-light-danger fw-bold">معرض فيديوهات</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-8">
                    <div class="col-xl-2">
                        <div class="fs-6 fw-semibold">الحالة</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        @if($data->is_active == 1)
                        <div class="badge badge-light-success fw-bold">مفعل</div>
                        @else
                        <div class="badge badge-light-danger fw-bold">معطل</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-8">
                    <div class="col-xl-2">
                        <div class="fs-6 fw-semibold">تاريخ النشر</div>
                    </div>
                    <div class="col-lg-9">
                        <div class="fw-bold fs-5">{{$data->created_at}}</div>
                    </div>
                </div>
                <div class="row mb-8">
                    <div class="col-xl-2">
                        <div class="fs-6 fw-semibold">تاريخ التحديث</div>
                    </div>
                    <div class="col-lg-9">
                        <div class="fw-bold fs-5">{{$data->updated_at}}</div>
                    </div>
                </div>

            </div>

    </div>
</div>

@endsection

@section('script')
@endsection
