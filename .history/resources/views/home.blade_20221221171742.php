@extends('layouts.app')
@section('title', 'Tableau de bord')
@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div id="kt_header" style="" class="header align-items-stretch">
            <div class="header-brand">
                <a href="{{route('home')}}">
                    <h3 style="color: white;" class="text-center">GESTION DE CAVE</h3>
                </a>
                <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-minimize" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
                    <span class="svg-icon svg-icon-1 me-n1 minimize-default">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="8.5" y="11" width="12" height="2" rx="1" fill="black"></rect>
                            <path d="M10.3687 11.6927L12.1244 10.2297C12.5946 9.83785 12.6268 9.12683 12.194 8.69401C11.8043 8.3043 11.1784 8.28591 10.7664 8.65206L7.84084 11.2526C7.39332 11.6504 7.39332 12.3496 7.84084 12.7474L10.7664 15.3479C11.1784 15.7141 11.8043 15.6957 12.194 15.306C12.6268 14.8732 12.5946 14.1621 12.1244 13.7703L10.3687 12.3073C10.1768 12.1474 10.1768 11.8526 10.3687 11.6927Z" fill="black"></path>
                            <path opacity="0.5" d="M16 5V6C16 6.55228 15.5523 7 15 7C14.4477 7 14 6.55228 14 6C14 5.44772 13.5523 5 13 5H6C5.44771 5 5 5.44772 5 6V18C5 18.5523 5.44771 19 6 19H13C13.5523 19 14 18.5523 14 18C14 17.4477 14.4477 17 15 17C15.5523 17 16 17.4477 16 18V19C16 20.1046 15.1046 21 14 21H5C3.89543 21 3 20.1046 3 19V5C3 3.89543 3.89543 3 5 3H14C15.1046 3 16 3.89543 16 5Z" fill="black"></path>
                        </svg>
                    </span>
                    <span class="svg-icon svg-icon-1 minimize-active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(-1 0 0 1 15.5 11)" fill="black"></rect>
                            <path d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z" fill="black"></path>
                            <path d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z" fill="#C4C4C4"></path>
                        </svg>
                    </span>
                </div>
                <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                    <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black"></path>
                                <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="toolbar">
                <!--begin::Toolbar-->
                <div class="container-fluid py-6 py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column me-5">
                        <!--begin::Title-->
                        <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Tableau de bord</h1>
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
                    <!--begin::Action group-->
                    <div class="d-flex align-items-center overflow-auto pt-3 pt-lg-0">
                        <!--end::Action wrapper-->
                        <!--begin::Action wrapper-->
                        <div class="d-flex align-items-center">
                            <!--begin::Label-->
                            <span class="fs-7 text-gray-700 fw-bolder pe-3 d-none d-xxl-block">{{Auth::user()->lastname}} {{Auth::user()->firstname}}</span>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <!--begin::Nav Panel Widget 2-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body ">
                        <!--begin::Nav Tabs-->
                        <ul class="dashboard-tabs nav nav-pills nav-danger row row-paddingless m-0 p-0" role="tablist">
                            <!--begin::Item-->
                            <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                    data-toggle="pill" href="#tab_forms_widget_1">
                                    <span class="nav-icon py-2 w-auto">
                                        <span class="svg-icon svg-icon-3x"><!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
                                                <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>  </span>
                                    <span class="nav-text font-size-lg py-2 font-weight-bold text-center">
                                        Tableau de board
                                    </span>
                                </a>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                    data-toggle="pill" href="#tab_forms_widget_2">
                                    <span class="nav-icon py-2 w-auto">
                                        <span class="svg-icon svg-icon-3x"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span> </span>
                                    <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">
                                        Gestion des clients
                                    </span>
                                </a>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                <a class="nav-link active border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                    data-toggle="pill" href="#tab_forms_widget_3">
                                    <span class="nav-icon py-2 w-auto">
                                    <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Wallet.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5"/>
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) " x="3" y="3" width="18" height="7" rx="1"/>
                                            <path d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z" fill="#000000"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span> </span> 
                                    <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">
                                        Gestions des prets
                                    </span>
                                </a>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                    data-toggle="pill" href="#tab_forms_widget_4">
                                    <span class="nav-icon py-2 w-auto">
                                        <span class="svg-icon svg-icon-3x"><!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"/>
                                                <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"/>
                                                <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"/>
                                                <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span> </span>
                                    <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">
                                        Gestions des versements
                                    </span>
                                </a>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3">
                                <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                    data-toggle="pill" href="#tab_forms_widget_5">
                                    <span class="nav-icon py-2 w-auto">
                                            <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Update.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M8.43296491,7.17429118 L9.40782327,7.85689436 C9.49616631,7.91875282 9.56214077,8.00751728 9.5959027,8.10994332 C9.68235021,8.37220548 9.53982427,8.65489052 9.27756211,8.74133803 L5.89079566,9.85769242 C5.84469033,9.87288977 5.79661753,9.8812917 5.74809064,9.88263369 C5.4720538,9.8902674 5.24209339,9.67268366 5.23445968,9.39664682 L5.13610134,5.83998177 C5.13313425,5.73269078 5.16477113,5.62729274 5.22633424,5.53937151 C5.384723,5.31316892 5.69649589,5.25819495 5.92269848,5.4165837 L6.72910242,5.98123382 C8.16546398,4.72182424 10.0239806,4 12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 L6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,8.6862915 15.3137085,6 12,6 C10.6885336,6 9.44767246,6.42282109 8.43296491,7.17429118 Z" fill="#000000" fill-rule="nonzero"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span> </span>
                                    <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">
                                        Gestions des renouvellements
                                    </span>
                                </a>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-0 mb-3 mb-lg-0">
                                <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                    data-toggle="pill" href="#tab_forms_widget_5">
                                    <span class="nav-icon py-2 w-auto">
                                        <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Settings-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span> </span>
                                    <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">
                                        Parametrages
                                    </span>
                                </a>
                            </li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Nav Tabs-->

                        <!--begin::Nav Content-->
                        <div class="tab-content m-0 p-0">
                            <div class="tab-pane active" id="forms_widget_tab_1" role="tabpanel">

                            </div>
                            <div class="tab-pane" id="forms_widget_tab_2" role="tabpanel">

                            </div>
                            <div class="tab-pane" id="forms_widget_tab_3" role="tabpanel">

                            </div>
                            <div class="tab-pane" id="forms_widget_tab_4" role="tabpanel">

                            </div>
                            <div class="tab-pane" id="forms_widget_tab_6" role="tabpanel">

                            </div>
                        </div>
                        <!--end::Nav Content-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--begin::Nav Panel Widget 2-->
            </div>
        </div>
        {{-- <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!--begin::Hero-->
                <div class="card position-relative overflow-hidden mb-8">

                    <div class="position-absolute d-flex top-0 right-0 offset-lg-6 col-lg-6 opacity-30 opacity-lg-100">
                        <span class="svg-icon svg-icon-full flex-row-fluid p-10">
                            <!--begin::Svg Icon | path:assets/media/svg/illustrations/working.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                id="e66d77ca-31e8-442d-a5de-b801817c4280" data-name="Layer 1" width="1024.7"
                                height="671.65" viewBox="0 0 1024.7 671.65">
                                <circle cx="720.55" cy="430.76" r="105"
                                    fill="url(#a374d817-ded2-4154-8f0a-fb69bb0241af)" />
                                <circle cx="720.55" cy="430.76" r="100" fill="#f5f5f5" />
                                <g opacity="0.5">
                                    <path
                                        d="M811,482.47a62.52,62.52,0,0,0-64.27,55.82h-18a3.64,3.64,0,0,0-3.64,3.64v6a3.65,3.65,0,0,0,3.64,3.65h18A62.5,62.5,0,1,0,811,482.47Z"
                                        transform="translate(-87.65 -114.18)"
                                        fill="url(#fd39efba-8078-41b8-857e-e17431406f47)" />
                                </g>
                                <path
                                    d="M810.19,486.22a58.75,58.75,0,0,0-60.41,52.47H732.36a2.91,2.91,0,0,0-2.91,2.91v6.67a2.91,2.91,0,0,0,2.91,2.92h17.42a58.75,58.75,0,1,0,60.41-65Z"
                                    transform="translate(-87.65 -114.18)" fill="#fff" />
                                <circle cx="720.55" cy="430.76" r="41.25" fill="#795548" />
                                <path d="M829.45,524.94s11.77,18.28,8.4,32.5C837.85,557.44,851.3,535.09,829.45,524.94Z"
                                    transform="translate(-87.65 -114.18)" fill="#fff" opacity="0.2" />
                                <circle cx="746.8" cy="453.26" r="3.75" fill="#fff" opacity="0.2" />
                                <rect x="119.09" y="182.63" width="213.27" height="308.72"
                                    transform="translate(-156.47 -56.04) rotate(-12.75)"
                                    fill="url(#b2bf7fa1-65c2-4695-aeca-af8d6fc55ae3)" />
                                <rect x="334.38" y="133.91" width="213.27" height="308.72"
                                    transform="translate(-140.4 -9.72) rotate(-12.75)"
                                    fill="url(#a8abeec4-29f5-4a5c-9a38-56f560b9b0a3)" />
                                <rect x="122.15" y="186.27" width="207.97" height="302.01"
                                    transform="translate(-156.52 -55.94) rotate(-12.75)" fill="#6c63ff" />
                                <rect x="336.06" y="137.86" width="207.97" height="302.01"
                                    transform="translate(-140.56 -9.92) rotate(-12.75)" fill="#f5f5f5" />
                                <rect x="135.55" y="222.61" width="124.88" height="20.81"
                                    transform="translate(-134.2 -64.73) rotate(-12.75)" fill="#f5f5f5" />
                                <rect x="124.12" y="271.86" width="166.5" height="5.2"
                                    transform="translate(-143.12 -61.63) rotate(-12.75)" fill="#f5f5f5" />
                                <rect x="126.8" y="283.7" width="166.5" height="5.2"
                                    transform="translate(-145.67 -60.75) rotate(-12.75)" fill="#f5f5f5" />
                                <rect x="129.48" y="295.54" width="166.5" height="5.2"
                                    transform="translate(-148.21 -59.87) rotate(-12.75)" fill="#f5f5f5" />
                                <rect x="133.23" y="316.95" width="79.78" height="5.2"
                                    transform="translate(-153.92 -68.08) rotate(-12.75)" fill="#f5f5f5" />
                                <rect x="135.76" y="327.46" width="91.92" height="5.2"
                                    transform="translate(-156.02 -65.92) rotate(-12.75)" fill="#f5f5f5" />
                                <rect x="137.52" y="331.07" width="166.5" height="5.2"
                                    transform="translate(-155.86 -57.21) rotate(-12.75)" fill="#f5f5f5" />
                                <rect x="140.2" y="342.91" width="166.5" height="5.2"
                                    transform="translate(-158.4 -56.33) rotate(-12.75)" fill="#f5f5f5" />
                                <rect x="143.03" y="356.09" width="154.36" height="5.2"
                                    transform="translate(-161.39 -56.72) rotate(-12.75)" fill="#f5f5f5" />
                                <rect x="145.56" y="366.59" width="166.5" height="5.2"
                                    transform="translate(-163.5 -54.56) rotate(-12.75)" fill="#f5f5f5" />
                                <rect x="149.22" y="387.24" width="86.72" height="5.2"
                                    transform="translate(-168.95 -62.05) rotate(-12.75)" fill="#f5f5f5" />
                                <rect x="372.13" y="350.43" width="91.92" height="5.2"
                                    transform="translate(-155.26 -13.18) rotate(-12.75)" fill="#6c63ff" opacity="0.3" />
                                <rect x="373.89" y="354.04" width="166.5" height="5.2"
                                    transform="translate(-155.1 -4.47) rotate(-12.75)" fill="#6c63ff" opacity="0.3" />
                                <rect x="376.57" y="365.88" width="166.5" height="5.2"
                                    transform="translate(-157.64 -3.59) rotate(-12.75)" fill="#6c63ff" opacity="0.3" />
                                <rect x="379.4" y="379.06" width="154.36" height="5.2"
                                    transform="translate(-160.63 -3.98) rotate(-12.75)" fill="#6c63ff" opacity="0.3" />
                                <rect x="381.93" y="389.56" width="166.5" height="5.2"
                                    transform="translate(-162.74 -1.82) rotate(-12.75)" fill="#6c63ff" opacity="0.3" />
                                <rect x="385.59" y="410.21" width="86.72" height="5.2"
                                    transform="translate(-168.19 -9.31) rotate(-12.75)" fill="#6c63ff" opacity="0.3" />
                                <rect x="221.62" y="391.43" width="100.59" height="69.38"
                                    transform="translate(-175 -43.64) rotate(-12.75)" fill="#f5f5f5" />
                                <rect x="337.76" y="165.98" width="100.59" height="69.38"
                                    transform="translate(-122.37 -23.57) rotate(-12.75)" fill="#6c63ff" opacity="0.3" />
                                <rect x="433.79" y="236.72" width="100.59" height="69.38"
                                    transform="translate(-135.62 -0.63) rotate(-12.75)" fill="#6c63ff" opacity="0.3" />
                                <rect x="410.68" y="203.79" width="213.27" height="308.72" rx="13.44"
                                    transform="translate(-153.95 8.85) rotate(-12.75)"
                                    fill="url(#af3e6cbd-120e-45f3-bb1d-3967e91ae903)" />
                                <rect x="412.36" y="207.74" width="207.97" height="302.01" rx="13.44"
                                    transform="translate(-154.1 8.65) rotate(-12.75)" fill="#6c63ff" />
                                <g opacity="0.5">
                                    <rect x="220.35" y="542.11" width="3" height="17" fill="#47e6b1" />
                                    <rect x="308" y="656.29" width="3" height="17"
                                        transform="translate(886.64 241.11) rotate(90)" fill="#47e6b1" />
                                </g>
                                <g opacity="0.5">
                                    <rect x="726.55" y="32.76" width="3" height="17" fill="#47e6b1" />
                                    <rect x="814.2" y="146.94" width="3" height="17"
                                        transform="translate(883.49 -774.44) rotate(90)" fill="#47e6b1" />
                                </g>
                                <g opacity="0.5">
                                    <rect x="636.55" y="249.76" width="3" height="17" fill="#47e6b1" />
                                    <rect x="724.2" y="363.94" width="3" height="17"
                                        transform="translate(1010.49 -467.44) rotate(90)" fill="#47e6b1" />
                                </g>
                                <g opacity="0.5">
                                    <rect x="894.15" y="288.76" width="3" height="17" fill="#47e6b1" />
                                    <rect x="981.8" y="402.94" width="3" height="17"
                                        transform="translate(1307.08 -686.03) rotate(90)" fill="#47e6b1" />
                                </g>
                                <path
                                    d="M482.69,654.59a3.68,3.68,0,0,1-2.05-4.44,1.15,1.15,0,0,0,.08-.41h0a1.84,1.84,0,0,0-3.31-1.22h0a2.53,2.53,0,0,0-.2.36,3.67,3.67,0,0,1-4.44,2,1.86,1.86,0,0,0-.41-.08h0a1.84,1.84,0,0,0-1.22,3.31h0a1.88,1.88,0,0,0,.36.21,3.67,3.67,0,0,1,2.05,4.44,1.89,1.89,0,0,0-.08.4h0a1.84,1.84,0,0,0,3.31,1.23h0a1.9,1.9,0,0,0,.2-.37,3.68,3.68,0,0,1,4.45-2,1.77,1.77,0,0,0,.4.08h0a1.84,1.84,0,0,0,1.22-3.31h0A1.62,1.62,0,0,0,482.69,654.59Z"
                                    transform="translate(-87.65 -114.18)" fill="#4d8af0" opacity="0.5" />
                                <path
                                    d="M628.89,779.24a3.68,3.68,0,0,1-2-4.44,1.86,1.86,0,0,0,.08-.41h0a1.84,1.84,0,0,0-3.31-1.22h0a1.82,1.82,0,0,0-.2.36,3.66,3.66,0,0,1-4.44,2.05,2,2,0,0,0-.41-.08h0a1.84,1.84,0,0,0-1.22,3.31h0a1.62,1.62,0,0,0,.36.21,3.68,3.68,0,0,1,2,4.44,1.86,1.86,0,0,0-.08.41h0a1.84,1.84,0,0,0,3.31,1.22h0a1.65,1.65,0,0,0,.2-.37,3.67,3.67,0,0,1,4.44-2,2,2,0,0,0,.41.08h0a1.84,1.84,0,0,0,1.22-3.31h0A1.62,1.62,0,0,0,628.89,779.24Z"
                                    transform="translate(-87.65 -114.18)" fill="#4d8af0" opacity="0.5" />
                                <path
                                    d="M847.89,348.24a3.68,3.68,0,0,1-2-4.44,1.86,1.86,0,0,0,.08-.41h0a1.84,1.84,0,0,0-3.31-1.22h0a1.82,1.82,0,0,0-.2.36,3.66,3.66,0,0,1-4.44,2.05,2,2,0,0,0-.41-.08h0a1.84,1.84,0,0,0-1.22,3.31h0a1.62,1.62,0,0,0,.36.21,3.68,3.68,0,0,1,2,4.44,1.86,1.86,0,0,0-.08.41h0a1.84,1.84,0,0,0,3.31,1.22h0a1.65,1.65,0,0,0,.2-.37,3.67,3.67,0,0,1,4.44-2,2,2,0,0,0,.41.08h0a1.84,1.84,0,0,0,1.22-3.31h0A1.62,1.62,0,0,0,847.89,348.24Z"
                                    transform="translate(-87.65 -114.18)" fill="#4d8af0" opacity="0.5" />
                                <path
                                    d="M999.89,509.24a3.68,3.68,0,0,1-2-4.44,1.86,1.86,0,0,0,.08-.41h0a1.84,1.84,0,0,0-3.31-1.22h0a1.82,1.82,0,0,0-.2.36,3.66,3.66,0,0,1-4.44,2.05,2,2,0,0,0-.41-.08h0a1.84,1.84,0,0,0-1.22,3.31h0a1.62,1.62,0,0,0,.36.21,3.68,3.68,0,0,1,2,4.44,1.86,1.86,0,0,0-.08.41h0a1.84,1.84,0,0,0,3.31,1.22h0a1.65,1.65,0,0,0,.2-.37,3.67,3.67,0,0,1,4.44-2,2,2,0,0,0,.41.08h0a1.84,1.84,0,0,0,1.22-3.31h0A1.62,1.62,0,0,0,999.89,509.24Z"
                                    transform="translate(-87.65 -114.18)" fill="#4d8af0" opacity="0.5" />
                                <circle cx="142.35" cy="487.11" r="6" fill="#f55f44" opacity="0.5" />
                                <circle cx="523.55" cy="50.76" r="6" fill="#4d8af0" opacity="0.5" />
                                <circle cx="498.55" cy="489.76" r="6" fill="#47e6b1" opacity="0.5" />
                                <circle cx="844.55" cy="639.76" r="6" fill="#f55f44" opacity="0.5" />
                                <g opacity="0.5">
                                    <path
                                        d="M848.9,203.3h286a6.29,6.29,0,0,1,6.29,6.29V362.51a6.29,6.29,0,0,1-6.29,6.29h-286a6.28,6.28,0,0,1-6.28-6.28V209.58A6.29,6.29,0,0,1,848.9,203.3Z"
                                        transform="translate(346.54 1040.57) rotate(-73.39)"
                                        fill="url(#ad46d94a-2a5e-454e-b2ea-f38dffec9c1a)" />
                                </g>
                                <rect x="911.41" y="140.66" width="161.02" height="290.64" rx="13.64"
                                    transform="translate(35.53 -385.86) rotate(16.61)" fill="#fff" />
                                <path
                                    d="M1070.15,165.27a13,13,0,0,1-15.5,7l-53.29-15.91A13.05,13.05,0,0,1,992.2,142L964,133.59a6.13,6.13,0,0,0-7.61,4.11L880.92,390.53a6.11,6.11,0,0,0,4.12,7.6l134.84,40.24a6.11,6.11,0,0,0,7.6-4.11l75.44-252.83a6.1,6.1,0,0,0-4.11-7.6Z"
                                    transform="translate(-87.65 -114.18)" fill="#e0e0e0" />
                                <rect x="1010.74" y="156.59" width="35.88" height="2.24" rx="1.12"
                                    transform="translate(-5.15 -389.83) rotate(15.89)" fill="#dbdbdb" />
                                <circle cx="965.68" cy="50.32" r="1.35" fill="#dbdbdb" />
                                <rect x="953.4" y="188.74" width="44" height="38"
                                    transform="translate(2.54 -365.73) rotate(15.4)" fill="#fff" />
                                <rect x="938.79" y="241.77" width="44" height="38"
                                    transform="translate(16.09 -359.95) rotate(15.4)" fill="#6c63ff" opacity="0.3" />
                                <rect x="924.19" y="294.79" width="44" height="38"
                                    transform="translate(29.65 -354.17) rotate(15.4)" fill="#fff" />
                                <rect x="909.58" y="347.82" width="44" height="38"
                                    transform="translate(43.2 -348.39) rotate(15.4)" fill="#3ad29f" opacity="0.3" />
                                <rect x="1008.3" y="214.49" width="58" height="4"
                                    transform="translate(7.08 -381.86) rotate(15.4)" fill="#fff" />
                                <rect x="1005.11" y="226.06" width="58" height="4"
                                    transform="translate(10.04 -380.6) rotate(15.4)" fill="#fff" />
                                <rect x="993.96" y="266.56" width="58" height="4"
                                    transform="translate(20.39 -376.18) rotate(15.4)" fill="#fff" />
                                <rect x="990.77" y="278.12" width="58" height="4"
                                    transform="translate(23.35 -374.92) rotate(15.4)" fill="#fff" />
                                <rect x="979.62" y="318.62" width="58" height="4"
                                    transform="translate(33.7 -370.5) rotate(15.4)" fill="#fff" />
                                <rect x="976.43" y="330.19" width="58" height="4"
                                    transform="translate(36.66 -369.24) rotate(15.4)" fill="#fff" />
                                <rect x="965.28" y="370.68" width="58" height="4"
                                    transform="translate(47.01 -364.83) rotate(15.4)" fill="#fff" />
                                <rect x="962.09" y="382.25" width="58" height="4"
                                    transform="translate(49.97 -363.56) rotate(15.4)" fill="#fff" />
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center flex-wrap py-25 px-5">
                                <!--begin::Heading-->
                                <h2 class="text-dark font-weight-bolder mr-12">
                                    NANA YAAR
                                </h2>
                                <!--end::Heading-->
                                <div class="input-group shadow-sm">
                                    <!--begin::SVG-->
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-0 py-7 pl-8 pr-4">
                                            <span class="svg-icon svg-icon-xl">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24" />
                                                        <path
                                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path
                                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                    </div>
                                    <!--end::SVG-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Hero-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry--> --}}
        <!--begin::Section-->
        <div class=" container  py-8">
            <div class="row">
                <div class="col-lg-4">
                    <!--begin::Callout-->
                    <div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center p-5">
                                <!--begin::Icon-->
                                <div class="mr-6">
                                    <span class="svg-icon svg-icon-primary svg-icon-4x">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Mirror.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M13,17.0484323 L13,18 L14,18 C15.1045695,18 16,18.8954305 16,20 L8,20 C8,18.8954305 8.8954305,18 10,18 L11,18 L11,17.0482312 C6.89844817,16.5925472 3.58685702,13.3691811 3.07555009,9.22038742 C3.00799634,8.67224972 3.3975866,8.17313318 3.94572429,8.10557943 C4.49386199,8.03802567 4.99297853,8.42761593 5.06053229,8.97575363 C5.4896663,12.4577884 8.46049164,15.1035129 12.0008191,15.1035129 C15.577644,15.1035129 18.5681939,12.4043008 18.9524872,8.87772126 C19.0123158,8.32868667 19.505897,7.93210686 20.0549316,7.99193546 C20.6039661,8.05176407 21.000546,8.54534521 20.9407173,9.09437981 C20.4824216,13.3000638 17.1471597,16.5885839 13,17.0484323 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                                <path
                                                    d="M12,14 C8.6862915,14 6,11.3137085 6,8 C6,4.6862915 8.6862915,2 12,2 C15.3137085,2 18,4.6862915 18,8 C18,11.3137085 15.3137085,14 12,14 Z M8.81595773,7.80077353 C8.79067542,7.43921955 8.47708263,7.16661749 8.11552864,7.19189981 C7.75397465,7.21718213 7.4813726,7.53077492 7.50665492,7.89232891 C7.62279197,9.55316612 8.39667037,10.8635466 9.79502238,11.7671393 C10.099435,11.9638458 10.5056723,11.8765328 10.7023788,11.5721203 C10.8990854,11.2677077 10.8117724,10.8614704 10.5073598,10.6647638 C9.4559885,9.98538454 8.90327706,9.04949813 8.81595773,7.80077353 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Icon-->

                                <!--begin::Content-->
                                <div class="d-flex flex-column">
                                    <a href="#"
                                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                        Clients en attentes
                                    </a>
                                    <div class="text-dark-75">
                                        ( {{ $countNotApprouved }} )
                                    </div>
                                </div>
                                <!--end::Content-->
                            </div>
                        </div>
                    </div>
                    <!--end::Callout-->
                </div>
                <div class="col-lg-4">
                    <!--begin::Callout-->
                    <div class="card card-custom wave wave-animate-slow wave-danger mb-8 mb-lg-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center p-5">
                                <!--begin::Icon-->
                                <div class="mr-6">
                                    <span class="svg-icon svg-icon-danger svg-icon-4x">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Icon-->

                                <!--begin::Content-->
                                <div class="d-flex flex-column">
                                    <a href="#"
                                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                        Clients Rejetés
                                    </a>
                                    <div class="text-dark-75">
                                        000
                                    </div>
                                </div>
                                <!--end::Content-->
                            </div>
                        </div>
                    </div>
                    <!--end::Callout-->
                </div>
                <div class="col-lg-4">
                    <!--begin::Callout-->
                    <div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center p-5">
                                <!--begin::Icon-->
                                <div class="mr-6">
                                    <span class="svg-icon svg-icon-success svg-icon-4x">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Sketch.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <polygon fill="#000000" opacity="0.3" points="5 3 19 3 23 8 1 8" />
                                                <polygon fill="#000000" points="23 8 12 20 1 8" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Icon-->

                                <!--begin::Content-->
                                <div class="d-flex flex-column">
                                    <a href="#"
                                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                        Clients approuvés
                                    </a>
                                    <div class="text-dark-75">
                                        ({{ $countApprouved }})
                                    </div>
                                </div>
                                <!--end::Content-->
                            </div>
                        </div>
                    </div>
                    <!--end::Callout-->
                </div>
            </div>
        </div>
        <!--end::Section-->
    </div>
@endsection
