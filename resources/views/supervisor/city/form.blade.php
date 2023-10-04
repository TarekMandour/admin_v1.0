<div class="row mb-6">
    <label class="col-lg-4 col-form-label required fw-semibold fs-6">الدولة</label>
    <div class="col-lg-8 fv-row">
        <select class="form-control" name="country_id">
            @foreach(\App\Models\Country::all() as $country)
            <option value="{{old('country_id',$data->country_id ?? $country->id)}}" >{{$country->title_ar}}</option>
            @endforeach
        </select>
        </div>
</div>
<div class="row mb-6">
    <label class="col-lg-4 col-form-label required fw-semibold fs-6">العنوان عربي</label>
    <div class="col-lg-8 fv-row">
        <input type="text" name="title_ar" placeholder="العنوان عربي" value="{{old('title_ar',$data->title_ar ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>
<div class="row mb-6">
    <label class="col-lg-4 col-form-label required fw-semibold fs-6">العنوان انجليزي</label>
    <div class="col-lg-8 fv-row">
        <input type="text" name="title_en" placeholder="العنوان انجليزي" value="{{old('title_en',$data->title_en ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>
