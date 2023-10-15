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

       <div class="row">
           <!-- list-single-main-wrapper-col -->
           <div class="col-md-7">
               
               <div class="list-single-main-wrapper fl-wrap" id="sec2">
                   <div class="list-single-main-media fl-wrap">
                     @if($service->getMedia('photo')->count())
                       <img src="{{$service->getFirstMediaUrl('photo','thumb')}}" class="respimg" alt="{{$service->append_name}}">
                       @endif
                   </div>

                   <div class="list-single-main-item fl-wrap block_box">
                       <div class="list-single-main-item-title">
                           <h3>{{$service->append_name}}</h3>
                       </div>
                       <div class="list-single-main-item_content fl-wrap">
                           <p>{{ $service->append_description }}</p>
                       </div>
                   </div>

                   <div class="list-single-main-item fl-wrap block_box">
                       <div class="list-single-main-item-title">
                           <h3>{{trans('lang.seed_tree')}}</h3>
                       </div>
                       <div class="list-single-main-item_content fl-wrap">
                           <div class="listing-features fl-wrap">
                               <ul class="no-list-style">
                                    @foreach ($service->trees as $tree_item)
                                       <li><a href="javascript:void(0)"><i class="fa fa-tree"></i> {{$tree_item->tree->append_title}}</a></li>
                                    @endforeach
                               </ul>
                           </div>
                       </div>
                   </div>

                    @php
                        $users = \App\Models\Order::select('user')->where('service_id', $service->id)->groupBy('user')->get();
                    @endphp
                    @if (count($users) > 0)
                        <div class="list-single-main-item fl-wrap block_box">
                        <div class="list-single-main-item-title">
                            <h3>{{trans('lang.campaign_participants')}}</h3>
                        </div>
                        <div class="testimonilas-carousel-wrap fl-wrap">
                            <div class="testimonilas-carousel" dir="rtl">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                            
                                            @foreach ($users as $user_item)
                                            @php
                                                $qtyTree = \App\Models\OrderTree::where('user_id', json_decode($user_item->user)->id)->where('service_id', $service->id)->sum('qty');
                                            @endphp
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <a href="{{route('serviceDetailsaccountuser',[$service->id,json_decode($user_item->user)->id])}}"><h3>{{json_decode($user_item->user)->name}}  </h3></a>
                                                            <h4>{{$qtyTree}} {{trans('lang.seedling')}}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                            @endforeach
                                        
                                        
                                    </div>
                                    <div class="tc-pagination"></div>
                                </div>
                            </div>
                        </div>
                        </div>
                    @endif

                    <div class="list-single-main-item fl-wrap block_box">
                        <div class="list-single-main-item_content fl-wrap">
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
                                    <div class="col-md-6">
                                        <div class="listing-slider-item fl-wrap" style="padding: 0 0 35px 0;">
                                            <!-- listing-item  -->
                                            <div class="listing_carditem">
                                                <article class="geodir-category-listing fl-wrap">
                                                    <div class="geodir-category-img">
                                                        @if ($news_item->type == 'image')
                                                        <div class="geodir-js-favorite_btn"><i class="fal fa-images"></i><span> {{trans('lang.gallery')}}</span></div>
                                                        @elseif ($news_item->type == 'video')
                                                        <div class="geodir-js-favorite_btn"><i class="fal fa-video"></i><span> {{trans('lang.videos')}}</span></div>
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
                                
                                </div>
                            </div>
                            
                            <div id="image" class="tabcontent">
                            <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic">
                                <div class="row">
                                    @foreach ($image as $image_item)
                                    @if ($image_item->getMedia('photo')->count())
                                    <div class="col-md-6">
                                        <div class="listing-slider-item fl-wrap" style="padding: 0 0 35px 0;">
                                            <!-- listing-item  -->
                                            <div class="listing_carditem">
                                                <article class="geodir-category-listing fl-wrap">
                                                    <div class="geodir-category-img">
                                                        @if ($image_item->type == 'image')
                                                        <div class="geodir-js-favorite_btn"><i class="fal fa-images"></i><span> {{trans('lang.gallery')}}</span></div>
                                                        @elseif ($image_item->type == 'video')
                                                        <div class="geodir-js-favorite_btn"><i class="fal fa-video"></i><span> {{trans('lang.videos')}}</span></div>
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
                                
                            </div>
                            </div>
                            
                            <div id="video" class="tabcontent">
                            <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic">
                                <div class="row">
                                    @foreach ($video as $video_item)
                                    @if ($video_item->getMedia('photo')->count())
                                    <div class="col-md-6">
                                        <div class="listing-slider-item fl-wrap" style="padding: 0 0 35px 0;">
                                            <!-- listing-item  -->
                                            <div class="listing_carditem">
                                                <article class="geodir-category-listing fl-wrap">
                                                    <div class="geodir-category-img">
                                                        @if ($video_item->type == 'image')
                                                        <div class="geodir-js-favorite_btn"><i class="fal fa-images"></i><span> {{trans('lang.gallery')}}</span></div>
                                                        @elseif ($video_item->type == 'video')
                                                        <div class="geodir-js-favorite_btn"><i class="fal fa-video"></i><span> {{trans('lang.videos')}}</span></div>
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
                                
                            </div>
                            </div>
                        </div>
                    </div>
                                                 
               </div>
           </div>
           <!-- list-single-main-wrapper-col end -->
           <!-- list-single-sidebar -->
           <div class="col-md-5">
                                           
               <!--box-widget-item -->                                       
               <div class="box-widget-item fl-wrap block_box">
                   <div class="box-widget-item-header">
                       <h3>{{trans('lang.campaign_information')}}</h3>
                   </div>
                   <div class="box-widget">
                       <div class="map-container">
                           <div id="singleMap" data-latitude="{{$service->lat}}" data-longitude="{{$service->lng}}" data-mapTitle="Our Location"></div>
                       </div>
                       <div class="box-widget-content bwc-nopad">
                           <div class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                               <ul class="no-list-style">
                                    <li><span><i class="fal fa-tree"></i> </span> <a href="javascript:;"> {{trans('lang.target')}} {{$service->target}} </a></li>
                                   <li><span><i class="fal fa-map-marker-alt"></i> </span> <a href="javascript:;">{{$settings->append_address}}</a></li>                                   
                               </ul>
                           </div>
                           <div class="list-widget-social bottom-bcw-box  fl-wrap">
                               <br>
                               <a class="btn color2-bg" href="{{route('booking', $service->id)}}" style="font-size: 16px;"> {{trans('lang.campaign_join')}} <i class="far fa-shopping-cart"></i></a>
                               <br><br>
                           </div>
                       </div>

                       
                   </div>
               </div>
                <div class="box-widget-item fl-wrap block_box">
                    <div class="box-widget-item-header">
                        <h3>{{trans('lang.subscription_dates')}}</h3>
                    </div>
                    <div class="box-widget fl-wrap">
                        <div class="box-widget-content">
                            <ul class="cat-item no-list-style">
                                <li><a href="javascript:;">{{trans('lang.individual')}}</a> <span>{{Carbon\Carbon::parse($service->individual_at)->format('Y-m-d : g:i') }}</span></li>
                                <li><a href="javascript:;">{{trans('lang.government')}}</a> <span>{{Carbon\Carbon::parse($service->government_at)->format('Y-m-d : g:i') }} </span></li>
                                <li><a href="javascript:;">{{trans('lang.private')}}</a> <span>{{Carbon\Carbon::parse($service->private_at)->format('Y-m-d : g:i') }} </span></li>
                                <li><a href="javascript:;">{{trans('lang.school')}}</a> <span>{{Carbon\Carbon::parse($service->school_at)->format('Y-m-d : g:i') }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
               
               <div class="box-widget-item fl-wrap block_box">
                   <div class="box-widget-item-header">
                       <h3>{{trans('lang.campaign_status')}}</h3>
                   </div>
                   <div class="box-widget">
                       <table class="table table-border checkout-table">
                           <tbody>
                               <tr>
                                   <th style="width: 60%;">{{trans('lang.seedling')}}</th>
                                   <th style="width: 20%;">{{trans('lang.residual')}}</th>
                                   <th style="width: 20%;">{{trans('lang.contribution')}}</th>
                               </tr>
                               @foreach ($service->trees as $tree_item)
                               @php
                               $qty = \App\Models\OrderTree::where('tree_id', $tree_item->id)->sum('qty');
                               @endphp
                                <tr>
                                    <td>
                                        <h5 class="product-name">{{$tree_item->tree->append_title}}</h5>
                                    </td>
                                    <td>
                                        <h5 class="product-name">{{$tree_item->target - $qty }}</h5>
                                    </td>
                                    <td>
                                        <h5 class="product-name">{{$qty}}</h5>
                                    </td>
                                </tr> 
                               @endforeach             
                           </tbody>
                       </table>                                            
                   </div>
               </div>                                 

           </div>
           <!-- list-single-sidebar end -->                                
       </div>
   </div>
</section>
<div class="limit-box fl-wrap"></div>

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