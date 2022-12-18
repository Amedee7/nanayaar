<div class="modal fade" id="modal" data-bs-backdrop='static' tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 650px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Détails du Versement
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
            <div class="modal-body">
                <div class="mt-n1">
                    <div class="m-0">
                        <div class="fw-bolder fs-3 text-gray-800 mb-8">Versement <span class="text-success">{{$versement->identifier}}</span> </div>
                        <div class="row g-5 mb-11">
                            <div class="col-sm-6">
                                <div class="fw-bold fs-7 text-gray-600 mb-1">Date de création :</div>
                                <div class="fw-bolder fs-6 text-gray-800">{{\Illuminate\Support\Carbon::make($versement->created_at)->format('d/m/Y à H:i:s') }}</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="fw-bold fs-7 text-gray-600 mb-1">Client concerné:</div>
                                <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                                    <span class="pe-2">{{$client->name}} >{{$client->lastname}}</span>
                                    <span class="fs-7 text-primary d-flex align-items-center">
                                        <span class="bullet bullet-dot bg-primary me-2"></span>{{$client->first_phone}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row g-5 mb-12">
                            <div class="d-flex flex-wrap flex-center">
                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                    <div class="fs-4 fw-bolder text-gray-700">
                                        <span class="w-75px text-success">{{number_format($versement->amount_total,0, '.',' ')}}</span> Fcfa
                                        <span class="svg-icon svg-icon-3 svg-icon-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black"></rect>
                                                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="fw-bold text-muted">SOMME TOTALE</div>
                                </div>

                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                    <div class="fs-4 fw-bolder text-gray-700">
                                        <span class="w-50px text-warning">{{number_format($versement->somme_verse,0, '.',' ')}}</span> Fcfa
                                        <span class="svg-icon svg-icon-3 svg-icon-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="black"></rect>
                                                <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="black"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="fw-bold text-muted">SOMME PAYEE</div>
                                </div>

                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                    <div class="fs-4 fw-bolder text-gray-700">
                                        <span class="w-50px text-danger">{{number_format($versement->reste_apaye,0, '.',' ')}}</span> Fcfa
                                        <span class="svg-icon svg-icon-3 svg-icon-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black"></rect>
                                                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="fw-bold text-muted">SOMME RESTANTE</div>
                                </div>
                            </div>
                        </div>
                        <form action="{{route('versements.rule.store', $versement->id)}}" method="post" id="o2d-edit-form-datatable">
                            @csrf
                            @method('PATCH')
                            <div class="row g-5 mb-12">
                                <div class="col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                        <span class="required">Somme à regler</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Champs obligatoire"></i>
                                    </label>
                                    <input type="number" class="form-control" name="somme_verse">
                                    <span class="somme_verse_err error text-danger"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button onclick="updateRecord()" id="sender" class="btn btn-primary font-weight-bold">
                    <strong>
                        <b id="text-load" class="visually-hidden">Veuillez patienter... <div class="spinner-border" role="status"></div></b>
                        <b id="text-fix">Continuer</b>
                    </strong>
                </button>
            </div>
        </div>
    </div>
</div>


