@extends('superadmin.layouts.default')
@section('title','Create new department')
@section('content')
<div style="background-color:rgba(120,60,150,0.6); height:100vh;">

    <h2 class="text-center text-uppercase p-3 text-uderline border w-100">@yield('title')</h2>
    <div class="container">
        @if(session()->has('success'))
        <div class="alert alert-primary alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success! {{ session()->get('success') }}</strong>
        </div>
        @endif
        @if(session()->has('fail'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success! {{ session()->get('fail') }}</strong>
        </div>
        @endif
        <form method="post" action="{{url('createdepartment')}}">
            @csrf

            <div class="form-group">
                <label for="name">Name of Department:</label>
                <input type="text" class="form-control" placeholder="Department name" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="aliases">Short Aliase</label>
                <input type="text" class="form-control" placeholder="Short form of department" id="aliases" name="aliases">
            </div>
            
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ url('admin/viewdepartment')}}" class="btn btn-info">See All Department</a>
            </div>

        </form>
    </div>
</div>

@endsection