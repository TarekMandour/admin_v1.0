<div class="row mb-6">
    <label class="col-lg-4 col-form-label fw-semibold fs-6">صورة</label>
    <div class="col-lg-8">
        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('dash/assets/media/avatars/blank.png')}})">
            @if (isset($data) && $data->getMedia('photo')->count())
            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{$data->getFirstMediaUrl('photo', 'thumb')}})"></div>
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

        <div class="form-text">Allowed file types: png, jpg, jpeg, webp.</div>
    </div>
</div>
<div class="row mb-6">
    <label class="col-lg-4 col-form-label fw-semibold fs-6">التصنيف</label>
    <div class="col-lg-8 fv-row">
        <select class="form-control" name="category_id">
            @foreach(\App\Models\Category::all() as $category)
                <option value="{{old('category_id',$data->category_id ?? $category->id)}}" >{{$category->name_ar}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row mb-6">
    <label class="col-lg-4 col-form-label required fw-semibold fs-6">العنوان عربي</label>
    <div class="col-lg-8 fv-row">
        <input type="text" name="title_ar" placeholder="العنوان" value="{{old('title_ar',$data->title_ar ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>

<div class="row mb-6">
    <label class="col-lg-4 col-form-label required fw-semibold fs-6">العنوان انجليزي</label>
    <div class="col-lg-8 fv-row">
        <input type="text" name="title_en" placeholder="العنوان انجليزي" value="{{old('title_en',$data->title_en ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>
{{--<div class="row mb-6">--}}
{{--    <label class="col-lg-4 col-form-label required fw-semibold fs-6">النوع</label>--}}
{{--    <div class="col-lg-8 fv-row">--}}
{{--        <select class="form-control" name="type">--}}
{{--                <option value="slider">سلايدر</option>--}}
{{--                <option value="category">تصنيف</option>--}}
{{--        </select>--}}
{{--    </div>--}}
{{--</div>--}}

