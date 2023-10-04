<div class="row mb-6">
    <label class="col-lg-2 col-form-label fw-semibold fs-6">صورة</label>
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
    <!--begin::Label-->
    <label class="col-lg-2 col-form-label fw-semibold fs-6">التصنيف الرئيسي </label>
    <!--end::Label-->
    <div class="col-lg-8 fv-row">
        <select  data-control="select2" data-placeholder="Select an option" class=" input-text form-control  form-select  mb-3 mb-lg-0"  name="parent_id">
            <option value="0">اختر قسم</option>
            @foreach(\App\Models\Category::all() as $cat)
                <option @if(isset($data) && $data->parent_id == $cat->id) selected @endif value="{{$cat->id}}">
                    {{$cat->name_ar}}
                </option>
            @endforeach
        </select>
    </div>
    <!--end::Input-->
</div>

<div class="row mb-6">
    <label class="col-lg-2 col-form-label required fw-semibold fs-6">الاسم عربي</label>
    <div class="col-lg-8 fv-row">
        <input type="text" name="name_ar" placeholder="الاسم عربي" value="{{old('name_ar',$data->name_ar ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>

<div class="row mb-6">
    <label class="col-lg-2 col-form-label required fw-semibold fs-6">الاسم انجليزي</label>
    <div class="col-lg-8 fv-row">
        <input type="text" name="name_en" placeholder="الاسم انجليزي" value="{{old('name_en',$data->name_en ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>


<div class="fv-row mb-6">
    <div
        class="form-check form-switch form-check-custom form-check-solid">
        <label class="col-lg-2 form-check-label fw-semibold fs-6" for="flexSwitchDefault">هل مفعل ؟ </label>
        <div class="col-lg-8 fv-row">
        <input class="form-check-input" name="status" type="hidden"
               value="inactive" id="flexSwitchDefault"/>
        <input class="form-check-input w-45px h-25px "
               name="status" type="checkbox"    @if(isset($data) && $data->status == 'active') checked @endif
               value="active" id="flexSwitchDefault" />
        </div>
    </div>
</div>
