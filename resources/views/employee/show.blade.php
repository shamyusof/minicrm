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
                <li class="breadcrumb-item active">Show</li> 
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
    <section class="content-header">
        <div class="container-fluid">
    <div class="card card-info card-outline">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-edit"></i>
            Show Employee Detail
          </h3>
        </div>
        <div class="card-body">


                    <div class="col-md-5">
                       
                            <div class="card-body">
                                
                                <h5>Employee Name : {{ $employee->firstname }} {{ $employee->lastname }}</h5>
                                <p class="tmt-3"> Email :
                                    {!! $employee->email !!}
                                </p>
                                <p class="tmt-3"> Company :
                                  {{ $employee->company->name }}<
                              </p>
                                <p class="tmt-3"> Phone :
                                    {!! $employee->phone !!}
                                </p>
                                <br>
                                <a href="{{ url()->previous() }}" class="btn btn-success"><i class="fas fa-backward"></i> Back </a>
                            </div>
                            
                    </div>
               
            
          
          


          </div>
        </div>
      </div>



</section>
</div>
</div>
@endsection