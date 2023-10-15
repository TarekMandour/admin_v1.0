@extends('front.layout.master')

@section('style')
@endsection

@section('breadcrumb')
<section class="parallax-section single-par" data-scrollax-parent="true">
   <div class="bg par-elem "  data-bg="{{$settings->getFirstMediaUrl('breadcrumb','breadcrumbthumb')}}" data-scrollax="properties: { translateY: '30%' }"></div>
   <div class="overlay op7" style="background: #252525;"></div>
   <div class="container">
       <div class="section-title center-align big-title">
            <h2><span>{{trans('lang.menu.service')}}</span></h2>
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
           <!-- listsearch-input-wrap-->
           <div class="listsearch-input-wrap fl-wrap tabs-act inline-lsiw" id="lisfw">
               <!--tabs -->                       
               <div class="tabs-container fl-wrap">
                   <!--tab -->
                   <div class="tab">
                       <div id="filters-search" class="tab-content  first-tab ">
                           <div class="fl-wrap">
                              <form action="{{route('servicesubmit')}}" method="POST">
                                 @csrf

                                 <div class="row">
                                    <!-- listsearch-input-item-->
                                    <div class="col-md-4">
                                          <div class="listsearch-input-item">
                                             <span class="iconn-dec"><i class="far fa-bookmark"></i></span>
                                             <input type="text" name="name" placeholder="{{trans('lang.campaigns')}}" value=""/>
                                          </div>
                                    </div>
                                    <!-- listsearch-input-item end-->
                                    <!-- listsearch-input-item-->
                                    <div class="col-md-4">
                                          <div class="listsearch-input-item">
                                             <select data-placeholder="{{trans('lang.seedlings')}}" name="tree_id"  class="chosen-select no-search-select" >
                                                <option value="">{{trans('lang.seed')}}</option>
                                                @foreach (\App\Models\Tree::all() as $tree_item)
                                                   <option value="{{$tree_item->id}}">{{$tree_item->append_title}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                    </div>
                                    <!-- listsearch-input-item end-->
                                    <!-- listsearch-input-item-->
                                    <div class="col-md-4">
                                          <div class="listsearch-input-item">
                                             <select data-placeholder="City/Location" name="city_id" class="chosen-select no-search-select" >
                                                <option value="">{{trans('lang.cities')}}</option>
                                                @foreach (\App\Models\City::all() as $city_item)
                                                   <option value="{{$city_item->id}}">{{$city_item->append_title}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                    </div>
                                    <!-- listsearch-input-item end-->  
                                    <!-- listsearch-input-item-->
                                    <div class="col-md-5">
                                          <div class="listsearch-input-item">
                                             <input type="date" placeholder="{{trans('lang.starting_date')}}"     name="datefrom"   value=""/>
                                          </div>
                                    </div>
                                    <div class="col-md-5">
                                          <div class="listsearch-input-item">
                                             <input type="date" placeholder="{{trans('lang.end_date')}}"     name="dateto"   value=""/>
                                          </div>
                                    </div>
                                    <!-- listsearch-input-end-->                                                    
                                    <!-- listsearch-input-item-->
                                    <div class="col-md-2">
                                          <div class="listsearch-input-item">
                                             <button type="submit" class="header-search-button color-bg"><i class="far fa-search"></i><span>{{trans('lang.search')}}</span></button>
                                          </div>
                                    </div>
                                    <!-- listsearch-input-item end-->                                         
                                 </div>

                           </div>
                       </div>
                   </div>
                   <!--tab end-->
               </div>
               <!--tabs end-->
           </div>
           <!-- listsearch-input-wrap end-->                                
           <!-- listing-item-container -->
           <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic three-columns-grid">

               @foreach ($services as $service_item)
                  <div class="listing-item">
                     <article class="geodir-category-listing fl-wrap">
                        <div class="geodir-category-content fl-wrap title-sin_item">
                           <div class="geodir-category-content-title fl-wrap">
                                 <div class="geodir-category-content-title-item">
                                    <h3 class="title-sin_map"><a href="{{url('/service-details')}}/{{$service_item->id}}">{{$service_item->append_name}}</a></h3>
                                    <div class="geodir-category-location fl-wrap"><a href="{{url('/service-details')}}/{{$service_item->id}}" ><i class="fas fa-map-marker-alt"></i> {{trans('lang.start_of')}} {{Carbon\Carbon::parse($service_item->individual_at)->format('Y-m-d : g:i') }}</a></div>
                                 </div>
                           </div>
                           <div class="geodir-category-text fl-wrap">
                                 <div class="facilities-list fl-wrap">
                                    @foreach ($service_item->trees as $tree_item)
                                       <div class="facilities-list-title">{{$tree_item->tree->append_title}}</div>
                                    @endforeach
                                 </div>
                           </div>
                           <div class="geodir-category-footer fl-wrap">
                                 <a class="listing-item-category-wrap">
                                    <div class="listing-item-category green-bg"><i class="fal fa-tree"></i></div>
                                    <span>{{trans('lang.target')}} : {{$service_item->target}}</span>
                                 </a>
                                 <div class="geodir-opt-list">
                                    <ul class="no-list-style">
                                       <li><a href="#1" class="single-map-item" data-newlatitude="{{$service_item->lat}}" data-newlongitude="{{$service_item->lng}}"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">{{trans('lang.location')}}</span> </a></li>
                                    </ul>
                                 </div>
                           </div>
                        </div>
                     </article>
                  </div>
               @endforeach
                                                                                             
               {{ $services->onEachSide(5)->links('front.layout.pagination') }}	
           </div>
           <!-- listing-item-container end -->
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
@endsection