@include('front.layout.header')

<div id="wrapper">
    <!-- content-->
    <div class="content">
        
        @yield('breadcrumb')

        @yield('content')

    </div>
</div>

@include('front.layout.footer')