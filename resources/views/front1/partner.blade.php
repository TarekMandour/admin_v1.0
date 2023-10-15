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
            <h2><span>{{trans('lang.menu.partners')}}</span></h2>
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
            <button class="tablinks" onclick="openType(event, 'partners')" id="defaultOpen">{{trans('lang.partners')}}</button>
            <button class="tablinks" onclick="openType(event, 'supporters')">{{trans('lang.supporters')}}</button>
          </div>
          
          <!-- Tab content -->
          <div id="partners" class="tabcontent">
            <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic">
               <div class="row">
                  @foreach ($partners as $partner_item)
                  @if ($partner_item->getMedia('photo')->count())
                   <div class="col-md-4">
                    <a href="{{$partner_item->link}}">
                        <div class="features-box ">
                            <img src="{{$partner_item->getFirstMediaUrl('photo','thumb')}}" alt="{{$partner_item->append_name}}"> 
                        </div>
                    </a>
                   </div>  
                   @endif
                  @endforeach
               </div>                                                                                        
               
            </div>
          </div>
          
          <div id="supporters" class="tabcontent">
            <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic">
               <div class="row">
                    @foreach ($supporters as $supporter_item)
                        @if ($supporter_item->getMedia('photo')->count())
                            <div class="col-md-4">
                                <a href="{{$supporter_item->link}}">
                                    <div class="features-box ">
                                        <img src="{{$supporter_item->getFirstMediaUrl('photo','thumb')}}" alt="{{$supporter_item->append_name}}"> 
                                    </div>
                                </a>
                            </div>  
                        @endif
                    @endforeach
               </div>                                                                                        
               
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