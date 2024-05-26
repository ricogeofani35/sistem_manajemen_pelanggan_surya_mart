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
                   <a href="/data_promotions/create" class="btn btn-primary">Create Data</a>
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body p-0">
                   <table class="table">
                     <thead>
                       <tr class="text-center">
                         <th style="width: 10px">No</th>
                         <th>Tgl Awal Promosi</th>
                         <th>Tgl Akhir Promosi</th>
                         <th>Kode</th>
                         <th>Nama</th>
                         <th>Harga</th>
                         <th>Unit</th>
                         <th>Harga Promotion</th>
                         <th style="width: 150px" class="text-center">Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       @foreach ($data_promotions as $data_promotion)
                         <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $data_promotion->beginning_date }}</td>
                           <td>{{ $data_promotion->end_date }}</td>
                           <td>{{ $data_promotion->product->code }}</td>
                           <td>{{ $data_promotion->product->name }}</td>
                           <td class="text-center">{{ $data_promotion->product->price }}</td>
                           <td class="text-center">{{ $data_promotion->product->unit }}</td>
                           <td class="text-center">{{ $data_promotion->promotion_price }}</td>
                          
                           <td class="text-center" style="width: 20%">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('data_promotions.destroy', $data_promotion->id) }}" method="POST">
                                <a href="/data_promotions/{{ $data_promotion->id }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('data_promotions.edit', $data_promotion->id) }}" class="btn btn-sm btn-warning">Edit</a>
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