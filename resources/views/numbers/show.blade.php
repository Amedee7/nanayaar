@extends('layouts.app')
@section('title', 'O2D - Details du numero')
@section('content')
    <div class="page-content">
        <div class="page-header pb-2">
            <h1 class="page-title text-primary-d2 text-150">
                <i class="fa fa-sim-card"></i>
                Détails du numero <h6><a href="{{route('numbers.index')}}"><i class="fa fa-arrow-left"></i> Liste des numéros</a></h6>
            </h1>
        </div>


        <div class="row mt-3">
            <div class="col-12 col-sm-12 cards-container" id="card-container-1">
                <div class="card border-0 shadow-sm radius-0" id="card-1">
                    <div class="card-header border-b-1 brc-grey-l3 pb-2">
                        <h5 class="card-title font-normal text-120 text-dark-m1 pl-1">
                            <strong><i class="fa fa-info-circle"></i> Information du numéro</strong>
                        </h5>
                    </div>

                    <div class="card-body p-3">
                        <!-- to have smooth .card toggling, it should have zero padding -->
                        <div class=" dcard shadow-sm mt-2 brc-h-primary-m1 border-1 pos-rel py-25 px-4">
                            <div class="position-tr">
                                <button class="btn btn-success"><i class="fa fa-check mr-1"></i>Success</button>
                            </div>


                            <div class="pos-rel d-flex align-items-center">
                                <span class="pos-rel">
                                    <i class="fa fa-sim-card fa-9x mr-1 mb-1 text-default"></i>
                                    <span class="badge badge-dot bgc-green-d1 position-tr mt-3px mr-2px"></span>
                                </span>

                                <div class="pl-3 col-md-9">
                                    <h6 class="text-160 mb-1">Numero: <strong>{{$number->msisdn}}</strong> <i class="fa fa-check-circle text-green"></i></h6>
                                    <h6 class="text-77 mb-1"><i class="fa fa-edit"></i>Création le: {{$number->created_at}}   -  <i class="fa fa-mobile"></i>Code :<strong>{{$number->serial}}</strong></h6>
                                    <div class=" row">

                                        <div class=" col-md-3 mt-2 mt-md-0">
                                            <div class="card shadow-sm">
                                                <div class="card-body py-3 px-4">
                                                    <h3 class="text-secondary-d3 text-center mb-4 text-130 pb-1">
                                                        <i class="fa fa-coins text-green"></i> Solde total
                                                    </h3>

                                                    <div class="text-center text-170 mt-4">
                                                        {{number_format($number->amount,0, '.',' ')}}Fcfa
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class=" col-md-3 mt-2 mt-md-0">
                                            <div class="card shadow-sm">
                                                <div class="card-body py-3 px-4">
                                                    <h3 class="text-secondary-d3 mb-4 text-130 pb-1 text-center">
                                                        <i class="fa fa-money-bill text-primary"></i> Solde cash
                                                    </h3>

                                                    <div class="text-center mt-4">
                                                        <div class="text-center text-170 mt-4">
                                                            {{$number->amount}} Fcfa
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class=" col-md-3 mt-2 mt-md-0">
                                            <div class="card shadow-sm">
                                                <div class="card-body py-3 px-4">
                                                    <h3 class="text-secondary-d3 mb-4 text-130 pb-1">
                                                        <i class="fas fa-th-list"></i> Solde crédit
                                                    </h3>

                                                    <div class="text-center mt-4">
                                                        <div class="text-center text-170 mt-4">
                                                            {{$number->amount_credit}} Fcfa
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-3 mt-2 mt-md-0">
                                            <div class="card shadow-sm">
                                                <div class="card-body py-3 px-4">
                                                    <h3 class="text-secondary-d3 mb-4 text-130 pb-1">
                                                        <i class="fas fa-th-list"></i> Total avoirs
                                                    </h3>

                                                    <div class="text-center mt-4">
                                                        <div class="text-center text-170 mt-4">
                                                            {{$number->amount_asset}} Fcfa
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="mt-45 card bcard border-1 brc-secondary-l2">
                            <ul class="nav nav-tabs nav-tabs-simple nav-tabs-scroll border-b-1 brc-dark-l3 mx-0 mx-md-0 px-3 px-md-1 pt-2px" role="tablist">
                                <li class="nav-item mr-1">
                                    <a class="nav-link active p-3 bgc-h-primary-l4 radius-0" id="home16-tab-btn" data-toggle="tab" href="#home16" role="tab" aria-controls="home16" aria-selected="true">
                                        <i class="fa fa-exchange-alt text-success mr-3px"></i>
                                        Opérations du numero
                                    </a>
                                </li>

                                <li class="nav-item mr-1">
                                    <a class="nav-link brc-purple-m1 d-style p-3 bgc-h-purple-l4 radius-0" id="profile16-tab-btn" data-toggle="tab" href="#profile16" role="tab" aria-controls="profile16" aria-selected="false">
                                        <i class="fa fa-user text-purple mr-3px"></i>
                                        <span class="d-n-active">
                                            Profile
                                        </span>
                                        <span class="d-active text-purple-d1">
                                            Profile
                                        </span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link p-3 bgc-h-primary-l4 radius-0" id="more16-tab-btn" data-toggle="tab" href="#more16" role="tab" aria-controls="more16" aria-selected="false">
                                        <i class="fa fa-plus text-blue mr-3px"></i>
                                        More
                                    </a>
                                </li>
                            </ul>

                            <div class="card-body px-0 py-2">
                                <div class="tab-content tab-sliding border-0 px-0">
                                    <div class="tab-pane show active text-95 px-25" id="home16" role="tabpanel" aria-labelledby="home16-tab-btn">

                                    </div>

                                    <div class="tab-pane text-95 px-25" id="profile16" role="tabpanel" aria-labelledby="profile16-tab-btn">
                                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.
                                    </div>

                                    <div class="tab-pane text-95 px-25" id="more16" role="tabpanel" aria-labelledby="more16-tab-btn">
                                        Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica.
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.card -->

                    </div><!-- /.card-body -->
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
    <script src="{{asset('assets/script.js')}}"></script>
    <script>
        $('#o2d-datatable').DataTable({
            "buttons": ["csv", "excel", "pdf", "print"],
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'responsive': true,
            'serverSide': false,

            language: {
                processing: "Traitement en cours...",
                search: "Recherche &nbsp; :",
                lengthMenu:     "Afficher _MENU_ &eacute;l&eacute;ments",
                info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                loadingRecords: "Chargement en cours...",
                zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable:     "Aucune donnée disponible dans le tableau",
                paginate: {
                    first: "<<",
                    previous: "Précédent",
                    next: "Suivant",
                    last: ">>"
                },
                aria: {
                    sortAscending:  ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            },
        });
    </script>
@endsection
