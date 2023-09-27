<div class="row">
    <div @if (isset($data) && $data->id == 1) class="col-lg-6" @else class="col-lg-12" @endif>
        <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-semibold fs-6">صورة</label>
            <div class="col-lg-10">
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
            <label class="col-lg-2 col-form-label required fw-semibold fs-6">اسم</label>
            <div class="col-lg-10 fv-row">
                <input type="text" name="name" placeholder="الاسم" value="{{old('name',$data->name ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
            </div>
        </div>
        
        <div class="row mb-6">
            <label class="col-lg-2 col-form-label required fw-semibold fs-6">محتوى الصفحة</label>
            <div class="col-lg-10 fv-row">
                <textarea name="description" id="kt_docs_tinymce_basic">
                    {{old('description',$data->description ?? '')}}
                </textarea>
            </div>
        </div>
    </div>
    @if (isset($data) && $data->id == 1)
    <div class="col-lg-6">
        <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-semibold fs-6">صورة 2</label>
            <div class="col-lg-10">
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
            <label class="col-lg-2 col-form-label required fw-semibold fs-6">الرؤية </label>
            <div class="col-lg-10 fv-row">
                <textarea name="vision" id="kt_docs_tinymce_basic2">
                    {{old('vision',$data->vision ?? '')}}
                </textarea>
            </div>
        </div>
        
        <div class="row mb-6">
            <label class="col-lg-2 col-form-label required fw-semibold fs-6">الرسالة </label>
            <div class="col-lg-10 fv-row">
                <textarea name="massage" id="kt_docs_tinymce_basic3">
                    {{old('massage',$data->massage ?? '')}}
                </textarea>
            </div>
        </div>
        
        <div class="row mb-6">
            <label class="col-lg-2 col-form-label required fw-semibold fs-6">الهدف </label>
            <div class="col-lg-10 fv-row">
                <textarea name="mission" id="kt_docs_tinymce_basic4">
                    {{old('mission',$data->mission ?? '')}}
                </textarea>
            </div>
        </div>
    </div>
    @endif
</div>








<script src="{{ URL::asset('dash/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>

<script>
    var options = {selector: "#kt_docs_tinymce_basic,#kt_docs_tinymce_basic2,#kt_docs_tinymce_basic3,#kt_docs_tinymce_basic4"};

    tinymce.init(options);

</script>
