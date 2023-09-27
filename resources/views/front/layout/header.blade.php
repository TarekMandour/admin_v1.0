<!DOCTYPE HTML>
<html lang="en">
<head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>{{$settings->append_name}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="description" content="{{$settings->append_description}}">
         <meta name="keywords" content="{{$settings->append_keywords}}">
        <!--=============== css  ===============-->	
        <link type="text/css" rel="stylesheet" href="{{asset('front/assets/css/reset.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('front/assets/css/plugins.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('front/assets/css/shop.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
        @if (App::getLocale() == 'ar')
            <link type="text/css" rel="stylesheet" href="{{asset('front/assets/css/rtl-style.css')}}">
        @endif
        <link type="text/css" rel="stylesheet" href="{{asset('front/assets/css/color.css')}}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

        @yield('style')
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="{{$settings->getFirstMediaUrl('fav','favthumb')}}">
    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="loader-inner">
                <div class="loader-inner-cirle"></div>
            </div>
        </div>
        <!--loader end-->
        <!-- main start  -->
        <div id="main">
            <!-- header -->
            <header class="main-header">
                <!-- logo-->
                <a href="{{url('/')}}" class="logo-holder"><img src="{{$settings->getFirstMediaUrl('logoDark','logoDarkthumb')}}" alt="{{$settings->append_name}}"></a>
                <!-- logo end-->

                
                @if (!Auth::guard('web')->check())
                <div class="show-reg-form modal-open avatar-img" data-srcav="{{asset('front/assets/images/avatar/3.jpg')}}"><i class="fal fa-user"></i>{{trans('lang.menu.login')}}  </div>
                @else
                <div class="show-reg-form avatar-img" data-srcav="{{asset('front/assets/images/avatar/3.jpg')}}"><a href="{{url('/my-account')}}" style="color: #ffffff;"><i class="fal fa-user"></i> {{trans('lang.menu.myaccount')}} </a> </div>
                @endif                 
                
                <div class="lang-wrap">
                    <div class="show-lang"><span><i class="fal fa-globe-europe"></i></span></div>
                    <ul class="lang-tooltip no-list-style">
                        <li><a href="{{url('/lang-change?lang=ar')}}" @if (App::getLocale() == 'ar') class="current-lan" @endif>{{trans('lang.menu.arabic')}}</a></li>
                        <li><a href="{{url('/lang-change?lang=en')}}" @if (App::getLocale() == 'en') class="current-lan" @endif>{{trans('lang.menu.english')}}</a></li>
                    </ul>
                </div>
                <!-- nav-button-wrap--> 
                <div class="nav-button-wrap color-bg">
                    <div class="nav-button">
                        <span></span><span></span><span></span>
                    </div>
                </div>
                <!-- nav-button-wrap end-->
                <!--  navigation --> 
                <div class="nav-holder main-menu">
                    <nav>
                        <ul class="no-list-style">
                            <li>
                                <a href="{{url('/')}}" class="act-link">{{trans('lang.menu.home')}} </a>
                            </li>
                            <li>
                                <a href="{{url('/about')}}" class="act-link">{{trans('lang.menu.about')}} </a>
                            </li>
                            <li>
                                <a href="{{url('/services')}}" class="act-link">{{trans('lang.menu.service')}} </a>
                            </li>
                            <li>
                                <a href="{{url('/blogs')}}" class="act-link">{{trans('lang.menu.blog')}} </a>
                            </li>
                            <li>
                                <a href="{{url('/partners')}}" class="act-link">{{trans('lang.menu.partners')}} </a>
                            </li>
                            <li>
                                <a href="javascript:;">  {{trans('lang.menu.project')}} <i class="fa fa-caret-down"></i></a>
                                <ul>
                                    @foreach (\App\Models\Project::all() as $project_item)
                                        <li><a href="{{$project_item->link}}">{{$project_item->append_title}}</a></li>  
                                    @endforeach                                 
                                </ul>
                            </li>
                            <li>
                                <a href="{{url('/contact-us')}}" class="act-link">{{trans('lang.menu.contact')}} </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- navigation  end -->
            </header>
            <!-- header end-->