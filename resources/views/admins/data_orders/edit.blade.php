@extends('layouts.main')


@section('container')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="col-md-6 mx-auto">
            <!-- general form elements -->
            <div class="card shadow">
                <h3 class="card-title text-center fs-3 text-uppercase py-3 border-bottom ">Edit Data Order</h3>
              <!-- form start -->
              <form action="/data_orders/{{ $order->id }}" method="post">
                @csrf
                @method('PUT')

                <div class="card-body">
                  <div class="form-group">
                    <label>Kode</label>
                    <input type="text"  class="form-control" value="000{{ $order->id }}" required  readonly>
                  </div>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="text"  class="form-control" value="{{ $order->date_order }}" required  readonly>
                  </div>
                  <div class="form-group">
                    <label>Nama Customer</label>
                    <input type="text"  class="form-control" value="{{ $order->customer->name }}" required  readonly>
                  </div>
                  
                  <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                      <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                      <option value="success" {{ $order->status == 'success' ? 'selected' : '' }}>Order Success</option>
                      <option value="failed" {{ $order->status == 'failed' ? 'selected' : '' }}>Order Failed</option>
                    </select>
                    @error('status')
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
