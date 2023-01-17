@extends('layouts.app')

@section('content')
    <div class="container">

       
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-4">
                <!--begin::Mixed Widget 1-->
                <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 bg-danger py-5">
                        <h3 class="card-title font-weight-bolder text-white">Etat des clients <br> inscrits et prets</h3>
                        {{-- <div class="card-toolbar">
                            <div class="dropdown dropdown-inline">
                                <a href="#"
                                    class="btn btn-transparent-white btn-sm font-weight-bolder dropdown-toggle px-5"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Export
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <!--begin::Navigation-->
                                    <ul class="navi navi-hover">
                                        <li class="navi-header pb-1">
                                            <span class="text-primary text-uppercase font-weight-bold font-size-sm">Add
                                                new:</span>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon"><i class="flaticon2-shopping-cart-1"></i></span>
                                                <span class="navi-text">Order</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body p-0 position-relative overflow-hidden">
                        <!--begin::Chart-->
                        <div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 200px"></div>
                        <!--end::Chart-->

                        <!--begin::Stats-->
                        <div class="card-spacer mt-n25">
                            <!--begin::Row-->
                            <div class="row m-0">
                                <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" opacity="0.3" x="13" y="4"
                                                    width="3" height="16" rx="1.5" />
                                                <rect fill="#000000" x="8" y="9" width="3"
                                                    height="11" rx="1.5" />
                                                <rect fill="#000000" x="18" y="11" width="3"
                                                    height="9" rx="1.5" />
                                                <rect fill="#000000" x="3" y="13" width="3"
                                                    height="7" rx="1.5" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-white font-weight-bold">CLIENTS A 2 Jrs AVANT Plté
                                    </div>
                                    <a href="#" class="text-warning font-weight-bold font-size-h2">
                                        {{ $clientEnRetard }}
                                    </a>
                                </div>
                                <div class="col bg-light-danger px-6 py-8 rounded-xl mb-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" opacity="0.3" x="13" y="4"
                                                    width="3" height="16" rx="1.5" />
                                                <rect fill="#000000" x="8" y="9" width="3"
                                                    height="11" rx="1.5" />
                                                <rect fill="#000000" x="18" y="11" width="3"
                                                    height="9" rx="1.5" />
                                                <rect fill="#000000" x="3" y="13" width="3"
                                                    height="7" rx="1.5" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-white font-weight-bold">CLIENTS EN PENALITE
                                    </div>
                                    <a href="#" class="text-danger font-weight-bold font-size-h2 mt-2">
                                        {{ $versementEnd }}
                                    </a>
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row m-0">
                                <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" opacity="0.3" x="13" y="4"
                                                    width="3" height="16" rx="1.5" />
                                                <rect fill="#000000" x="8" y="9" width="3"
                                                    height="11" rx="1.5" />
                                                <rect fill="#000000" x="18" y="11" width="3"
                                                    height="9" rx="1.5" />
                                                <rect fill="#000000" x="3" y="13" width="3"
                                                    height="7" rx="1.5" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-white font-weight-bold">
                                        SOMME OCTROYEE DU JOUR
                                    </div>
                                    <a href="#"
                                        class="text-danger font-weight-bold font-weight-bolder font-size-h2 mt-2">
                                        {{ number_format($versementDuJour, 0, '.', ' ') }}
                                        <em class="font-size-h6">Fcfa</em>
                                    </a>
                                </div>
                                <div class="col bg-light-success px-6 py-8 rounded-xl">
                                    <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Urgent-mail.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z"
                                                    fill="#000000" opacity="0.3" />
                                                <path
                                                    d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-white font-weight-bold">
                                        COMMISSION VERSE DU JOUR
                                    </div>
                                    <a href="#"
                                        class="text-danger font-weight-bold font-weight-bolder font-size-h2 mt-2">
                                        {{ number_format($commissionDuJour, 0, '.', ' ') }}
                                        <em class="font-size-h6">Fcfa</em>
                                    </a>
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row m-0 mt-7">
                                <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" opacity="0.3" x="13" y="4"
                                                    width="3" height="16" rx="1.5" />
                                                <rect fill="#000000" x="8" y="9" width="3"
                                                    height="11" rx="1.5" />
                                                <rect fill="#000000" x="18" y="11" width="3"
                                                    height="9" rx="1.5" />
                                                <rect fill="#000000" x="3" y="13" width="3"
                                                    height="7" rx="1.5" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-white font-weight-bold">PENALITE ENCAISE EN CE JOUR
                                    </div>
                                    <a href="#" class="text-warning font-weight-bold font-size-h2">
                                        {{-- {{ $penaliteDuJour }} --}}
                                        000000
                                    </a>
                                </div>
                                <div class="col bg-light-danger px-6 py-8 rounded-xl mb-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" opacity="0.3" x="13" y="4"
                                                    width="3" height="16" rx="1.5" />
                                                <rect fill="#000000" x="8" y="9" width="3"
                                                    height="11" rx="1.5" />
                                                <rect fill="#000000" x="18" y="11" width="3"
                                                    height="9" rx="1.5" />
                                                <rect fill="#000000" x="3" y="13" width="3"
                                                    height="7" rx="1.5" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-white font-weight-bold">CLIENTS EN PENALITE
                                    </div>
                                    <a href="#" class="text-danger font-weight-bold font-size-h2 mt-2">
                                        {{-- {{ $versementEnd }} --}}
                                        000000
                                    </a>
                                </div>
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Stats-->

                    </div>
                    <!--end::Body-->
                    
                </div>
                <!--end::Mixed Widget 1-->
            </div>
            <div class="col-xl-5">
                <div class="row">
                    <div class="col-xl-6">
                        <!--begin::Tiles Widget 2-->
                        <div class="card card-custom bg-white gutter-b" style="height: 130px">
                            <!--begin::Body-->
                            <div class="card-body d-flex flex-column p-0">
                                <!--begin::Stats-->
                                <div class="flex-grow-1 card-spacer-x pt-6">
                                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
                                        <span class="svg-icon svg-icon-primary svg-icon-3x">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
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
                                        </span><span class="pulse-ring"></span>
                                    </div>
                                    <div class="text-inverse-white font-weight-bold">CLIENTS
                                    </div>
                                    <div class="text-inverse-white font-weight-bolder font-size-h1 text-primary">
                                        {{ $clientAccepté }} </div>
                                </div>
                                <!--end::Stats-->

                                <!--begin::Chart-->
                                <div id="kt_tiles_widget_2_chart" class="card-rounded-bottom" style="height: 50px">
                                </div>
                                <!--end::Chart-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Tiles Widget 2-->
                    </div>
                    <div class="col-xl-6">
                        <!--begin::Tiles Widget 5-->
                        <div class="card card-custom bg-white gutter-b" style="height: 130px">
                            <!--begin::Body-->
                            <div class="card-body d-flex flex-column p-0">
                                <!--begin::Stats-->
                                <div class="flex-grow-1 card-spacer-x pt-6">
                                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-success">
                                        <span class="svg-icon svg-icon-success svg-icon-3x">
                                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Half-star.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
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
                                        </span><span class="pulse-ring"></span>
                                    </div>
                                    <div class="text-inverse-white font-weight-bold">COMMISSIONS RECU</div>
                                    <div class="text-inverse-white">
                                        <span
                                            class="text-inverse-white font-weight-bolder font-size-h1 text-success">{{ number_format($totalCommissions, 0, '.', ' ') }}</span>
                                        <em class="font-size-h6">Fcfa</em>
                                    </div>
                                </div>
                                <!--end::Stats-->

                                <!--begin::Chart-->
                                <div id="kt_tiles_widget_5_chart" class="card-rounded-bottom" style="height: 50px"></div>
                                <!--end::Chart-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Tiles Widget 5-->
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <!--begin::Tiles Widget 5-->
                <div class="card card-custom bg-white gutter-b" style="height: 130px">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column p-0">
                        <!--begin::Stats-->
                        <div class="flex-grow-1 card-spacer-x pt-6">
                            <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-info">
                                <span class="svg-icon svg-icon-info svg-icon-3x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Money.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z"
                                                fill="#000000" opacity="0.3"
                                                transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) " />
                                            <path
                                                d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span><span class="pulse-ring"></span>
                            </div>
                            <div class="text-inverse-white font-weight-bold">SOMME OCTROYE</div>
                            <div class="text-inverse-white">
                                <span
                                    class="text-inverse-white font-weight-bolder font-size-h1 text-info">{{ number_format($totalMontantOctroyé, 0, '.', ' ') }}</span>
                                <em class="font-size-h6">Fcfa</em>
                            </div>
                        </div>
                        <!--end::Stats-->

                        <!--begin::Chart-->
                        <div id="kt_tiles_widget_5_chart" class="card-rounded-bottom" style="height: 50px"></div>
                        <!--end::Chart-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Tiles Widget 5-->
            </div>

            
        </div>
        <!--end::Row-->
    </div>
@endsection
