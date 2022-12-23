<!--begin::Aside-->
<div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto " id="kt_brand">
        <!--begin::Logo-->
        <a href="{{ route('home') }}" class="brand-logo">
            <span class="font-size-h2 font-weight-boldest">NANA YAAR</span>
        </a>
        <!--end::Logo-->

        <!--begin::Toggle-->
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg--><svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
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
                <!--end::Svg Icon-->
            </span> </button>
        <!--end::Toolbar-->
    </div>
    <!--end::Brand-->

    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4 " data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav ">
                <li class="menu-section">
                    <div class="d-flex align-items-center mb-10">
                        <div class="symbol symbol-40 symbol-light-primary me-2">
                            <span class="svg-icon svg-icon-primary svg-icon-5x">
                                <!--begin::Svg Icon-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path
                                            d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path
                                            d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </div>

                        <div class="flex-grow-1 me-2">
                            <a href="#" class="text-white text-hover-primary fs-6 fw-bold">
                                {{ Auth::user()->firstname }}</a>
                            <span class="text-gray-600 fw-bold d-block fs-8 mb-1">{{ Auth::user()->lastname }}</span>
                            <!--begin::Separator-->
                            <div class="separator separator-solid mb-2"></div>
                            <!--end::Separator-->
                            <div class="d-flex align-items-center text-success fonts-9">
                                <span class="bullet bullet-dot bg-success me-1"></span>
                                {{ Auth::user()->roles['0']['display_name'] }}
                            </div>
                        </div>
                        <div class="menu-item menu-item-submenu me-2" aria-haspopup="true" data-menu-toggle="hover">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end">
                                <div class="dropdown dropdown-inline">
                                    <a href="#" class="btn btn-cleanbtn-sm btn-icon" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                                        fill="#000000" />
                                                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5"
                                                        r="2.5" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 w-250px fs-6"
                                            data-kt-menu="true" style="">
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                                data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <div class="menu-content d-flex align-items-center px-3">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-50px me-3">
                                                            <span class="svg-icon svg-icon-primary svg-icon-3x">
                                                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\User.svg--><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="24px" height="24px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                                        <path
                                                                            d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                                            fill="#000000" fill-rule="nonzero"
                                                                            opacity="0.3" />
                                                                        <path
                                                                            d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                                            fill="#000000" fill-rule="nonzero" />
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <div class="fw-bolder d-flex align-items-center fs-5">
                                                                {{ Auth::user()->firstname }}</div>
                                                            <a href="#"
                                                                class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::user()->lastname }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--begin::Separator-->
                                                <div class="separator separator-solid mt-2 mb-2"></div>
                                                <!--end::Separator-->
                                                <div class="menu-item px-5">
                                                    <a href="{{ route('profile.index') }}" class="menu-link px-5">Mon
                                                        compte</a>
                                                </div>
                                                <div class="menu-item px-5">
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                                        class="menu-link px-5">Déconnexion</a>
                                                    <form id="logout-form" action="{{ route('logout') }}"
                                                        method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Toolbar-->
                        </div>

                    </div>
                </li>
                <li class="menu-section ">
                    <h4 class="menu-text">MENUS</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                <div class="menu-item {{ Request::routeIs('home') ? ' menu-item-active' : '' }} menu-item-submenu"
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ route('home') }}" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon-">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Home.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">Tableau de bord</span></a>
                </div>
                @permission('client-lire')
                    <li class="menu-item {{ Request::routeIs('clients.index') ? ' menu-item-open' : '' }}
                {{ Request::routeIs('clients.create') ? ' menu-item-open' : '' }}                        
                {{ Request::routeIs('clients.details') ? ' menu-item-open' : '' }} menu-item-submenu"
                        aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;"
                            class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Group.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path
                                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path
                                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Gestion des Clients</span><i class="menu-arrow"></i></a>
                        <div class="menu-submenu "><i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item  menu-item-parent" aria-haspopup="true"><span
                                        class="menu-link"><span class="menu-text">Gestion des Clients</span></span></li>
                                @permission('client-creer')
                                    <li class="menu-item {{ Request::routeIs('clients.create') ? ' menu-item-active' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('clients.create') }}" class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Inscription</span></a>
                                    </li>
                                @endpermission
                                @permission('client-lire')
                                    <li class="menu-item {{ Request::routeIs('clients.index') ? ' menu-item-active' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('clients.index') }}" class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Gestion des incrits</span></a>
                                    </li>
                                @endpermission
                            </ul>
                        </div>
                    </li>
                @endpermission
                <li class="menu-item {{ Request::routeIs('versements.index') ? ' menu-item-open' : '' }}
                {{ Request::routeIs('versements.create') ? ' menu-item-open' : '' }}
                {{ Request::routeIs('prets.create') ? ' menu-item-open' : '' }}
                {{ Request::routeIs('versements.modify') ? 'menu-item-open' : '' }}
                {{ Request::routeIs('versements.show') ? 'menu-item-open' : '' }}
                {{ Request::routeIs('versements.finish') ? 'menu-item-open' : '' }} menu-item-submenu"
                    aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;"
                        class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Half-star.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M12,4.25932872 C12.1488635,4.25921584 12.3000368,4.29247316 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 L12,4.25932872 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M12,4.25932872 L12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.277344,4.464261 11.6315987,4.25960807 12,4.25932872 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">Gestions des prets</span><i class="menu-arrow"></i></a>
                    <div class="menu-submenu "><i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true"><span
                                    class="menu-link"><span class="menu-text">Gestion des prets</span></span></li>
                            @permission('versement-creer')
                                <li class="menu-item {{ Request::routeIs('versements.index') ? ' menu-item-active' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('versements.index') }}" class="menu-link "><i
                                            class="menu-bullet menu-bullet-dot"><span></span></i><span
                                            class="menu-text">Gestion des prets</span></a>
                                </li>
                            @endpermission
                        </ul>
                    </div>
                </li>
                <li class="menu-item {{ Request::routeIs('versements.index') ? ' menu-item-open' : '' }}
                {{ Request::routeIs('users.index') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('logs.index') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('configs.index') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('configs.update') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('permissions.index') ? ' menu-item-open' : '' }}
                        {{ Request::routeIs('roles.index') ? ' menu-item-open' : '' }} menu-item-submenu"
                    aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;"
                        class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Settings-2.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">Paramètres</span><i class="menu-arrow"></i></a>
                    <div class="menu-submenu "><i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true"><span
                                    class="menu-link"><span class="menu-text">Paramètres</span></span></li>
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
                @permission('profile-lire')
                    <li class="menu-item {{ Request::routeIs('profile.index') ? ' menu-item-active' : '' }}"
                        aria-haspopup="true"><a href="{{ route('profile.index') }}" class="menu-link ">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\User.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path
                                            d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path
                                            d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Mon profil</span></a>
                    </li>
                @endpermission

            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
<!--end::Aside-->
