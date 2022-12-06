<div class="modal fade" id="modal" data-backdrop="static" data-backdrop-bg="bgc-grey-tp4" data-blur="true" style="display: none;" n="truearia-hidde">
    <div class="modal-dialog modal-dialog-centered" style="width: 1000px" role="document">
        <div class="modal-content border-0 shadow radius-1">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Détails du versement
                    <span class="badge badge-light-success">{{$versement->identifier}}</span> |
                    Etat: <span class="badge badge-light-{{$versement->state=="En cours"?"warning":"success"}}">{{$versement->state}}</span>
                </h5>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body modal-scroll">
                <div class="mt-n1">
                    <div class="m-0">
                        <div class="fw-bolder fs-3 text-gray-800 mb-8">Commande <span class="text-success">{{$versement->identifier}}</span> </div>
                        <div class="row g-5 mb-11">
                            <div class="col-sm-6">
                                <div class="fw-bold fs-7 text-gray-600 mb-1">Date de création :</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="fw-bold fs-7 text-gray-600 mb-1">Client concerné:</div>
                                <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                                    <span class="pe-2">{{$client->name}}</span>
                                    <span class="fs-7 text-primary d-flex align-items-center">
                                        <span class="bullet bullet-dot bg-primary me-2"></span>{{$client->first_phone}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row g-5 mb-12">
                            <div class="col-sm-6">
                                <div class="fw-bold fs-7 text-gray-600 mb-1">Effectué par:</div>
                                <div class="fw-bolder fs-6 text-gray-800">{{$user->firstname}} {{$user->lastname}}</div>
                                <div class="fw-bold fs-7 text-gray-600">Téléphone: {{$user->telephone}}</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="fw-bold fs-7 text-gray-600 mb-1">Statut:</div>
                                <div class="fw-bolder fs-6 text-gray-800">
                                    @if($versement->status=="Payé")
                                    <span class="badge badge-light-success">{{$versement->status}}</span>
                                    @elseif($versement->status=="Paiement partiel")
                                    <span class="badge badge-light-warning">{{$versement->status}}</span>
                                    @elseif($versement->status=="Non payé")
                                    <span class="badge badge-light-danger">{{$versement->status}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            {{-- <div class="table-responsive border-bottom mb-9">
                                <table class="table mb-3">
                                    <thead>
                                    <tr class="border-bottom fs-6 fw-bolder text-muted">
                                        <th class="min-w-175px pb-2">PRODUIT</th>
                                        <th class="min-w-70px text-end pb-2">CAISSE</th>
                                        <th class="min-w-80px text-end pb-2">P.U</th>
                                        <th class="min-w-100px text-end pb-2">P.T</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($listProducts as $item)
                                        <tr class="fw-bolder text-gray-700 fs-5">
                                            <td class="d-flex pt-6">{{$item->name}}-{{$item->bottles}}T-{{$item->volume}}CL</td>
                                            <td class="pt-6 text-end">{{$item->objects}}</td>
                                            <td class="pt-6 text-end">{{$item->price}}</td>
                                            <td class="pt-6 text-end text-dark fw-boldest">{{number_format($item->amount_total_product,0, '.',' ')}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div> --}}
                            <div class="d-flex justify-content-end">
                                <div class="mw-300px">
                                    <div class="d-flex flex-stack mb-3">
                                        <div class="fw-bold pe-10 text-gray-600 fs-7">NOMBRE DE PRODUIT:</div>
                                    </div>
                                    <div class="d-flex flex-stack mb-3">
                                        <div class="fw-bold pe-10 text-gray-600 fs-7">SOMME TOTALE:</div>
                                        <div class="text-end fw-bolder fs-6 text-gray-800"><span class="badge badge-light-success">{{number_format($versement->monant_octroye,0, '.',' ')}}</span></div>
                                    </div>
                                    <div class="d-flex flex-stack mb-3">
                                        <div class="fw-bold pe-10 text-gray-600 fs-7">SOMME PAYEE:</div>
                                        <div class="text-end fw-bolder fs-6 text-gray-800"><span class="badge badge-light-warning">{{number_format($versement->somme_verse,0, '.',' ')}}</span></div>
                                    </div>
                                    <div class="d-flex flex-stack">
                                        <div class="fw-bold pe-10 text-gray-600 fs-7">RESTE A PAYER:</div>
                                        <div class="text-end fw-bolder fs-6 text-gray-800"><span class="badge badge-light-danger">{{number_format($versement->rest_apaye,0, '.',' ')}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            dropdownParent: $("#modal"),
            placeholder: "Select",
            allowClear: true
        });

    });

</script>

