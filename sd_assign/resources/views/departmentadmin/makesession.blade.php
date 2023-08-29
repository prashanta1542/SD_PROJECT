@extends('departmentadmin.layouts.default')
@section('title','Create new session')
@section('content')
<div style="background-color:aquamarine;height:100vh">
   <h2 class="text-center text-uppercase p-4">@yield('title')</h2>
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
        <form method="post" action="{{url('makesession')}}">
            @csrf

            <div class="form-group">
                <label for="year">Year Of Session:</label>
                <input type="text" class="form-control" placeholder="Write the session year" id="name" name="year">
            </div>
            <div class="form-group">
                <label for="batch">Batch No:</label>
                <input type="text" class="form-control" placeholder="Enter Batch" id="aliases" name="batch">
            </div>
            <div class="form-group">
                <label for="dept_id">Select Department</label>
                <select class="form-control" id="admin" name="dept_id">
                    <option value="null">Choose department</option>
                    @foreach($d as $i)
                       
                            <option value="{{$i->id}}">{{$i->name}}</option>
                       
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ url('department/allsession')}}" class="btn btn-info">See All</a>
            </div>

        </form>
    </div>
</div>
@endsection