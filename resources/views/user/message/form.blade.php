<div class="row">
    <div @if (isset($data) && $data->id == 1) class="col-lg-6" @else class="col-lg-12" @endif>
        <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-semibold fs-6">ارفاق صورة</label>
            <div class="col-lg-10">
                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('dash/assets/media/avatars/blank.png')}})">
                    @if (isset($data) && $data->getMedia('messages')->count())
                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{$data->getFirstMediaUrl('messages', 'thumb')}})"></div>
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
            <label class="col-lg-2 col-form-label required fw-semibold fs-6">اسم المستقبل</label>
            <div class="col-lg-10 fv-row">
                <select  data-control="select2" data-placeholder="Select an option" class=" input-text form-control  form-select  mb-3 mb-lg-0"  name="receiver_id">
                    <option value="0">اختر مشرف</option>
                    @foreach(\App\Models\Supervisor::all() as $supervisor)
                        <option @if(isset($data) && $data->receiver_id == $supervisor->id) selected @endif value="{{$supervisor->id}}">
                            {{$supervisor->name_ar}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-2 col-form-label required fw-semibold fs-6">محتوى الرسالة</label>
            <div class="col-lg-10 fv-row">
                <textarea name="description" id="kt_docs_tinymce_basic">
                    {{old('description',$data->description ?? '')}}
                </textarea>
            </div>
        </div>
{{--        <div class="row mb-6">--}}
{{--            <label class="col-lg-2 col-form-label required fw-semibold fs-6">ارفاق صورة</label>--}}
{{--            <div class="col-lg-10 fv-row">--}}
{{--                <input type="file" name="photo" accept=".png, .jpg, .jpeg"/>--}}
{{--                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="fv-row mb-6">
            <div
                class="form-check form-switch form-check-custom form-check-solid">
                <label class="col-lg-4 form-check-label required fw-semibold fs-6" for="flexSwitchDefault">هل تم قراءته؟</label>
                <div class="col-lg-8 fv-row">
                    <input class="form-check-input" name="status" type="hidden"
                           value="unread" id="flexSwitchDefault"/>
                    <input class="form-check-input w-45px h-25px "
                           name="status" type="checkbox"    @if(isset($data) && $data->status == 'read') checked @endif
                           value="read" id="flexSwitchDefault" />
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ URL::asset('dash/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>

<script>
    var options = {selector: "#kt_docs_tinymce_basic,#kt_docs_tinymce_basic2,#kt_docs_tinymce_basic3,#kt_docs_tinymce_basic4"};

    tinymce.init(options);

</script>
