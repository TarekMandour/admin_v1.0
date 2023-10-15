<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
@include('front.layout.head')

    <body>

        @include('front.layout.header')
        @if(app()->getLocale() == 'ar')
            <div class="container">
                <nav class="navbar navbar-light navbar-expand-lg py-3">
                    <a href="{{route('index')}}" class="navbar-brand mr-0">
                        <img src="{{asset('front/assets/img/logo.png')}}" width="90" height="90">
                    </a>
                    <span class="title" style="text-align:center;font-size:16px; font-weight:bold;color: #0b04c9;">المجلس العربي الافريقي للتكامل و التنمية
                            <br>المستشار الخاص
                            <br>لدي المجلس الاقتصادي الاجتماعي في الأمم المتحدة
                        </span>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav ms-lg-auto mx-xl-auto">
                            <a href="{{route('index')}}" class="nav-item nav-link active">{{__('admin.Web.home')}}</a>
                            <a href="{{route('education')}}" class="nav-item nav-link">{{__('admin.Web.education')}}</a>
                            <a href="{{route('blogs')}}" class="nav-item nav-link">{{__('admin.Web.news')}}</a>
                            <a href="{{route('about')}}" class="nav-item nav-link">{{__('admin.Web.about')}}</a>
                            <a href="{{route('contact')}}" class="nav-item nav-link">{{__('admin.Web.contact_us')}}</a>
                        </div>
                        <a href="{{route('login')}}" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block">{{__('admin.Web.subscribe_now')}}</a>
                    </div>
                </nav>
            </div>
            @else
            <div class="container">
                <nav class="navbar navbar-light navbar-expand-lg py-3">
                    <a href="index.html" class="navbar-brand">
                        <img src="{{asset('front/assets/img/logo.png')}}" width="90" height="90">
                    </a>
                    <span class="title" style="text-align:center;font-size:16px; font-weight:bold;color: #0b04c9;">
                            United Nations ECOSOC Special Consultative
                            <br>Arab African Council For Integration and Development
                        </span>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav ms-lg-auto mx-xl-auto">
                            <a href="{{route('index')}}" class="nav-item nav-link active">Home</a>
                            <a href="{{route('education')}}" class="nav-item nav-link">Education</a>
                            <a href="{{route('blogs')}}" class="nav-item nav-link">News</a>
                            <a href="{{route('about')}}" class="nav-item nav-link">About Us</a>
                            <a href="{{route('contact')}}" class="nav-item nav-link">Contact Us</a>
                        </div>
                        <a href="{{route('login')}}" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block">{{__('admin.Web.subscribe_now')}}</a>
                    </div>
                </nav>
            </div>
            @endif
        </div>
        <!-- Topbar End -->


        @yield('content')

        @include('front.layout.footer')

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-light back-to-top"><i class="fa fa-arrow-up"></i></a>   

        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('front/assets/lib/wow/wow.min.js')}}"></script>
        <script src="{{asset('front/assets/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('front/assets/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('front/assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>

        <!-- Template Javascript -->
        <script src="{{asset('front/assets/js/main.js')}}"></script>
    </body>

</html>