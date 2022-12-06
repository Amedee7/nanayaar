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
