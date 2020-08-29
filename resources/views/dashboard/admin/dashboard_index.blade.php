<?php include(session()->get('routes_file_path')); ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--{{dd(count($userList))}}--}}

                    @foreach ($userList as $user)

                        {{ $user->name }}

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection