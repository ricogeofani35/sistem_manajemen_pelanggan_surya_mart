@extends('layouts.main')

@section('container')

<div class="row">
    <div class="col-md-10 col-10 mx-auto">
        <div id="reader" width="600px" height='700px'></div>
    </div>
</div>

   {{-- modal product detail --}}
   <div class="modal" tabindex="-1" id="modalProductDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Product Detail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <img src="" class="img-product">
                </div>
                <div class="col-md-6">
                  <h3 class="text-center mb-4 mt-2 text-uppercase fw-lighter" id="name"></h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-md-4">
                              Kode : 
                            </div>
                            <div class="col-md-8">
                              <span id="code" class="fw-bold"></span>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-md-4">
                              Harga :
                            </div>
                            <div class="col-md-8">
                              Rp. <span  id="price" class="fw-bold"></span>
                            </div>
                          </div>
                          
                        </li>
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-md-4">
                              Unit : 
                            </div>
                            <div class="col-md-8">
                              <span id="unit" class="fw-bold"></span>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-md-4">
                              Stock : 
                            </div>
                            <div class="col-md-8">
                              <span id="stock" class="fw-bold"></span>
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