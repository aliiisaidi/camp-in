@extends('templates.admin')
@section('title', 'Statistiques Inscriptions')
@section('content')
    @include('admin.corps.header')
    <div class="clearfix"></div>
    <div class="page-container">
        @include('admin.corps.sidebar')
        <div class="page-content-wrapper">
            <div class="page-content">
                <h1 class="page-title">Statistiques . Inscriptions</h1>
                <statistiques-inscriptions></statistiques-inscriptions>
            </div>
        </div>
    </div>
    @include('admin.corps.footer')
@endsection
@section('js')
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all"/>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script src="https://www.amcharts.com/lib/3/lang/fr.js">
@endsection