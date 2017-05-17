@extends('templates.admin')
@section('title', 'Carte')
@section('content')
    @include('admin.corps.header')
    <div class="clearfix"></div>
    <div class="page-container">
        @include('admin.corps.sidebar')
        <div class="page-content-wrapper">
            <div class="page-content">
                <carte></carte>
            </div>
        </div>
    </div>
    @include('admin.corps.footer')
@endsection
@section('js')

@endsection