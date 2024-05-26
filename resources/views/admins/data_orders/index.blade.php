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
                 {{-- <div class="card-header">
                   <a href="/data_orders/create" class="btn btn-primary">Create Data</a>
                 </div> --}}
                 <!-- /.card-header -->
                 <div class="card-body p-0">
                   <table class="table">
                     <thead>
                       <tr>
                         <th style="width: 10px">No</th>
                         <th>Tanggal Order</th>
                         <th>Nama Customer</th>
                         <th>Jenis Customer</th>
                         <th>Total Bayar</th>
                         <th>Status</th>
                         <th style="width: 150px" class="text-center">Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       @foreach ($data_orders as $data_order)
                         <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $data_order->date_order }}</td>
                           <td>{{ $data_order->customer->name }}</td>
                           <td>{{ $data_order->customer->jenis }}</td>
                           <td>{{ $data_order->total_payment }}</td>
                           @if($data_order->status == 'pending')
                              <td class="text-primary">Pending</td>
                            @elseif ($data_order->status == 'failed')
                              <td class="text-danger">Order failed</td>
                            @elseif ($data_order->status == 'success')
                              <td class="text-success">Order Success</td>
                            @endif
                           <td class="text-center" style="width: 20%">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('data_orders.destroy', $data_order->id) }}" method="POST">
                                <a href="/data_orders/{{ $data_order->id }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('data_orders.edit', $data_order->id) }}" class="btn btn-sm btn-warning">Edit</a>
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