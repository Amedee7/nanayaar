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

    <div class="container">
        <h1 class="m-3 text-center">All Posts</h1>
        <table class="table table-bordered mb-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $item->name }}
                            {{ $item->lastname }}</td>
                        <td>{{ $client->numb_cli }}</td>

                        <td>
                            @if(request()->has('trashed'))
                                <a href="{{ route('clients.restore', $client->id) }}" class="btn btn-success">Restore</a>
                            @else
                                <form method="POST" action="{{ route('clients.destroy', $client->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="float-end">
            @if(request()->has('trashed'))
                <a href="{{ route('clients.clientAcceptes') }}" class="btn btn-info">View All clients</a>
                <a href="{{ route('clients.restoreAll') }}" class="btn btn-success">Restore All</a>
            @else
                <a href="{{ route('clients.index', ['trashed' => 'client']) }}" class="btn btn-primary">View Deleted clients</a>
            @endif
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.delete').click(function(e) {
                if(!confirm('Are you sure you want to delete this client?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection
