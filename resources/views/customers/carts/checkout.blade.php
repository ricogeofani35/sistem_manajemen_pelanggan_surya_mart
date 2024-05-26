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
                  <form action="/orders" method="POST">
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
                        </tr>
                      </thead>
                      <tbody>
                        <form action="#">
                        </form>
                        @foreach ($data_carts as $key => $data_cart)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data_cart->product->code }}</td>
                            <td>{{ $data_cart->product->name }}</td>
                            <td class="text-center">{{ $data_cart->product->price }}</td>
                            <td class="text-center">{{ $data_cart->product->unit }}</td>
                            <td class="text-center">
                              {{ $quantitys[$key]  }}
                            </td>
                          </tr>
                        @endforeach
                        @if(count($data_carts) > 0)
                          <tr>
                            <td colspan="6" class="text-right py-4 px-4">
                                <h2>Sub Total : Rp. {{ $sub_total }}</h2>
                            </td>
                           
                          </tr>
                          <tr>
                            <td>
                                <button type="submit" class="btn btn-primary mt-3 shadow" >Submit</button>
                            </td>
                            <td><a href="/carts" type="button" class="btn btn-danger mt-3 shadow" >Cancel</button></a>
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