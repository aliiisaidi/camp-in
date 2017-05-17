@extends('templates.admin')
@section('title', 'Consultation')
@section('content')
    @include('admin.corps.header')
    <div class="clearfix"></div>
    <div class="page-container">
        @include('admin.corps.sidebar')
        <div class="page-content-wrapper">
            <div class="page-content">
                <consultation-campings></consultation-campings>
            </div>
        </div>
    @include('admin.corps.footer')
@endsection