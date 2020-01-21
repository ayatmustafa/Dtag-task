@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="clearfix">
                <a href="{{route('products.create')}}" class="btn btn-success float-right mb-3">Add Product</a>
                </div>
                    <div class="card">
                        <div class="card card-defult">
                        <div class="card-header"> All Products </div>
                        <div class="card-body">

                            @if (session()->has('message'))
                           <div class="alert alert-success text-center text-capitalize">  {{ session()->get('message')}} </div>
                            @endif
                            @if ($products->count()>0)
                            <table class="table table-striped table-hover text-capitalize">
                                <thead><tr>
                                    <th>Image</th>
                                    <th>name</th>
                                    <th>price</th>
                                    <th><i class="far fa-heart text-danger"></i></th>
                                    <th colspan="3">Action</th>
                                    </tr></thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td><img class="img-fluid" src="{{asset('storage/'.$product->image)}}"  style="width: 100px; height:50px"></td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->sale_price}}</td>
                                            <td>
                                                @if(isset($user)&&(in_array($user, $product->users->pluck('id')->toArray())))

                                                <a  href="{{route('products.unfavorite',$product->id)}}" ><i class="fas fa-heart text-danger fa-2xl"></i></a>

                                                @else
                                                <a href="{{route('products.favorite',$product->id)}}" ><i class="far fa-heart text-info"></i></a>

                                                @endif




                                            </td>
                                            <td >
                                             <a href="{{url('products/'.$product->id.'/edit')}}" class="btn btn-success btn-sm float-right">Edit</a>
                                            </td>
                                            <td>
                                             <form method="post" class="" action="{{route('products.destroy',$product->id)}}">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-right mx-2">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            {{ $products->appends(request()->query())->links() }}
                            @else
                          <div class="text-center text-capitalize">  <h1>no products yet</h1></div>
                            @endif








                        </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
