@extends('front.layout.master')

@section('style')
@endsection

@section('content')

<section class="hero-section"   data-scrollax-parent="true">
   <div class="bg-tabs-wrap">
       <div class="bg-parallax-wrap" data-scrollax="properties: { translateY: '200px' }">
           <!--ms-container-->
           <div class="slideshow-container" data-scrollax="properties: { translateY: '300px' }" >
               <div class="swiper-container" dir="rtl">
                   <div class="swiper-wrapper">
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide">
                            <div class="ms-item_fs fl-wrap full-height">
                                <div class="bg" data-bg="{{$slider->getFirstMediaUrl('photo','thumb')}}"></div>
                                <div class="overlay op7"></div>
                            </div>
                        </div>
                    @endforeach

                   </div>
               </div>
           </div>
           <!--ms-container end-->
       </div>
   </div>
   <div class="container small-container">
       <div class="intro-item fl-wrap">
           <span class="section-separator"></span>
           <img src="{{$settings->getFirstMediaUrl('logoft','logoftthumb')}}"/>
           <img src="{{$settings->getFirstMediaUrl('logosc','logoscthumb')}}"/>
           <img src="{{$settings->getFirstMediaUrl('logoth','logoththumb')}}"/>
       </div>

   </div>
   <div class="header-sec-link">
       <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
   </div>
</section>

<section class="slw-sec" id="sec1">
   <div class="section-title">
       <h2>{{trans('lang.silently_creative_initiative')}}</h2>
       <span class="section-separator"></span>
   </div>
   <div class="container">
       <div class="fl-wrap">
           <h2 style="font-weight: 500;color: #1e1e1e;">
{{--               {!! $info->append_description !!}--}}
           </h2>
       </div>
       <a href="{{url('/about')}}" class="promo-link big_prom color2-bg"><i class="fal fa-link"></i><span>{{trans('lang.see_more')}}</span></a>
   </div>
</section>

<section class="parallax-section small-par" data-scrollax-parent="true">
   <div class="bg par-elem "  data-bg="{{$settings->getFirstMediaUrl('breadcrumb','breadcrumbthumb')}}" data-scrollax="properties: { translateY: '30%' }"></div>
   <div class="overlay  op7" style="background: #252525;"></div>
   <div class="container">
       <div class=" single-facts single-facts_2 fl-wrap">
           <!-- inline-facts -->
           <div class="inline-facts-wrap">
               <div class="inline-facts">
                   <div class="milestone-counter">
                       <div class="stats animaper">
                           <div class="num" data-content="0" data-num="{{$user['individual']}}">{{$user['individual']}}</div>
                       </div>
                   </div>
                   <h6>{{trans('lang.individual')}}</h6>
               </div>
           </div>
           <!-- inline-facts end -->
           <!-- inline-facts  -->
           <div class="inline-facts-wrap">
               <div class="inline-facts">
                   <div class="milestone-counter">
                       <div class="stats animaper">
                           <div class="num" data-content="0" data-num="{{$user['government']}}">{{$user['government']}}</div>
                       </div>
                   </div>
                   <h6>{{trans('lang.government')}}</h6>
               </div>
           </div>
           <!-- inline-facts end -->
           <!-- inline-facts  -->
           <div class="inline-facts-wrap">
               <div class="inline-facts">
                   <div class="milestone-counter">
                       <div class="stats animaper">
                           <div class="num" data-content="0" data-num="{{$user['private']}}">{{$user['private']}}</div>
                       </div>
                   </div>
                   <h6>{{trans('lang.private')}}</h6>
               </div>
           </div>
           <!-- inline-facts end -->
           <!-- inline-facts  -->
           <div class="inline-facts-wrap">
               <div class="inline-facts">
                   <div class="milestone-counter">
                       <div class="stats animaper">
                           <div class="num" data-content="0" data-num="{{$user['school']}}">{{$user['school']}}</div>
                       </div>
                   </div>
                   <h6>{{trans('lang.school')}}</h6>
               </div>
           </div>
           <!-- inline-facts end -->
       </div>
   </div>
</section>

<section class="gray-bg ">
   <div class="container big-container">
       <div class="section-title">
           <h2>{{trans('lang.nearest_campaigns')}}</h2>
           <span class="section-separator"></span>
       </div>
       <div class="grid-item-holder gallery-items fl-wrap">
{{--            @foreach ($services as $service_item)--}}
{{--                <!--  gallery-item-->--}}
{{--               <div class="gallery-item events">--}}
{{--                     <!-- listing-item  -->--}}
{{--                     <div class="listing-item">--}}
{{--                        <article class="geodir-category-listing fl-wrap">--}}
{{--                           <div class="geodir-category-content fl-wrap title-sin_item">--}}
{{--                                 <div class="geodir-category-content-title fl-wrap">--}}
{{--                                    <div class="geodir-category-content-title-item">--}}
{{--                                       <h3 class="title-sin_map"><a href="{{url('/service-details')}}/{{$service_item->id}}">{{$service_item->append_name}}</a></h3>--}}
{{--                                       <div class="geodir-category-location fl-wrap"><a href="{{url('/service-details')}}/{{$service_item->id}}" ><i class="fas fa-clock"></i> {{trans('lang.start_of')}} {{Carbon\Carbon::parse($service_item->individual_at)->format('Y-m-d : g:i') }}</a></div>--}}
{{--                                    </div>--}}
{{--                                 </div>--}}
{{--                                 <div class="geodir-category-text fl-wrap">--}}
{{--                                    <div class="facilities-list fl-wrap">--}}
{{--                                       @foreach ($service_item->trees as $tree_item)--}}
{{--                                       <div class="facilities-list-title">{{$tree_item->tree->append_title}}</div>--}}
{{--                                       @endforeach--}}
{{--                                    </div>--}}
{{--                                 </div>--}}
{{--                                 <div class="geodir-category-footer fl-wrap">--}}
{{--                                    <a class="listing-item-category-wrap">--}}
{{--                                       <div class="listing-item-category green-bg"><i class="fal fa-tree"></i></div>--}}
{{--                                       <span>{{trans('lang.target')}} : {{$service_item->target}}</span>--}}
{{--                                    </a>--}}
{{--                                    <div class="geodir-opt-list">--}}
{{--                                       <ul class="no-list-style">--}}
{{--                                             <li><a href="#1" class="single-map-item" data-newlatitude="{{$service_item->lat}}" data-newlongitude="{{$service_item->lng}}"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">{{trans('lang.location')}}</span> </a></li>--}}
{{--                                       </ul>--}}
{{--                                    </div>--}}
{{--                                 </div>--}}
{{--                           </div>--}}
{{--                        </article>--}}
{{--                     </div>--}}
{{--                     <!-- listing-item end -->--}}
{{--               </div>--}}
{{--               <!-- gallery-item  end-->--}}
{{--            @endforeach--}}


       </div>
       <a href="{{url('/services')}}" class="btn  dec_btn  color2-bg">{{trans('lang.see_more')}} <i class="fal fa-arrow-alt-left"></i></a>
   </div>
</section>

<section class="slw-sec" id="sec1">
    <div class="section-title">
        <h2>{{trans('lang.menu.blog')}}</h2>
        <span class="section-separator"></span>
    </div>
    <div class="listing-slider-wrap fl-wrap">
        <div class="listing-slider fl-wrap">
            <div class="swiper-container" dir="rtl">
                <div class="swiper-wrapper">

                    @foreach ($blogs as $blog_item)
                       <!--  swiper-slide  -->
                        @if ($blog_item->getMedia('photo')->count())
                        <div class="swiper-slide">
                            <div class="listing-slider-item fl-wrap">
                                <!-- listing-item  -->
                                <div class="listing-item listing_carditem">
                                    <article class="geodir-category-listing fl-wrap">
                                        @if ($blog_item->type == 'video')
                                        <div class="geodir-category-img">
                                            @if ($blog_item->type == 'image')
                                            <div class="geodir-js-favorite_btn"><i class="fal fa-images"></i><span> {{trans('lang.gallery')}}</span></div>
                                            @elseif ($blog_item->type == 'video')
                                            <div class="geodir-js-favorite_btn"><i class="fal fa-video"></i><span> {{trans('lang.videos')}}</span></div>
                                            @elseif ($blog_item->type == 'news')
                                            <div class="geodir-js-favorite_btn"><i class="fal fa-link"></i><span> {{trans('lang.news')}}</span></div>
                                            @endif
                                            <a href="{{$blog_item->link}}" class="image-popup geodir-category-img-wrap fl-wrap">
                                            <img src="{{$blog_item->getFirstMediaUrl('photo','thumb')}}" alt="{{$blog_item->append_title}}">
                                            </a>
                                            <a href="{{$blog_item->link}}" class="image-popup">
                                                <div class="geodir_status_date gsd_open alert-danger"><i class="fal fa-play"></i> {{trans('lang.watch')}}</div>
                                             </a>
                                            <div class="geodir-category-opt">

                                                <div class="listing_carditem_footer fl-wrap">
                                                    <div class="geodir-category-opt_title">
                                                        <h4><a href="{{$blog_item->link}}" class="image-popup">{{$blog_item->append_title}}</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="geodir-category-img">
                                            @if ($blog_item->type == 'image')
                                            <div class="geodir-js-favorite_btn"><i class="fal fa-images"></i><span> {{trans('lang.gallery')}}</span></div>
                                            @elseif ($blog_item->type == 'video')
                                            <div class="geodir-js-favorite_btn"><i class="fal fa-video"></i><span> {{trans('lang.videos')}}</span></div>
                                            @elseif ($blog_item->type == 'news')
                                            <div class="geodir-js-favorite_btn"><i class="fal fa-link"></i><span> {{trans('lang.news')}}</span></div>
                                            @endif
                                            <a href="{{url('/blog-details')}}/{{$blog_item->id}}" class="geodir-category-img-wrap fl-wrap">
                                            <img src="{{$blog_item->getFirstMediaUrl('photo','thumb')}}" alt="{{$blog_item->append_title}}">
                                            </a>
                                            <div class="geodir-category-opt">
                                                <div class="listing_carditem_footer fl-wrap">
                                                    <div class="geodir-category-opt_title">
                                                        <h4><a href="{{url('/blog-details')}}/{{$blog_item->id}}">{{$blog_item->append_title}}</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </article>
                                </div>
                                <!-- listing-item end -->
                            </div>
                        </div>
                        <!--  swiper-slide end  -->
                        @endif
                    @endforeach

                </div>
        <div class="tc-pagination_wrap">
            <div class="tc-pagination2"></div>
        </div>
            </div>
            <div class="listing-carousel-button listing-carousel-button-next2"><i class="fas fa-caret-right"></i></div>
            <div class="listing-carousel-button listing-carousel-button-prev2"><i class="fas fa-caret-left"></i></div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>

</script>
@endsection
