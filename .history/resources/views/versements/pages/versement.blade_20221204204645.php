@extends('layouts.app')
@section('title', 'Administration - Liste des clients')
@section('content')

        <div class="container col-md-12">
            <div class="card card-custom">
                <!--begin::Container-->
                <div class=" container ">
                    <!--begin::Page Layout-->
                    <div class="d-flex flex-row">
                        
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
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Layout-->
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
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero est maxime omnis eveniet blanditiis corrupti, nulla laborum assumenda earum asperiores quam. Pariatur illum, praesentium cum iusto rerum facilis ex ipsam!</p>
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
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body pt-2">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum eius tempora veniam placeat veritatis officiis odio. Assumenda quod culpa dicta natus, impedit fugit adipisci. Voluptas aspernatur rem repudiandae quae id.</p>
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
