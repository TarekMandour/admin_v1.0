

<div class="row mb-6">
    <label class="col-lg-2 col-form-label required fw-semibold fs-6">اسم</label>
    <div class="col-lg-8 fv-row">
        <input type="text" name="title" placeholder="الاسم" value="{{old('title',$data->title ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>

<div class="row mb-6">
    <!--begin::Label-->
    <label class="col-lg-2 col-form-label fw-semibold fs-6">المدينه  </label>
    <!--end::Label-->
    <div class="col-lg-8 fv-row">
        <select  data-control="select2" data-placeholder="Select an option" class=" input-text form-control  form-select  mb-3 mb-lg-0"  name="city_id">
            <option value="0">اختر مدينه</option>
            @foreach(\App\Models\City::all() as $city)
                <option @if(isset($data) && $data->city_id == $city->id) selected @endif value="{{$city->id}}">
                    {{$city->title}}
                </option>
            @endforeach
        </select>
    </div>
    <!--end::Input-->
</div>