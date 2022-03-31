<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{asset('demo11/assets/plugins/global/plugins.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('demo11/assets/js/scripts.bundle.js')}}" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->
<script src="{{asset('demo11/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
<script src="{{asset('demo11/assets/plugins/custom/gmaps/gmaps.js')}}" type="text/javascript"></script>

<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
<script src="{{asset('demo11/assets/js/pages/dashboard.js')}}" type="text/javascript"></script>
@if(session('success'))
<div id="success-title">
    {{ session('success') }}
</div>
<script>
    var success =$('#success-title').html();
    Swal.fire({
        position: 'center',
        type: 'success',
        title:success,
        showConfirmButton: false,
    });
  </script>
@endif
@if(session('warning'))
<div id="warning-title">
    {{ session('warning') }}
</div>
<script>
    var warning = $('#warning-title').html();
    Swal.fire({
        position: 'center',
        type: 'warning',
        title:warning,
        showConfirmButton: false,
    });
</script>
@endif
@if(session('danger'))
<div id="danger-title">
    {{ session('danger') }}
</div>
<script>
    var danger = $('#danger-title').html();
    Swal.fire({
        position: 'center',
        type: 'error',
        title:danger,
        showConfirmButton: false,
    });

</script>
@endif
