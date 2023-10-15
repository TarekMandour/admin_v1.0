<form action="{{route('order')}}" method="POST" >
    @csrf

    @if(isset($service))
    
    <input type="hidden" name="service_id" value="{{$service->id}}" />
    
    <div class="d-flex mb-24 align-items-center justify-content-between">
        <span class="fz-18 fw-500 inter pra">
        {{$service->name}}
        </span>
        <h3 class="base">
            {{$service->price}} <span>ر.س</span>  
        </h3>
    </div>

    <div class="fz-16 fw-400 inter pra mb-8 align-items-center justify-content-between">
        {!! $service->description !!}
    </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="cmn--btn outline__btn" data-bs-dismiss="modal"><span>اغلاق</span></button>
    <button type="submit" class="cmn--btn outline__btn"><span>تقديم الطلب</span></button>
    </div>
    @endif

</form>