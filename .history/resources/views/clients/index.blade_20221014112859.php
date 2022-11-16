@extends('layouts.app')
@section('title', 'Administration - Liste des Clients')
@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Liste des Clients</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3 container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <h5 class="text-dark font-weight-bolder my-1 mr-5">
                    <span class="flaticon-user-add primary-color icon-lg"></span>
                    Gestion de clients.
                </h5>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class="btn-group dropup">
                <div class="btn-group dropup">
                    <a class="btn btn-primary" href="{{ route('clients.create') }}"><span
                            class="flaticon-up-arrow-1"></span> Insrire un client</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="card-body ">
            <table id="o2d-datatable" class="table table-bordered table-striped bgc-grey-l4 text-100 border-b-1">
                <thead style="border-color:#2a80c8">
                    <tr>
                        <th>Record ID</th>
                        <th>Numero Client</th>
                        <th>Nom & Prenom</th>
                        <th>Telephones</th>
                        <th>Montant</th>
                        <th>L'agent commercial</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $key=>$post)
                     <tr>
                         <td>{{ $key+1 }}</td>
                         <td>{{ Str::limit($post->title,10) }}</td>
                         <td>
                           @if($post->status==1)
                           <a href="{{ url('change-status/'.$post->id) }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-success">Active</a>
                           @else
                           <a href="{{ url('change-status/'.$post->id) }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-danger">Inactive</a>
                           @endif
                         </td>
                         <td>{{ Str::limit($post->description,50) }}</td>
                         <td>
                           {{ $post->created_at->toDateString() }}
                          </td>
                          <td>
                            <a href="{{ url('edit-data/'.$post->id) }}" class="btn btn-sm btn-success">Edit</a>
                            <a href="{{ url('delete-data/'.$post->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger">Delete</a>
                          </td>
                     </tr>
                    @endforeach 
                  </tbody>
                </table>
        </div>
    </div>

@endsection

