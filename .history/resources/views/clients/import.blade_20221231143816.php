@extends('layouts.app')
@section('title', 'Administration - Liste des clients')
@section('content')

    <div class="d-flex flex-column-fluid">
        <div class="container col-md-12">
            <div class="card card-custom">

                <!--begin::Card header-->
                <div class="card card-custom card-stretch gutter-b">
                    <div class="d-flex align-items-center mb-9 bg-light-warning rounded p-5">
                        <!--begin::Icon-->
                        <span class="svg-icon svg-icon-warning mr-5">
                            <span class="svg-icon svg-icon-lg">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                            fill="#000000" />
                                        <rect fill="#000000" opacity="0.3"
                                            transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) "
                                            x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span> </span>
                        <!--end::Icon-->

                        <!--begin::Title-->
                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <h2 class="mb-1">Gererateur de rapport</h2>
                            <div class="text-muted fw-bolder">
                                Effectu??e par: <a href="#">{{ Auth::user()->lastname }}
                                    {{ Auth::user()->firstname }}</a>
                            </div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
                <!--end::Card header-->
                <div class="container">
                    <br>
                    <form action="{{ route('clients.ViewPages') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <label for="from" class="col-form-label">De</label>
                                <div class="col-md-2">
                                    <input type="date" class="form-control input-sm" id="from" name="from">
                                </div>
                                <label for="from" class="col-form-label">A</label>
                                <div class="col-md-2">
                                    <input type="date" class="form-control input-sm" id="to" name="to">
                                </div>

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-sm" name="search">Rechercher</button>
                                    {{-- <button type="submit" class="btn btn-success btn-sm" name="exportExcel">export Excel</button> --}}
                                </div>
                            </div>
                            <!--begin::Dropdown-->
                            <div class="dropdown dropdown-inline mr-2">
                                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="svg-icon svg-icon-md">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                    fill="#000000" opacity="0.3" />
                                                <path
                                                    d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span> Gererateur de rapport
                                </button>
                                <!--begin::Dropdown Menu-->
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <!--begin::Navigation-->
                                    <ul class="navi flex-column navi-hover py-2">
                                        <li
                                            class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                            Choisissez une option:
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <button type="submit" class="btn btn-secondary btn-sm"
                                                    name="exportPDF"><i class="far fa-file-pdf"></i>Rapport du
                                                    jour</button>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <button type="submit" class="btn btn-secondary btn-sm"
                                                    name="exportPDF2"><i class="far fa-file-pdf"></i>Clients en
                                                    attente</button>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                                <!--end::Dropdown Menu-->

                            </div>
                            <!--end::Dropdown-->
                        </div>
                    </form>
                    {{-- <br>
                    <table class="table table-dark">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>N client</th>
                            <th>Agent Comm</th>
                            <th>created_at</th>
                            <th>created_at</th>
                        </tr>
                        @foreach ($ViewsPage as $ViewsPages)
                            <tr>
                                <td>{{ $ViewsPages->id }}</td>
                                <td>{{ $ViewsPages->name }}</td>
                                <td>{{ $ViewsPages->numb_cli }}</td>
                                <td>{{ $ViewsPages->user->firstname }} {{ $ViewsPages->user->lastname }}</td>
                                <td>{{ $ViewsPages->created_at }}</td>
                                <td>{{ $ViewsPages->created_at }}</td>
                            </tr>
                        @endforeach
                    </table> --}}
                </div>
                 <!--begin::Card-->
            <div class="card card-custom card-shadowless rounded-top-0">
                <!--begin::Body-->
                <div class="card-body p-0">
                    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                        <div class="col-xl-12 col-xxl-10">
                            <!--begin::Wizard Form-->
                            <form class="form" id="kt_form">
                                <div class="row justify-content-center">
                                    <div class="col-xl-9">
                                        <!--begin::Wizard Step 1-->
                                        <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                            <h5 class="text-dark font-weight-bold mb-10">User's Profile Details:</h5>
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label text-left">Avatar</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="image-input image-input-outline" id="kt_user_add_avatar">
        						                        <div class="image-input-wrapper" style="background-image: url(assets/media/users/100_6.jpg)"></div>

        												<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
        						                            <i class="fa fa-pen icon-sm text-muted"></i>
        						                            <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg"/>
        													<input type="hidden" name="profile_avatar_remove"/>
        						                        </label>

        												<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
        						                            <i class="ki ki-bold-close icon-xs text-muted"></i>
        						                        </span>
        						                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input class="form-control form-control-solid form-control-lg" name="firstname" type="text" value=""/>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input class="form-control form-control-solid form-control-lg" name="lastname" type="text" value=""/>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Company Name</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input class="form-control form-control-solid form-control-lg" name="companyname" type="text" value="Loop Inc."/>
                                                    <span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group input-group-solid input-group-lg">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" name="phone" value="5678967456" placeholder="Phone" />
                                                    </div>
                                                    <span class="form-text text-muted">Enter valid US phone number(e.g: 5678967456).</span>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group input-group-solid input-group-lg">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" name="email" value=""/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Company Site</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group input-group-solid input-group-lg">
                                                        <input type="text" class="form-control form-control-solid form-control-lg" name="companywebsite" placeholder="Username" value="loop"/>
                                                        <div class="input-group-append"><span class="input-group-text">.com</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                        </div>
                                        <!--end::Wizard Step 1-->

                                        <!--begin::Wizard Step 2-->
                                        <div class="my-5 step" data-wizard-type="step-content">
                                            <h5 class="text-dark font-weight-bold mb-10 mt-5">User's Account Details</h5>
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-xl-3 col-lg-3">Language</label>
                                                <div class="col-xl-9 col-lg-9">
                                                    <select class="form-control form-control-lg form-control-solid" name="language">
                                                        <option value="">Select Language...</option>
                                                        <option value="id">Bahasa Indonesia - Indonesian</option>
                                                        <option value="msa">Bahasa Melayu - Malay</option>
                                                        <option value="ca">Catal?? - Catalan</option>
                                                        <option value="cs">??e??tina - Czech</option>
                                                        <option value="da">Dansk - Danish</option>
                                                        <option value="de">Deutsch - German</option>
                                                        <option value="en" selected="">English</option>
                                                        <option value="en-gb">English UK - British English</option>
                                                        <option value="es">Espa??ol - Spanish</option>
                                                        <option value="eu">Euskara - Basque (beta)</option>
                                                        <option value="fil">Filipino</option>
                                                        <option value="fr">Fran??ais - French</option>
                                                        <option value="ga">Gaeilge - Irish (beta)</option>
                                                        <option value="gl">Galego - Galician (beta)</option>
                                                        <option value="hr">Hrvatski - Croatian</option>
                                                        <option value="it">Italiano - Italian</option>
                                                        <option value="hu">Magyar - Hungarian</option>
                                                        <option value="nl">Nederlands - Dutch</option>
                                                        <option value="no">Norsk - Norwegian</option>
                                                        <option value="pl">Polski - Polish</option>
                                                        <option value="pt">Portugu??s - Portuguese</option>
                                                        <option value="ro">Rom??n?? - Romanian</option>
                                                        <option value="sk">Sloven??ina - Slovak</option>
                                                        <option value="fi">Suomi - Finnish</option>
                                                        <option value="sv">Svenska - Swedish</option>
                                                        <option value="vi">Ti???ng Vi???t - Vietnamese</option>
                                                        <option value="tr">T??rk??e - Turkish</option>
                                                        <option value="el">???????????????? - Greek</option>
                                                        <option value="bg">?????????????????? ???????? - Bulgarian</option>
                                                        <option value="ru">?????????????? - Russian</option>
                                                        <option value="sr">???????????? - Serbian</option>
                                                        <option value="uk">???????????????????? ???????? - Ukrainian</option>
                                                        <option value="he">???????????????? - Hebrew</option>
                                                        <option value="ur">???????? - Urdu (beta)</option>
                                                        <option value="ar">?????????????? - Arabic</option>
                                                        <option value="fa">?????????? - Persian</option>
                                                        <option value="mr">??????????????? - Marathi</option>
                                                        <option value="hi">?????????????????? - Hindi</option>
                                                        <option value="bn">??????????????? - Bangla</option>
                                                        <option value="gu">????????????????????? - Gujarati</option>
                                                        <option value="ta">??????????????? - Tamil</option>
                                                        <option value="kn">??????????????? - Kannada</option>
                                                        <option value="th">????????????????????? - Thai</option>
                                                        <option value="ko">????????? - Korean</option>
                                                        <option value="ja">????????? - Japanese</option>
                                                        <option value="zh-cn">???????????? - Simplified Chinese</option>
                                                        <option value="zh-tw">???????????? - Traditional Chinese</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-xl-3 col-lg-3">Time Zone</label>
                                                <div class="col-xl-9 col-lg-9">
                                                    <select class="form-control form-control-lg form-control-solid" name="timezone">
                                                        <option data-offset="-39600" value="International Date Line West">(GMT-11:00) International Date Line West</option>
                                                        <option data-offset="-39600" value="Midway Island">(GMT-11:00) Midway Island</option>
                                                        <option data-offset="-39600" value="Samoa">(GMT-11:00) Samoa</option>
                                                        <option data-offset="-36000" value="Hawaii">(GMT-10:00) Hawaii</option>
                                                        <option data-offset="-28800" value="Alaska">(GMT-08:00) Alaska</option>
                                                        <option data-offset="-25200" value="Pacific Time (US &amp; Canada)">(GMT-07:00) Pacific Time (US &amp; Canada)</option>
                                                        <option data-offset="-25200" value="Tijuana">(GMT-07:00) Tijuana</option>
                                                        <option data-offset="-25200" value="Arizona">(GMT-07:00) Arizona</option>
                                                        <option data-offset="-21600" value="Mountain Time (US &amp; Canada)">(GMT-06:00) Mountain Time (US &amp; Canada)</option>
                                                        <option data-offset="-21600" value="Chihuahua">(GMT-06:00) Chihuahua</option>
                                                        <option data-offset="-21600" value="Mazatlan">(GMT-06:00) Mazatlan</option>
                                                        <option data-offset="-21600" value="Saskatchewan">(GMT-06:00) Saskatchewan</option>
                                                        <option data-offset="-21600" value="Central America">(GMT-06:00) Central America</option>
                                                        <option data-offset="-18000" value="Central Time (US &amp; Canada)">(GMT-05:00) Central Time (US &amp; Canada)</option>
                                                        <option data-offset="-18000" value="Guadalajara">(GMT-05:00) Guadalajara</option>
                                                        <option data-offset="-18000" value="Mexico City">(GMT-05:00) Mexico City</option>
                                                        <option data-offset="-18000" value="Monterrey">(GMT-05:00) Monterrey</option>
                                                        <option data-offset="-18000" value="Bogota">(GMT-05:00) Bogota</option>
                                                        <option data-offset="-18000" value="Lima">(GMT-05:00) Lima</option>
                                                        <option data-offset="-18000" value="Quito">(GMT-05:00) Quito</option>
                                                        <option data-offset="-14400" value="Eastern Time (US &amp; Canada)">(GMT-04:00) Eastern Time (US &amp; Canada)</option>
                                                        <option data-offset="-14400" value="Indiana (East)">(GMT-04:00) Indiana (East)</option>
                                                        <option data-offset="-14400" value="Caracas">(GMT-04:00) Caracas</option>
                                                        <option data-offset="-14400" value="La Paz">(GMT-04:00) La Paz</option>
                                                        <option data-offset="-14400" value="Georgetown">(GMT-04:00) Georgetown</option>
                                                        <option data-offset="-10800" value="Atlantic Time (Canada)">(GMT-03:00) Atlantic Time (Canada)</option>
                                                        <option data-offset="-10800" value="Santiago">(GMT-03:00) Santiago</option>
                                                        <option data-offset="-10800" value="Brasilia">(GMT-03:00) Brasilia</option>
                                                        <option data-offset="-10800" value="Buenos Aires">(GMT-03:00) Buenos Aires</option>
                                                        <option data-offset="-9000" value="Newfoundland">(GMT-02:30) Newfoundland</option>
                                                        <option data-offset="-7200" value="Greenland">(GMT-02:00) Greenland</option>
                                                        <option data-offset="-7200" value="Mid-Atlantic">(GMT-02:00) Mid-Atlantic</option>
                                                        <option data-offset="-3600" value="Cape Verde Is.">(GMT-01:00) Cape Verde Is.</option>
                                                        <option data-offset="0" value="Azores">(GMT) Azores</option>
                                                        <option data-offset="0" value="Monrovia">(GMT) Monrovia</option>
                                                        <option data-offset="0" value="UTC">(GMT) UTC</option>
                                                        <option data-offset="3600" value="Dublin">(GMT+01:00) Dublin</option>
                                                        <option data-offset="3600" value="Edinburgh">(GMT+01:00) Edinburgh</option>
                                                        <option data-offset="3600" value="Lisbon">(GMT+01:00) Lisbon</option>
                                                        <option data-offset="3600" value="London">(GMT+01:00) London</option>
                                                        <option data-offset="3600" value="Casablanca">(GMT+01:00) Casablanca</option>
                                                        <option data-offset="3600" value="West Central Africa">(GMT+01:00) West Central Africa</option>
                                                        <option data-offset="7200" value="Belgrade">(GMT+02:00) Belgrade</option>
                                                        <option data-offset="7200" value="Bratislava">(GMT+02:00) Bratislava</option>
                                                        <option data-offset="7200" value="Budapest">(GMT+02:00) Budapest</option>
                                                        <option data-offset="7200" value="Ljubljana">(GMT+02:00) Ljubljana</option>
                                                        <option data-offset="7200" value="Prague">(GMT+02:00) Prague</option>
                                                        <option data-offset="7200" value="Sarajevo">(GMT+02:00) Sarajevo</option>
                                                        <option data-offset="7200" value="Skopje">(GMT+02:00) Skopje</option>
                                                        <option data-offset="7200" value="Warsaw">(GMT+02:00) Warsaw</option>
                                                        <option data-offset="7200" value="Zagreb">(GMT+02:00) Zagreb</option>
                                                        <option data-offset="7200" value="Brussels">(GMT+02:00) Brussels</option>
                                                        <option data-offset="7200" value="Copenhagen">(GMT+02:00) Copenhagen</option>
                                                        <option data-offset="7200" value="Madrid">(GMT+02:00) Madrid</option>
                                                        <option data-offset="7200" value="Paris">(GMT+02:00) Paris</option>
                                                        <option data-offset="7200" value="Amsterdam">(GMT+02:00) Amsterdam</option>
                                                        <option data-offset="7200" value="Berlin">(GMT+02:00) Berlin</option>
                                                        <option data-offset="7200" value="Bern">(GMT+02:00) Bern</option>
                                                        <option data-offset="7200" value="Rome">(GMT+02:00) Rome</option>
                                                        <option data-offset="7200" value="Stockholm">(GMT+02:00) Stockholm</option>
                                                        <option data-offset="7200" value="Vienna">(GMT+02:00) Vienna</option>
                                                        <option data-offset="7200" value="Cairo">(GMT+02:00) Cairo</option>
                                                        <option data-offset="7200" value="Harare">(GMT+02:00) Harare</option>
                                                        <option data-offset="7200" value="Pretoria">(GMT+02:00) Pretoria</option>
                                                        <option data-offset="10800" value="Bucharest">(GMT+03:00) Bucharest</option>
                                                        <option data-offset="10800" value="Helsinki">(GMT+03:00) Helsinki</option>
                                                        <option data-offset="10800" value="Kiev">(GMT+03:00) Kiev</option>
                                                        <option data-offset="10800" value="Kyiv">(GMT+03:00) Kyiv</option>
                                                        <option data-offset="10800" value="Riga">(GMT+03:00) Riga</option>
                                                        <option data-offset="10800" value="Sofia">(GMT+03:00) Sofia</option>
                                                        <option data-offset="10800" value="Tallinn">(GMT+03:00) Tallinn</option>
                                                        <option data-offset="10800" value="Vilnius">(GMT+03:00) Vilnius</option>
                                                        <option data-offset="10800" value="Athens">(GMT+03:00) Athens</option>
                                                        <option data-offset="10800" value="Istanbul">(GMT+03:00) Istanbul</option>
                                                        <option data-offset="10800" value="Minsk">(GMT+03:00) Minsk</option>
                                                        <option data-offset="10800" value="Jerusalem">(GMT+03:00) Jerusalem</option>
                                                        <option data-offset="10800" value="Moscow">(GMT+03:00) Moscow</option>
                                                        <option data-offset="10800" value="St. Petersburg">(GMT+03:00) St. Petersburg</option>
                                                        <option data-offset="10800" value="Volgograd">(GMT+03:00) Volgograd</option>
                                                        <option data-offset="10800" value="Kuwait">(GMT+03:00) Kuwait</option>
                                                        <option data-offset="10800" value="Riyadh">(GMT+03:00) Riyadh</option>
                                                        <option data-offset="10800" value="Nairobi">(GMT+03:00) Nairobi</option>
                                                        <option data-offset="10800" value="Baghdad">(GMT+03:00) Baghdad</option>
                                                        <option data-offset="14400" value="Abu Dhabi">(GMT+04:00) Abu Dhabi</option>
                                                        <option data-offset="14400" value="Muscat">(GMT+04:00) Muscat</option>
                                                        <option data-offset="14400" value="Baku">(GMT+04:00) Baku</option>
                                                        <option data-offset="14400" value="Tbilisi">(GMT+04:00) Tbilisi</option>
                                                        <option data-offset="14400" value="Yerevan">(GMT+04:00) Yerevan</option>
                                                        <option data-offset="16200" value="Tehran">(GMT+04:30) Tehran</option>
                                                        <option data-offset="16200" value="Kabul">(GMT+04:30) Kabul</option>
                                                        <option data-offset="18000" value="Ekaterinburg">(GMT+05:00) Ekaterinburg</option>
                                                        <option data-offset="18000" value="Islamabad">(GMT+05:00) Islamabad</option>
                                                        <option data-offset="18000" value="Karachi">(GMT+05:00) Karachi</option>
                                                        <option data-offset="18000" value="Tashkent">(GMT+05:00) Tashkent</option>
                                                        <option data-offset="19800" value="Chennai">(GMT+05:30) Chennai</option>
                                                        <option data-offset="19800" value="Kolkata">(GMT+05:30) Kolkata</option>
                                                        <option data-offset="19800" value="Mumbai">(GMT+05:30) Mumbai</option>
                                                        <option data-offset="19800" value="New Delhi">(GMT+05:30) New Delhi</option>
                                                        <option data-offset="19800" value="Sri Jayawardenepura">(GMT+05:30) Sri Jayawardenepura</option>
                                                        <option data-offset="20700" value="Kathmandu">(GMT+05:45) Kathmandu</option>
                                                        <option data-offset="21600" value="Astana">(GMT+06:00) Astana</option>
                                                        <option data-offset="21600" value="Dhaka">(GMT+06:00) Dhaka</option>
                                                        <option data-offset="21600" value="Almaty">(GMT+06:00) Almaty</option>
                                                        <option data-offset="21600" value="Urumqi">(GMT+06:00) Urumqi</option>
                                                        <option data-offset="23400" value="Rangoon">(GMT+06:30) Rangoon</option>
                                                        <option data-offset="25200" value="Novosibirsk">(GMT+07:00) Novosibirsk</option>
                                                        <option data-offset="25200" value="Bangkok">(GMT+07:00) Bangkok</option>
                                                        <option data-offset="25200" value="Hanoi">(GMT+07:00) Hanoi</option>
                                                        <option data-offset="25200" value="Jakarta">(GMT+07:00) Jakarta</option>
                                                        <option data-offset="25200" value="Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                                                        <option data-offset="28800" value="Beijing">(GMT+08:00) Beijing</option>
                                                        <option data-offset="28800" value="Chongqing">(GMT+08:00) Chongqing</option>
                                                        <option data-offset="28800" value="Hong Kong">(GMT+08:00) Hong Kong</option>
                                                        <option data-offset="28800" value="Kuala Lumpur">(GMT+08:00) Kuala Lumpur</option>
                                                        <option data-offset="28800" value="Singapore">(GMT+08:00) Singapore</option>
                                                        <option data-offset="28800" value="Taipei">(GMT+08:00) Taipei</option>
                                                        <option data-offset="28800" value="Perth">(GMT+08:00) Perth</option>
                                                        <option data-offset="28800" value="Irkutsk">(GMT+08:00) Irkutsk</option>
                                                        <option data-offset="28800" value="Ulaan Bataar">(GMT+08:00) Ulaan Bataar</option>
                                                        <option data-offset="32400" value="Seoul">(GMT+09:00) Seoul</option>
                                                        <option data-offset="32400" value="Osaka">(GMT+09:00) Osaka</option>
                                                        <option data-offset="32400" value="Sapporo">(GMT+09:00) Sapporo</option>
                                                        <option data-offset="32400" value="Tokyo">(GMT+09:00) Tokyo</option>
                                                        <option data-offset="32400" value="Yakutsk">(GMT+09:00) Yakutsk</option>
                                                        <option data-offset="34200" value="Darwin">(GMT+09:30) Darwin</option>
                                                        <option data-offset="34200" value="Adelaide">(GMT+09:30) Adelaide</option>
                                                        <option data-offset="36000" value="Canberra">(GMT+10:00) Canberra</option>
                                                        <option data-offset="36000" value="Melbourne">(GMT+10:00) Melbourne</option>
                                                        <option data-offset="36000" value="Sydney">(GMT+10:00) Sydney</option>
                                                        <option data-offset="36000" value="Brisbane">(GMT+10:00) Brisbane</option>
                                                        <option data-offset="36000" value="Hobart">(GMT+10:00) Hobart</option>
                                                        <option data-offset="36000" value="Vladivostok">(GMT+10:00) Vladivostok</option>
                                                        <option data-offset="36000" value="Guam">(GMT+10:00) Guam</option>
                                                        <option data-offset="36000" value="Port Moresby">(GMT+10:00) Port Moresby</option>
                                                        <option data-offset="36000" value="Solomon Is.">(GMT+10:00) Solomon Is.</option>
                                                        <option data-offset="39600" value="Magadan">(GMT+11:00) Magadan</option>
                                                        <option data-offset="39600" value="New Caledonia">(GMT+11:00) New Caledonia</option>
                                                        <option data-offset="43200" value="Fiji">(GMT+12:00) Fiji</option>
                                                        <option data-offset="43200" value="Kamchatka">(GMT+12:00) Kamchatka</option>
                                                        <option data-offset="43200" value="Marshall Is.">(GMT+12:00) Marshall Is.</option>
                                                        <option data-offset="43200" value="Auckland">(GMT+12:00) Auckland</option>
                                                        <option data-offset="43200" value="Wellington">(GMT+12:00) Wellington</option>
                                                        <option data-offset="46800" value="Nuku'alofa">(GMT+13:00) Nuku'alofa</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-xl-3 col-lg-3">Communication</label>
                                                <div class="col-xl-9 col-lg-9 col-form-label">
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox">
                                                            <input name="communication" type="checkbox" />
                                                            <span></span>
                                                            Email
                                                        </label>
                                                        <label class="checkbox">
                                                            <input name="communication" type="checkbox" />
                                                            <span></span>
                                                            SMS
                                                        </label>
                                                        <label class="checkbox">
                                                            <input name="communication" type="checkbox"/>
                                                            <span></span>
                                                            Phone
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->

                                            <div class="separator separator-dashed my-10"></div>

                                            <h5 class="text-dark font-weight-bold mb-10">User's Account Settings</h5>

                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-xl-3 col-lg-3">Login verification</label>
                                                <div class="col-xl-9 col-lg-9">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold btn-sm">Setup login verification</button>
                                                    <div class="form-text text-muted mt-3">
                                                        After you log in, you will be asked for additional information to confirm your identity and protect your account from being compromised.
                                                        <a href="#">Learn more</a>.
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-xl-3 col-lg-3">Password reset verification</label>
                                                <div class="col-xl-9 col-lg-9">
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox mb-2">
                                                            <input type="checkbox"/>
                                                            <span></span>
                                                            Require personal information to reset your password.
                                                        </label>
                                                    </div>
                                                    <div class="form-text text-muted">
                                                        For extra security, this requires you to confirm your email or phone number when you reset your password.
                                                        <a href="#" class="font-weight-bold">Learn more</a>.
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row mt-10">
                                                <label class="col-xl-3 col-lg-3"></label>
                                                <div class="col-xl-9 col-lg-9">
                                                    <button type="button" class="btn btn-light-danger font-weight-bold btn-sm">Deactivate your account ?</button>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                        </div>
                                        <!--end::Wizard Step 2-->
                                      

                                    </div>
                                </div>
                            </form>
                            <!--end::Wizard Form-->
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/script.js') }}"></script>
    <script></script>
@endsection
