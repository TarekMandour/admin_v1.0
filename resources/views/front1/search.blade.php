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
                    نتائج البحث
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
                        نتائج البحث
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

<section class="service__grid pt-120 pb-120 sectionbg2">
   <div class="container">
      <div class="row g-4">
         <div class="col-xl-12 col-lg-12">

            <div class="showing__gridlist__body">
               <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                     <div class="row justify-content-center g-4">
                        @if (count($services) == 0)
                            <h4 class="fz-18 fw-bold inter text-center base">لا توجد نتائج</h4>
                        @endif
                        @foreach ($services as $serv)
                           <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                              <div class="frelancer__item shadow2 round16 bgwhite text-center">
                                 <h5 class="mt-14 mb-10">
                                    <a href="javascript:void(0)" onclick="servicedata({{$serv->id}})" data-bs-toggle="modal" data-bs-target="#servicemodal" class="title">
                                       {{$serv->name}}
                                    </a>
                                 </h5>
                                 <div class="bborderdash pb-10 align-items-center justify-content-between">
                                    <div class="fz-16 fw-400 gap-2 inter pra align-items-center text-center">
                                       {{$serv->category->name}}
                                    </div>
                                 </div>
                                 <div class="d-flex align-items-center mt-10 justify-content-between">
                                    <span class="fz-18 fw-600 inter base">
                                       {{$serv->price}}   ر.س  
                                    </span>
                                    <div class="cmn__ibox boxes1 round50 d-flex align-items-center justify-content-center">
                                       <a href="javascript:void(0)" onclick="servicedata({{$serv->id}})" data-bs-toggle="modal" data-bs-target="#servicemodal" class="" >
                                          <i class="bi bi-cart title fz-16 inter "></i>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        @endforeach
                      
                     </div>
                     
                     {{ $services->onEachSide(5)->links('front.layout.pagination') }}
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
    function servicedata(id) {

      $.ajax({
         type: "GET",
         url: "{{url('servicemodal')}}"+'/'+id,
         data: {"id": id},
         success: function (data) {
            // var audio = new Audio("{{ URL::asset('public/adminAssets/ar/barcode-beep.mp3') }}");
            // audio.volume = .5;
            // audio.play();

            if(data.msg) {
            } else {
                  $("#service-modal").html(data);
            }
         }
      });
    }
</script>
@endsection