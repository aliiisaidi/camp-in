<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Campin</title>
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
    <style>
        .cadre {
            width: 100%;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            position: absolute;
            margin: auto;
            vertical-align: middle;
        }

    </style>
</head>
<body class=" ">
<a id="start"></a>
<div id="app">
    <div class="nav-container ">
        <div class="bar bar--sm visible-xs">
            <div class="container">
                <div class="row">

                    <div class="col-xs-9 col-sm-10 text-right">
                        <a href="#" class="hamburger-toggle" data-toggle-class="#menu2;hidden-xs hidden-sm">
                            <i class="icon icon--sm stack-interface stack-menu"></i>
                        </a>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </div>
        <!--end bar-->
        <nav id="menu2" class="bar hidden-xs bar--absolute bar--transparent">
            <div class="container">
                <div class="row">
                    <div class="col-md-2  text-left-sm hidden-xs ">
                        <div class="bar__module">
                            <a href="{{ url('/') }}">

                                <img height="70" style="max-height: none; border-radius: 2px;" class="logo logo-light"
                                     alt="logo" src="img/logo.jpg"/>
                            </a>
                        </div>
                        <!--end module-->
                    </div>
                    <div class="col-md-5 col-md-pull-2">
                        <div class="bar__module">
                        </div>
                        <!--end module-->
                    </div>
                    <div class="col-md-5 text-right text-left-xs text-left-sm">
                        <div class="bar__module">
                            <div class="modal-instance block" style="display: inline-block;">
                                <a class="btn  btn--sm type--uppercase modal-trigger" href="#">
                                    <span class="btn__text">
                                        inscription
                                    </span>
                                </a>
                                <div class="modal-container inscription-modal">
                                    <div class="modal-content">
                                        <section class="unpad ">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-offset-3 col-sm-offset-3 col-xs-12">
                                                        <div class="feature feature-1">
                                                            <div class="feature__body boxed boxed--lg boxed--border text-center">
                                                                <div class="modal-close modal-close-cross"></div>
                                                                <div class="text-block">
                                                                    <h3>Crée un compte</h3>
                                                                    <p>
                                                                        Bienvenue, veuillez inserer vos information ci
                                                                        dessous.
                                                                    </p>
                                                                </div>
                                                                <form-inscription></form-inscription>
                                                                <span class="type--fine-print block">Déja inscrit ?
                                                                    <a style="cursor: pointer; color: #913D88"
                                                                       id="login-trigger">Se connecter</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!--end feature-->
                                                    </div>
                                                </div>
                                                <!--end of row-->
                                            </div>
                                            <!--end of container-->
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-instance block" style="display: inline-block;">
                                <a style="background-color: #674172;" class="btn  btn--sm type--uppercase modal-trigger"
                                   href="#">
                                    <span class="btn__text">
                                        connexion
                                    </span>
                                </a>
                                <div class="modal-container login-modal" data-modal-id="login">
                                    <div class="modal-content">
                                        <section class="unpad ">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-offset-3 col-sm-offset-3 col-xs-12">
                                                        <div class="feature feature-1">
                                                            <div class="feature__body boxed boxed--lg boxed--border text-center">
                                                                <div class="modal-close modal-close-cross"></div>
                                                                <div class="text-block">
                                                                    <h3>Connexion</h3>
                                                                </div>
                                                                <form-connexion></form-connexion>
                                                                <span class="type--fine-print block">Nouveau?
                                                                    <a style="cursor: pointer; color: #913D88"
                                                                       id="inscription-trigger">Creez votre compte</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!--end feature-->
                                                    </div>
                                                </div>
                                                <!--end of row-->
                                            </div>
                                            <!--end of container-->
                                        </section>
                                    </div>
                                    @if(Session::has('message'))
                                        <div class="notification pos-right pos-top col-sm-4 col-md-3"
                                             data-animation="from-top" data-autoshow="200" data-autohide="4000">
                                            <div class="boxed border--round "
                                                 style="background: #674172; color: #ffffff">
                                                <div class="text-block">
                                                    <h5 style="color: white;">{{ Session::get('title') }}</h5>
                                                    <p>
                                                        {{ Session::get('message') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </nav>
        <!--end bar-->
    </div>
    <div class="main-container">
        <section class="cover height-80 imagebg text-center parallax" data-overlay="5">
            <div class="background-image-holder background--top">
                <img alt="background" src="img/back.jpg"/>
            </div>
            <div class="container pos-vertical-center">
                <div class="row">
                    <div class="col-sm-8" style="padding-top: 300px;">

                        <h3>
                            Crée ton compte et choisi l'endroit où tu rêves camper
                        </h3>
                        <a style="background-color: #674172;" class="btn type--uppercase" href="#explorer">
                            <span class="btn__text">
                                Savoir plus
                            </span>
                        </a>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>

        <section id="explorer" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                        <h2>Tous les campings de la France en un click</h2>
                        <p class="lead">
                            Vous êtes vagabonds, vifs et pleins d'energie, vous adorez le voyage.. On vous propose
                            les endroits les plus sublimes où vous revez camper, créez votre compte dés maintenant et
                            commencer
                            à choisir votre prochaine destination.
                        </p>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>

        <section class="bg--secondary">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Parmis nos campings</h2>
                        <div class="row slider" data-arrows="false" data-paging="true">
                            <ul class="slides">
                                @foreach($campings as $camping)
                                    <li class="col-sm-4 col-xs-12">
                                        <div class="feature feature-1">
                                            <div style="position:relative; width:100%; height:180px;">
                                                @if(count($camping->photos) > 0)
                                                    <img class="img-responsive cadre" alt="Image"
                                                         src="{{ $camping->photos[0]->url }}"/>
                                                @else
                                                    <img class="img-responsive cadre" alt="Image"
                                                         src="/img/par_defaut.jpg"/>
                                                @endif
                                            </div>
                                            <div class="feature__body boxed boxed--border" style="height: 180px;overflow: auto">
                                                <h5>{{ $camping->nom }}</h5>
                                                <p>
                                                    {{ $camping->adresse }} , {{ $camping->code_postal }} , {{ $camping->commune }}
                                                </p>
                                                <a style="color:#913D88;" id="seeMore">
                                                    Savoir plus
                                                </a>
                                            </div>
                                        </div>
                                        <!--end feature-->
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <!--end of row-->
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>


        <div class="modal-instance">
            <div class="modal-container inscription-valide">
                <div class="modal-content">
                    <div class="boxed boxed--lg">
                        <h2>Encore une étape!</h2>
                        <hr class="short">
                        <p class="lead">
                            Veuillez valider l’inscription depuis votre boite mail.
                        </p>
                    </div>
                    <div class="modal-close modal-close-cross"></div>
                </div>
            </div>
        </div>
        <footer class="text-center space--sm footer-5  ">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="heading-block">
                            <ul class="list-inline list--hover">
                                <li>
                                    <a href="#">
                                        <span>Notre société</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Contact</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Nos produits</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>...</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul class="social-list list-inline list--hover">
                                <li>
                                    <a href="#">
                                        <i class="socicon socicon-google icon icon--xs"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="socicon socicon-twitter icon icon--xs"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="socicon socicon-facebook icon icon--xs"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="socicon socicon-instagram icon icon--xs"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <span class="type--fine-print">Made in France</span>

                        </div>
                        <div>
                            <span class="type--fine-print">&copy;
                                <span class="update-year"></span> </span>
                            <a class="type--fine-print" href="#">Privacy Policy</a>
                            <a class="type--fine-print" href="#">Legal</a>
                        </div>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </footer>
    </div>
    <a class="back-to-top inner-link" href="#start" data-scroll-class="100vh:active">
        <i class="stack-interface stack-up-open-big"></i>
    </a>
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
<script>
    window.onload = function () {
        $('.se-pre-con').hide();
        $('#login-trigger').on('click', () => {
            mr.modals.closeActiveModal();
            mr.modals.showModal('.login-modal');
        });
        $('#seeMore').on('click', () => {
            mr.modals.closeActiveModal();
            mr.modals.showModal('.login-modal');
        });
        $('#inscription-trigger').on('click', () => {
            mr.modals.closeActiveModal();
            mr.modals.showModal('.inscription-modal');
        });
    }
</script>
</body>
</html>