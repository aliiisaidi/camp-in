@extends('templates.admin')
@section('title', 'Nouveau')
@section('content')
    @include('admin.corps.header')
    <div class="clearfix"></div>
    <div class="page-container">
        @include('admin.corps.sidebar')
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <a href="{{ url('/administration') }}">Administration</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="{{ url('/administration/ajout') }}">Nouveau</a>
                        </li>
                    </ul>

                </div>
                <h1 class="page-title"> Ajout des campings
                    <small> ( Fichier JSON )</small>
                </h1>
                <div class="container">
                    <form-json-upload></form-json-upload>
                </div>
                <hr>
                <div class="portlet light bordered">
                    <div class="portlet-title">
                            <h3 style="color: #1a4656"> Ajouter un seul Camping</h3>
                    </div>
                    <div class="portlet-body form">
                        <form-ajout-camping></form-ajout-camping>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.corps.footer')

@endsection