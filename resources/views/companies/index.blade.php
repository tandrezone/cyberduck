@extends('admin_template')

@section('contentHeader')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Companies</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Companies</li>
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
                    <a class="btn btn-block bg-gradient-primary" href="{{ route('companies.create') }}" title="Create a company">Create a company</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Logo</th>
                        <th>Website</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ $company->id}}</td>
                            <td>{{ $company->name }}</td>
                            <td>@if($company->logo)<img src="/storage/{{ $company->logo }}" height="25px"/>@endif</td>
                            <td><a href="{{ $company->website }}">{{ $company->website }}</a></td>
                            <td>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST">

                                    <a href="{{ route('companies.show', $company->id) }}" title="show" class="btn btn-primary btn-sm">
                                        <i class="fas fa-folder">
                                        </i>
                                    </a>

                                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt">
                                        </i>

                                    </a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" title="delete" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash">
                                        </i>

                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="card-footer clearfix">
                <div class="pagination-sm m-0 float-right">
                    {!! $companies->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
