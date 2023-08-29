@extends('superadmin.layouts.default')
@section('title','view teacher')
@section('content')
<div style="background-color:azure; height:100vh;">

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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Department</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($e as $i)
                <tr>
                    <td>{{$i->department}}</td>
                    <td>{{$i->name}}</td>
                    <td>{{$i->role}}</td>
                    <td>
                        @if($i->role == 'teacher')
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$i->id}}">Set as Admin</button>

                        <!-- The Modal -->
                        <div class="modal" id="myModal{{$i->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Are you sure to change role of Teacher?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <a href="{{url('changerole/'.$i->id)}}" class="btn btn-primary" >Confirm</a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endif
                        @if($i->role == 'Department Admin')
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$i->id}}">Remove from Admin</button>

                        <!-- The Modal -->
                        <div class="modal" id="myModal{{$i->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Are you sure to change role of Teacher?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <a href="{{url('changeadmin/'.$i->id)}}" class="btn btn-primary" >Confirm</a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection