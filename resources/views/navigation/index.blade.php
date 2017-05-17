@extends('templates.master')
@section('title', 'Navigation')
@section('content')
    @include('navigation.corps.header')
    <div class="container">
        <navigation-cards></navigation-cards>
    </div>
@endsection