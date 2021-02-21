<?php include(session()->get('routes_file_path')); ?>
@extends('layouts.user.top-nav-menu')

@section('content')
<div class="container">

    
        
    <form id="recipe-select" method="POST" action="{{ route($routeRecipeSelect) }}">

        <input type="hidden" name="_token" value="{{csrf_token()}}">
    

        <div class="row justify-content-center">

            @foreach($data as $recipe)

                <div class="col-md-4" style="padding-bottom: 20px">



                        <div class="card">
                            <div class="card-header">{{$recipe->name}} 
                                <input type="checkbox" name="recipes[]" value="{{$recipe->id}}"/>
                            </div>

                            <div class="card-body">
                                


                                

                            </div>
                        </div>

                </div>

            @endforeach

        </div>

        <div class="col 2">
            
            <button type="submit" class="btn btn-success btn-sm">Submit</button>

        </div>

    </form>

</div>
@endsection
