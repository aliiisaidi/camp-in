@extends('templates.admin')
@section('title', 'Administration')
@section('content')
    @include('admin.corps.header')
    <div class="clearfix"></div>
    <div class="page-container">
        @include('admin.corps.sidebar')
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                            <div class="visual">
                                <i class="fa fa-bar-chart-o"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup"
                                          data-value="{{ $nbrCamping }}">{{ $nbrCamping }}</span>
                                </div>
                                <div class="desc"> Campings</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                            <div class="visual">
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="{{ $nbrLikes }}">{{ $nbrLikes }}</span>
                                </div>
                                <div class="desc">Favoris</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                            <div class="visual">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="{{ $nbrUsers }}">{{ $nbrUsers }}</span>
                                </div>
                                <div class="desc"> Utilisateurs </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                            <div class="visual">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" > Date </span>
                                </div>
                                <div class="desc"> {{ $date }}</div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('admin.corps.footer')
@endsection