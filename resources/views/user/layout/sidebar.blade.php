<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Wrapper-->
    <div id="kt_app_sidebar_wrapper" class="app-sidebar-wrapper hover-scroll-y my-5 my-lg-2" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header" data-kt-scroll-wrappers="#kt_app_sidebar_wrapper" data-kt-scroll-offset="5px">
        <!--begin::Sidebar menu-->
        <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false" class="app-sidebar-menu-primary menu menu-column menu-rounded menu-sub-indention menu-state-bullet-primary px-6 mb-5">

            <div class="menu-item">
                <a class="menu-link" href="{{url('/user')}}">
                    <span class="menu-icon">
                        <i class="fa-solid fa-house fs-2"></i>
                    </span>
                    <span class="menu-title">الرئيسية</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link" href="{{route('user.users.edit', auth('web')->user()->id)}}">
                    <span class="menu-icon">
                        <i class="fa-solid fa-users fs-2"></i>
                    </span>
                    <span class="menu-title">الملف الشخصي</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link" href="{{route('user.all_supervisors.index')}}">
                    <span class="menu-icon">
                        <i class="fa-solid fa-people-roof fs-2"></i>
                    </span>
                    <span class="menu-title">المشرفين</span>
                </a>
            </div>


            <div class="menu-item">
                <a class="menu-link" href="{{route('user.messages.index')}}">
                    <span class="menu-icon">
                        <i class="fa-solid fa-message fs-2"></i>
                    </span>
                    <span class="menu-title">الرسائل</span>
                    <span class="menu-badge" >
                        <span class="badge badge-danger" id="bdg-count">{{\App\Models\Message::where('sender_type', 'user')->where('sender_id',auth('web')->user()->id)->where('status', 'unread')->count()}}</span>
                    </span>
                </a>
            </div>

        </div>

    </div>
    <!--end::Wrapper-->
</div>
<!--end::Sidebar-->
