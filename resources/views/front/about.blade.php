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
            <h2><span>{{trans('lang.menu.about')}}</span></h2>
           <span class="section-separator"></span>
       </div>
   </div>
   <div class="header-sec-link">
       <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a> 
   </div>
</section>
@endsection

@section('content')

<section class="gray-bg" id="sec3">
   <div class="container">

       <div class="post-container fl-wrap">
           <div class="row">
               
                @if (App::getLocale() == 'ar')
                    <!-- blog content-->
                    <div class="col-md-3">
                        <div class="faq-nav help-bar scroll-init">
                            <ul class="no-list-style">
                                @foreach ($about as $key => $about_item)
                                <li>
                                    <a href="#fq{{$key}}">
                                        <span>{{$about_item->append_name}}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- blog conten end-->
                @endif
               <!-- blog sidebar -->
               <div class="col-md-9">
                  
                     @foreach ($about as $key => $about_item)
                     <!-- faq-section -->
                     <div class="faq-title faq-title_first fl-wrap">{{$about_item->append_name}}</div>
                     <div class="faq-section fl-wrap" id="fq{{$key}}">
                        <!-- accordion-->
                        <div class="accordion">

                           @foreach ($about_item->parents as $about_sub_item)
                              <a class="toggle act-accordion" href="#">{{$about_sub_item->append_name}}<span></span></a>
                              <div class="accordion-inner visible">
                                 <p>{!! $about_sub_item->append_description !!}</p>
                              </div>
                           @endforeach

                        </div>
                        <!-- accordion end -->                                               
                     </div>
                     <!-- faq-section end -->
                   @endforeach


               </div>
               <!-- blog sidebar end -->
               @if (App::getLocale() == 'en')
               <!-- blog content-->
               <div class="col-md-3">
                    <div class="faq-nav help-bar scroll-init">
                        <ul class="no-list-style">
                            @foreach ($about as $key => $about_item)
                            <li>
                                <a href="#fq{{$key}}">
                                    <span>{{$about_item->append_name}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- blog conten end-->
                @endif
           </div>
       </div>
   </div>
</section>
<div class="limit-box fl-wrap"></div>

@endsection

@section('script')
<script>
    
</script>
@endsection