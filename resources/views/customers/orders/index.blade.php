@extends('layouts.main')

@section('container')

<div class="row">
    <div class="col-md-10 col-10 mx-auto">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 my-2">
                <div class="card shadow rounded">
                    <img src="{{ asset('/storage/' . $product->image) }}" class="card-img-top" height="250">
                    <div class="card-body">
                        <h4 class=" text-center border-bottom pb-2">{{ $product->name }}</h4>
                        <p class="card-text">
                            <div class="row">
                                <div class="col-md-4">
                                    Kode
                                </div>
                                <div class="col-md-8">
                                    {{ $product->code }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Harga
                                </div>
                                <div class="col-md-8">
                                    Rp. {{ $product->price }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Unit
                                </div>
                                <div class="col-md-8">
                                    {{ $product->unit }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Stock
                                </div>
                                <div class="col-md-8">
                                    {{ $product->stock }}
                                </div>
                            </div>
                        </p>
                        <div class="text-center border-top pt-2" id="btn-container">
                            <form action="/carts" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                <button type="submit" class="btn btn-primary rounded-pill"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection