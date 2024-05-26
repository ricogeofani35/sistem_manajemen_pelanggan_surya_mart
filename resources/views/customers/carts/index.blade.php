@extends('layouts.main')


@section('container')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-10 mx-auto">
          <div class="row">
            <!-- /.col -->
            <div class="col-md-12 col-lg-12 col-12">   
               <div class="card">
                 <div class="card-header">
                   <a href="/orders" class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body p-0">
                  <form action="/orders/checkout" method="POST">
                    @csrf

                    <table class="table">
                      <thead>
                        <tr>
                          <th style="width: 10px">No</th>
                          <th>Kode</th>
                          <th>Nama</th>
                          <th class="text-center">Harga</th>
                          <th class="text-center">Unit</th>
                          <th style="width: 150px" class="text-center">Jumlah</th>
                          <th style="width: 150px" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <form action="#">
                        </form>
                        @foreach ($data_carts as $data_cart)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data_cart->product->code }}</td>
                            <td>{{ $data_cart->product->name }}</td>
                            <td class="text-center">{{ $data_cart->product->price }}</td>
                            <td class="text-center">{{ $data_cart->product->unit }}</td>
                            <td class="text-center d-flex mx-auto">
                              <input name="quantitys[]" class="text-center form-control" type="number" value="0" >
                            </td>
                           
                            <td class="text-center" style="width: 20%">
                             <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('carts.destroy', $data_cart->id) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                             </form>
                            </td>
                          </tr>
                        @endforeach
                        @if(count($data_carts) > 0)
                          <tr>
                            <td><button type="submit" class="btn btn-primary mt-3 shadow" >Checkout</button></td>
                          </tr>
                        @endif
                      </tbody>
                    </table>

                  </form>
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