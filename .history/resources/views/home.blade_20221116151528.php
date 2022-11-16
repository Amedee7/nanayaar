@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row example-preview" id="student_block">
        <div class="col-md-4">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            <span class="flaticon-list icon-lg primary-color"></span>
                            Clients en attentes
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            <span class="flaticon-responsive icon-lg primary-color"></span>
                            Cli
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            <span class="flaticon-responsive icon-lg primary-color"></span>
                            Contacts
                        </h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
