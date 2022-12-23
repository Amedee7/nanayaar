<div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto" id="kt_aside">
    <div class="brand flex-column-auto " id="kt_brand">
        <a href="{{ route('home') }}" class="brand-logo">
            <span class="text-uppercase text-white font-size-lg">NANA YAAR</span>
        </a>

        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                        <path
                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                    </g>
                </svg>
            </span>
        </button>
    </div>
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="aside-menu my-4 scroll ps ps--active-y" data-menu-vertical="1"
            data-menu-scroll="1" data-menu-dropdown-timeout="500" style="height: 167px; overflow: hidden;">
            <ul class="menu-nav" style="padding: 0px !important;">
                <li class="menu-section">
                    <div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
                        <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
                            <div class="symbol symbol-50px">
                                <img src="{{ asset('assets/media/avatars/' . Auth::user()->avatar . '') }}" alt="">
                            </div>
                            <div class="aside-user-info flex-row-fluid flex-wrap ms-5">
                                <div class="d-flex">
                                    <div class="flex-grow-1 me-2">
                                        <a href="#" class="text-white text-hover-primary fs-6 fw-bold">
                                            {{ Auth::user()->firstname }}</a>
                                        <span class="text-gray-600 fw-bold d-block fs-8 mb-1">{{ Auth::user()->lastname }}</span>
                                        <div class="d-flex align-items-center text-success fs-9">
                                            <span class="bullet bullet-dot bg-success me-1"></span>
                                            {{ Auth::user()->roles['0']['display_name'] }}
                                        </div>
                                    </div>
                                    <div class="me-n2">
                                        <a href="#" class="btn btn-icon btn-sm btn-active-color-primary mt-n2"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                                            data-kt-menu-overflow="true">
                                            <span class="svg-icon svg-icon-muted svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z"
                                                        fill="black"></path>
                                                    <path
                                                        d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z"
                                                        fill="black"></path>
                                                </svg>
                                            </span>
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                            data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <div class="menu-content d-flex align-items-center px-3">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-50px me-5">
                                                        <img alt="Logo"
                                                            src="{{ asset('assets/media/avatars/' . Auth::user()->avatar . '') }}">
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <div class="fw-bolder d-flex align-items-center fs-5">
                                                            {{ Auth::user()->lastname }}</div>
                                                        <a href="#"
                                                            class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="separator my-2"></div>
                                            <div class="menu-item px-5">
                                                <a href="{{ route('profile') }}" class="menu-link px-5">Mon compte</a>
                                            </div>
                                            <div class="menu-item px-5">
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                                    class="menu-link px-5">Déconnexion</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                @permission('client-lire')
                    <li class="menu-item  menu-item-submenu
                        {{ Request::routeIs('clients.index') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('clients.create') ? ' menu-item-open' : '' }}                        
                        {{ Request::routeIs('clients.details') ? ' menu-item-open' : '' }}                        
                    aria-haspopup="true"
                        data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="fas fa-users icon-lg menu-icon"></span>
                            <span class="menu-text font-weight-bolder   ">Gestion des Clients</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu ">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                @permission('client-creer')
                                    <li class="menu-item {{ Request::routeIs('clients.create') ? ' menu-item-active' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('clients.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                            <span class="menu-text font-weight-bolder">Inscription</span>
                                        </a>
                                    </li>
                                @endpermission
                                @permission('client-lire')
                                    <li class="menu-item {{ Request::routeIs('clients.index') ? ' menu-item-active' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('clients.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                            <span class="menu-text font-weight-bolder">Clients inscrit</span>
                                        </a>
                                    </li>
                                @endpermission
                            </ul>
                        </div>
                    </li>
                @endpermission
                @permission('versement-lire')
                    <li class="menu-item  menu-item-submenu
                        {{ Request::routeIs('versements.index') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('versements.create') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('prets.create') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('versements.modify') ? 'menu-item-open' : '' }}
                        {{ Request::routeIs('versements.show') ? 'menu-item-open' : '' }}
                        {{ Request::routeIs('versements.finish') ? 'menu-item-open' : '' }}
                        
                        "
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="far fa-money-bill-alt  icon-lg menu-icon"></span>
                            <span class="menu-text font-weight-bolder   ">Gestion des prets</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu ">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item {{ Request::routeIs('versements.index') ? ' menu-item-active' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('versements.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                        <span class="menu-text font-weight-bold">Gestion des prets</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endpermission

                @permission('paramètres-voir')
                    <li class="menu-item  menu-item-submenu
                        {{ Request::routeIs('users.index') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('logs.index') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('configs.index') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('configs.update') ? ' menu-item-open' : '' }}
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
                                @permission('utilisateur-lire')
                                    <li class="menu-item {{ Request::routeIs('users.index') ? ' menu-item-active' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('users.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                            <span class="menu-text font-weight-bolder">Utilisateurs</span>
                                        </a>
                                    </li>
                                @endpermission
                                @permission('paramètres-voir')
                                    <li class="menu-item {{ Request::routeIs('configs.index') ? ' menu-item-active' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('configs.index') }}" class="menu-link ">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                            <span class="menu-text font-weight-bold">Configuration</span>
                                        </a>
                                    </li>
                                @endpermission
                                @permission('role-lire')
                                    <li class="menu-item {{ Request::routeIs('roles.index') ? ' menu-item-active' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('roles.index') }}" class="menu-link ">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                            <span class="menu-text font-weight-bold">Rôles</span>
                                        </a>
                                    </li>
                                @endpermission
                                @permission('permission-lire')
                                    <li class="menu-item {{ Request::routeIs('permissions.index') ? ' menu-item-active' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('permissions.index') }}" class="menu-link ">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                            <span class="menu-text font-weight-bold">Permissions</span>
                                        </a>
                                    </li>
                                @endpermission
                                @permission('log-consulter')
                                    <li class="menu-item {{ Request::routeIs('logs.index') ? ' menu-item-active' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('home') }}" class="menu-link ">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                            <span class="menu-text font-weight-bold">Logs</span>
                                        </a>
                                    </li>
                                @endpermission
                            </ul>
                        </div>
                    </li>
                @endpermission
                @permission('profile-lire')
                <li class="menu-item  {{ Request::routeIs('profile.index') ? ' menu-item-active' : '' }}"
                    aria-haspopup="true">
                    <a href="{{ route('profile.index') }}" class="menu-link ">
                        <span class="flaticon-user icon-lg menu-icon"></span>
                        <span class="menu-text font-weight-bold">Mon profil</span>
                    </a>
                </li>
                @endpermission
            </ul>
        </div>
    </div>
</div>