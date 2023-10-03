<div class="row mb-6">
    <label class="col-lg-2 col-form-label required fw-semibold fs-6">العنوان عربي</label>
    <div class="col-lg-8 fv-row">
        <input type="text" name="title_ar" placeholder="العنوان عربي" value="{{old('title_ar',$data->title_ar ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>
<div class="row mb-6">
    <label class="col-lg-2 col-form-label required fw-semibold fs-6">العنوان انجليزي</label>
    <div class="col-lg-8 fv-row">
        <input type="text" name="title_en" placeholder="العنوان انجليزي" value="{{old('title_en',$data->title_en ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>
<div class="row mb-6">
    <label class="col-lg-2 col-form-label required fw-semibold fs-6">الجنسية عربي</label>
    <div class="col-lg-8 fv-row">
        <input type="text" name="nationality_ar" placeholder="الجنسية عربي" value="{{old('nationality_ar',$data->nationality_ar ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>
<div class="row mb-6">
    <label class="col-lg-2 col-form-label required fw-semibold fs-6">الجنسية انجليزي</label>
    <div class="col-lg-8 fv-row">
        <input type="text" name="nationality_en" placeholder="الجنسية انجليزي" value="{{old('nationality_en',$data->nationality_en ?? '')}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
    </div>
</div>
