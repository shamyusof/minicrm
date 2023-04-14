@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Company</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Company</li> 
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="{{ route('company.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add Company </a>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($companies as $company)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td><span class="tag tag-success">{{ $company->website }}</span></td>
                    <td>
                      <form onsubmit="return confirm('Are You Sure ?');" action="{{ route('company.destroy', $company->id) }}" method="POST">
                        <a href="{{ route('company.show', $company->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i> Show </a>
                        <a href="{{ route('company.edit', $company->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i> Edit </a>
                         @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> Delete</button>
                    </form>
                      
                    </td>
                  </tr>
                  @empty
                    <div class="alert alert-danger">
                          No Data!
                    </div>
                  @endforelse
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">

            {{ $companies->render('pagination') }}

        </ul>
      </div>
    </section>

    <!-- /.content -->
  </div>
@endsection