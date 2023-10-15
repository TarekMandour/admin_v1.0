@extends('front.layout.master')
@section('content')
        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            @if(app()->getLocale() == 'ar')
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="mb-5 text-dark text-center">
                                <span class="hero-span">مسـابقة</span>
                            كتابة القرآن <br>الكريم العالمية
                            </h1>
                            <small class="text-center d-block pb-3">برعاية المجلس العربي الافريقي</small>
                            <div class="row">
                                <div class="col-md-12 show_more">
                                    <a href="{{route('about')}}" class="btn btn-primary py-3 px-5">شاهد المزيد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="mb-5 text-dark text-center">
                                <span class="hero-span">International</span>
                            Holy Quran <br>Writing Competition
                            </h1>
                            <small class="text-center d-block pb-3">Sponsored by the Arab-African Council</small>
                            <div class="row">
                                <div class="col-md-12 show_more">
                                    <a href="{{route('about')}}" class="btn btn-primary py-3 px-5">Show More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- Hero End -->


        <!-- About Satrt -->
        <div class="container-fluid about">
            <div class="container">
                <h2 class="wow fadeIn text-center" data-wow-delay="0.1s">{{__('admin.Web.introduction')}}</h2>
                @if(app()->getLocale() == 'ar')
                <p class="mb-5 text-center">هي مسابقة لكتابة القرآن الكريم بخط اليد وتحمل عنوان <br><strong class="text-primary">"بخـط يـدي كتبت أحرفه ، وفي الصدر حفظت رسـم كلماته"</strong>
                    <br>
                    من منطلق حفظ كتاب الله جاءت هذه المسابقة و هي الأولى من نوعها في العالم الاسلامي ، علها تكون اسهاما في زيادة الصلة بين المسلم و كتاب الله عز و جل ، و تشجيعا على الاقتداء بالصحابة رضوان الله عليهم بكتابة القرآن الكريم بخط اليد مما يساعد على حفظة أيضا والتقرب به إلى الله سبحانه و تعالى ولهذا كان اهتمامنا منصباً على التركيز على كتاب الله عز و جل و تحفيز المسلمين على التمسك به والتعمق به و المساعدة على حفظه وتجويده و فهم معانيه على ضوء هذه المسابقة.
                <br>
                و إن هذه المسابقة تعكس حرص العالم الاسلامي على نشر كتاب الله و ترسيخ معانيه بين أبناء المسلمين .
                </p>
                @else
                <p class="mb-5 text-center">It is a competition for writing the Holy Qur’an by hand and is titled <br><strong class="text-primary">“In my handwriting I wrote his letters, and in my chest I preserved the outline of his words.”</strong>
                    <br>
                    From the standpoint of memorizing the Book of God, this competition came, and it is the first of its kind in the Islamic world. It may be a contribution to increasing the connection between the Muslim and the Book of God Almighty, and to encourage the imitation of the Companions, may God be pleased with them, by writing the Holy Qur’an by hand, which also helps its memorizers. And drawing closer to God Almighty through it. That is why our interest was focused on focusing on the Book of God Almighty and motivating Muslims to adhere to it, delve deeper into it, and help memorize and improve it and understand its meanings in light of this competition.
                    <br>
                    This competition reflects the Islamic world’s keenness to spread the Book of God and consolidate its meanings among Muslim children.
                </p>
                @endif
                <div class="row g-5 mb-5">
                    <div class="col-xl-4">
                        <div class="row g-4">
                            <div class="col-12">
                                <img src="{{asset('front/assets/img/quran.jpg')}}" class="img-fluid pb-3 wow zoomIn" data-wow-delay="0.1s" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 wow fadeIn" data-wow-delay="0.5s">
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="ps-3 d-flex align-items-center justify-content-start">
                                    <span class="bg-primary btn-md-square rounded-circle me-2"><i class="fa fa-eye text-dark fa-4x pb-2"></i></span>
                                    <div class="ms-4">
                                        <h5>{{__('admin.Web.vision')}}</h5>
                                        <p>
                                            @if(app()->getLocale() == 'ar')
                                            {!! $vision_ar !!}
                                            @else
                                            {!! $vision_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ps-3 d-flex align-items-center justify-content-start">
                                    <span class="bg-primary btn-md-square rounded-circle mt-4 me-2"><i class="fa fa-flag text-dark fa-4x mb-5 pb-2"></i></span>
                                    <div class="ms-4">
                                        <h5>{{__('admin.Web.message')}}</h5>
                                        <p>
                                            @if(app()->getLocale() == 'ar')
                                            {!! $message_ar !!}
                                            @else
                                            {!! $message_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <h5 class="hero-span">{{__('admin.Web.mission')}}</h5>
                            @if(app()->getLocale() == 'ar')
                            <p class="caption">تهدف المسابقة لتحفيظ القرآن الكريم لتحقيق الموعود بها لهذه الأمة في قول النبي صلى الله عليه و سلم :(خيركم من تعلم القرآن وعلمه) صحيح البخاري ، وذلك من خلال التالي:</p>
                            
                            @else

                            <p class="caption">The competition aims to memorize the Holy Qur’an to fulfill what was promised to this nation in the words of the Prophet, may God bless him and grant him peace: (The best of you are those who learn and teach the Qur’an) Sahih Al-Bukhari, through the following:</p>

                            @endif
                                @if(app()->getLocale() == 'ar')
                                {!! $mission_ar !!}
                                @else
                                {!! $mission_en !!}
                                @endif
                        </div>
                    </div>
                </div>
                <div class="container text-center bg-primary py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-2">
                            <i class="fa fa-mosque fa-5x text-white"></i>
                        </div>
                        <div class="col-lg-7 text-center text-lg-center">
                            <h3 class="mb-0">{{__('admin.Web.call_to_action')}}</h3>
                        </div>
                        <div class="col-lg-3">
                            <a href="{{route('login')}}" class="btn btn-light py-2 px-4">{{__('admin.Web.login')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Features Satrt -->
        <div class="container-fluid about py-5">
            <div class="container py-5">
                <h2 class="mb-5 wow fadeIn text-center" data-wow-delay="0.1s">{{__('admin.Web.valuable')}}</h2>
                <div class="row g-5 mb-5">
                    <div class="col-4 wow fadeIn p-3" data-wow-delay="0.5s">
                        <div class="d-flex justify-content-center"><img class="d-block mb-3" src="{{asset('front/assets/img/quran_icon.png')}}" width="80px"></div>
                       <h5 class="text-center">{{__('admin.Web.excellence')}}</h5>
                    </div>
                    <div class="col-4 wow fadeIn p-3" data-wow-delay="0.5s">
                        <div class="d-flex justify-content-center"><img class="d-block mb-3" src="{{asset('front/assets/img/quran_icon.png')}}" width="80px"></div>
                        <h5 class="text-center">{{__('admin.Web.efficiency')}}</h5>
                    </div>
                    <div class="col-4 wow fadeIn p-3" data-wow-delay="0.5s">
                        <div class="d-flex justify-content-center"><img class="d-block mb-3" src="{{asset('front/assets/img/quran_icon.png')}}" width="80px"></div>
                        <h5 class="text-center">{{__('admin.Web.competitive')}}</h5>
                    </div>
                    <div class="col-4 wow fadeIn p-3" data-wow-delay="0.5s">
                        <div class="d-flex justify-content-center"><img class="d-block mb-3" src="{{asset('front/assets/img/quran_icon.png')}}" width="80px"></div>
                        <h5 class="text-center">{{__('admin.Web.teamwork')}}</h5>
                    </div>
                    <div class="col-4 wow fadeIn p-3" data-wow-delay="0.5s">
                        <div class="d-flex justify-content-center"><img class="d-block mb-3" src="{{asset('front/assets/img/quran_icon.png')}}" width="80px"></div>
                        <h5 class="text-center">{{__('admin.Web.safety')}}</h5>
                    </div>
                    <div class="col-4 wow fadeIn p-3" data-wow-delay="0.5s">
                        <div class="d-flex justify-content-center"><img class="d-block mb-3" src="{{asset('front/assets/img/quran_icon.png')}}" width="80px"></div>
                        <h5 class="text-center">{{__('admin.Web.calculation')}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- Features End -->


        <!-- Activities Start -->
        <div class="container-fluid activities py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <h2 class="">{{__('admin.Web.branches')}}</h2>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6 col-xl-6" onclick="window.location.href='{{route('gifts', 1)}}'" style="cursor: pointer">
                        <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.1s">
                            <i class="fa fa-mosque fa-4x text-dark"></i>
                                <div class="ms-4">
                                    <h5>{{__('admin.Web.first_branch')}}</h5>
                                    <p class="mb-4 text-secondary">{{__('admin.Web.first_branch_details')}}</p>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6" onclick="window.location.href='{{route('gifts', 2)}}'" style="cursor: pointer">
                        <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.3s">
                            <i class="fa fa-mosque fa-4x text-dark"></i>
                            <div class="ms-4">
                                <h5>{{__('admin.Web.second_branch')}}</h5>
                                <p class="mb-4 text-secondary">{{__('admin.Web.second_branch_details')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6" onclick="window.location.href='{{route('gifts', 3)}}'" style="cursor: pointer">
                        <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.5s">
                            <i class="fa fa-mosque fa-4x text-dark"></i>
                            <div class="ms-4">
                                <h5>{{__('admin.Web.third_branch')}}</h5>
                                <p class="mb-4 text-secondary">{{__('admin.Web.third_branch_details')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6" onclick="window.location.href='{{route('gifts', 4)}}'" style="cursor: pointer">
                        <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.1s">
                            <i class="fa fa-mosque fa-4x text-dark"></i>
                            <div class="ms-4">
                                <h5>{{__('admin.Web.fourth_branch')}}</h5>
                                <p class="mb-4 text-secondary">{{__('admin.Web.fourth_branch_details')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Activities Start -->

        <!-- Images Start -->
        <div class="container-fluid activities images py-5 bg-primary">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-lg-6 col-xl-6 d-flex flex-column justify-content-center">
                        <div class="d-flex justify-content-center pb-5"><img src="{{asset('front/assets/img/image2.webp')}}" class="border-radius-32" width="350px"></div>
                        <div class="d-flex justify-content-center"><img src="{{asset('front/assets/img/image3.webp')}}" class="border-radius-32" width="350px"></div>
                    </div>
                    <div class="col-lg-6 col-xl-6 d-flex justify-content-end">
                        <div><img src="{{asset('front/assets/img/image1.jpg')}}" class="w-100 w-lg-75 border-radius-32"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Images Start -->


        <!-- Events Start -->
        @if(app()->getLocale() == 'ar')
        <div class="container-fluid event py-5">
            <div class="container py-5">
                <h2 class="mb-5 wow fadeIn" data-wow-delay="0.1s">آلية <span class="text-primary">المسابقة</span></h2>
                <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.1s">
                    <div class="col-12 col-lg-8 pb-5">
                        <div class="ms-3">
                            <ol>
                                <li class="text-dark mb-3"> سـيتم طـرح المسـابقة ضمـن الموقـع الإلكترونـي الخـاص بــ "بخـط يـدي كتبـت أحرفـه ، وفـي الصـدر حفظـت رسـم كلماتـه "</li>
                                <li class="text-dark mb-3">  و علــى موقــع مســابقة تحفيــظ القــرآن الكريــم يوضــح فيــه طريقــة الكتابــة والرســم الصحيحــة للقــرآن الكريــم ويتــاح مــن
                                    خلال هـذا الموقـع للمتدرب التعلم والتدريب على الكتابة قبل بدءالمسـابقة</li>
                                <li class="text-dark mb-3"> تشـكيل لجـان متخصصـة ذات خبرة عالية لتقييم واعتماد المشـاركات ومن ثـم تحديد الفائزين لاحقاً، يقوم المتسابق
                                    بإرســال كل جــزء ينتهــي مــن كتابتــه علــى موقــع المســابقة للتصحيــح والتوجيــه ثــم االعتمــاد مــن قبــل
                                    اللجنة الفنية .
                                </li>
                            </ol>

                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="overflow-hidden mb-5">
                            <img src="{{asset('front/assets/img/quran5.jpg')}}" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="container-fluid event py-5">
            <div class="container py-5">
                <h2 class="mb-5 wow fadeIn" data-wow-delay="0.1s">Competition  <span class="text-primary">mechanism</span></h2>
                <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.1s">
                    <div class="col-12 col-lg-8 pb-5">
                        <div class="ms-3">
                            <ol>
                                <li class="text-dark mb-3">The competition will be presented on the website of “In my own handwriting I wrote its letters, and in my chest I preserved the outline of its words.”</li>
                                <li class="text-dark mb-3">On the Holy Quran Memorization Competition website, he explains the correct method of writing and drawing the Holy Quran. Through this website, the trainee is allowed to learn and practice writing before the start of the competition.</li>
                                <li class="text-dark mb-3">Forming specialized committees with high experience to evaluate and approve the entries and then determine the winners later. The contestant sends each part he finishes writing on the competition website for correction, guidance, and then approval by the technical committee.</li>
                            </ol>

                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="overflow-hidden mb-5">
                            <img src="{{asset('front/assets/img/quran5.jpg')}}" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Events End -->

        <!-- Events Start -->
        @if(app()->getLocale() == 'ar')
        <div class="container-fluid event py-5">
            <div class="container py-5">
                <h2 class="mb-5 wow fadeIn text-primary" data-wow-delay="0.1s">شروط <span class="text-dark">المسابقة</span></h2>
                <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.1s">
                    <div class="col-12 col-lg-4">
                        <div class="overflow-hidden mb-5">
                            <img src="{{asset('front/assets/img/quran7.jpeg')}}" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 pb-5">
                        <div class="ms-3">
                            <ol>
                                <li class="text-dark mb-3">يجب أن ال يقل عمر المتقدم للمسـابقة عن (12) اثنا عشـر عاما</li>
                                <li class="text-dark mb-3">التقدم للمسـابقة متاح للجنسين</li>
                                <li class="text-dark mb-3"> تعبئـة االسـتمارة الخاصـة بالتقـدم للمشـاركة وتكـون كافـة
                                    المعلومـات فيهـا علـى مسـؤولية المتقـدم</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="container-fluid event py-5">
            <div class="container py-5">
                <h2 class="mb-5 wow fadeIn text-primary" data-wow-delay="0.1s">Competition <span class="text-dark">terms and conditions</span></h2>
                <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.1s">
                    <div class="col-12 col-lg-4">
                        <div class="overflow-hidden mb-5">
                            <img src="{{asset('front/assets/img/quran7.jpeg')}}" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 pb-5">
                        <div class="ms-3">
                            <ol>
                                <li class="text-dark mb-3">The age of the applicant for the competition must not be less than (12) twelve years</li>
                                <li class="text-dark mb-3">Application for the competition is open to both genders</li>
                                <li class="text-dark mb-3">Fill out the form to apply for participation, and all information therein is the responsibility of the applicant.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Events End -->

@endsection