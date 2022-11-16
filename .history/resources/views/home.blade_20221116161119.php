@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row example-preview" id="student_block">
            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                                <span class="fas fa-user-clock icon-lg primary-color"></span>
                                Clients en attentes ( {{ $countNotApprouved }} )
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                                <span class="fas fa-user-check icon-lg primary-color"></span>
                                Clients approuvés ({{ $countApprouved }})
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                                <span class="flaticon-responsive icon-lg primary-color"></span>
                                Contacts
                            </h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>


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
                                    {{-- <span class="fas fa-user-check icon-lg primary-color"> --}}
                                    <span class="svg-icon svg-icon-primary svg-icon-4x">
                                        
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
