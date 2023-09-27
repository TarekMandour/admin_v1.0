

<div class="row mb-6">
    <label class="col-lg-2 col-form-label required fw-semibold fs-6">اسم</label>
    <div class="col-lg-8 fv-row">
        <input type="text" name="name" placeholder="الاسم" value="{{old('name',$data->name ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>

<div class="row mb-6">
    <label class="col-lg-2 col-form-label required fw-semibold fs-6">الجوال</label>
    <div class="col-lg-8 fv-row">
        <input type="number" name="phone" placeholder="الجوال" value="{{old('phone',$data->phone ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>

<div class="row mb-6">
    <label class="col-lg-2 col-form-label fw-semibold fs-6">البريد الالكتروني</label>
    <div class="col-lg-8 fv-row">
        <input type="email" name="email" placeholder="البريد الالكتروني" value="{{old('email',$data->email ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>

<div class="row mb-6">
    <label class="col-lg-2 col-form-label required fw-semibold fs-6">محتوى الرسالة </label>
    <div class="col-lg-8 fv-row">
        <textarea class="form-control" data-kt-autosize="true" name="content" >{{old('content',$data->content ?? '')}}</textarea>
    </div>
</div>

<div class="fv-row mb-6">
    <div
        class="form-check form-switch form-check-custom form-check-solid">
        <label class="col-lg-2 form-check-label required fw-semibold fs-6" for="flexSwitchDefault">هل تم قراءته؟</label>
        <div class="col-lg-8 fv-row">
        <input class="form-check-input" name="status" type="hidden"
               value="unread" id="flexSwitchDefault"/>
        <input class="form-check-input w-45px h-25px "
               name="status" type="checkbox"    @if(isset($data) && $data->status == 'read') checked @endif
               value="read" id="flexSwitchDefault" />
        </div>
    </div>
</div>