@extends('layouts.main')


@section('container')
<div class="row">
  <div class="col-md-10 col-lg-10 col-10 mx-auto">
    {{-- session message --}}
    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show col-lg-12" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(session()->has('error'))
      <div class="alert alert-danger alert-dismissible fade show col-lg-12" role="alert">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
  </div>
</div>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-10 mx-auto">
          <div class="row">
            <!-- /.col -->
            <div class="col-md-12 col-lg-12 col-12"> 
              <div class="row">
                <div class="col-md-8 mx-auto">
                  <div class="card">
                    <div class="card-header">
                      <h3>Data User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                       <div class="row mb-3">
                         <div class="col-md-4">
                           Nama
                         </div>
                         <div class="col-md-8">
                           {{ $data_user->name }}
                         </div>
                       </div>
                       <div class="row mb-3">
                         <div class="col-md-4">
                           Username
                         </div>
                         <div class="col-md-8">
                           {{ $data_user->username }}
                         </div>
                       </div>
                       <div class="row mb-3">
                         <div class="col-md-4">
                           Action
                         </div>
                         <div class="col-md-8">
                           <a href="/data_akuns/{{ $data_user->id }}" class="btn btn-info">Detail</a>
                           <a href="/data_akuns/edit/{{ $data_user->id }}" class="btn btn-warning">Edit</a>
                         </div>
                       </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>  
            </div>
        </div>
    </div>
  </div>


  <!-- /.row -->
@endsection