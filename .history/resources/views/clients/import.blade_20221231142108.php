@extends('layouts.app')
@section('title', 'Administration - Liste des clients')
@section('content')
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
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
                            </span> Gererateur de 
                        </button>
                        <!--begin::Dropdown Menu-->
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <!--begin::Navigation-->
                            <ul class="navi flex-column navi-hover py-2">
                                <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                    Choisissez une option:
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                        <button type="submit" class="btn btn-secondary btn-sm" name="exportPDF"><i
                                                class="far fa-file-pdf"></i>Rapport du jour</button>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                        <button type="submit" class="btn btn-secondary btn-sm" name="exportPDF2"><i
                                                class="far fa-file-pdf"></i>Clients en attente</button>
                                    </a>
                                </li>
                            </ul>
                            <!--end::Navigation-->
                        </div>
                        <!--end::Dropdown Menu-->

                    </div>
                    <!--end::Dropdown-->
                </div>
            </div>
        </form>
        <br>
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
        </table>
    </div>

    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">Recherche</h5>
        <form class="card-body" action="/search" method="GET" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Rechercher..." name="q">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/script.js') }}"></script>
    <script></script>
@endsection
