@extends('layouts.main')


@section('container')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="col-md-6 mx-auto">
            <!-- general form elements -->
            <div class="card shadow">
                <h3 class="card-title text-center fs-3 text-uppercase py-3 border-bottom ">Create Data Customer</h3>
              <!-- form start -->
              <form action="/data_customers" method="post">
                @csrf

                <div class="card-body">

                  <div class="form-group">
                    <label for="code">Nama Customer</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name" value="{{ old('name') }}" required  autofocus>
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="code">Jenis Customer</label>
                    <input type="text" name="jenis" class="form-control @error('jenis') is-invalid @enderror" id="jenis" placeholder="Enter jenis" value="{{ old('jenis') }}" required  autofocus>
                    @error('jenis')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="code">No Handphone</label>
                    <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Enter phone_number" value="{{ old('phone_number') }}" required  autofocus>
                    @error('phone_number')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="code">Email Customer</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" value="{{ old('email') }}">
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="address">Alamat Customer</label>
                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter address" id="address" style="height: 100px"></textarea>
                    @error('address')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="user_id" class="form-label">User Akun</label>
                    <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                      <option >--Select User Akun--</option>
                      @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                      @endforeach
                    </select>
                    @error('user_id')
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
