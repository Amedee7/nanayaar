@extends('layouts.app')
@section('title', 'Administration - Liste des clients')
@section('content')
<div class="container">
    <br>
        <form action="{{route('clients.ViewPages')}}" method="POST" enctype="multipart/form-data">
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
                   <button type="submit" class="btn btn-primary btn-sm" name="search" >Rechercher</button>
                    <button type="submit" class="btn btn-secondary btn-sm" name="exportPDF">Export PDF</button>
                    {{-- <button type="submit" class="btn btn-success btn-sm" name="exportExcel">export Excel</button> --}}

                </div>
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

<div class="container mt-5">
    <div classs="form-group">
        <input type="text" id="search" name="search" placeholder="Search" class="form-control" />
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
</script>
<script type="text/javascript">
    var route = "{{ url('autocomplete-search') }}";
    $('#search').typeahead({
        source: function (query, process) {
            return $.get(route, {
                query: query
            }, function (data) {
                return process(data);
            });
        }
    });
</script>
@endsection