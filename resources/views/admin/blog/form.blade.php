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
                <input type="file" name="photo[]" accept=".png, .jpg, .jpeg" multiple />
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

<div class="row mb-6">
    <!--begin::Label-->
    <label class="col-lg-2 col-form-label fw-semibold fs-6">نوع الخبر </label>
    <!--end::Label-->
    <div class="col-lg-8 fv-row">
        <select  data-control="select2" data-placeholder="Select an option" class="newstype input-text form-control  form-select  mb-3 mb-lg-0"  name="type">
            <option value="news" @if(isset($data) && $data->type == "news") selected @endif>خبر عام </option>
            <option value="image" @if(isset($data) && $data->type == "image") selected @endif>معرض صور </option>
            <option value="video" @if(isset($data) && $data->type == "video") selected @endif>معرض فيديوهات </option>
        </select>
    </div>
    <!--end::Input-->
</div>

<div class="row mb-6">
    <label class="col-lg-2 col-form-label required fw-semibold fs-6">عنوان الخبر</label>
    <div class="col-lg-8 fv-row">
        <input type="text" name="title" placeholder="عنوان الخبر" value="{{old('title',$data->title ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>

<div class="row mb-6">
    <label class="col-lg-2 col-form-label required fw-semibold fs-6">عنوان الخبر انجليزي</label>
    <div class="col-lg-8 fv-row">
        <input type="text" name="title_en" placeholder="عنوان الخبر" value="{{old('title_en',$data->title_en ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>

<div class="row mb-6 show-news" @if(isset($data) && $data->type != "news") style="display: none" @endif>
    <label class="col-lg-2 col-form-label required fw-semibold fs-6">محتوى خبر</label>
    <div class="col-lg-8 fv-row">
        <textarea name="description" id="kt_docs_tinymce_basic">
            {{old('description',$data->description ?? '')}}
        </textarea>
    </div>
</div>

<div class="row mb-6 show-news" @if(isset($data) && $data->type != "news") style="display: none" @endif>
    <label class="col-lg-2 col-form-label required fw-semibold fs-6">محتوى خبر انجليزي</label>
    <div class="col-lg-8 fv-row">
        <textarea name="description_en" id="kt_docs_tinymce_basic2">
            {{old('description_en',$data->description_en ?? '')}}
        </textarea>
    </div>
</div>

<div class="row mb-6 show-video" @if(isset($data) && $data->type != "video") style="display: none" @endif>
    <label class="col-lg-2 col-form-label required fw-semibold fs-6">لينك الفيديو</label>
    <div class="col-lg-8 fv-row">
        <input type="text" name="link" placeholder="لينك الفيديو" value="{{old('link',$data->link ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>

<div class="row mb-6">
    <!--begin::Label-->
    <label class="col-lg-2 col-form-label fw-semibold fs-6">  خبر لمبادره ؟ </label>
    <!--end::Label-->
    <div class="col-lg-8 fv-row">
        <select  data-control="select2" data-placeholder="اختر مبادره" class=" input-text form-control  form-select  mb-3 mb-lg-0"  name="service_id">
            <option value="">اختر مبادرة</option>
            @foreach(\App\Models\Service::all() as $service)
                <option @if(isset($data) && $data->service_id == $service->id) selected @endif value="{{$service->id}}">
                    {{$service->name}}
                </option>
            @endforeach
        </select>
    </div>
    <!--end::Input-->
</div>

<div class="row mb-6">
    <!--begin::Label-->
    <label class="col-lg-2 col-form-label fw-semibold fs-6"> خبر لمؤسسة ؟ </label>
    <!--end::Label-->
    <div class="col-lg-8 fv-row">
        <select  data-control="select2" data-placeholder="اختر مؤسسة" class=" input-text form-control  form-select  mb-3 mb-lg-0"  name="user_id">
            <option value="">اختر مؤسسة</option>
            @foreach(\App\Models\User::where('type','!=','individual')->get() as $user)
                <option @if(isset($data) && $data->user_id == $user->id) selected @endif value="{{$user->id}}">
                    {{$user->name}}
                </option>
            @endforeach
        </select>
    </div>
    <!--end::Input-->
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

<input type="hidden" name="category_id" value="1"/>

<script src="{{ URL::asset('dash/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>

<script>
    var options = {selector: "#kt_docs_tinymce_basic, #kt_docs_tinymce_basic2"};

    tinymce.init(options);

</script>
