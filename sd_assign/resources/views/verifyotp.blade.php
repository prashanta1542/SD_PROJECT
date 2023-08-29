@extends('layouts.default')
@section('title','Otp Verification')
@section('class','active')
@section('content')
<div class="bg-secondary text-light" style="height: 100vh;">
    <div class="container">
        <h3 class="text-center pt-3 pb-3">@yield('title')</h3>
        @if(session()->has('otpinvalid'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Failed! {{ session()->get('otpinvalid') }}</strong> 
            </div>
        @endif
        <form method="post" action="{{url('otpverify')}}">
            @csrf
           
            <div class="form-group">
                <label for="pwd">Enter you otp:</label>
                <input type="text" class="form-control" placeholder="Enter your otp" id="pwd" name="otp">
            </div>
            <div class="mt-2">
             <button type="submit" class="btn btn-primary justify-content-center">Submit</button>
             <p class="mt-4">Don't have an account?<a href="{{ url('register')}}" class="btn btn-secondary">Register Here</a></p>
            </div>
            
        </form>
    </div>

</div>

@endsection