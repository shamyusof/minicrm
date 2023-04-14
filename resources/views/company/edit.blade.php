@extends('layouts.main')
@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Company</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item "><a href="#">Company</a></li>
                <li class="breadcrumb-item active">Edit</li> 
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="row">
          <div class="col-12">
           
                <div class="col-md-8">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit Company</h3>
                          </div>
                          <div class="card-body">
                            <form action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label class="font-weight-bold">Company Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('title', $company->name) }}"  placeholder="Enter Company Name">
                                
                                    <!-- error message untuk title -->
                                    @error('name')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label class="font-weight-bold">Company Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('title', $company->email) }}"  placeholder="Enter Company Email">
                                
                                    <!-- error message untuk title -->
                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
    
                                <div class="form-group">
                                    <label for="exampleInputFile">Company Logo</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('logo') is-invalid @enderror" name="logo">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                      </div>
                                      <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                      </div>
    
                                      @error('logo')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                      @enderror
                                    </div>
                                
    <!--
                                <div class="form-group">
                                    <label class="font-weight-bold">GAMBAR</label>
                                    <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">
                                
                                   
                                    @error('logo')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> -->
    
                                <div class="form-group">
                                    <label class="font-weight-bold">Website</label>
                                    <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('title', $company->website) }}" placeholder="Enter Company Website">
                                
                                    <!-- error message untuk title -->
                                    @error('website')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
    
        
                           
        
                                <button type="submit" class="btn btn-md btn-primary"> <i class="fas fa-wrench"></i> Update</button>
                                <button type="reset" class="btn btn-md btn-danger"><i class="fas fa-power-off"></i> Reset</button>
                                <a href="{{ url()->previous() }}" class="btn btn-success"><i class="fas fa-backward"></i> Back </a>
        
                            </form> 
                        </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </section>


</div>
@endsection