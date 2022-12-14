@extends('layouts.app')

@section('content')
    <div class="container">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">

                <!--begin::accordions-->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-8">
                            <div class="card-body">
                                <div class="p-6">
                                    <h2 class="text-dark mb-8">User Roles</h2>
                                    <!--begin::Accordion-->
                                    <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                        id="accordionExample3">
                                        <!--begin::Item-->
                                        <div class="card">
                                            <!--begin::Header-->
                                            <div class="card-header" id="headingOne3">
                                                <div class="card-title" data-toggle="collapse"
                                                    data-target="#collapseOne3" aria-expanded="true"
                                                    aria-controls="collapseOne3" role="button">
                                                    <span class="svg-icon svg-icon-primary">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <path
                                                                    d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                                                    fill="#000000" fill-rule="nonzero" />
                                                                <path
                                                                    d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                                    transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <div class="card-label text-dark pl-4">How do I create new members?
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Header-->

                                            <!--begin::Body-->
                                            <div id="collapseOne3" class="collapse show" aria-labelledby="headingOne3"
                                                data-parent="#accordionExample3">
                                                <div class="card-body text-dark-50 font-size-lg pl-12">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                                    helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                                                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                                                    beer farm-to-table, raw denim aesthetic synth nesciunt you probably
                                                    haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Item-->

                                        <!--begin::Item-->
                                        <div class="card">
                                            <!--begin::Header-->
                                            <div class="card-header" id="headingTwo3">
                                                <div class="card-title collapsed" data-toggle="collapse"
                                                    data-target="#collapseTwo3" aria-expanded="false"
                                                    aria-controls="collapseTwo3" role="button">
                                                    <span class="svg-icon svg-icon-primary">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <path
                                                                    d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                                                    fill="#000000" fill-rule="nonzero" />
                                                                <path
                                                                    d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                                    transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <div class="card-label text-dark pl-4">What happens when I delete an
                                                        admin?</div>
                                                </div>
                                            </div>
                                            <!--end::Header-->

                                            <!--begin::Body-->
                                            <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo3"
                                                data-parent="#accordionExample3">
                                                <div class="card-body text-dark-50 font-size-lg pl-12">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                                    helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                                                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                                                    beer farm-to-table, raw denim aesthetic synth nesciunt you probably
                                                    haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Item-->

                                        <!--begin::Item-->
                                        <div class="card">
                                            <!--begin::Header-->
                                            <div class="card-header" id="headingThree3">
                                                <div class="card-title collapsed" data-toggle="collapse"
                                                    data-target="#collapseThree3" aria-expanded="false"
                                                    aria-controls="collapseThree3" role="button">
                                                    <span class="svg-icon svg-icon-primary">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <path
                                                                    d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                                                    fill="#000000" fill-rule="nonzero" />
                                                                <path
                                                                    d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                                    transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <div class="card-label text-dark pl-4">Are there any analytics for
                                                        users?</div>
                                                </div>
                                            </div>
                                            <!--end::Header-->

                                            <!--begin::Body-->
                                            <div id="collapseThree3" class="collapse" aria-labelledby="headingThree3"
                                                data-parent="#accordionExample3">
                                                <div class="card-body text-dark-50 font-size-lg pl-12">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                                    helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                                                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                                                    beer farm-to-table, raw denim aesthetic synth nesciunt you probably
                                                    haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Accordion-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-8">
                            <div class="card-body">
                                <div class="p-6">
                                    <h2 class="text-dark mb-8">Reports Generation</h2>
                                    <!--begin::Accordion-->
                                    <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                        id="accordionExample4">
                                        <!--begin::Item-->
                                        <div class="card">
                                            <!--begin::Header-->
                                            <div class="card-header" id="headingOne4">
                                                <div class="card-title" data-toggle="collapse"
                                                    data-target="#collapseOne4" aria-expanded="true"
                                                    aria-controls="collapseOne4" role="button">
                                                    <span class="svg-icon svg-icon-primary">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <path
                                                                    d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                                                    fill="#000000" fill-rule="nonzero" />
                                                                <path
                                                                    d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                                    transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <div class="card-label text-dark pl-4">How do I customize a report?
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Header-->

                                            <!--begin::Body-->
                                            <div id="collapseOne4" class="collapse show" aria-labelledby="headingOne4"
                                                data-parent="#accordionExample4">
                                                <div class="card-body text-dark-50 font-size-lg pl-12">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                                    helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                                                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                                                    beer farm-to-table, raw denim aesthetic synth nesciunt you probably
                                                    haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Item-->

                                        <!--begin::Item-->
                                        <div class="card">
                                            <!--begin::Header-->
                                            <div class="card-header" id="headingTwo4">
                                                <div class="card-title collapsed" data-toggle="collapse"
                                                    data-target="#collapseTwo4" aria-expanded="false"
                                                    aria-controls="collapseTwo4" role="button">
                                                    <span class="svg-icon svg-icon-primary">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <path
                                                                    d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                                                    fill="#000000" fill-rule="nonzero" />
                                                                <path
                                                                    d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                                    transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <div class="card-label text-dark pl-4">Is the data real-time?</div>
                                                </div>
                                            </div>
                                            <!--end::Header-->

                                            <!--begin::Body-->
                                            <div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo4"
                                                data-parent="#accordionExample4">
                                                <div class="card-body text-dark-50 font-size-lg pl-12">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                                    helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                                                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                                                    beer farm-to-table, raw denim aesthetic synth nesciunt you probably
                                                    haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Item-->

                                        <!--begin::Item-->
                                        <div class="card">
                                            <!--begin::Header-->
                                            <div class="card-header" id="headingThree4">
                                                <div class="card-title collapsed" data-toggle="collapse"
                                                    data-target="#collapseThree4" aria-expanded="false"
                                                    aria-controls="collapseThree4" role="button">
                                                    <span class="svg-icon svg-icon-primary">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <path
                                                                    d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                                                    fill="#000000" fill-rule="nonzero" />
                                                                <path
                                                                    d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                                    transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <div class="card-label text-dark pl-4">Can the report export to CSV?
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Header-->

                                            <!--begin::Body-->
                                            <div id="collapseThree4" class="collapse" aria-labelledby="headingThree4"
                                                data-parent="#accordionExample4">
                                                <div class="card-body text-dark-50 font-size-lg pl-12">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                                    helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                                                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                                                    beer farm-to-table, raw denim aesthetic synth nesciunt you probably
                                                    haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Accordion-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::accordions-->
                <!--begin::Section-->
                <div class="row">
                    <div class="col-lg-6">
                        <!--begin::Card-->
                        <div class="card card-custom p-6 mb-8 mb-lg-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <!--begin::Content-->
                                        <h2 class="text-dark mb-4">Get in Touch</h2>
                                        <p class="text-dark-50 font-size-lg">
                                            Windows 10 automatically installs updates to make for sure
                                        </p>
                                        <!--end::Content-->
                                    </div>
                                    <div class="col-sm-5 d-flex align-items-center justify-content-sm-end">
                                        <!--begin::Button-->
                                        <a href="custom/apps/support-center/feedback.html"
                                            class="btn font-weight-bolder text-uppercase font-size-lg btn-primary py-3 px-6">Submit
                                            a Request</a>
                                        <!--end::Button-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                    <div class="col-lg-6">
                        <!--begin::Card-->
                        <div class="card card-custom p-6">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <!--begin::Content-->
                                        <h2 class="text-dark mb-4">Live Chat</h2>
                                        <p class="text-dark-50 font-size-lg">
                                            Windows 10 automatically installs updates to make for sure
                                        </p>
                                        <!--end::Content-->
                                    </div>
                                    <div class="col-sm-5 d-flex align-items-center justify-content-sm-end">
                                        <!--begin::Button-->
                                        <a href="#" data-toggle="modal" data-target="#kt_chat_modal"
                                            class="btn font-weight-bolder text-uppercase font-size-lg btn-success py-3 px-6">Start
                                            Chat</a>
                                        <!--end::Button-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
                <!--end::Section-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
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
                                        Clients Rejet??s
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
                                        Clients approuv??s
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
