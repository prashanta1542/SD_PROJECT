@extends('layouts.default')
@section('title','Register User')
@section('content')
<div class="bg-secondary text-light" style="height: 100%;">
    <div class="container">
        <h3 class="text-center pt-3 pb-3">@yield('title')</h3>
        @if(session()->has('success'))
            <div class="alert alert-primary alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>success! {{ session()->get('success') }}</strong> 
            </div>
        @endif
        @if(session()->has('fail'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Failed! {{ session()->get('fail') }}</strong> 
            </div>
        @endif
        @if(session()->has('emailexiterror'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Failed! {{ session()->get('emailexiterror') }}</strong> 
            </div>
        @endif
        @if(session()->has('roleerror'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Failed! {{ session()->get('roleerror') }}</strong> 
            </div>
        @endif
        @error('pass')
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Failed! {{ $message }}</strong> 
            </div>
        @enderror
        @error('role')
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Failed! {{ $message }}</strong> 
            </div>
        @enderror
        @error('nullvalue')
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Failed! {{ $message }}</strong> 
            </div>
        @enderror
        <form method="post" action="{{url('registerstore')}}">
            @csrf
            
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" placeholder="Enter your name" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="name">Select Department:</label>
                <select name="department" class="form-control">
                    <option>Choose Department</option>
                    @foreach($d as $i)
                        <option value="{{$i->name}}">{{$i->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea type="text" class="form-control" placeholder="Enter your address" id="address" name="address" required></textarea>
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="conatct">Contact:</label>
                <input type="text" class="form-control" placeholder="Enter contact no." id="contact" name="contact" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password" required>
            </div>
            <div class="form-group">
                <label for="cwd">Confirm Password:</label>
                <input type="password" class="form-control" placeholder="Enter confirm password" id="cwd" name="cpassword" required>
            </div>
            <div class="pt-2">
                <button type="submit" class="btn btn-primary justify-content-center">Submit</button>
                <p class="pt-4">Already have an account?<a href="{{ url('login')}}" class="btn btn-secondary">Login Here</a></p>
            </div>

        </form>
    </div>

</div>

@endsection