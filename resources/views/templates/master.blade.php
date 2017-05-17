<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Campin - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Description de Campin">
    <link rel="icon" type="image/jpeg" href="{{ asset('img/c_logo.jpg') }}"/>
    <link href="{{ asset('theme/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('theme/css/stack-interface.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('theme/css/socicon.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('theme/css/lightbox.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('theme/css/flickity.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('theme/css/iconsmind.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('theme/css/jquery.steps.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('theme/css/theme.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('theme/css/custom.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('theme/css/font-robotoslab.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i%7CMaterial+Icons"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.10.0/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.6.2/sweetalert2.min.css"/>
    <script>
        window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
    </script>
</head>
<body class=" ">
<a id="start"></a>
<div id="app" >
    @yield('content')
</div>
<div class="se-pre-con">
    <div class="loader"></div>
</div>
<script src="{{ asset('theme/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('theme/js/flickity.min.js') }}"></script>
<script src="{{ asset('theme/js/easypiechart.min.js') }}"></script>
<script src="{{ asset('theme/js/parallax.js') }}"></script>
<script src="{{ asset('theme/js/typed.min.js') }}"></script>
<script src="{{ asset('theme/js/datepicker.js') }}"></script>
<script src="{{ asset('theme/js/isotope.min.js') }}"></script>
<script src="{{ asset('theme/js/ytplayer.min.js') }}"></script>
<script src="{{ asset('theme/js/lightbox.min.js') }}"></script>
<script src="{{ asset('theme/js/granim.min.js') }}"></script>
<script src="{{ asset('theme/js/jquery.steps.min.js') }}"></script>
<script src="{{ asset('theme/js/countdown.min.js') }}"></script>
<script src="{{ asset('theme/js/twitterfetcher.min.js') }}"></script>
<script src="{{ asset('theme/js/spectragram.min.js') }}"></script>
<script src="{{ asset('theme/js/smooth-scroll.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/alertifyjs/1.10.0/alertify.min.js"></script>
<script src="{{ asset('theme/js/scripts.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/sweetalert2/6.6.2/sweetalert2.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2BiuQ5rYtm3LSuDveaNp2u0e5gftmZdc"
></script>
<script src="{{ asset('js/gmaps.js') }}"></script>
@yield('js')
<script>
    $( document ).ready(function() {
        $('.se-pre-con').hide();
        $('#login-trigger').on('click',() => {
            mr.modals.closeActiveModal();
            mr.modals.showModal('.login-modal');
        });
        $('#inscription-trigger').on('click',() => {
            mr.modals.closeActiveModal();
            mr.modals.showModal('.inscription-modal');
        });
        $('#logout').on('click', () => {
            window.location.replace('/logout');
        });
    });
</script>
</body>
</html>
