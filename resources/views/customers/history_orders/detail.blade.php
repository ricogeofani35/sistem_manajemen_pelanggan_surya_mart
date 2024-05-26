@extends('layouts.main')


@section('container')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-10 mx-auto">
          <div class="row">
            <!-- /.col -->
            <div class="col-md-12 col-lg-12 col-12"> 
              <div class="row">
                <div class="col-md-10 mx-auto">
                  <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-1">
                                <a href="/history_orders" class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            </div>
                            <div class="col-md-11">
                                <h3>Detail Order</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row fw-bold">
                            <div class="col-md-6 border-right">
                                <div class="row mb-3">
                                  <div class="col-md-4">
                                    Kode Order
                                  </div>
                                  <div class="col-md-8">
                                    000{{ $order->id }}
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <div class="col-md-4">
                                    Nama Customer
                                  </div>
                                  <div class="col-md-8">
                                    {{ $order->customer->name }}
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <div class="col-md-4">
                                    Jenis Customer
                                  </div>
                                  <div class="col-md-8">
                                    {{ $order->customer->jenis }}
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                  <div class="col-md-3">
                                    Tgl Order
                                  </div>
                                  <div class="col-md-8">
                                    {{ $order->created_at }}
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <div class="col-md-3">
                                    Status
                                  </div>
                                  <div class="col-md-8">
                                    @if($order->status == 'pending')
                                        <span class="text-primary">Pending</span>
                                    @elseif ($order->status == 'failed')
                                        <span class="text-danger">Order failed</span>
                                    @elseif ($order->status == 'success')
                                        <span class="text-success">Order Success</span>
                                    @endif
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <div class="col-md-3">
                                    Sub Total 
                                  </div>
                                  <div class="col-md-8">
                                    {{ $order->total_payment }}
                                  </div>
                                </div>
                            </div>
                        </div>
                       
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="width: 10px">No</th>
                          <th class="text-center">Kode</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Harga</th>
                          <th class="text-center">Unit</th>
                          <th class="text-center">Stock</th>
                          <th class="text-center">Jumlah</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($order_details as $detail)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $detail->product->code }}</td>
                            <td class="text-center">{{ $detail->product->name }}</td>
                            <td class="text-center">{{ $detail->product->price }}</td>
                            <td class="text-center">{{ $detail->product->unit }}</td>
                            <td class="text-center">{{ $detail->product->stock }}</td>
                            <td class="text-center">{{ $detail->quantity }}</td>
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
    </div>
  </div>


  <!-- /.row -->
@endsection