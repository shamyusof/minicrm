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
                <li class="breadcrumb-item "><a href="#">Employee</a></li>
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
                            <h3 class="card-title">Edit Employee</h3>
                          </div>
                          <div class="card-body">
                            <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label class="font-weight-bold">First Name</label>
                                    <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname', $employee->firstname) }}"  placeholder="Enter First Name">
                                
                                    <!-- error message untuk title -->
                                    @error('firstname')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                  <label class="font-weight-bold">Last Name</label>
                                  <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname', $employee->lastname) }}"  placeholder="Enter Last Name">
                              
                                  <!-- error message untuk title -->
                                  @error('lastname')
                                      <div class="alert alert-danger mt-2">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>

                              <div class="form-group">
                                <label for="exampleSelectRounded0">Company</label>
    
                            
    
                              <select class="custom-select rounded-0" id="company_id" name="company_id">
                                <option value="">Select a company</option>
                                @foreach($companies as $company)
                                <option value="{{ $company->id }}" @if($company->id == $employee->company_id) selected @endif>{{ $company->name }}</option>
                            @endforeach
                            </select> 
                            
                          
                              </div>
        
                              <div class="form-group">
                                <label class="font-weight-bold">Email </label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $employee->email) }}"  placeholder="Enter Email">
                            
                                <!-- error message untuk title -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                              
                                <div class="form-group">
                                    <label class="font-weight-bold">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $employee->phone) }}" placeholder="Enter Phone Number">
                                
                                    <!-- error message untuk title -->
                                    @error('phone')
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