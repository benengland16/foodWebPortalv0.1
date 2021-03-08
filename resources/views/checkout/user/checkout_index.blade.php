<?php include(session()->get('routes_file_path')); ?>
@extends('layouts.user.top-nav-menu')

@section('content')
<div class="container">

    
        
    <form id="checkout" method="POST" action="{{ route($routeCheckout) }}">

        <input type="hidden" name="_token" value="{{csrf_token()}}">
    

        <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="col 2">
            
                    <button type="submit" class="btn btn-success btn-sm">Place Order</button>

                    <a class="btn btn-danger" href="{{ route($routeClearCart) }}">Empty Cart</a>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <table class="table">

                        <thread>

                            <tr>

                                <th>ID</th>
                                <th>Name</th>
                                <th>Unit Price</th>
                                <th>Units Per Ctn</th>
                                <th>Assign</th>

                            </tr>

                        </thread>

                        <tbody>

                            @foreach($data as $recipe)

                                <tr>
                                    
                                    <th scope="row">{{$recipe->id}}</th>
                                    <th scope="row">{{$recipe->name}}</th>
                                    <th scope="row">{{$recipe->unit_price}}</th>
                                    <th scope="row">{{$recipe->units_per_ctn}}</th>
                                    <th scope="row">Select</th>
                                    

                                    {{--@if($recipe->is_special != 1)
                                        <th scope="row">Not on Special</th>
                                    @else
                                        <th scope="row">Is on Special</th>
                                    @endif

                                    @if($recipe->status != 1)
                                        <th scope="row">Out of Stock</th>
                                    @else
                                        <th scope="row">In Stock</th>
                                    @endif--}}

                                    <th scope="row"><input type="checkbox" name="recipes[]" value="{{$recipe->id}}"/></th>

                                </tr>

                            @endforeach
                        
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

        

    </form>

</div>
@endsection
