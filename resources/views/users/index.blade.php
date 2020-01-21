@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="clearfix">
                </div>
                    <div class="card">
                        <div class="card card-defult">
                        <div class="card-header"> All Users </div>
                        <div class="card-body">

                            @if (session()->has('message'))
                           <div class="alert alert-success text-center text-capitalize">  {{ session()->get('message')}} </div>
                            @endif
                            @if ($users->count()>0)
                            <table class="table table-striped table-hover">
                                <thead><tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Favorite Products</th>
                                    </tr></thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td><img class="img-fluid" src="{{$user->getGravatar()}}"  style="width: 50px; height:50px ; border-radius: 50%"></td>
                                            <td>{{$user->name}}</td>
                                            <td> {{$user->email}}</td>
                                            <td><a href="{{route('users.show',$user->id)}}">{{$user->products()->count()}}</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->appends(request()->query())->links() }}
                            @else
                          <div class="text-center text-capitalize">  <h1>no users yet</h1></div>
                            @endif








                        </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
