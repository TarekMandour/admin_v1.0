<div class="row mb-6">
    <label class="col-lg-4 col-form-label required fw-semibold fs-6">الفرع</label>
    <div class="col-lg-8 fv-row">
        <select  data-control="select2" data-placeholder="Select an option" class="newstype input-text form-control  form-select  mb-3 mb-lg-0"  name="branch_id">
            @foreach(App\Models\Branch::all() as $branch)
            <option value="{{$branch->id}}" @if(isset($data) && $data->branch_id == $branch->id) selected @endif>{{$branch->title_ar}}</option>
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
    <label class="col-lg-4 col-form-label required fw-semibold fs-6">الوصف عربي</label>
    <div class="col-lg-8 fv-row">
        <textarea name="description_ar" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" >{{old('description_ar',$data->description_ar ?? '')}}</textarea>
    </div>
</div>
<div class="row mb-6">
    <label class="col-lg-4 col-form-label required fw-semibold fs-6">العنوان انجليزي</label>
    <div class="col-lg-8 fv-row">
        <input type="text" name="title_en" placeholder="العنوان انجليزي" value="{{old('title_en',$data->title_en ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>
<div class="row mb-6">
    <label class="col-lg-4 col-form-label required fw-semibold fs-6">الوصف انجليزي</label>
    <div class="col-lg-8 fv-row">
        <textarea name="description_en" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" >{{old('description_en',$data->description_en ?? '')}}</textarea>
    </div>
</div>
