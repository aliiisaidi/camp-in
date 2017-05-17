@extends('templates.admin')
@section('title', 'Administration')
@section('content')
    @include('admin.corps.header')
    <div class="clearfix"></div>
    <div class="page-container">
        @include('admin.corps.sidebar')
        <div class="page-content-wrapper">
            <div class="page-content">
                <h3>{{ $camping->nom }}</h3>
                <div class="row">

                    @if(count($camping->photos))
                        <div class="col-md-7" style="height: 400px;">
                            <img class="theImage"
                                 src="{{asset($camping->photos[0]->url)}}"
                                 alt="">
                        </div>
                    @else
                        <div class="col-md-7" style="height: 400px;">
                            <img class="theImage"
                                 src="{{asset('/img/par_defaut.jpg')}}"
                                 alt="">
                        </div>
                    @endif
                    <div class="col-md-5">
                        <div style="position: relative; height: 150px;">
                            <div id="singleMap" class="theImage"></div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-12">

                                <span class="type--fade">Classement</span> : {{ $camping->classement }} étoile(s) <br>
                                <span class="type--fade">Catégorie</span> : {{ $camping->categorie }} <br>
                                <span class="type--fade">Nombre d'emplacement</span> : {{ $camping->nbr }} <br>
                                <span class="type--fade">Téléphone</span> : {{ $camping->phone }} <br>
                                <span class="type--fade">E-mail</span> : {{ $camping->email }} <br>
                                <span class="type--fade">Site internet</span> : <a style="color: #674172;"
                                                                                   href="{{ $camping->site }}"
                                                                                   target="_blank">{{ $camping->site }}</a>
                                <br>
                                <span class="type--fade">Adresse</span> : {{ $camping->adresse }}
                                , {{ $camping->code_postal }} , {{ $camping->commune }} <br>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <span id="lat" style="display: none;">{{ $camping->lat }}</span>
    <span id="lng" style="display: none;">{{ $camping->lng }}</span>
    @include('admin.corps.footer')
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            let lat = $('#lat').text();
            let lng = $('#lng').text();
            console.log(lat);
            console.log(lng);
            let map = new GMaps({
                div: '#singleMap',
                lat: lat,
                lng: lng
            });
            map.addMarker({
                lat: lat,
                lng: lng,
            });
        });
    </script>
@endsection