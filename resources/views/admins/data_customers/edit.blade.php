@extends('layouts.main')


@section('container')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="col-md-6 mx-auto">
            <!-- general form elements -->
            <div class="card shadow">
                <h3 class="card-title text-center fs-3 text-uppercase py-3 border-bottom ">Edit Data Customer</h3>
              <!-- form start -->
              <form action="/data_customers/{{ $data_customer->id }}" method="post">
                @csrf
                @method('PUT')

                <div class="card-body">

                  <div class="form-group">
                    <label for="name">Nama Customer</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name" value="{{ old('name', $data_customer->name) }}" required>
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="jenis">Jenis Customer</label>
                    <input type="text" name="jenis" class="form-control @error('jenis') is-invalid @enderror" id="jenis" placeholder="Enter jenis" value="{{ old('jenis', $data_customer->jenis) }}" required>
                    @error('jenis')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="phone_number">No Handphone</label>
                    <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Enter phone_number" value="{{ old('phone_number', $data_customer->phone_number) }}" required>
                    @error('phone_number')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" value="{{ old('email', $data_customer->email) }}" required>
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="address">Alamat Customer</label>
                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter address" id="address" style="height: 100px">{{ $data_customer->address }}</textarea>
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
                        <option value="{{ $user->id }}" {{ $user->id == $data_customer->user_id ? 'selected' : '' }}>{{ $user->username }}</option>
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
