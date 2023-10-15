<!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->

        <!-- Topbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar d-none d-lg-block">
                <div class="topbar-inner">
                    <div class="row gx-0">
                        <div class="col-lg-7 text-end">
                            <div class="h-100 d-inline-flex align-items-center me-4">
                                <a href="tel:0233467777" class="text-dark"><span>02 3346 7777</span></a>
                                <span class="fa fa-phone-alt me-2 text-dark"></span>
                            </div>
                            <div class="h-100 d-inline-flex align-items-center">
                                <a href="https://t.me/+201004879589" class="text-dark"><span>+201004879589</span></a>
                                <span class="fab fa-telegram-plane me-2 text-dark"></span>
                            </div>
                            <div class="h-100 d-inline-flex align-items-center">
                                <a href="mailto:info@aacid.org" class="text-dark"><span>info@aacid.org</span></a>
                                <span class="far fa-envelope me-2 text-dark"></span>
                            </div>
                        </div>
                        <div class="col-lg-5 text-start">
                            <div class="h-100 d-inline-flex align-items-center">
                                <span class="text-dark">{{__('admin.Web.follow')}}</span>
                                <a class="text-dark px-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="text-dark px-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="text-dark px-2" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="text-dark px-2" href=""><i class="fab fa-instagram"></i></a>
                                <a class="text-dark pe-2" href="{{route('change_lang')}}"><i class="ps-1 fas fa-globe-europe"></i>{{(app()->getLocale() == 'ar')? 'اللغة' : 'language'}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>