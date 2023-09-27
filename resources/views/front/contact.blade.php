@extends('front.layout.master')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb')
<section class="parallax-section single-par" data-scrollax-parent="true">
   <div class="bg par-elem "  data-bg="{{$settings->getFirstMediaUrl('breadcrumb','breadcrumbthumb')}}" data-scrollax="properties: { translateY: '30%' }"></div>
   <div class="overlay op7" style="background: #252525;"></div>
   <div class="container">
       <div class="section-title center-align big-title">
            <h2><span>{{trans('lang.menu.contact')}}</span></h2>
           <span class="section-separator"></span>
       </div>
   </div>
   <div class="header-sec-link">
       <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a> 
   </div>
</section>
@endsection

@section('content')

<section   id="sec1" data-scrollax-parent="true">
   <div class="container">
       <!--about-wrap -->
       <div class="about-wrap">
           <div class="row">
               <div class="col-md-3">
                                                           
               </div>
               <div class="col-md-6">
                   <div class="ab_text">
                       <div class="ab_text-title fl-wrap">
                           <h3>{{trans('lang.contaact_welcome')}}</h3>
                           <span class="section-separator fl-sec-sep"></span>
                       </div>
                       <div id="contact-form">
                           
                           @if (session()->has("message"))
                           
                              @if (session()->get("status") == 'error')
                              <div id="message" class="alert alert-danger">
                                 <div  role="alert">
                                    {{session()->get("message")}}
                                 </div>
                              </div>
                              @else
                              <div id="message" class="alert alert-success">
                                 <div role="alert">
                                    {{session()->get("message")}}
                                 </div>
                              </div>
                              @endif
                           
                           @endif
                        
                           <form  class="custom-form" action="{{route('contactsubmit')}}" method="POST" name="contactform">
                              @csrf 
                              <fieldset>
                                   <label><i class="fal fa-user"></i></label>
                                   <input type="text" name="name" id="name" placeholder="{{trans('lang.c_name')}}" value=""/>
                                   <div class="clearfix"></div>
                                   <label><i class="fal fa-phone"></i>  </label>
                                   <input type="text"  name="phone" id="phone" placeholder="{{trans('lang.c_phone')}}" value=""/>
                                   <div class="clearfix"></div>
                                   <label><i class="fal fa-envelope"></i>  </label>
                                   <input type="text"  name="email" id="email" placeholder="{{trans('lang.c_email')}}" value=""/>
                                   <textarea name="content"  id="content" cols="40" rows="3" placeholder="{{trans('lang.c_msg')}}"></textarea>
                               </fieldset>
                               <button class="btn float-btn color2-bg" type="submit"> {{trans('lang.c_send')}}<i class="fal fa-paper-plane"></i></button>
                           </form>
                       </div>
                       <!-- contact form  end--> 
                   </div>
               </div>
               <div class="col-md-3">
                                                           
               </div>
           </div>
       </div>
       <!-- about-wrap end  --> 
   </div>
</section>
<section class="no-padding-section">
   <div class="map-container">
       <div id="singleMap" data-latitude="{{$settings->lat}}" data-longitude="{{$settings->lng}}" data-mapTitle="{{trans('lang.location')}}"></div>
   </div>
</section>

@endsection

@section('script')
<script>
    
</script>
@endsection