@extends('layouts.app')
@section('title', 'Administration - Liste des Clients')
@section('content')

    <div class="modal fade" id="modal" data-backdrop="static">
        <div class="modal-dialog modal-xl" client="document">
            <div class="modal-content border-0 shadow radius-1">
                <div class="modal-header">
                    <h5 class="modal-title text-primary-d2" id="exampleModal2Label">
                        Ajouter un client
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>

                <div class="modal-body modal-scroll">


                </div>
            </div>
        </div>
    </div>
@endsection
