<nav class="bar bar--sm bg--dark" id="menu5" style="position: relative;">
    <div class="container">
        <div class="row">
            <div class="col-md-1 hidden-xs hidden-sm">
                <div class="bar__module">
                    <a href="{{ url('/') }}">
                        <img height="20" width="80" class="logo logo-dark" alt="logo" src="/img/logo_transparent.png"/>
                        <img height="20" width="80" class="logo logo-light" alt="logo" src="/img/logo_transparent.png"/>
                    </a>
                </div>
                <!--end module-->
            </div>
            <div class="col-md-5">
                <div class="bar__module">

                </div>
            </div>
            <!--end columns-->
            <div class="col-md-6 text-right text-left-xs" style="position: relative;">
                <div class="bar__module">
                    <ul class="menu-horizontal">
                        <li>
                            <a href="">
                                <img alt="avatar" class="avatar image--xxs" src="/img/client.png"/>
                                 {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('favoris') }}" style="margin-right: 10px;">
                                <img alt="avatar" class="image--xxs" src="{{asset('img/star.png')}}"/>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bar__module">
                    <ul class="menu-horizontal">
                        <li>
                            <i class="fa fa-power-off fa-lg" id="logout"></i>
                        </li>
                    </ul>
                </div>

            </div>
            <!--end columns-->
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</nav>