@extends('templates.admin')
@section('title', 'Modifications')
@section('content')
    @include('admin.corps.header')
    <div class="clearfix"></div>
    <div class="page-container">
        @include('admin.corps.sidebar')
        <div class="page-content-wrapper">
            <div class="page-content">
                <h1 class="page-title"> Modification </h1>
                <campings-table></campings-table>
            </div>
        </div>
    </div>
    @include('admin.corps.footer')
@endsection