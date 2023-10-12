<div class="row">
    <div @if (isset($data) && $data->id == 1) class="col-lg-6" @else class="col-lg-12" @endif>
        <div class="row mb-6">
            <label class="col-lg-3 col-form-label fw-semibold fs-6">صورة</label>
            <div class="col-lg-9">
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

                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-3 col-form-label required fw-semibold fs-6">الاسم عربي</label>
            <div class="col-lg-9 fv-row">
                <input type="text" name="name_ar" placeholder="الاسم عربي" value="{{old('name_ar',$data->name_ar ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-3 col-form-label required fw-semibold fs-6">محتوى الصفحة عربي</label>
            <div class="col-lg-9 fv-row">
                <textarea name="description_ar" id="kt_docs_tinymce_basic">
                    {{old('description_ar',$data->description_ar ?? '')}}
                </textarea>
            </div>
        </div>
        @if (isset($data) && $data->id == 1)
        <div class="row mb-6">
            <label class="col-lg-3 col-form-label required fw-semibold fs-6">الرؤية عربي </label>
            <div class="col-lg-9 fv-row">
                <textarea name="vision" id="kt_docs_tinymce_basic2">
                    {{old('vision',$data->vision ?? '')}}
                </textarea>
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-3 col-form-label required fw-semibold fs-6">الرسالة عربي</label>
            <div class="col-lg-9 fv-row">
                <textarea name="massage" id="kt_docs_tinymce_basic3">
                    {{old('massage',$data->massage ?? '')}}
                </textarea>
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-3 col-form-label required fw-semibold fs-6">الهدف عربي</label>
            <div class="col-lg-9 fv-row">
                <textarea name="mission" id="kt_docs_tinymce_basic4">
                    {{old('mission',$data->mission ?? '')}}
                </textarea>
            </div>
        </div>
        @endif


    </div>
    <div class="col-lg-6">
        <div class="row mb-6">
            <label class="col-lg-3 col-form-label fw-semibold fs-6">صورة 2</label>
            <div class="col-lg-9">
                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('dash/assets/media/avatars/blank.png')}})">
                    @if (isset($data) && $data->getMedia('photo2')->count())
                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{$data->getFirstMediaUrl('photo2', 'thumb')}})"></div>
                    @else
                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{asset('dash/assets/media/avatars/blank.png')}})"></div>
                    @endif
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <input type="file" name="photo2" accept=".png, .jpg, .jpeg" />
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
            <label class="col-lg-3 col-form-label required fw-semibold fs-6">الاسم انجليزي</label>
            <div class="col-lg-9 fv-row">
                <input type="text" name="name_en" placeholder="الاسم" value="{{old('name_en',$data->name_en ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-3 col-form-label required fw-semibold fs-6">محتوى الصفحة انجليزي</label>
            <div class="col-lg-9 fv-row">
                <textarea name="description_en" id="kt_docs_tinymce_basic">
                    {{old('description_en',$data->description_en ?? '')}}
                </textarea>
            </div>
        </div>

        @if (isset($data) && $data->id == 1)
            <div class="row mb-6">
                <label class="col-lg-3 col-form-label required fw-semibold fs-6">الرؤية انجليزي </label>
                <div class="col-lg-9 fv-row">
                <textarea name="vision" id="kt_docs_tinymce_basic2">
                    {{old('vision',$data->vision ?? '')}}
                </textarea>
                </div>
            </div>

            <div class="row mb-6">
                <label class="col-lg-3 col-form-label required fw-semibold fs-6">الرسالة انجليزي</label>
                <div class="col-lg-9 fv-row">
                <textarea name="massage" id="kt_docs_tinymce_basic3">
                    {{old('massage',$data->massage ?? '')}}
                </textarea>
                </div>
            </div>

            <div class="row mb-6">
                <label class="col-lg-3 col-form-label required fw-semibold fs-6">الهدف انجليزي</label>
                <div class="col-lg-9 fv-row">
                <textarea name="mission" id="kt_docs_tinymce_basic4">
                    {{old('mission',$data->mission ?? '')}}
                </textarea>
                </div>
            </div>
        @endif
    </div>
</div>








<script src="{{ URL::asset('dash/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>

<script>
    var options = {selector: "#kt_docs_tinymce_basic,#kt_docs_tinymce_basic2,#kt_docs_tinymce_basic3,#kt_docs_tinymce_basic4"};

    tinymce.init(options);

</script>
