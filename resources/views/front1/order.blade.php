@extends('front.layout.master')

@section('css')
@endsection

@section('style')
@endsection

@section('content')

<div class="breadcumnd__wrapper">
   <div class="container">
      <div class="row align-items-center justify-content-between">
         <div class="col-xxl-6 col-xl-6 col-lg-7 col-md-7 col-sm-7">
            <div class="breadcumnd__content py-5 base">
               <span class="d4 mb-24">
                  تاكيد الطلب
               </span>
               <ul class="breadcun__list flex-wrap gap-1 d-flex align-items-center">
                  <li>
                     <a href="{{url('/')}}" class="fz-16 fw-400 inter">
                        الرئيسية
                     </a>
                  </li>
                  <li>
                     <i class="bi bi-chevron-left"></i>
                  </li>
                  <li>
                     <span class="fz-16 fw-400 inter base">
                        تاكيد الطلب
                     </span>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
</section>
<!-- Hero Section End -->

<section class="postrequest__section pt-120 pb-120">
   <div class="container">
      <div class="row g-4">
         <div class="col-lg-8">
            
            <div class="overview__gitwrapper bgwhite round16 border">

               <div class="overview__showcase ralt">
                     <div class="overview__showcasewrap post__requestwrap">
                        <div class="overview__inntercase ralt d-flex align-items-center">
                           <a href="javascript:void(0)" class="d-block ralt over__item fz-16 fw-500 inter pra">
                              <span class="ver__innerbox d-flex align-items-center justify-content-center">
                                 <span class="over__box d-flex align-items-center justify-content-center round100">
                                    
                                 </span>
                              </span>
                              تاكيد الطلب
                           </a>
                           <a href="javascript:void(0)" class="d-block ralt over__item fz-16 fw-500 inter pra">
                              <span class="ver__innerbox d-flex align-items-center justify-content-center">
                                 
                              </span>
                              حالة الطلب
                           </a>
                        </div>
                     </div>
               </div>

                  @if (isset($error))
                     <div class="alert alert-danger" role="alert">
                        {{$error}}
                     </div>
                  @endif

               <span class="fz-20 fw-500 title inter mb-10 d-block">
                  سجل بياناتك
               </span>
               <form action="{{route('ordersuccess')}}" method="POST">
                  @csrf

                  <input type="hidden" name="category_id" value="{{$service->category_id}}" />
                  <input type="hidden" name="service_id" value="{{$service->id}}" />

                  <input type="text" name="name" value="" required class="addquestion mb-30" placeholder="ادخل الاسم بالكامل">

                  <input type="number" name="phone" value="" required class="addquestion mb-30" placeholder="ادخل رقم الجوال">

                  <div class="btn__grp d-flex align-items-center gap-4 flex-wrap">
                     <button type="submit" class="cmn--btn">
                        <span>
                           تاكيد الطلب
                        </span>
                     </button>
                  </div>
               </form>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="start__definingbar">
               <div class="defining__box round16 border bgwhite">
                  <div class="d-flex mb-24 align-items-center justify-content-between">
                     <span class="fz-18 fw-500 inter pra">
                        {{$service->name}}
                     </span>
                     <h3 class="base">
                        {{$service->price}} <span>ر.س</span>  
                     </h3>
                 </div>
                 <div class="fz-16 fw-400 inter pra pb-20 mb-20 align-items-center justify-content-between">
                  {!! $service->description !!}
                  </div>
               </div>
            </div>   
         </div>
      </div>
   </div>
</section>

@endsection

@section('script')
<script>
    
</script>
@endsection