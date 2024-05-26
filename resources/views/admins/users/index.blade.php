@extends('layouts.main')


@section('container')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-10 mx-auto">
          <div class="row">
            <div class="col-md-12 col-lg-12 col-12r">
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

          <div class="row">
            <!-- /.col -->
            <div class="col-md-12 col-lg-12 col-12">   
               <div class="card">
                 <div class="card-header">
                   <a href="/users/create" class="btn btn-primary">Create Data</a>
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body p-0">
                   <table class="table">
                     <thead>
                       <tr>
                         <th style="width: 10px">No</th>
                         <th>Name</th>
                         <th>Username</th>
                         <th>Hak Akses</th>
                         <th style="width: 150px" class="text-center">Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       @foreach ($users as $user)
                         <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $user->name }}</td>
                           <td>{{ $user->username }}</td>
                           <td>{{ $user->is_admin == 1 ? 'Admin' : 'Guest' }}</td>
                           <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                           </td>
                         </tr>
                       @endforeach
                     </tbody>
                   </table>
                 </div>
                 <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
        </div>
    </div>
  </div>
  <!-- /.row -->
@endsection