@extends('front.layout.master')
@section('content')
        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="text-dark">{{__('admin.Web.about')}}</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('admin.Web.home')}}</a></li>
                                <li class=" text-dark" aria-current="page"> / {{__('admin.Web.about')}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


@if(app()->getLocale() == 'ar')
        <!-- Bio Satrt -->
        <div class="container-fluid about">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xl-12 d-flex justify-content-start">
                        <div class="row g-4">
                            <div class="col-12">
                                <img src="{{asset('front/assets/img/about1.jpg')}}" class="img-fluid pb-3 wow zoomIn" data-wow-delay="0.1s" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 wow fadeIn text-right" data-wow-delay="0.5s">
                        <div class="row g-4 mb-4">
                            <div class="col-md-12">
                                <div class="ps-3 d-flex align-items-center justify-content-start">
                                    <div class="ms-4">
                                        <h3>عن المجلس العربي الافريقي</h3>
                                        <p>
                                            المجلس العربي الأفريقي للتكامل والتنمية

                                            مستشار الخاص في المجلس الاقتصادي والاجتماعي في الامم المتحدة

                                            احد منظمات المجتمع المدني الرائدة في مجال التنمية الشاملة ومقره الرئيسي في جمهورية مصر العربية بموجب الاشهار المرقم (5337) لعام 2014

                                            ويضم مجموعة شخصيات ومنظمات ومؤسسات من اكثر من 50 دولة عربية وافريقية من علماء وشيوخ وامراء ووزراء وكبار رجال وسيدات الاعمال في دول العالم متخصصة بالجوانب الاقتصادية والاستثمارية والعلمية والثقافية والاجتماعية ولديه اتصالات وعلاقات وثيقة على مستوى حكومات الدول وكافة المنظمات والمؤسسات والشركات العالمية.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Bio End -->

        <!-- About Satrt -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xl-12 d-flex justify-content-start">
                        <div class="row g-4">
                            <div class="col-12">
                                <img src="{{asset('front/assets/img/about2.jpg')}}" class="img-fluid pb-3 wow zoomIn" data-wow-delay="0.1s" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 wow fadeIn text-right" data-wow-delay="0.5s">
                        <div class="row g-4 mb-4">
                            <div class="col-md-12">
                                <div class="ps-3 d-flex align-items-center justify-content-start">
                                    <div class="ms-4">
                                        <h3>الرؤيا العامة للمجلس</h3>
                                        <p>
                                            المجلس العربى الإفريقى للتكامل والتنمية المستشار الخاص لدى المجلس الاقتصادي والاجتماعي في الامم المتحدة منظمة عربية إفريقية غير حكومية ذات شخصية إعتبارية يعمل فى مجالات التنمية الشاملة التى تبني المهارات وتنمي قدرات الشعوب.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- About Satrt -->
        <div class="container-fluid about py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xl-12 d-flex justify-content-start">
                        <div class="row g-4">
                            <div class="col-12">
                                <img src="{{asset('front/assets/img/about2.jpg')}}" class="img-fluid pb-3 wow zoomIn" data-wow-delay="0.1s" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 wow fadeIn text-right" data-wow-delay="0.5s">
                        <div class="row g-4">
                            <div class="col-md-12">
                                <div class="ps-3 d-flex align-items-center justify-content-start">
                                    <div class="ms-4 text-right">
                                        <h3>أهداف المجلس</h3>
                                        <ol>
                                            <li>المساهمة فى المجالات الإنسانية والتنموية التى تحقق مصلحة الشعوب العربية والإفريقية دون  التمييز بسبب الجنس أو
                                                الدين أو اللون أو الثقافة.</li>
                                            <li>العمل على إكتشاف قدرة الإبداع والإسهام فى تنمية ونشر الفكر المتميز للمورد البشري الدول  العربية والإفريقية.</li>
                                            <li>تطوير كفاءة أداء القيادات العليا فى مناهج التدريب طبقًا لأحدث ما وصل إليه العلم المتقدم.</li>
                                            <li>إدارة المعرفة العلمية ورأس المال الفكرى، والمحافظة على  إستمرارية تنمية  العقول البشرية،  وتحقيق التكامل بين
                                                المعرفة والقدرة والإرادة.</li>
                                            <li>الإسهام في إحداث التحول نحو تطبيق تكنولوجيا المعلومات في  النشر والتلقى والوعي الإلكتروني.</li>
                                            <li>العمل على إستثمار الفكر الإدارى بما يناسب المجتمعات العربية والإفريقية وتوظيفها لصالحها.</li>
                                            <li>إكتساب المعارف والمهارات وتحقيق مستوى لائق من المعيشة والتمتع بحقوق الإنسان إلى  الحد الأقصى.</li>
                                            <li>تقوية التعاون الإقتصادى والإجتماعى والثقافى بين العالم العربى والإفريقى.</li>
                                            <li>تجسيد روح التواصل والتضامن والمساواة بين الدول العربية والإفريقية.</li>
                                            <li>العمل على تنمية الأنشطة الشبابية والرياضية بما يخدم الشباب العربى والإفريقي.</li>
                                            <li>يعمل المجلس على رفع القدرة الذهنية للفرد من خلال الدورات التدريبة  بمناهج علمية حديثة   وضعت خصيصاً
                                                للمجلس.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        @else

<!-- Bio Satrt -->
        <div class="container-fluid about">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xl-12 d-flex justify-content-start">
                        <div class="row g-4">
                            <div class="col-12">
                                <img src="{{asset('front/assets/img/about1.jpg')}}" class="img-fluid pb-3 wow zoomIn" data-wow-delay="0.1s" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 wow fadeIn text-right" data-wow-delay="0.5s">
                        <div class="row g-4 mb-4">
                            <div class="col-md-12">
                                <div class="ps-3 d-flex align-items-center justify-content-start">
                                    <div class="ms-4">
                                        <h3>About the Arab African Council</h3>
                                        <p>
                                            Arab-African Council for Integration and Development

                                             Special Adviser to the Economic and Social Council of the United Nations

                                             One of the leading civil society organizations in the field of comprehensive development, with its headquarters in the Arab Republic of Egypt, under Declaration No. (5337) of 2014.

                                             It includes a group of personalities, organizations and institutions from more than 50 Arab and African countries, including scholars, sheikhs, princes, ministers, and senior businessmen and women in countries around the world, specializing in economic, investment, scientific, cultural and social aspects. It has close contacts and relationships at the level of state governments and all international organisations, institutions and companies.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Bio End -->

        <!-- About Satrt -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xl-12 d-flex justify-content-start">
                        <div class="row g-4">
                            <div class="col-12">
                                <img src="{{asset('front/assets/img/about2.jpg')}}" class="img-fluid pb-3 wow zoomIn" data-wow-delay="0.1s" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 wow fadeIn text-right" data-wow-delay="0.5s">
                        <div class="row g-4 mb-4">
                            <div class="col-md-12">
                                <div class="ps-3 d-flex align-items-center justify-content-start">
                                    <div class="ms-4">
                                        <h3>The general vision of the council</h3>
                                        <p>The Arab-African Council for Integration and Development, Special Advisor to the Economic and Social Council at the United Nations, is an Arab-African non-governmental organization with a legal personality that works in the areas of comprehensive development that build skills and develop the capabilities of peoples.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- About Satrt -->
        <div class="container-fluid about py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xl-12 d-flex justify-content-start">
                        <div class="row g-4">
                            <div class="col-12">
                                <img src="{{asset('front/assets/img/about2.jpg')}}" class="img-fluid pb-3 wow zoomIn" data-wow-delay="0.1s" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 wow fadeIn text-right" data-wow-delay="0.5s">
                        <div class="row g-4">
                            <div class="col-md-12">
                                <div class="ps-3 d-flex align-items-center justify-content-start">
                                    <div class="ms-4 text-right">
                                        <h3>Council's top scorer</h3>
                                        <ol>
                                            <li>Contributing to the humanitarian and development fields that serve the interests of the Arab and African peoples without discrimination based on gender or...
                                                 Religion, color or culture.</li>
                                            <li>Working to discover the ability of creativity and contributing to the development and dissemination of the distinguished thought of the human resource in Arab and African countries.</li>
                                            <li>Developing the efficiency of senior leadership performance in training curricula according to the latest advances in science.</li>
                                            <li>Managing scientific knowledge and intellectual capital, maintaining the continuity of development of human minds, and achieving integration between...
                                                 Knowledge, ability and will.</li>
                                            <li>Contributing to the transformation towards the application of information technology in publishing, receiving and electronic awareness.</li>
                                            <li>Working to invest in administrative thought in a way that suits Arab and African societies and employ it to their advantage.</li>
                                            <li>Acquiring knowledge and skills, achieving a decent standard of living and enjoying human rights to the maximum extent.</li>
                                            <li>Strengthening economic, social and cultural cooperation between the Arab and African world.</li>
                                            <li>Embodying the spirit of communication, solidarity and equality between Arab and African countries.</li>
                                            <li>Working to develop youth and sports activities to serve Arab and African youth.</li>
                                            <li>The Council works to raise the individual's mental ability through training courses using modern scientific curricula specially developed
                                                 For the council.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        @endif
        @endsection