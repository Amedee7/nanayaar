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
                    <td>{{ $ViewsPages->user->lastname }}</td>
                    <td>{{ $ViewsPages->created_at }}</td>
                    <td>{{ $ViewsPages->created_at }}</td>
                </tr>
            @endforeach
        </table>
</div>
@endsection
