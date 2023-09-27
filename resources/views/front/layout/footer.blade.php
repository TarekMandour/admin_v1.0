<!--footer -->
<footer class="main-footer fl-wrap">

   <!--footer-inner-->
   <div class="footer-inner   fl-wrap">
       <div class="container">
           <div class="row">
               <!-- footer-widget-->
               <div class="col-md-6">
                   <div class="footer-widget fl-wrap">
                       <div class="footer-logo"><a href="{{url('/')}}"><img src="{{$settings->getFirstMediaUrl('logoDark','logoDarkthumb')}}" alt="{{$settings->append_name}}"></a></div>
                        
                       <div class="footer-contacts-widget fl-wrap">
                            <div class="footer-social">
                                <ul class="no-list-style">
                                    @if($settings->facebook)
                                    <li><a href="{{$settings->facebook}}" class="scnew" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    @endif
                                    @if($settings->twitter)
                                    <li><a href="{{$settings->twitter}}" class="scnew" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    @endif
                                    @if($settings->instagram)
                                    <li><a href="{{$settings->instagram}}" class="scnew" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    @endif
                                    @if($settings->snapchat)
                                    <li><a href="{{$settings->snapchat}}" class="scnew" target="_blank"><i class="fab fa-snapchat"></i></a></li>
                                    @endif
                                    @if($settings->tiktok)
                                    <li><a href="{{$settings->tiktok}}" class="scnew" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="" height="17" viewBox="0 0 448 512"><path fill="currentColor" d="M448 209.91a210.06 210.06 0 0 1-122.77-39.25v178.72A162.55 162.55 0 1 1 185 188.31v89.89a74.62 74.62 0 1 0 52.23 71.18V0h88a121.18 121.18 0 0 0 1.86 22.17A122.18 122.18 0 0 0 381 102.39a121.43 121.43 0 0 0 67 20.14Z"/></svg></a></li>
                                    @endif
                                    @if($settings->youtube)
                                    <li><a href="{{$settings->youtube}}" class="scnew" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                    @endif
                                    
                                </ul>
                            </div>

                       </div>
                   </div>
               </div>
               <!-- footer-widget end-->
               <!-- footer-widget-->
               <div class="col-md-4">
                   <div class="footer-widget fl-wrap">
                       <h3>{{trans('lang.menu.contact')}}</h3>
                       <div class="footer-widget-posts fl-wrap">
                           <ul  class="footer-contacts fl-wrap no-list-style">
                               <li><span><i class="fal fa-envelope"></i>: {{trans('lang.email')}}</span><a href="javascript:;" target="_blank">{{$settings->email}}</a></li>
                               <li> <span><i class="fal fa-map-marker"></i>: {{trans('lang.address')}}</span><a href="javascript:;" target="_blank">@if (App::getLocale() == 'ar') {{$settings->address}} @else {{$settings->address2}} @endif</a></li>
                               <li><span><i class="fal fa-phone"></i>: {{trans('lang.phone')}}</span><a href="tel:{{$settings->phone}}">{{$settings->phone}}</a></li>
                           </ul>
                       </div>
                   </div>
               </div>
               <!-- footer-widget end-->
           </div>
       </div>
   </div>
   <!--footer-inner end -->
   <!--sub-footer-->
   <div class="sub-footer  fl-wrap">
       <div class="container">
           <div class="copyright" style="margin-bottom: 20px;"> &#169; 2023 .  {{trans('lang.copyright')}}</div>
       </div>
   </div>
   <!--sub-footer end -->
</footer>
<!--footer end -->  
<!--map-modal -->
<div class="map-modal-wrap">
   <div class="map-modal-wrap-overlay"></div>
   <div class="map-modal-item">
       <div class="map-modal-container fl-wrap">
           <div class="map-modal fl-wrap">
               <div id="singleMap" data-latitude="40.7" data-longitude="-73.1"></div>
           </div>
           <h3><span>: {{trans('lang.location')}} </span><a href="javascript:;"></a></h3>
           <div class="map-modal-close"><i class="fal fa-times"></i></div>
       </div>
   </div>
</div>
<!--map-modal end -->                
<!--register form -->
<div class="main-register-wrap modal">
   <div class="reg-overlay"></div>
   <div class="main-register-holder tabs-act">
       <div class="main-register fl-wrap  modal_main">
           <div class="main-register_title">{{trans('lang.welcome')}}</div>
           <div class="close-reg"><i class="fal fa-times"></i></div>
           <ul class="tabs-menu fl-wrap no-list-style">
               <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> {{trans('lang.signin')}}</a></li>
               <li><a href="#tab-2"><i class="fal fa-user-plus"></i> {{trans('lang.signout')}}</a></li>
           </ul>
           <!--tabs -->                       
           <div class="tabs-container">
               <div class="tab" style="margin-top: 0px;">
                   <!--tab -->
                   <div id="tab-1" class="tab-content first-tab">
                       <div class="custom-form">
                           <form method="POST"  action="{{route('client.loginpost')}}">
                                @csrf
                               
                                <label>{{trans('lang.phone')}} <span>*</span> </label>
                               <input name="phone" type="text" value="">
                               <label >{{trans('lang.password')}} <span>*</span> </label>
                               <input name="password" type="password" value="" >
                               <button type="submit"  class="btn float-btn color2-bg">  {{trans('lang.signin')}} </button>
                           </form>
                       </div>
                   </div>
                   <!--tab end -->
                   <!--tab -->
                   <div class="tab" style="margin-top: 0px;">
                       <div id="tab-2" class="tab-content">
                           <div class="custom-form">
                               <form method="post" action="{{route('client.registerpost')}}" class="main-register-form">
                                    @csrf
                                   <label >{{trans('lang.type')}} <span>*</span> </label>
                                   <select data-placeholder="{{trans('lang.choose_type')}}" class="chosen-select" name="type">
                                        <option value="individual">{{trans('lang.individual')}}</option>
                                        <option value="government">{{trans('lang.government')}}</option>
                                        <option value="private">{{trans('lang.private')}}</option>
                                        <option value="school">{{trans('lang.school')}}</option>
                                    </select>
                                    
                                   <label style="margin-top: 20px;">{{trans('lang.full_name')}} <span>*</span> </label>
                                   <input name="name" type="text"  value="">
                                   <label>{{trans('lang.phone')}} <span>*</span></label>
                                   <input name="phone" type="text" value="">
                                   <label>{{trans('lang.email')}} </label>
                                   <input name="email" type="text" value="">
                                   <label >{{trans('lang.password')}} <span>*</span></label>
                                   <input name="password" type="password"  value="" >
                                   <div class="clearfix"></div>
                                   <button type="submit"     class="btn float-btn color2-bg"> {{trans('lang.signout')}} </button>
                               </form>
                           </div>
                       </div>
                   </div>
                   <!--tab end -->
               </div>
               <!--tabs end -->
               <div class="wave-bg">
                   <div class='wave -one'></div>
                   <div class='wave -two'></div>
               </div>
           </div>
       </div>
   </div>
</div>
<!--register form end -->
<a class="to-top"><i class="fas fa-caret-up"></i></a>     
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->
<script src="{{asset('front/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('front/assets/js/plugins.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('front/assets/js/scripts.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsoJSU4k6RgH8tO2gM1WLZBjOFwUF4TcY&amp;language=ar&amp;libraries=places&amp;callback=initAutocomplete"></script>         
<script src="{{asset('front/assets/js/map-single.js')}}"></script>     

@yield('script')

<script type="text/javascript">
	// Default Configuration
		$(document).ready(function() {
			toastr.options = {
				'closeButton': true,
				'debug': false,
				'newestOnTop': false,
				'progressBar': false,
				'positionClass': 'toast-top-right',
				'preventDuplicates': false,
				'showDuration': '1000',
				'hideDuration': '1000',
				'timeOut': '5000',
				'extendedTimeOut': '1000',
				'showEasing': 'swing',
				'hideEasing': 'linear',
				'showMethod': 'fadeIn',
				'hideMethod': 'fadeOut',
			}

            
		});
</script>

@if( session()->has("error"))
<script>
    toastr.error('{{session()->get("error")}}');
</script>
@endif

@if( session()->has("success"))
<script>
    toastr.success('{{session()->get("success")}}');
</script>
@endif

</body>
</html>
