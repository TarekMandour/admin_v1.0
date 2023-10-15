@extends('front.layout.master')

@section('style')
<style>
   /* Style the tab */
.tab {
  overflow: hidden;
  margin-top: 50px
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: right;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 8px 16px;
   font-family: 'Tajawal';
  margin: 0px 10px;
   border: 2px solid #2e3f6e;
   border-radius: 15px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #2e3f6e;
  color: #ffffff;
}

/* Create an active/current tablink class */
.tab button.active {
   background-color: #2e3f6e;
  color: #ffffff;
}

/* Style the tab content */
.tabcontent {
  display: none;
}
</style>
@endsection

@section('breadcrumb')
<section class="parallax-section single-par" data-scrollax-parent="true">
   <div class="bg par-elem "  data-bg="{{$settings->getFirstMediaUrl('breadcrumb','breadcrumbthumb')}}" data-scrollax="properties: { translateY: '30%' }"></div>
   <div class="overlay op7" style="background: #252525;"></div>
   <div class="container">
       <div class="section-title center-align big-title">
            <h2><span>{{trans('lang.menu.blog')}}</span></h2>
           <span class="section-separator"></span>
       </div>
   </div>
   <div class="header-sec-link">
       <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a> 
   </div>
</section>
@endsection

@section('content')

<section class="gray-bg small-padding no-top-padding-sec" id="sec1">
   <div class="container">
       <!-- list-main-wrap-header-->
       
       <!-- list-main-wrap-header end-->                      
       <div class="fl-wrap">
         <div class="tab">
            <button class="tablinks" onclick="openType(event, 'news')" id="defaultOpen">{{trans('lang.news')}}</button>
            <button class="tablinks" onclick="openType(event, 'image')">{{trans('lang.gallery2')}}</button>
            <button class="tablinks" onclick="openType(event, 'video')">{{trans('lang.videos2')}}</button>
          </div>
          
          <!-- Tab content -->
          <div id="news" class="tabcontent">
            <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic">
               <div class="row">
                  @foreach ($news as $news_item)
                  @if ($news_item->getMedia('photo')->count())
                   <div class="col-md-4">
                       <div class="listing-slider-item fl-wrap" style="padding: 0 0 35px 0;">
                           <!-- listing-item  -->
                           <div class="listing_carditem">
                               <article class="geodir-category-listing fl-wrap">
                                   <div class="geodir-category-img">
                                       @if ($news_item->type == 'image')
                                       <div class="geodir-js-favorite_btn"><i class="fal fa-images"></i><span> {{trans('lang.gallery')}}</span></div>
                                       @elseif ($news_item->type == 'video')
                                       <div class="geodir-js-favorite_btn"><i class="fal fa-video"></i><span> {{trans('lang.videos2')}}</span></div>
                                       @elseif ($news_item->type == 'news')
                                       <div class="geodir-js-favorite_btn"><i class="fal fa-link"></i><span> {{trans('lang.news')}}</span></div>
                                       @endif
                                       <a href="{{url('/blog-details')}}/{{$news_item->id}}" class="geodir-category-img-wrap fl-wrap">
                                       <img src="{{$news_item->getFirstMediaUrl('photo','thumb')}}" alt=""> 
                                       </a>

                                       <div class="geodir-category-opt">
                                           
                                           <div class="listing_carditem_footer fl-wrap">
                                               <div class="geodir-category-opt_title">
                                                   <h4><a href="{{url('/blog-details')}}/{{$news_item->id}}">{{$news_item->append_title}}</a></h4>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </article>
                           </div>
                           <!-- listing-item end -->                                                   
                       </div>  
                   </div>  
                   @endif
                  @endforeach
               </div>                                                                                        

               {{ $news->onEachSide(5)->links('front.layout.pagination') }}
               
            </div>
          </div>
          
          <div id="image" class="tabcontent">
            <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic">
               <div class="row">
                  @foreach ($image as $image_item)
                  @if ($image_item->getMedia('photo')->count())
                   <div class="col-md-4">
                       <div class="listing-slider-item fl-wrap" style="padding: 0 0 35px 0;">
                           <!-- listing-item  -->
                           <div class="listing_carditem">
                               <article class="geodir-category-listing fl-wrap">
                                   <div class="geodir-category-img">
                                       @if ($image_item->type == 'image')
                                       <div class="geodir-js-favorite_btn"><i class="fal fa-images"></i><span> {{trans('lang.gallery')}}</span></div>
                                       @elseif ($image_item->type == 'video')
                                       <div class="geodir-js-favorite_btn"><i class="fal fa-video"></i><span> {{trans('lang.videos2')}}</span></div>
                                       @elseif ($image_item->type == 'news')
                                       <div class="geodir-js-favorite_btn"><i class="fal fa-link"></i><span> {{trans('lang.news')}}</span></div>
                                       @endif
                                       <a href="{{url('/blog-details')}}/{{$image_item->id}}" class="geodir-category-img-wrap fl-wrap">
                                       <img src="{{$image_item->getFirstMediaUrl('photo','thumb')}}" alt=""> 
                                       </a>
                                       
                                       <div class="geodir-category-opt">
                                           
                                           <div class="listing_carditem_footer fl-wrap">
                                               <div class="geodir-category-opt_title">
                                                   <h4><a href="{{url('/blog-details')}}/{{$image_item->id}}">{{$image_item->append_title}}</a></h4>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </article>
                           </div>
                           <!-- listing-item end -->                                                   
                       </div>  
                   </div>  
                   @endif
                  @endforeach
               </div>                                                                                        

               {{ $image->onEachSide(5)->links('front.layout.pagination') }}
               
            </div>
          </div>
          
          <div id="video" class="tabcontent">
            <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic">
               <div class="row">
                  @foreach ($video as $video_item)
                  @if ($video_item->getMedia('photo')->count())
                   <div class="col-md-4">
                       <div class="listing-slider-item fl-wrap" style="padding: 0 0 35px 0;">
                           <!-- listing-item  -->
                           <div class="listing_carditem">
                               <article class="geodir-category-listing fl-wrap">
                                   <div class="geodir-category-img">
                                       @if ($video_item->type == 'image')
                                       <div class="geodir-js-favorite_btn"><i class="fal fa-images"></i><span> {{trans('lang.gallery')}}</span></div>
                                       @elseif ($video_item->type == 'video')
                                       <div class="geodir-js-favorite_btn"><i class="fal fa-video"></i><span> {{trans('lang.videos2')}}</span></div>
                                       @elseif ($video_item->type == 'news')
                                       <div class="geodir-js-favorite_btn"><i class="fal fa-link"></i><span> {{trans('lang.news')}}</span></div>
                                       @endif
                                       <a href="{{$video_item->link}}" class="image-popup geodir-category-img-wrap fl-wrap">
                                       <img src="{{$video_item->getFirstMediaUrl('photo','thumb')}}" alt=""> 
                                       </a>
                                       <a href="{{$video_item->link}}" class="image-popup">
                                          <div class="geodir_status_date gsd_open alert-danger"><i class="fal fa-play"></i>{{trans('lang.watch')}}</div>
                                       </a>
                                       <div class="geodir-category-opt">
                                           
                                           <div class="listing_carditem_footer fl-wrap">
                                               <div class="geodir-category-opt_title">
                                                   <h4><a href="{{$video_item->link}}" class="image-popup">{{$video_item->append_title}}</a></h4>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </article>
                           </div>
                           <!-- listing-item end -->                                                   
                       </div>  
                   </div>  
                   @endif
                  @endforeach
               </div>                                                                                        

               {{ $image->onEachSide(5)->links('front.layout.pagination') }}
               
            </div>
          </div>
           <!-- listing-item-container -->
           
           <!-- listing-item-container end -->
       </div>
   </div>
</section>
<div class="limit-box fl-wrap"></div>

@endsection

@section('script')
<script>
   document.getElementById("defaultOpen").click();
   function openType(evt, cityName) {
      // Declare all variables
      var i, tabcontent, tablinks;

      // Get all elements with class="tabcontent" and hide them
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
         tabcontent[i].style.display = "none";
      }

      // Get all elements with class="tablinks" and remove the class "active"
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
         tablinks[i].className = tablinks[i].className.replace(" active", "");
      }

      // Show the current tab, and add an "active" class to the button that opened the tab
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
   }
</script>
@endsection