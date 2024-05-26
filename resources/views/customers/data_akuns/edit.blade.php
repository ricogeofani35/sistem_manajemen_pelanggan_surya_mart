@extends('layouts.main')


@section('container')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="col-md-6 mx-auto">
            <!-- general form elements -->
            <div class="card shadow">
                <h3 class="card-title text-center fs-3 text-uppercase py-3 border-bottom ">Edit Akun </h3>
              <!-- form start -->
              <form action="/data_akuns/{{ $data_user->id }}" method="post">
                @csrf
                @method('PUT')

                <div class="card-body">
                  <div class="form-group">
                    <label for="promotion_price">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Enter username" value="{{ old('username', $data_user->username) }}"  required >
                    @error('username')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="promotion_price">Old Password</label>
                    <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" placeholder="Enter old password" value="{{ old('old_password', $data_user->old_password) }}"   >
                    @error('old_password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="promotion_price">New Password</label>
                    <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" placeholder="Enter new password" value="{{ old('new_password', $data_user->new_password) }}"   >
                    @error('new_password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
            
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary rounded-pill my-2" style="width: 40%">Submit</button>
                </div>
              </form>
        </div>
        <!-- /.card -->
    </div>
</div>
  <!-- /.row -->
@endsection
