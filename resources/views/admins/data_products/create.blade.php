@extends('layouts.main')


@section('container')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="col-md-6 mx-auto">
            <!-- general form elements -->
            <div class="card shadow">
                <h3 class="card-title text-center fs-3 text-uppercase py-3 border-bottom ">Create Data Product</h3>
              <!-- form start -->
              <form action="/data_products" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                  <div class="form-group">
                    <label for="code">Kode Product</label>
                    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Enter Code" value="{{ old('code') }}" required  autofocus>
                    @error('code')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Nama Product</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name" value="{{ old('name') }}" required  >
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="price">Harga Product</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Enter price" value="{{ old('price') }}" required>
                    @error('price')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="unit" class="form-label">Unit Product</label>
                    <select class="form-select @error('unit') is-invalid @enderror" id="unit" name="unit" required>
                      <option value="pcs">Pcs</option>
                      <option value="box">Box</option>
                      <option value="ctn">Ctn</option>
                    </select>
                    @error('unit')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="stock">Stock Product</label>
                    <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Enter stock" value="{{ old('stock') }}" required>
                    @error('stock')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="Enter image" required>
                    @error('image')
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
