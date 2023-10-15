@extends('front.layout.master')

@section('style')
@endsection

@section('breadcrumb')
<section class="parallax-section single-par" data-scrollax-parent="true">
   <div class="bg par-elem "  data-bg="{{$settings->getFirstMediaUrl('breadcrumb','breadcrumbthumb')}}" data-scrollax="properties: { translateY: '30%' }"></div>
   <div class="overlay op7" style="background: #252525;"></div>
   <div class="container">
       <div class="section-title center-align big-title">
            <h2><span>{{$blog->append_title}}</span></h2>
           <span class="section-separator"></span>
       </div>
   </div>
   <div class="header-sec-link">
       <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a> 
   </div>
</section>
@endsection

@section('content')

<section class="gray-bg small-padding" id="sec1">
    <div class="container">

        <div class="post-container fl-wrap">
            <div class="row">

                <div class="col-md-2">
                </div>

                <div class="col-md-8">
                    <div class="list-single-main-wrapper fl-wrap" id="sec2">
                        <div class="list-single-main-media fl-wrap">
                            <div class="single-slider-wrap">
                                <div class="single-slider fl-wrap">
                                    <div class="swiper-container" dir="rtl">
                                        <div class="swiper-wrapper lightgallery">
                                            @if($blog->getMedia('photo')->count())
                                                @foreach ($blog->getMedia('photo') as $blog_item)
                                                    <div class="swiper-slide hov_zoom"><img src="{{$blog_item->getFullUrl('thumb')}}" alt="{{$blog->append_title}}"><a href="{{$blog_item->getFullUrl()}}" class="box-media-zoom   popup-image"><i class="fal fa-expand"></i></a></div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="listing-carousel_pagination">
                                            <div class="listing-carousel_pagination-wrap">
                                                <div class="ss-slider-pagination"></div>
                                            </div>
                                        </div>															
                                    </div>
                                    
                                </div>
                                <div class="ss-slider-cont ss-slider-cont-prev color2-bg"><i class="fal fa-long-arrow-left"></i></div>
                                <div class="ss-slider-cont ss-slider-cont-next color2-bg"><i class="fal fa-long-arrow-right"></i></div>
                            </div>
                        </div>

                        <div class="list-single-main-item fl-wrap block_box">
                            <div class="list-single-main-item-title">
                                <h3>{{$blog->append_title}}</h3>
                            </div>
                            <div class="list-single-main-item_content fl-wrap">
                                {!! $blog->append_description !!}
                            </div>
                        </div>
                                                      
                    </div>                                      
                </div>

                <div class="col-md-2">
                </div>

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