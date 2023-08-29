@extends('departmentadmin.layouts.default')
@section('title','Create new Semester')
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
        <form method="post" action="{{url('addsemester')}}">
            @csrf

            <div class="form-group">
                <label for="name">NO of Semester:</label>
                <input type="text" class="form-control" placeholder="Semester" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="session_id">Select session</label>
                <select class="form-control" id="admin" name="session_id">
                    <option value="null">Select session</option>
                    @foreach($s as $i)
                       
                            <option value="{{$i->id}}">{{$i->year}}</option>
                       
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dept_id">Select Department</label>
                <select class="form-control" id="admin" name="dept_id">
                    <option value="null">Select Deapartment</option>
                    @foreach($d as $i)
                       
                            <option value="{{$i->id}}">{{$i->name}}</option>
                       
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ url('department/showsemester')}}" class="btn btn-info">See All</a>
            </div>

        </form>
    </div>
</div>
@endsection