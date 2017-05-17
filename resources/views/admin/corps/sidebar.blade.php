<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="nav-item start ">
                <a href="{{ url('administration/ajout') }}" class="nav-link nav-toggle">
                    <i class="icon-plus"></i>
                    <span class="title">Nouveau</span>
                </a>
            </li>
            <li class="nav-item start ">
                <a href="#" class="nav-link nav-toggle">
                    <i class="icon-book-open"></i>
                    <span class="title">Tous les campings</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ url('administration/campings-consultation') }}" class="nav-link ">
                            <i class="icon-list"></i>
                            <span class="title">Consultation</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ url('administration/campings-modification') }}" class="nav-link ">
                            <i class="icon-equalizer"></i>
                            <span class="title">Modification</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item start ">
                <a href="{{ url('administration/clients') }}" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Clients</span>
                </a>
            </li>
            <li class="heading"><h3 class="uppercase">en chiffres</h3></li>
            <li class="nav-item start ">
                <a href="" class="nav-link nav-toggle">
                    <i class="icon-speedometer"></i>
                    <span class="title">Statistiques</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ url('administration/statistiques/classement') }}" class="nav-link ">
                            <span class="title">Classement</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ url('administration/statistiques/categories') }}" class="nav-link ">
                            <span class="title">Catégories</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ url('administration/statistiques/inscriptions') }}" class="nav-link ">
                            <span class="title">Inscriptions</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ url('administration/statistiques/favoris') }}" class="nav-link ">
                            <span class="title">Les plus favoris</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item start ">
                <a href="{{ url('administration/la-carte') }}" class="nav-link ">
                    <i class="icon-pointer"></i>
                    <span class="title">La carte</span>
                </a>
            </li>
        </ul>
    </div>
</div>