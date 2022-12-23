<div id="kt_header" class="header  header-fixed ">
    <div class=" container-fluid  d-flex align-items-stretch justify-content-between">
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

<!--begin::Subheader-->
<div id="kt_header" class="header  header-fixed ">
    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-5 fs-7">
            <!--begin::Title-->
            <h3 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Tableau de bord</h3>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{route('home')}}" class="text-muted text-hover-primary">Tableau de bord</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Tableau de bord</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">

			<!--begin::Page Heading-->
			<div class="d-flex align-items-baseline flex-wrap mr-5">
				<!--begin::Page Title-->
	            <h5 class="text-dark font-weight-bold my-1 mr-5">
	                DropzoneJS	                	            </h5>
				<!--end::Page Title-->

	            					<!--begin::Breadcrumb-->
	                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
	                    							<li class="breadcrumb-item">
                                                        <a href="{{route('home')}}" class="text-muted text-hover-primary">Tableau de bord</a>
							</li>
	                    							<li class="breadcrumb-item">
	                        	<a href="" class="text-muted">
	                            	File Upload	                        	</a>
							</li>
	                    							<li class="breadcrumb-item">
	                        	<a href="" class="text-muted">
	                            	DropzoneJS	                        	</a>
							</li>
	                    	                </ul>
					<!--end::Breadcrumb-->
	            			</div>
			<!--end::Page Heading-->
        </div>
		<!--end::Info-->


        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Label-->
            <span class="fs-7 text-dark font-weight-bold my-1 mr-5">{{Auth::user()->lastname}} {{Auth::user()->firstname}}</span>
            <!--end::Label-->
            <!--begin::Actions-->
            <div class="d-flex">
                <!--begin::Action-->
                <a class="btn btn-sm btn-icon btn-icon-muted btn-active-icon-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black"></path>
                            <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>
                <!--end::Action-->
            </div>
        </div>
        <!--end::Toolbar-->
    </div>
</div>
<!--end::Subheader-->

