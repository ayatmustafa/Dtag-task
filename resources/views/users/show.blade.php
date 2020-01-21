@extends('layouts.app')


@section('content')
  <div class="container">
    <h2 class="mt-5 text-center"> {{$user->name}} Favorite Products <i class="far fa-heart text-danger fa-2x"></i></h2>
      <div class="row pt-5 justify-content-center">
          <div class="col-md-10 ">
              <div class="card">
                  <div class="card-header ">
                      <span>Favorite Products Details</span>

                  </div>
                  <div class="card-body">
                     <p>
                        @foreach ($products as $index=>$product)
                        @if(isset($user)&&(in_array($product->id, $user->products->pluck('id')->toArray())))
                        <h5>{{$index+1}}. {{ $product->name}}</h5>
                        <hr>
                        @endif
                          @endforeach

                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection


