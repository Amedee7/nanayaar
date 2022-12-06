<div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto" id="kt_aside">
        
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="aside-menu my-4 scroll ps ps--active-y" data-menu-vertical="1"
            data-menu-scroll="1" data-menu-dropdown-timeout="500" style="height: 167px; overflow: hidden;">
            <ul class="menu-nav" style="padding: 0px !important;">
                <li class="menu-section">
                    <div class="d-flex align-items-center mb-10">
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="flaticon-user fa-2x primary-color"></span>
                            </span>
                        </div>

                        <div class="d-flex flex-column font-weight-bold">
                            <span
                                class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg text-uppercase">
                                <a class="text-white mb-1 font-size-lg">Espace :</a>
                                <span class="label label-lg font-size-lg label-light-primary label-inline">{{ Auth::user()->roles[0]['display_name'] == 'Personnel' ? 'Employé' : Auth::user()->roles[0]['display_name'] }}
                                </span>
                            </span>
                        </div>
                    </div>
                </li>

                <div class="separator separator-dashed separator-white"></div>

                <li class="menu-item {{ Request::routeIs('home') ? ' menu-item-active' : '' }} " aria-haspopup="true">
                    <a href="{{ route('home') }}" class="menu-link ">
                        <span class="flaticon-home menu-icon icon-lg"></span>
                        <span class="menu-text font-weight-bolder">Tableau de bord</span>
                    </a>
                </li>

                <li class="menu-item  menu-item-submenu
                        {{ Request::routeIs('clients.index') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('clients.create') ? ' menu-item-open' : '' }}                        
                        {{ Request::routeIs('clients.moderation_clients') ? ' menu-item-open' : '' }}"
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="fas fa-users icon-lg menu-icon"></span>
                        <span class="menu-text font-weight-bolder   ">Gestion des Clients</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu ">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item {{ Request::routeIs('clients.create') ? ' menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('clients.create') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    <span class="menu-text font-weight-bolder">Inscription</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Request::routeIs('clients.index') ? ' menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('clients.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    <span class="menu-text font-weight-bolder">Clients inscrit</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Request::routeIs('clients.moderation_clients') ? ' menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('clients.moderation_clients') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    <span class="menu-text font-weight-bold">Gestion des inscriptions</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item  menu-item-submenu
                        {{ Request::routeIs('versements.index') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('versements.create') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('prets.create') ? ' menu-item-open' : '' }}"
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="far fa-money-bill-alt  icon-lg menu-icon"></span>
                        <span class="menu-text font-weight-bolder   ">Gesttion des prets</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu ">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item {{ Request::routeIs('prets.create') ? ' menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('prets.create') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    <span class="menu-text font-weight-bolder">Soumission de pret</span>
                                </a>
                            </li>

                            <li class="menu-item {{ Request::routeIs('versements.create') ? ' menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('versements.create') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    <span class="menu-text font-weight-bolder">Versements</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Request::routeIs('prets.index') ? ' menu-item-active' : '' }}" aria-haspopup="true">
                                <a href="{{ route('prets.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    <span class="menu-text font-weight-bold">Gestion des prets</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item  menu-item-submenu
                        {{ Request::routeIs('users.index') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('logs.index') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('permissions.index') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('roles.index') ? ' menu-item-open' : '' }}"
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="flaticon-cogwheel-1 icon-lg menu-icon"></span>
                        <span class="menu-text font-weight-bolder   ">Paramètres</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu ">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item {{ Request::routeIs('users.index') ? ' menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('users.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    <span class="menu-text font-weight-bolder">Utilisateurs</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Request::routeIs('roles.index') ? ' menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('roles.index') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    <span class="menu-text font-weight-bold">Rôles</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Request::routeIs('permissions.index') ? ' menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('permissions.index') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    <span class="menu-text font-weight-bold">Permissions</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Request::routeIs('logs.index') ? ' menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('home') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    <span class="menu-text font-weight-bold">Logs</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item  {{ Request::routeIs('profile.index') ? ' menu-item-active' : '' }}"
                    aria-haspopup="true">
                    <a href="{{ route('home') }}" class="menu-link ">
                        <span class="flaticon-user icon-lg menu-icon"></span>
                        <span class="menu-text font-weight-bold">Mon profil</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
