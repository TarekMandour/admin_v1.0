@extends('admin.layout.master')

@section('style')
<link href="{{asset('dash/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>

@endsection

@section('breadcrumb')

@endsection

@section('content')

<div id="kt_app_content_container" class="app-container container-fluid">
    <!--begin::Row-->
    <div class="row g-5 g-xl-10">
        <!--begin::Col-->
        <div class="col-xl-6 mb-xl-10">
            <!--begin::Lists Widget 19-->
            <div class="card card-flush h-xl-100">
                <!--begin::Heading-->
                <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px" style="background-image:url('{{asset('dash/assets/media/svg/shapes/top-green.png')}}')" data-bs-theme="light">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column text-white pt-15">
                        <span class="fw-bold fs-2x mb-3">الاحصائيات</span>
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar pt-5">
                        <!--begin::Menu-->
                        <button class="btn btn-sm btn-icon btn-active-color-primary btn-color-white bg-white bg-opacity-25 bg-hover-opacity-100 bg-hover-white bg-active-opacity-25 w-20px h-20px" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
                            <span class="svg-icon svg-icon-4">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor" />
																	<rect x="17" y="10" width="4" height="4" rx="2" fill="currentColor" />
																	<rect x="3" y="10" width="4" height="4" rx="2" fill="currentColor" />
																</svg>
															</span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--begin::Menu 2-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">قائمة الوصول السريع</div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator mb-3 opacity-75"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">رسالة جديدة</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">اضافة مشرف</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">اضافة مشترك</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator mt-3 opacity-75"></div>
                            <!--end::Menu separator-->
                        </div>
                        <!--end::Menu 2-->
                        <!--end::Menu-->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Heading-->
                <!--begin::Body-->
                <div class="card-body mt-n20">
                    <!--begin::Stats-->
                    <div class="mt-n20 position-relative">
                        <!--begin::Row-->
                        <div class="row g-3 g-lg-6">
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Items-->
                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px me-5 mb-8">
																		<span class="symbol-label">
																			<!--begin::Svg Icon | path: icons/duotune/medicine/med005.svg-->
																			<span class="svg-icon svg-icon-1 svg-icon-primary">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path opacity="0.3" d="M17.9061 13H11.2061C11.2061 12.4 10.8061 12 10.2061 12C9.60605 12 9.20605 12.4 9.20605 13H6.50606L9.20605 8.40002V4C8.60605 4 8.20605 3.6 8.20605 3C8.20605 2.4 8.60605 2 9.20605 2H15.2061C15.8061 2 16.2061 2.4 16.2061 3C16.2061 3.6 15.8061 4 15.2061 4V8.40002L17.9061 13ZM13.2061 9C12.6061 9 12.2061 9.4 12.2061 10C12.2061 10.6 12.6061 11 13.2061 11C13.8061 11 14.2061 10.6 14.2061 10C14.2061 9.4 13.8061 9 13.2061 9Z" fill="currentColor" />
																					<path d="M18.9061 22H5.40605C3.60605 22 2.40606 20 3.30606 18.4L6.40605 13H9.10605C9.10605 13.6 9.50605 14 10.106 14C10.706 14 11.106 13.6 11.106 13H17.8061L20.9061 18.4C21.9061 20 20.8061 22 18.9061 22ZM14.2061 15C13.1061 15 12.2061 15.9 12.2061 17C12.2061 18.1 13.1061 19 14.2061 19C15.3061 19 16.2061 18.1 16.2061 17C16.2061 15.9 15.3061 15 14.2061 15Z" fill="currentColor" />
																				</svg>
																			</span>
                                                                            <!--end::Svg Icon-->
																		</span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{\App\Models\User::whereNull('deleted_at')->count()}}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">عدد المشتركين</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Items-->
                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px me-5 mb-8">
																		<span class="symbol-label">
																			<!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
																			<span class="svg-icon svg-icon-1 svg-icon-primary">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z" fill="currentColor" />
																					<path opacity="0.3" d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z" fill="currentColor" />
																				</svg>
																			</span>
                                                                            <!--end::Svg Icon-->
																		</span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{\App\Models\Supervisor::whereNull('deleted_at')->count()}}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">عدد المشرفين</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Items-->
                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px me-5 mb-8">
																		<span class="symbol-label">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen020.svg-->
																			<span class="svg-icon svg-icon-1 svg-icon-primary">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path d="M14 18V16H10V18L9 20H15L14 18Z" fill="currentColor" />
																					<path opacity="0.3" d="M20 4H17V3C17 2.4 16.6 2 16 2H8C7.4 2 7 2.4 7 3V4H4C3.4 4 3 4.4 3 5V9C3 11.2 4.8 13 7 13C8.2 14.2 8.8 14.8 10 16H14C15.2 14.8 15.8 14.2 17 13C19.2 13 21 11.2 21 9V5C21 4.4 20.6 4 20 4ZM5 9V6H7V11C5.9 11 5 10.1 5 9ZM19 9C19 10.1 18.1 11 17 11V6H19V9ZM17 21V22H7V21C7 20.4 7.4 20 8 20H16C16.6 20 17 20.4 17 21ZM10 9C9.4 9 9 8.6 9 8V5C9 4.4 9.4 4 10 4C10.6 4 11 4.4 11 5V8C11 8.6 10.6 9 10 9ZM10 13C9.4 13 9 12.6 9 12V11C9 10.4 9.4 10 10 10C10.6 10 11 10.4 11 11V12C11 12.6 10.6 13 10 13Z" fill="currentColor" />
																				</svg>
																			</span>
                                                                            <!--end::Svg Icon-->
																		</span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{\App\Models\Contact::where('status', 'unread')->count()}}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">تذاكر جديدة</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Items-->
                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px me-5 mb-8">
																		<span class="symbol-label">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
																			<span class="svg-icon svg-icon-1 svg-icon-primary">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path opacity="0.3" d="M20.9 12.9C20.3 12.9 19.9 12.5 19.9 11.9C19.9 11.3 20.3 10.9 20.9 10.9H21.8C21.3 6.2 17.6 2.4 12.9 2V2.9C12.9 3.5 12.5 3.9 11.9 3.9C11.3 3.9 10.9 3.5 10.9 2.9V2C6.19999 2.5 2.4 6.2 2 10.9H2.89999C3.49999 10.9 3.89999 11.3 3.89999 11.9C3.89999 12.5 3.49999 12.9 2.89999 12.9H2C2.5 17.6 6.19999 21.4 10.9 21.8V20.9C10.9 20.3 11.3 19.9 11.9 19.9C12.5 19.9 12.9 20.3 12.9 20.9V21.8C17.6 21.3 21.4 17.6 21.8 12.9H20.9Z" fill="currentColor" />
																					<path d="M16.9 10.9H13.6C13.4 10.6 13.2 10.4 12.9 10.2V5.90002C12.9 5.30002 12.5 4.90002 11.9 4.90002C11.3 4.90002 10.9 5.30002 10.9 5.90002V10.2C10.6 10.4 10.4 10.6 10.2 10.9H9.89999C9.29999 10.9 8.89999 11.3 8.89999 11.9C8.89999 12.5 9.29999 12.9 9.89999 12.9H10.2C10.4 13.2 10.6 13.4 10.9 13.6V13.9C10.9 14.5 11.3 14.9 11.9 14.9C12.5 14.9 12.9 14.5 12.9 13.9V13.6C13.2 13.4 13.4 13.2 13.6 12.9H16.9C17.5 12.9 17.9 12.5 17.9 11.9C17.9 11.3 17.5 10.9 16.9 10.9Z" fill="currentColor" />
																				</svg>
																			</span>
                                                                            <!--end::Svg Icon-->
																		</span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{\App\Models\Message::whereNull('deleted_at')->count()}}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">عدد الرسائل</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Lists Widget 19-->
        </div>
        <div class="col-xl-6">
            <!--begin::Card widget 19-->
            <div class="card card-flush h-lg-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">مستخدمين النظام</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">احصائية مستخدمين النظام</span>
                    </h3>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body d-flex align-items-end pt-6">
                    <!--begin::Row-->
                    <div class="row align-items-center mx-0 w-100">
                        <!--begin::Col-->
                        <div class="col-7 px-0">
                            <!--begin::Labels-->
                            <div class="d-flex flex-column content-justify-center">
                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-semibold align-items-center">
                                    <!--begin::Bullet-->
                                    <div class="bullet bg-success me-3" style="border-radius: 3px;width: 12px;height: 12px"></div>
                                    <!--end::Bullet-->
                                    <!--begin::Label-->
                                    <div class="fs-5 fw-bold text-gray-600 me-5">المشتركين:</div>
                                    <!--end::Label-->
                                    <!--begin::Stats-->
                                    <div class="ms-auto fw-bolder text-gray-700 text-end">{{\App\Models\User::whereNull('deleted_at')->count()}}</div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Label-->
                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-semibold align-items-center my-4">
                                    <!--begin::Bullet-->
                                    <div class="bullet bg-primary me-3" style="border-radius: 3px;width: 12px;height: 12px"></div>
                                    <!--end::Bullet-->
                                    <!--begin::Label-->
                                    <div class="fs-5 fw-bold text-gray-600 me-5">المشرفين:</div>
                                    <!--end::Label-->
                                    <!--begin::Stats-->
                                    <div class="ms-auto fw-bolder text-gray-700 text-end">{{\App\Models\Supervisor::whereNull('deleted_at')->count()}}</div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Label-->
                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-semibold align-items-center">
                                    <!--begin::Bullet-->
                                    <div class="bullet me-3" style="border-radius: 3px;background-color: #E4E6EF;width: 12px;height: 12px"></div>
                                    <!--end::Bullet-->
                                    <!--begin::Label-->
                                    <div class="fs-5 fw-bold text-gray-600 me-5">المديرين:</div>
                                    <!--end::Label-->
                                    <!--begin::Stats-->
                                    <div class="ms-auto fw-bolder text-gray-700 text-end">{{\App\Models\Employee::whereNull('deleted_at')->count()}}</div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Labels-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-5 d-flex justify-content-end px-0">
                            <!--begin::Chart-->
                            <div id="kt_card_widget_19_chart" class="min-h-auto h-150px w-150px" data-kt-size="150" data-kt-line="25"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 19-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row g-5 g-xl-10">
    <div class="col-xl-12">
        <div class="card card-bordered">
            <div class="card-header py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">تقرير الاشتراكات</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">الطلبات الاشتراكات خلال عام</span>
                </h3>
            </div>
            <div class="card-body">
                <div id="kt_apexcharts_1" style="height: 350px;"></div>
            </div>
        </div>
    </div>
    </div>
    <!--end::Row-->

</div>

@endsection

@section('script')
<script src="{{asset('dash/assets/plugins/global/plugins.bundle.js')}}"></script>
<script>

var element = document.getElementById('kt_apexcharts_1');

var height = parseInt(KTUtil.css(element, 'height'));
var labelColor = KTUtil.getCssVariableValue('--bs-primary');
var borderColor = KTUtil.getCssVariableValue('--bs-primary');
var baseColor = KTUtil.getCssVariableValue('--bs-primary');
var secondaryColor = KTUtil.getCssVariableValue('--bs-primary');


var options = {
    series: [{
        name: 'الطلبات المقدمه',
        data: ["{{$count_user[0]}}", "{{$count_user[1]}}", "{{$count_user[2]}}", "{{$count_user[3]}}", "{{$count_user[4]}}", "{{$count_user[5]}}", "{{$count_user[6]}}", "{{$count_user[7]}}", "{{$count_user[8]}}", "{{$count_user[9]}}", "{{$count_user[10]}}", "{{$count_user[11]}}"],
    }],
    chart: {
        fontFamily: 'inherit',
        type: 'bar',
        height: height,
        toolbar: {
            show: false
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: ['30%'],
            endingShape: 'rounded'
        },
    },
    legend: {
        show: false
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: ["شهر {{$month_result[0][0]}}", "شهر {{$month_result[0][1]}}", "شهر {{$month_result[0][2]}}", "شهر {{$month_result[0][3]}}", "شهر {{$month_result[0][4]}}", "شهر {{$month_result[0][5]}}", "شهر {{$month_result[0][6]}}", "شهر {{$month_result[0][7]}}","شهر {{$month_result[0][8]}}", "شهر {{$month_result[0][9]}}", "شهر {{$month_result[0][10]}}","شهر {{$month_result[0][11]}}"],
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false
        },
        labels: {
            style: {
                colors: labelColor,
                fontSize: '12px'
            }
        }
    },
    yaxis: {
        labels: {
            style: {
                colors: labelColor,
                fontSize: '12px'
            }
        }
    },
    fill: {
        opacity: 1
    },
    states: {
        normal: {
            filter: {
                type: 'none',
                value: 0
            }
        },
        hover: {
            filter: {
                type: 'none',
                value: 0
            }
        },
        active: {
            allowMultipleDataPointsSelection: false,
            filter: {
                type: 'none',
                value: 0
            }
        }
    },
    tooltip: {
        style: {
            fontSize: '12px'
        },
        y: {
            formatter: function (val) {
                return  val
            }
        }
    },
    colors: [baseColor, secondaryColor],
    grid: {
        borderColor: borderColor,
        strokeDashArray: 4,
        yaxis: {
            lines: {
                show: true
            }
        }
    }
};

var chart = new ApexCharts(element, options);
chart.render();
</script>
    <script>
        // Class definition
        var KTCardsWidget19 = function () {
            // Private methods
            var initChart = function() {
                var el = document.getElementById('kt_card_widget_19_chart');

                if (!el) {
                    return;
                }

                var options = {
                    size: el.getAttribute('data-kt-size') ? parseInt(el.getAttribute('data-kt-size')) : 70,
                    lineWidth: el.getAttribute('data-kt-line') ? parseInt(el.getAttribute('data-kt-line')) : 11,
                    rotate: el.getAttribute('data-kt-rotate') ? parseInt(el.getAttribute('data-kt-rotate')) : 145,
                    //percent:  el.getAttribute('data-kt-percent') ,
                }

                var canvas = document.createElement('canvas');
                var span = document.createElement('span');

                if (typeof(G_vmlCanvasManager) !== 'undefined') {
                    G_vmlCanvasManager.initElement(canvas);
                }

                var ctx = canvas.getContext('2d');
                canvas.width = canvas.height = options.size;

                el.appendChild(span);
                el.appendChild(canvas);

                ctx.translate(options.size / 2, options.size / 2); // change center
                ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg

                //imd = ctx.getImageData(0, 0, 240, 240);
                var radius = (options.size - options.lineWidth) / 2;

                var drawCircle = function(color, lineWidth, percent) {
                    percent = Math.min(Math.max(0, percent || 1), 1);
                    ctx.beginPath();
                    ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
                    ctx.strokeStyle = color;
                    ctx.lineCap = 'round'; // butt, round or square
                    ctx.lineWidth = lineWidth
                    ctx.stroke();
                };

                // Init
                drawCircle('#E4E6EF', options.lineWidth, 100 / 100);
                drawCircle(KTUtil.getCssVariableValue('--bs-primary'), options.lineWidth, 100 / 150);
                drawCircle(KTUtil.getCssVariableValue('--bs-success'), options.lineWidth, 100 / 250);
            }

            // Public methods
            return {
                init: function () {
                    initChart();
                }
            }
        }();
    </script>
@endsection
