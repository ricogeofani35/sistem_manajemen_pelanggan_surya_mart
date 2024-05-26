@extends('layouts.main')


@section('container')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-10 mx-auto">

      <div class="row">
        <div class="col-lg-6 col-12">
          <!-- small box -->
          <div class="small-box bg-info px-3">
            <div class="inner">
              <h3>{{ $product_count }}</h3>
              <p>Products</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <!-- small box -->
          <div class="small-box bg-warning px-3">
            <div class="inner">
              <h3>{{ $promotion_count }}</h3>
    
              <p>Promotions</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- /.row -->
@endsection