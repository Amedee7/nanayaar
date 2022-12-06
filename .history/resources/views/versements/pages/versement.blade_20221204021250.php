@extends('layouts.app')
@section('title', 'Administration - Liste des clients')
@section('content')

    <div class="d-flex flex-column-fluid">
        <div class="container col-md-12">
            <div class="card card-custom">
                <!--begin::Container-->
                <div class=" container ">
                    <!--begin::Page Layout-->
                    <div class="d-flex flex-row">
                        <!--begin::Aside-->
                        <div class="flex-column offcanvas-mobile w-300px w-xl-325px" id="kt_profile_aside">
                            <!--begin::Forms Widget 13-->
                            <div class="card card-custom gutter-b">
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column mb-3">
                                        <span class="card-label font-size-h3 font-weight-bolder text-dark">Add New
                                            Product</span>
                                        <span class="text-muted mt-5 font-weight-bolder font-size-lg">Pending Image</span>
                                    </h3>
                                </div>
                                <!--begin::Body-->
                                <div class="card-body pt-4">
                                    <!--begin::Form-->
                                    <form>
                                        <!--begin::Product images-->
                                        <div class="d-flex mb-8 justify-content-between">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-70 flex-shrink-0 mr-4 bg-light">
                                                <div class="symbol-label"
                                                    style="background-image: url('assets/media/products/11.png')"></div>
                                            </div>
                                            <!--end::Symbol-->

                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-70 flex-shrink-0 mr-4">
                                                <div class="symbol-label"
                                                    style="background-image: url('assets/media/products/12.png')"></div>
                                            </div>
                                            <!--end::Symbol-->

                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-70 flex-shrink-0">
                                                <a href="#"
                                                    class="h-70px w-70px btn btn-light-primary d-flex flex-column flex-center font-weight-bolder p-0">
                                                    <span class="svg-icon svg-icon-lg m-0">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Image.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <path
                                                                    d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z"
                                                                    fill="#000000" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span> Upload
                                                </a>
                                            </div>
                                            <!--end::Symbol-->
                                        </div>
                                        <!--end::Product images-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Forms Widget 13-->
                            <!--begin::List Widget 21-->
                            <div class="card card-custom gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column mb-5">
                                        <span class="card-label font-weight-bolder text-dark mb-1">Recent Products</span>
                                        <span class="text-muted mt-2 font-weight-bold font-size-sm">New Arrivals</span>
                                    </h3>
                                    <div class="card-toolbar">
                                        <div class="dropdown dropdown-inline">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="ki ki-bold-more-hor"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                                <!--begin::Navigation-->
                                                <ul class="navi navi-hover">
                                                    <li class="navi-header font-weight-bold py-4">
                                                        <span class="font-size-lg">Choose Label:</span>
                                                        <i class="flaticon2-information icon-md text-muted"
                                                            data-toggle="tooltip" data-placement="right"
                                                            title="Click to learn more..."></i>
                                                    </li>
                                                    <li class="navi-separator mb-3 opacity-70"></li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-text">
                                                                <span
                                                                    class="label label-xl label-inline label-light-success">Customer</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-text">
                                                                <span
                                                                    class="label label-xl label-inline label-light-danger">Partner</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-text">
                                                                <span
                                                                    class="label label-xl label-inline label-light-warning">Suplier</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-text">
                                                                <span
                                                                    class="label label-xl label-inline label-light-primary">Member</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-text">
                                                                <span
                                                                    class="label label-xl label-inline label-light-dark">Staff</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-separator mt-3 opacity-70"></li>
                                                    <li class="navi-footer py-4">
                                                        <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                                            <i class="ki ki-plus icon-sm"></i>
                                                            Add new
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!--end::Navigation-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body pt-2">
                                    <!--begin::Item-->
                                    <div class="d-flex mb-8">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
                                            <div class="d-flex flex-column">
                                                <div class="symbol-label mb-3"
                                                    style="background-image: url('assets/media/stock-600x400/img-23.jpg')">
                                                </div>
                                                <a href="#"
                                                    class="btn btn-light-primary font-weight-bolder py-2 font-size-sm">Edit</a>
                                            </div>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Title-->
                                        <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                            <a href="#"
                                                class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-2">
                                                Darius the Great
                                            </a>
                                            <span class="text-muted font-weight-bold font-size-sm mb-3">
                                                All it takes tank credibility is one glaring error
                                            </span>
                                            <span class="text-muted font-weight-bold font-size-lg">
                                                Price: <span class="text-dark-75 font-weight-bolder">99.00$</span>
                                            </span>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
                                            <div class="d-flex flex-column">
                                                <div class="symbol-label mb-3"
                                                    style="background-image: url('assets/media/stock-600x400/img-25.jpg')">
                                                </div>
                                                <a href="#"
                                                    class="btn btn-light-primary font-weight-bolder py-2 font-size-sm">Edit</a>
                                            </div>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Title-->
                                        <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                            <a href="#"
                                                class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-2">
                                                Nike Airmax
                                            </a>
                                            <span class="text-muted font-weight-bold font-size-sm mb-3">
                                                All it takes tank credibility is one glaring error
                                            </span>
                                            <span class="text-muted font-weight-bold font-size-lg">
                                                Price: <span class="text-dark-75 font-weight-bolder">99.00$</span>
                                            </span>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 21-->
                        </div>
                        <!--end::Aside-->

                        <!--begin::Layout-->
                        <div class="flex-row-fluid ml-lg-8">
                            <!--begin::Card-->
                            <div class="card card-custom card-stretch gutter-b">
                                <div class="card-body">

                                    <!--begin::Engage Widget 15-->
                                    <div class="card card-custom mb-12">
                                        <div class="card-body rounded p-0 d-flex " style="background-color:#DAF0FD;">
                                            <div
                                                class="d-flex flex-column flex-lg-row-auto w-auto w-lg-350px w-xl-450px w-xxl-500px p-10 p-md-20">
                                                <h1 class="font-weight-bolder text-dark ">Search Goods</h1>
                                                <div class="font-size-h4 mb-8">Get Amazing Gadgets</div>
                                                <!--begin::Form-->
                                                <form class="d-flex flex-center py-2 px-6 bg-white rounded">
                                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
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
                                                    </span> <input type="text"
                                                        class="form-control border-0 font-weight-bold pl-2"
                                                        placeholder="Search Goods" />
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                            <div class="d-none d-md-flex flex-row-fluid bgi-no-repeat bgi-position-y-center bgi-position-x-left bgi-size-cover"
                                                style="background-image: url(assets/media/svg/illustrations/progress.svg);">
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Engage Widget 15-->
                                    <!--begin::Section-->
                                    <div class="mb-11">
                                        <!--begin::Heading-->
                                        <div class="d-flex justify-content-between align-items-center mb-7">
                                            <h2 class="font-weight-bolder text-dark font-size-h3 mb-0">Smart Devices</h2>
                                            <a href="#" class="btn btn-light-primary btn-sm font-weight-bolder">View
                                                All</a>
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Products-->
                                        <div class="row">
                                            <!--begin::Product-->
                                            <div class="col-md-4 col-xxl-4 col-lg-12">
                                                <!--begin::Card-->
                                                <div class="card card-custom card-shadowless">
                                                    <div class="card-body p-0">
                                                        <!--begin::Image-->
                                                        <div class="overlay">
                                                            <div class="overlay-wrapper rounded bg-light text-center">
                                                                <img src="assets/media/products/1.png" alt=""
                                                                    class="mw-100 w-200px" />
                                                            </div>
                                                            <div class="overlay-layer">
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-primary mr-2">Quick
                                                                    View</a>
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-light-primary">Purchase</a>
                                                            </div>
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Details-->
                                                        <div
                                                            class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                                            <a href="#"
                                                                class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1">Smart
                                                                Watches</a>
                                                            <span class="font-size-lg">Outlines keep poorly thought</span>
                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end::Product-->

                                            <!--begin::Product-->
                                            <div class="col-md-4 col-lg-12 col-xxl-4">
                                                <!--begin::Card-->
                                                <div class="card card-custom card-shadowless">
                                                    <div class="card-body p-0">
                                                        <!--begin::Image-->
                                                        <div class="overlay">
                                                            <div class="overlay-wrapper rounded bg-light text-center">
                                                                <img src="assets/media/products/2.png" alt=""
                                                                    class="mw-100 w-200px" />
                                                            </div>
                                                            <div class="overlay-layer">
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-primary mr-2">Quick
                                                                    View</a>
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-light-primary">Purchase</a>
                                                            </div>
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Details-->
                                                        <div
                                                            class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                                            <a href="#"
                                                                class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1">Headphones</a>
                                                            <span class="font-size-lg">Outlines keep poorly thought</span>
                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end::Product-->

                                            <!--begin::Product-->
                                            <div class="col-md-4 col-lg-12 col-xxl-4">
                                                <!--begin::Card-->
                                                <div class="card card-custom card-shadowless">
                                                    <div class="card-body p-0">
                                                        <!--begin::Image-->
                                                        <div class="overlay">
                                                            <div class="overlay-wrapper rounded bg-light text-center">
                                                                <img src="assets/media/products/3.png" alt=""
                                                                    class="mw-100 w-200px" />
                                                            </div>
                                                            <div class="overlay-layer">
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-primary mr-2">Quick
                                                                    View</a>
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-light-primary">Purchase</a>
                                                            </div>
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Details-->
                                                        <div
                                                            class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                                            <a href="#"
                                                                class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1">Smart
                                                                Drones</a>
                                                            <span class="font-size-lg">Outlines keep poorly thought</span>
                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end::Product-->
                                        </div>
                                        <!--end::Products-->
                                    </div>
                                    <!--end::Section-->

                                    <!--begin::Section-->
                                    <div class="mb-11">
                                        <!--begin::Heading-->
                                        <div class="d-flex justify-content-between align-items-center mb-7">
                                            <h2 class="font-weight-bolder text-dark font-size-h3 mb-0">Best Wines</h2>
                                            <a href="#" class="btn btn-light-primary btn-sm font-weight-bolder">View
                                                All</a>
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Products-->
                                        <div class="row">
                                            <!--begin::Product-->
                                            <div class="col-md-4 col-xxl-4 col-lg-12">
                                                <!--begin::Card-->
                                                <div class="card card-custom card-shadowless">
                                                    <div class="card-body p-0">
                                                        <!--begin::Image-->
                                                        <div class="overlay">
                                                            <div class="overlay-wrapper rounded bg-light text-center">
                                                                <img src="assets/media/products/4.png" alt=""
                                                                    class="mw-100 w-200px" />
                                                            </div>
                                                            <div class="overlay-layer">
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-primary mr-2">Quick
                                                                    View</a>
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-light-primary">Purchase</a>
                                                            </div>
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Details-->
                                                        <div
                                                            class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                                            <a href="#"
                                                                class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1">Jerry
                                                                Kane</a>
                                                            <span class="font-size-lg">Outlines keep poorly thought</span>
                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end::Product-->

                                            <!--begin::Product-->
                                            <div class="col-md-4 col-lg-12 col-xxl-4">
                                                <!--begin::Card-->
                                                <div class="card card-custom card-shadowless">
                                                    <div class="card-body p-0">
                                                        <!--begin::Image-->
                                                        <div class="overlay">
                                                            <div class="overlay-wrapper rounded bg-light text-center">
                                                                <img src="assets/media/products/5.png" alt=""
                                                                    class="mw-100 w-200px" />
                                                            </div>
                                                            <div class="overlay-layer">
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-primary mr-2">Quick
                                                                    View</a>
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-light-primary">Purchase</a>
                                                            </div>
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Details-->
                                                        <div
                                                            class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                                            <a href="#"
                                                                class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1">Shiraz</a>
                                                            <span class="font-size-lg">Outlines keep poorly thought</span>
                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end::Product-->

                                            <!--begin::Product-->
                                            <div class="col-md-4 col-lg-12 col-xxl-4">
                                                <!--begin::Card-->
                                                <div class="card card-custom card-shadowless">
                                                    <div class="card-body p-0">
                                                        <!--begin::Image-->
                                                        <div class="overlay">
                                                            <div class="overlay-wrapper rounded bg-light text-center">
                                                                <img src="assets/media/products/6.png" alt=""
                                                                    class="mw-100 w-200px" />
                                                            </div>
                                                            <div class="overlay-layer">
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-primary mr-2">Quick
                                                                    View</a>
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-light-primary">Purchase</a>
                                                            </div>
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Details-->
                                                        <div
                                                            class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                                            <a href="#"
                                                                class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1">Chardonnay</a>
                                                            <span class="font-size-lg">Outlines keep poorly thought</span>
                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end::Product-->
                                        </div>
                                        <!--end::Products-->
                                    </div>
                                    <!--end::Section-->

                                    <!--begin::Section-->
                                    <div>
                                        <!--begin::Heading-->
                                        <div class="d-flex justify-content-between align-items-center mb-7">
                                            <h2 class="font-weight-bolder text-dark font-size-h3 mb-0">Popular Jackets</h2>
                                            <a href="#" class="btn btn-light-primary btn-sm font-weight-bolder">View
                                                All</a>
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Products-->
                                        <div class="row">
                                            <!--begin::Product-->
                                            <div class="col-md-4 col-xxl-4 col-lg-12">
                                                <!--begin::Card-->
                                                <div class="card card-custom card-shadowless">
                                                    <div class="card-body p-0">
                                                        <!--begin::Image-->
                                                        <div class="overlay">
                                                            <div class="overlay-wrapper rounded bg-light text-center">
                                                                <img src="assets/media/products/7.png" alt=""
                                                                    class="mw-100 w-200px" />
                                                            </div>
                                                            <div class="overlay-layer">
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-primary mr-2">Tommy
                                                                    Hilfiger</a>
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-light-primary">Purchase</a>
                                                            </div>
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Details-->
                                                        <div
                                                            class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                                            <a href="#"
                                                                class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1">Smart
                                                                Watches</a>
                                                            <span class="font-size-lg">Outlines keep poorly thought</span>
                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end::Product-->

                                            <!--begin::Product-->
                                            <div class="col-md-4 col-lg-12 col-xxl-4">
                                                <!--begin::Card-->
                                                <div class="card card-custom card-shadowless">
                                                    <div class="card-body p-0">
                                                        <!--begin::Image-->
                                                        <div class="overlay">
                                                            <div class="overlay-wrapper rounded bg-light text-center">
                                                                <img src="assets/media/products/8.png" alt=""
                                                                    class="mw-100 w-200px" />
                                                            </div>
                                                            <div class="overlay-layer">
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-primary mr-2">Quick
                                                                    View</a>
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-light-primary">Purchase</a>
                                                            </div>
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Details-->
                                                        <div
                                                            class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                                            <a href="#"
                                                                class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1">Hugo
                                                                Boss</a>
                                                            <span class="font-size-lg">Outlines keep poorly thought</span>
                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end::Product-->

                                            <!--begin::Product-->
                                            <div class="col-md-4 col-lg-12 col-xxl-4">
                                                <!--begin::Card-->
                                                <div class="card card-custom card-shadowless">
                                                    <div class="card-body p-0">
                                                        <!--begin::Image-->
                                                        <div class="overlay">
                                                            <div class="overlay-wrapper rounded bg-light text-center">
                                                                <img src="assets/media/products/9.png" alt=""
                                                                    class="mw-100 w-200px" />
                                                            </div>
                                                            <div class="overlay-layer">
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-primary mr-2">Quick
                                                                    View</a>
                                                                <a href="#"
                                                                    class="btn font-weight-bolder btn-sm btn-light-primary">Purchase</a>
                                                            </div>
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Details-->
                                                        <div
                                                            class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                                            <a href="#"
                                                                class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1">Armani</a>
                                                            <span class="font-size-lg">Outlines keep poorly thought</span>
                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end::Product-->
                                        </div>
                                        <!--end::Products-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Layout-->
                    </div>
                    <!--end::Page Layout-->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div id="o2d-modal-container"></div>
<form>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
</form>

@endsection
@section('js')
<script src="{{ asset('assets/script.js') }}"></script>
<script type="text/javascript">
    
    
</script>
@endsection
