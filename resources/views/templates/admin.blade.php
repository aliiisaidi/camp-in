<!doctype html>
<!--[if IE 8]>
<html lang="fr" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="fr" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8"/>
    <title>Campin - @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Campin" name="description"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('admin/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('admin/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('admin/assets/global/css/components-rounded.min.css') }}" rel="stylesheet"
          id="style_components"
          type="text/css"/>
    <link href="{{ asset('admin/assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ asset('admin/assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="{{ asset('admin/assets/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('admin/assets/pages/css/blog.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}"
          rel="stylesheet" type="text/css"/>

    <link href="{{ asset('holdon/holdon.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
    <script>
        window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2BiuQ5rYtm3LSuDveaNp2u0e5gftmZdc"
    ></script>
    <script src="{{asset('js/gmaps.js')}}"></script>
</head>
<!-- END HEAD -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<div class="page-wrapper">
    <div id="app">
        @yield('content')
    </div>
</div>

<!--[if lt IE 9]>
<script src="{{ asset('admin/assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ asset('admin/assets/global/plugins/excanvas.min.js') }}"></script>
<script src="{{ asset('admin/assets/global/plugins/ie8.fix.min.js') }}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('admin/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('admin/assets/global/scripts/app.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('admin/assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/dropzone/dropzone.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/pages/scripts/form-dropzone.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/pages/scripts/ui-toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"
        type="text/javascript"></script>
<script src="{{asset('admin/assets/global/scripts/datatable.js')}}"></script>
<script src="{{asset('admin/assets/global/plugins/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}"></script>
<script src="{{asset('admin/assets/global/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('admin/assets/pages/scripts/ui-modals.min.js')}}"></script>

@yield('js')

<script src="{{ asset('holdon/holdon.js') }}" type="text/javascript"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>