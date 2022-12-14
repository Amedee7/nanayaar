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
