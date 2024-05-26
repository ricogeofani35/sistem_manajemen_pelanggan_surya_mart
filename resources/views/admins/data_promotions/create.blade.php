@extends('layouts.main')


@section('container')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="col-md-6 mx-auto">
            <!-- general form elements -->
            <div class="card shadow">
                <h3 class="card-title text-center fs-3 text-uppercase py-3 border-bottom ">Create Data Promotion</h3>
              <!-- form start -->
              <form action="/data_promotions" method="post">
                @csrf

                <div class="card-body">

                  <div class="form-group">
                    <label for="beginning_date">Tanggal Awal Promosi</label>
                    <input type="date" name="beginning_date" class="form-control @error('beginning_date') is-invalid @enderror" id="beginning_date" placeholder="Enter Beginning Date" value="{{ old('beginning_date') }}" >
                    @error('beginning_date')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="end_date">Tanggal Akhir Promosi</label>
                    <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" placeholder="Enter end_date" value="{{ old('end_date') }}"   >
                    @error('end_date')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="product_id" class="form-label">Data Product</label>
                    <select class="form-select @error('product_id') is-invalid @enderror" id="product_id" name="product_id" >
                      <option >--Select Data Product--</option>
                      @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->code }} | {{ $product->name }}</option>
                      @endforeach
                    </select>
                    @error('product_id')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="promotion_price">Harga Promosi</label>
                    <input type="text" name="promotion_price" class="form-control @error('promotion_price') is-invalid @enderror" id="promotion_price" placeholder="Enter Promotion Price" value="{{ old('promotion_price') }}"   >
                    @error('promotion_price')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description" id="description" style="height: 100px"></textarea>
                    @error('description')
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
