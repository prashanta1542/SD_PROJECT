@extends('layouts.default')
@section('title','Login User')
@section('class','active')
@section('content')
<div class="bg-secondary text-light" style="height: 100vh;">
    <div class="container">
        <h3 class="text-center pt-3 pb-3">@yield('title')</h3>
        @if(session()->has('notfound'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Failed! {{ session()->get('notfound') }}</strong> 
            </div>
        @endif
        @if(session()->has('verifyerror'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Failed! {{ session()->get('verifyerror') }}</strong> 
            </div>
        @endif
        @if(session()->has('approveerror'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Failed! {{ session()->get('approveerror') }}</strong> 
            </div>
        @endif
        <form method="post" action="{{url('loginuser')}}">
            @csrf
            
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
            </div>
            <div class="mt-2">
             <button type="submit" class="btn btn-primary justify-content-center">Submit</button>
             <p class="mt-4">Don't have an account?<a href="{{ url('register')}}" class="btn btn-secondary">Register Here</a></p>
            </div>
            
        </form>
    </div>

</div>

@endsection