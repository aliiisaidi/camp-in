@extends('templates.admin')
@section('title', 'Gestion de profil')
@section('content')
    @include('admin.corps.header')
    <div class="clearfix"></div>
    <div class="page-container">
        @include('admin.corps.sidebar')
        <div class="page-content-wrapper">
            <div class="page-content">
                <h1 class="page-title"> Modifiez le mot de passe </h1>
                <edit-password-admin></edit-password-admin>
            </div>
        </div>
    </div>
    @include('admin.corps.footer')
@endsection