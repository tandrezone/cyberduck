@extends('admin_template')

@section('contentHeader')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Show Company</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Companies</a></li>
                        <li class="breadcrumb-item active">Show</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            {{ $company->name }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $company->name }}
                    </div>
                </div>
                @if($company->email)
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $company->email }}
                        </div>
                    </div>
                @endif
                @if($company->logo)
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Logo:</strong>
                            <img src="/storage/{{ $company->logo }}"/>
                        </div>
                    </div>
                @endif
                @if($company->website)
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Website:</strong>
                            <a href="{{ $company->website }}">{{ $company->website }}</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
