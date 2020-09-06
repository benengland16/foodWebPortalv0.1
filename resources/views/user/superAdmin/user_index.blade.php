<?php include(session()->get('routes_file_path')); ?>
@extends('layouts.superAdmin.top-nav-menu')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Index 
                    <a class="btn btn-sm btn-info" id="createUser" href="{{ route($routeUserCreate) }}" style="float:right">Create User</a>
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
                                <th>Email</th>
                                <th>Role</th>
                                <th>Company</th>
                                {{--<th>Delete</th>--}}

                            </tr>

                        </thread>

                        <tbody>

                            @foreach($data as $user)

                                <tr>
                                    
                                    <th scope="row">{{$user->userId}}</th>
                                    <th scope="row">{{$user->userName}}</th>
                                    <th scope="row">{{$user->userEmail}}</th>
                                    <th scope="row">{{$user->roleName}}</th>
                                    <th scope="row">{{$user->companyName}}</th>

                                    {{--<td> 

                                        <form method="POST" action="{{ route($routeUserDelete, ['id' => $user->userId ] ) }}" >

                                            <input type="hidden" name="_method" value="DELETE">    
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                                            <Button type="submit" class="btn btn-sm btn-danger" >Delete</Button>

                                        </form>

                                    </td>--}}

                                    

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
