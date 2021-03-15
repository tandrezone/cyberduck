@extends('admin_template')

@section('contentHeader')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">Create Company</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Create Company Card</h6>

                        <p class="card-text">This card shows the feature of creating a company.</p>
                        <a href="{{ route('companies.create') }}" class="btn btn-primary">Go to Create Company</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">List Company</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">List Company Card</h6>

                        <p class="card-text">This card shows the feature of listing companies.</p>
                        <a href="{{ route('companies.index') }}" class="btn btn-primary">Go to List Companies</a>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">Create Employee</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Create Employee Card</h6>

                        <p class="card-text">This card shows the feature of creating a employee.</p>
                        <a href="{{ route('employees.create') }}" class="btn btn-primary">Go to Create Employee</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">List Employees</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">List Employees Card</h6>

                        <p class="card-text">This card shows the feature of listing employees.</p>
                        <a href="{{ route('employees.index') }}" class="btn btn-primary">Go to List Employees</a>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection


