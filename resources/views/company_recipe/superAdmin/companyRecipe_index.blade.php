<?php include(session()->get('routes_file_path')); ?>
@extends('layouts.superAdmin.top-nav-menu')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recipe Index 
                    <a class="btn btn-sm btn-info" id="addCompany" href="" style="float:right">Add Company</a>
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
                                <th>Company Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Status</th>
                                <th>Remove</th>

                            </tr>

                        </thread>

                        <tbody>

                            @foreach($data as $companyRecipe)

                                <tr>
                                    
                                    <th scope="row">{{$companyRecipe->companyRecipeId}}</th>
                                    <td id="cRecipe_{{$companyRecipe->companyRecipeId}}" scope="row">{{$companyRecipe->companyName}}</td>
                                    <th scope="row">{{$companyRecipe->created_at}}</th>
                                    <th scope="row">{{$companyRecipe->updated_at}}</th>
                                    <th scope="row">{{$companyRecipe->status}}</th>

                                    <td> 
                                        <form id="form_{{$companyRecipe->companyRecipeId}}" method="POST" action="{{ route($routeCompanyRecipeDelete, ['id' => $companyRecipe->companyRecipeId ] ) }}" >

                                            <input type="hidden" name="_method" value="DELETE">    
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type="hidden" name="id" value="{{$companyRecipe->companyRecipeId}}"> 

                                            
                                                <input type="button" name="btn" value="Delete" id="{{$companyRecipe->companyRecipeId }}" data-toggle="modal" data-target="#confirm-submit" class="btn btn-sm btn-danger deleteCompanyRecipe" />
                                            

                                        </form>

                                    </td>

                                </tr>

                            @endforeach
                        
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="font-weight: bold;">
                Delete Company Recipe
            </div>
            <div class="modal-body">
                Are you sure you want to delete  <label id="wMsg" style="color:#ce2a2a; font-weight: bold;"></label> recipe?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success success" data-dismiss="modal">NO</button>
                <a href="#" id="submit" class="btn btn-danger danger">YES</a>
            </div>
        </div>
    </div>
</div>
    




<script type="text/javascript">

    var currentFormID='NULL';

    $('.deleteCompanyRecipe').click(function() {

            
         currentFormID='#form_'+this.id
         var cRecipeID='#cRecipe_'+this.id
         $('#wMsg').text($(cRecipeID).html());
        


    });

    $('#submit').click(function(){
        $(currentFormID).submit();
    });


</script>









@endsection
