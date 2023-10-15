<!-- Footer Start -->
        <div class="container-fluid footer pt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row py-5">
                    <div class="col-lg-7">
                        <h3 class="text-light mb-0">{{__('admin.Web.subscribe_news')}}</h3>
                        <p class="text-secondary">{{__('admin.Web.subscribe_news_caption')}}</p>
                    </div>
                    <div class="col-lg-5">
                        <div class="position-relative mx-auto">
                            <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="البريد الالكتروني">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 start-0 mt-2 ms-2">{{__('admin.Web.subscribe')}}</button>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="border-top border-secondary"></div>
                    </div>
                </div>
                <div class="row g-4 footer-inner">
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <div class="footer-item mt-5">
                            <a href="{{route('index')}}" class="navbar-brand">
                            <img src="{{asset('front/assets/img/logo.png')}}" width="70" height="70">
                            </a>
                            <h5 class="text-light mt-5">{{__('admin.Web.title')}}</h5>
                            <p class="mb-4 text-secondary">{{__('admin.Web.title_caption')}}</p>
                            <a href="" class="btn btn-primary py-2 px-4">{{__('admin.Web.subscribe_now')}}</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <div class="footer-item mt-5">
                            <h4 class="text-light mb-4">{{__('admin.Web.contact_us')}}</h4>
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center py-4">
                                    <span class="flex-shrink-0 btn-square bg-primary ms-3 p-4"><i class="far fa-envelope text-dark"></i></span>
                                    <a href="mailto:info@aacid.org" class="text-body">{{App\Models\Setting::pluck('email')->first()}}</a>
                                </div>
                                <div class="d-flex align-items-center py-4">
                                    <span class="flex-shrink-0 btn-square bg-primary ms-3 p-4"><i class="fa fa-phone-alt text-dark"></i></span>
                                    <a href="tel:0233467777" class="text-body">{{App\Models\Setting::pluck('phone')->first()}}</a>
                                </div>
                                <div class="d-flex align-items-center py-4">
                                    <span class="flex-shrink-0 btn-square bg-primary ms-3 p-4"><i class="fab fa-telegram-plane text-dark"></i></span>
                                    <a href="https://t.me/+201004879589" class="text-body">{{App\Models\Setting::pluck('whatsapp')->first()}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <div class="footer-item mt-5">
                            <h4 class="text-light mb-4">{{__('admin.Web.permalinks')}}</h4>
                            <div class="d-flex flex-column align-items-start">
                                <a class="text-body mt-3 mb-2 py-2" href="{{route('index')}}"><i class="fa fa-check text-primary ms-2"></i>{{__('admin.Web.home')}}</a>
                                <a class="text-body mb-2 py-2" href="{{route('about')}}"><i class="fa fa-check text-primary ms-2"></i>{{__('admin.Web.about')}}</a>
                                <a class="text-body mb-2 py-2" href="{{route('terms')}}"><i class="fa fa-check text-primary ms-2"></i>{{__('admin.Web.terms')}}</a>
                                <a class="text-body mb-2 py-2" href="{{route('privacy')}}"><i class="fa fa-check text-primary ms-2"></i>{{__('admin.Web.privacy')}}</a>
                                <a class="text-body mb-2 py-2" href="{{route('gifts', 1)}}"><i class="fa fa-check text-primary ms-2"></i>{{__('admin.Web.gifts')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-4">
                <div class="border-top border-secondary pb-4"></div>
                <div class="row">
                    <div class="col-md-12 text-center mb-3 mb-md-0">
                        {{__('admin.Web.copyrights')}}
                        &copy;<a class="" href="#">{{__('admin.Web.copyrights_owner')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->