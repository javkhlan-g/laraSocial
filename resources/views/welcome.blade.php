@extends('layouts.master')
@section('title') Welcome page @endsection
@section('content')
    @include('templates.message-block')
    <div class="login-form">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="{{route('signup')}}" method="post" role="form">
                <div class="form-group {{$errors->has('email')?'has-error':''}}">
                    <label for="email">Your e-Mail</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{Request::old('email')}}">
                </div>
                <div class="form-group {{$errors->has('name')?'has-error':''}}">
                    <label for="name">Your First Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group {{$errors->has('password')?'has-error':''}}">
                    <label for="password">Your Password</label>
                    <input type="text" name="password" id="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
        <div class="col-md-4">
            <h3>Sign In</h3>
            <form action="{{route('signin')}}" method="post">
                <div class="form-group">
                    <label for="email">Login Name</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
    </div>
    <style>
        .login-form{
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endsection