@extends('layouts.main')

@section('container')

<div class="row">
    <div class="col-md-10 col-10 mx-auto">
        <div class="row mb-3">
            <div class="col-md-8 col-12">
                <form action="/promotions" method="get">
                    <div class="row border">
                        <p>Search berdasarkan tanggal promosi akhir : </p>
                        <div class="col-md-5">
                            <div class="input-group flex-nowrap mb-2">
                                <span class="input-group-text" id="addon-wrapping">Awal</span>
                                <input type="date" class="form-control" aria-describedby="addon-wrapping" name="end_date_from" value="{{ request()->end_date_from }}">
                            </div>
                        </div>
                        <div class="col-md-5 mb-2">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Akhir</span>
                                <input type="date" class="form-control" aria-describedby="addon-wrapping" name="end_date_to" value="{{ request()->end_date_to }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group flex-nowrap">
                                <input type="submit" class="btn btn-warning" value="Search" aria-describedby="addon-wrapping" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach ($promotions as $promotion)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 my-2">
                <div class="card shadow rounded">
                    <img src="{{ asset('/storage/assets/images/' . $promotion->product->image) }}" class="card-img-top" height="250">
                    <div class="card-body">
                        <h4 class=" text-center border-bottom pb-2">{{ $promotion->product->name }}</h4>
                        <div style="height: 80px; overflow-y: scroll">
                            <p class="card-text"><span class="fw-bold">Deskripsi : </span> {{ $promotion->description }}</p>
                        </div>
                        <div class="text-center my-2" id="btn-container">
                            <a href="#" class="btn btn-primary rounded-pill btn-detail" style="width: 80%" data-id='{{ $promotion->id }}'>Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

 {{-- modal product detail --}}
 <div class="modal" tabindex="-1" id="modalPromotionDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Promotion Detail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div> 
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <img src="" class="img-promotion" width="380" height="400">
                </div>
                <div class="col-md-6">
                    <h3 class="text-center mb-4 mt-2 text-uppercase fw-lighter" id="name-product"></h3>
                    <ul class="list-group list-group-flush" style="height: 300px; overflow-y: scroll">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">
                                    Kode : 
                                </div>
                                <div class="col-md-8">
                                    <span id="code-product" class="fw-bold"></span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">
                                    Harga :
                                </div>
                                <div class="col-md-8">
                                    Rp. <span  id="price-product" class="fw-bold"></span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">
                                    Harga stlh diskon :
                                </div>
                                <div class="col-md-8">
                                    Rp. <span  id="price-product-discount" class="fw-bold"></span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">
                                    Unit :
                                </div>
                                <div class="col-md-8">
                                    <span id="unit-product" class="fw-bold"></span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">
                                    Stock :
                                </div>
                                <div class="col-md-8">
                                    <span id="stock-product" class="fw-bold"></span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">
                                    Tanggal Awal :
                                </div>
                                <div class="col-md-8">
                                    <span id="beginning-date" class="fw-bold"></span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">
                                    Tanggal Akhir : 
                                </div>
                                <div class="col-md-8">
                                    <span id="end-date" class="fw-bold"></span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">
                                    Description :
                                </div>
                                <div class="col-md-8">
                                    <span id="description" class="fw-bold"></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection