<?php include(session()->get('routes_file_path')); ?>
@extends('layouts.superAdmin.top-nav-menu')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Company Index 
                    <a class="btn btn-sm btn-info" id="createRecipe" href="" style="float:right">Create Company</a>
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
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                {{--<th>Recipes</th>--}}

                            </tr>

                        </thread>

                        <tbody>

                            @foreach($data as $company)

                                <tr>
                                    
                                    <th scope="row">{{$company->id}}</th>
                                    <th scope="row">{{$company->name}}</th>
                                    <th scope="row">{{$company->description}}</th>
                                    <th scope="row">{{$company->email}}</th>
                                    <th scope="row">{{$company->phone}}</th>
                                    <th scope="row">{{$company->address}}</th>

                                    @if($company->status != 1)
                                        <th scope="row">Inactive</th>
                                    @else
                                        <th scope="row">Active</th>
                                    @endif

                                    {{--<a class="btn btn-sm btn-info" id="createRecipe" href="{{ route($routeCompanyRecipeIndex, ['id' => $company->id]) }}">Recipes</a>--}}

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
