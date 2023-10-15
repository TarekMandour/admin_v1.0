@extends('front.layout.master')

@section('style')
@endsection

@section('breadcrumb')
<section class="parallax-section single-par" data-scrollax-parent="true">
   <div class="bg par-elem "  data-bg="{{$settings->getFirstMediaUrl('breadcrumb','breadcrumbthumb')}}" data-scrollax="properties: { translateY: '30%' }"></div>
   <div class="overlay op7" style="background: #252525;"></div>
   <div class="container">
       <div class="section-title center-align big-title">
            <h2><span>{{$service->append_name}}</span></h2>
           <span class="section-separator"></span>
       </div>
   </div>
   <div class="header-sec-link">
       <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a> 
   </div>
</section>
@endsection

@section('content')

<section class="gray-bg" id="sec1">
   <div class="container">

       <div class="fl-wrap ">
           <div class="row">
               <div class="col-md-12">
                   <ul id="progressbar" class="no-list-style">
                       <li><span class="tolt" data-microtip-position="top" data-tooltip="اختيار الشتلات او الاشجار">01.</span></li>
                       <li><span class="tolt" data-microtip-position="top" data-tooltip="اختيار الاسماء">02.</span></li>
                       <li><span class="tolt" data-microtip-position="top" data-tooltip="الدفع ومراجعة الطلب">03.</span></li>
                       <li class="active"><span class="tolt" data-microtip-position="top" data-tooltip="تاكيد الطلب">04.</span></li>
                   </ul>
                   <div class="bookiing-form-wrap block_box fl-wrap">
                       <!--   list-single-main-item -->
                       <div class="list-single-main-item fl-wrap hidden-section tr-sec">
                           <div class="profile-edit-container">
                               <div class="custom-form">
                                   <form>

                                       <fieldset class="fl-wrap">
                                           <div class="list-single-main-item-title fl-wrap">
                                                <h3>{{trans('lang.Confirmation')}}</h3>
                                           </div>
                                           <div class="success-table-container">
                                               <div class="success-table-header fl-wrap">
                                                   <i class="fal fa-check-circle decsth"></i>
                                                   <h4>{{trans('lang.contributing_initiative')}}</h4>
                                                   <div class="clearfix"></div>
                                                   <p>{{trans('lang.confirmed_successfully')}}</p>
                                                   <a href="javascript:;" class="color-bg">{{trans('lang.order_number')}} {{$saveOrder->id}}</a>
                                               </div>
                                           </div>
                                       </fieldset>
                                   </form>
                               </div>
                           </div>
                       </div>
                       <!--   list-single-main-item end -->
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