<?php include(session()->get('routes_file_path')); ?>
@extends('layouts.superAdmin.top-nav-menu')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recipe Index 
                    <a class="btn btn-sm btn-info" id="createRecipe" href="" style="float:right">Create Recipe</a>
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
                                <th>Description</th>
                                <th>Main Ingredient</th>
                                <th>Minor Ingredient</th>
                                <th>Price</th>
                                <th>On Special</th>
                                <th>Status</th>
                                <th>Assign</th>

                            </tr>

                        </thread>

                        <tbody>

                            @foreach($data as $recipe)

                                <tr>
                                    
                                    <th scope="row">{{$recipe->id}}</th>
                                    <th scope="row">{{$recipe->name}}</th>
                                    <th scope="row">{{$recipe->description}}</th>
                                    <th scope="row">{{$recipe->main_ingredient}}</th>
                                    <th scope="row">{{$recipe->minor_ingredient}}</th>
                                    <th scope="row">{{$recipe->price}}</th>

                                    @if($recipe->is_special != 1)
                                        <th scope="row">Not on Special</th>
                                    @else
                                        <th scope="row">Is on Special</th>
                                    @endif

                                    @if($recipe->status != 1)
                                        <th scope="row">Out of Stock</th>
                                    @else
                                        <th scope="row">In Stock</th>
                                    @endif

                                    <th scope="row"><a class="btn btn-sm btn-info" id="createCompanyRecipe" href="{{ route($routeCompanyRecipeIndex, ['id' => $recipe->id]) }}">Assign</a></th>

                                </tr>

                            @endforeach
                        
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
