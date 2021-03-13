@extends('admin_template')

@section('contentHeader')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Employees</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Employees</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card-header">
                <div class="row-cols-5">
                    <a class="btn btn-block bg-gradient-primary" href="{{ route('employees.create') }}" title="Create a employee">Create a employee</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id}}</td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->company->name }}</td>
                            <td>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">

                                    <a href="{{ route('employees.show', $employee->id) }}" title="show" class="btn btn-primary btn-sm">
                                        <i class="fas fa-folder"></i>
                                    </a>

                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt"></i>

                                    </a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" title="delete" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="card-footer clearfix">
                @include('utils.pagination')
            </div>
        </div>
    </div>

@endsection
