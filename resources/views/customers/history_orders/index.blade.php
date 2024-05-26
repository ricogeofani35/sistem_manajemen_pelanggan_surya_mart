@extends('layouts.main')


@section('container')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-10 mx-auto">
          <div class="row">
            <!-- /.col -->
            <div class="col-md-12 col-lg-12 col-12">   
               <div class="card">
                
                 <!-- /.card-header -->
                 <div class="card-body p-0">
    
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="width: 10px">No</th>
                          <th class="text-center">Kode Order</th>
                          <th class="text-center">Tgl Order</th>
                          <th>Nama Customer</th>
                          <th>Sub Total</th>
                          <th>Status</th>
                          <th style="width: 150px" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($history_orders as $history_order)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-center">000{{ $history_order->id }}</td>
                            <td class="text-center">{{ $history_order->created_at }}</td>
                            <td>{{ $history_order->customer->name }}</td>
                            <td>{{ $history_order->total_payment }}</td>
                            @if($history_order->status == 'pending')
                                <td class="text-primary">Pending</td>
                            @elseif ($history_order->status == 'failed')
                                <td class="text-danger">Order failed</td>
                            @elseif ($history_order->status == 'success')
                                <td class="text-success">Order Success</td>
                            @endif
                            <td class="text-center">
                                <a type="button" href="/history_orders/{{ $history_order->id }}" class="btn btn-sm btn-info">Detail</a>
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