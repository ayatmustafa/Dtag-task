@extends('layouts.app')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card card-defult">
                        <div class="card-header">
                            {{isset($product)?" Update product":"Add New product"}}

                         </div>
                        <div class="card-body">
                        <form method="POST" action="{{isset($product)?url('products',$product->id):route('products.store')}}" enctype="multipart/form-data">
                                @csrf
                                @if (isset($product))
                                @method('put')
                                @endif

                                <div class="form-group">
                                  <label for="name"> Name : </label>
                                <input type="text" value="{{isset($product)?$product->name: old('name') }}" name="name" id="name" class="@error('name') is-invalid @enderror form-control" placeholder="Add a product Name" aria-describedby="helpId">
                                  @error('name')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="purchase_price"> Purchase Price : </label>
                                    <input type="number" value="{{isset($product)?$product->purchase_price: old('purchase_price') }}" name="purchase_price" id="purchase_price" class="@error('purchase_price') is-invalid @enderror form-control" placeholder="Add a product purchase_price" aria-describedby="helpId">
                                  @error('purchase_price')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror

                                </div>
                                <div class="form-group">
                                    <label for="sale_price"> Sale Price : </label>
                                    <input type="number" value="{{isset($product)?$product->sale_price: old('sale_price') }}" name="sale_price" id="sale_price" class="@error('sale_price') is-invalid @enderror form-control" placeholder="Add a product sale price" aria-describedby="helpId">
                                  @error('sale_price')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror

                                </div>
                                <div class="form-group">
                                    <label for="stock"> stock: </label>
                                    <input type="number" value="{{isset($product)?$product->stock: old('stock') }}" name="stock" id="stock" class="@error('stock') is-invalid @enderror form-control" placeholder="Add a product stock" aria-describedby="helpId">
                                  @error('stock')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror

                                </div>

                                  <div class="form-group">
                                    <label for="content"> Image : </label>
                                    @if (isset($product))
                                        <div class=""><img src="{{asset('storage/'.$product->image)}}"
                                            class="img-fluid img-thumbnail"
                                            style="width: 150px; height: :100px">
                                        </div>
                                    @endif
                                  <input type="file" value="{{isset($product)?$product->image: old('image') }}" name="image" id="image" class="@error('image') is-invalid @enderror form-control"  aria-describedby="helpId">
                                    @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                  </div>




                                <button type="submit" class="btn btn-success">{{isset($product)?" Update":"Add"}}</button>
                            </form>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
  <script>

$("#TagID").select2({
  tags: true
});
  </script>
@endsection
