@extends('templates.master')
@section('title', '404')
@section('content')
    <section class="height-100  no-repeat center; text-center" style="background: url('/img/404.jpg') no-repeat center">
        <h1>Trompé de Chemin ?</h1>
        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-sm-12" >
                    <div style="height: 300px;"></div>
                    <a style="background-color : #674172;" class="btn  btn--icon" href="{{ url('/') }}">
                        <span style="color : #ffffff!important;"   class="btn__text"><i style="color : #ffffff!important;" class="fa fa-arrow-circle-right" aria-hidden="true"></i> Par Ici</span>
                    </a>

                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
@endsection