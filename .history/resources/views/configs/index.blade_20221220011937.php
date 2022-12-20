@extends('layouts.app')
@section('title', 'Configurations')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div id="kt_header" style="" class="header align-items-stretch">
            <div class="header-brand">
                <a href="{{route('home')}}">
                    <h3 style="color: white;" class="text-center">NANA YAAR</h3>
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
                    <!--end::Svg Icon-->
                </div>
                <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                    <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black"></path>
                                <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
                <!--end::Aside toggle-->
            </div>
            <!--end::Brand-->
            <div class="toolbar">
                <!--begin::Toolbar-->
                <div class="container-fluid py-6 py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column me-5">
                        <!--begin::Title-->
                        <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="black"></path>
                                    <path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="black"></path>
                                </svg>
                                Configurations
                            </span>
                        </h1>
                    </div>
                    <div class="d-flex align-items-center overflow-auto pt-3 pt-lg-0">
                        <div class="d-flex align-items-center">
                            <span class="fs-7 text-gray-700 fw-bolder pe-3 d-none d-xxl-block">{{Auth::user()->name}} {{Auth::user()->lastname}}</span>
                            <div class="d-flex">
                                <a class="btn btn-sm btn-icon btn-icon-muted btn-active-icon-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black"></path>
                                            <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Main content -->
        <div class="d-flex flex-column-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Configurations</span>
                                </h3>
                            </div>
                            <div class="collapse show">
                                <form action="{{route('configs.update', $config->id)}}" method="post" id="o2d-edit-form">
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body border-top p-9">
                                        <div class="row mb-6">
                                            <div class="col-lg-12">
                                                <div class="image-input image-input-outline" data-kt-image-input="true" >
                                                    <div class="image-input-wrapper w-125px h-125px" style=""></div>
                                                    <label class="col-form-label fw-bold fs-6">Logo</label>
                                                    <label class="btn btn-icon btn-square btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Changer le logo">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                                        <input type="hidden" name="avatar_remove" value="0">
                                                    </label>
                                                    <span class="btn btn-icon btn-square btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Annuler">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                </div>
                                                <div class="form-text">Type de fichier: png, jpg, jpeg.</div>
                                            </div>
                                        </div>

                                        <div class="row mb-6">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <label class=" col-form-label required fw-bold fs-6">Nom de l'entreprise</label>
                                                        <input type="text" name="entreprise" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{$config->entreprise_name}}">
                                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    </div>
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <label class=" col-form-label required fw-bold fs-6">Numero de téléphone</label>
                                                        <input type="text" name="telephone" class="form-control form-control-lg form-control-solid" placeholder="Last name" value="{{$config->telephone}}">
                                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-6">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <label class=" col-form-label required fw-bold fs-6">Adresse email</label>
                                                        <input type="email" name="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{$config->email}}">
                                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    </div>
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <label class=" col-form-label required fw-bold fs-6">Adresse</label>
                                                        <textarea name="adresse" class="form-control form-control-lg form-control-solid">{{$config->adress}}</textarea>
                                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>

                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button onclick="updateRecordRefresh()" id="sender" class="btn btn-primary font-weight-bold">
                                        <strong>
                                            <b id="text-load" class="visually-hidden">Veuillez patienter... <div class="spinner-border" role="status"></div></b>
                                            <b id="text-fix">Enregistrer</b>
                                        </strong>
                                    </button>
                                </div>
                            </div>
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
    <script src="{{asset('js/script.js')}}"></script>
@endsection
