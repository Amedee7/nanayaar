<div id="kt_header" class="header  header-fixed ">
    <div class=" container-fluid  d-flex align-items-stretch justify-content-">
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <div id="kt_header_menu" class="header-menu header-menu-mobile  header-menu-layout-default ">
                <ul class="menu-nav ">
                    <li class="menu-item menu-item-submenu menu-item-rel menu-item-open-dropdown menu-item-hover">
                        <a href="{{route('home')}}" class="menu-link btn btn-primary">
                            <span class="menu-text">Retour à l'interface</span><i class="menu-arrow"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="topbar">
            <div class="topbar-item">
                <div class="btn btn-secondary btn btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                    <span class="flaticon-avatar mr-2"></span>
                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{Auth::user()->lastname}} {{Auth::user()->firstname}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
