@extends('templates.master')
@section('title', 'Favoris')
@section('content')
    @include('navigation.corps.header')
    <favoris-cards></favoris-cards>
@endsection