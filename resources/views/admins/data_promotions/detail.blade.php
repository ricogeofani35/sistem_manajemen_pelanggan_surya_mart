@extends('layouts.main')


@section('container')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-10 mx-auto">
          <div class="row">
            <!-- /.col -->
            <div class="col-md-12 col-lg-12 col-12"> 
              <div class="row">
                <div class="col-md-8 mx-auto">
                  <div class="card">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-md-1">
                          <a href="/data_promotions" class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="col-md-8">
                          <h3>Detail Promotion</h3>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body fw-bold">
                       <div class="row mb-3">
                         <div class="col-md-4">
                           T. Awal Promotion
                         </div>
                         <div class="col-md-8">
                           {{ $promotion->beginning_date }}
                         </div>
                       </div>
                       <div class="row mb-3">
                         <div class="col-md-4">
                           T. Akhir Promotion
                         </div>
                         <div class="col-md-8">
                           {{ $promotion->end_date }}
                         </div>
                       </div>
                       <div class="row mb-3">
                         <div class="col-md-4">
                           Description
                         </div>
                         <div class="col-md-8">
                           {{ $promotion->description }}
                         </div>
                       </div>
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