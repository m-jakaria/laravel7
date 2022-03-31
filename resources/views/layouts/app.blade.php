<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!-- begin::Head -->
	@include('layouts.partial-login.head')
    <!-- end::Head -->
	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
            @yield('content')
		</div>
		<!-- end:: Page -->
        @include('layouts.partial-login.script')
        @stack('script')
	</body>
	<!-- end::Body -->
</html>

    <!-- begin:: Page -->


    <!-- end:: Page -->

    <!-- begin::Global Config(global config for global JS sciprts) -->

    <!-- end::Global Config -->

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="{{asset('demo11/assets/plugins/global/plugins.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('demo11/assets/js/scripts.bundle.js')}}" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="assets/js/pages/custom/login/login-general.js" type="text/javascript"></script>

    <!--end::Page Scripts -->
</body>
