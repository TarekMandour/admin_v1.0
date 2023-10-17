<div class="modal fade" id="kt_modal_bdg" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <h2 class="fw-bold">لديك طلب جديد</h2>

                <audio id="audio" src="{{asset('dash/assets/media/noti.wav')}}"></audio>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>

<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
        </svg>
    </span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->

<!--begin::Javascript-->
<script>var hostUrl = "{{asset('dash/assets/')}}";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{asset('dash/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('dash/assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
@yield('script')
<!--end::Vendors Javascript-->

<!--end::Javascript-->
<script>
var defaultThemeMode = "light"; 
var themeMode; 
if ( document.documentElement ) { 
    if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { 
        themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); 
    } else { 
        if ( localStorage.getItem("data-bs-theme") !== null ) { 
            themeMode = localStorage.getItem("data-bs-theme"); 
        } else { 
            themeMode = defaultThemeMode; 
        } 
    } 
    if (themeMode === "system") { 
        if ( window.matchMedia("(prefers-color-scheme: dark)").matches == "dark") {
            themeMode = "dark";
        } else {
            themeMode = "light";
        }
    } 
    document.documentElement.setAttribute("data-bs-theme", themeMode); 
}

</script>

<?php
$message = session()->get("message");
$status = session()->get("status");
$error_message = session()->get("error_message");

?>
<script>
    toastr.options = {
        "positionClass": "toastr-top-left"
    };
</script>
@if( session()->has("message"))
    @if( $status == 'error')
        <script>
            toastr.error("", "{{$message}}");
        </script>
    @else
    <script>
        toastr.success("", "{{$message}}");
    </script>
    @endif
@endif
@if( $errors->first())
    <script>
        toastr.error("{{$errors->first()}}", "عفوا !");
    </script>
@endif

<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>

<script>
    const firebaseConfig = {
        apiKey: "AIzaSyAmTMLDiMCY-nSouic2UcvPZp2txLYmR8c",
        authDomain: "fitnas-b6221.firebaseapp.com",
        projectId: "fitnas-b6221",
        storageBucket: "fitnas-b6221.appspot.com",
        messagingSenderId: "339517124881",
        appId: "1:339517124881:web:cfe27c32fa21fd51ca9cb0",
        measurementId: "G-VM2T1WSZKY"
    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    function startFCM() {
        messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function (response) {
                console.log(response);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route("store.token") }}',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        token: response
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        console.log('Token stored.');
                        {{--document.getElementById('notify_icon').append('<i class="material-icons text-primary" data-toggle="tooltip" data-placement="bottom" title="{{__('dashboard.sidebar.notifications')}}" style="font-size: 10px; color: #b23b3b !important; position: absolute; top: 0; left: 0">circle</i>');--}}
                        {{--$('#notify').children().remove();--}}
                        {{--var html = `{{ view('supervisor.layouts.notifications', ['notifications'=>$notifications->limit(15)->get()])->render()}}`;--}}
                        {{--document.getElementById('notify').append(html);--}}
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });

            }).catch(function (error) {
            console.log(error);
        });
    }

    messaging.onMessage(function (payload) {
        console.log('hhh')
        const title = payload.notification.title;
        const options = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(title, options);
    });
    startFCM();
</script>
