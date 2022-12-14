@extends('layouts.app')
@section('title', 'Administration - Liste des élèves')
@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Liste des élèves</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            <span class="flaticon-list icon-lg primary-color"></span>
                            Liste de tout les élèves
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <button onclick="createRecord('{{ route('users.create') }}')" class="btn px-4 btn-dark mb-1">
                            <span class="flaticon-refresh"></span>
                            Afficher tout
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <input style="border: solid black;" data-table="table-students" placeholder="Rechercher un élève" type="text" class="light-table-filter form-control form-control-lg mb-3">
                    <div id="student-datatable" class="table-responsive">
                        @include('students.partials.paginate')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
