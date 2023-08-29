@extends('superadmin.layouts.default')
@section('title','Pending Employee')
@section('content')
<div style="background-color:rgba(120,60,150,0.6); height:100vh;">

    <h2 class="text-center text-uppercase p-3 text-uderline border w-100">@yield('title')</h2>
    @if(session()->has('succcess'))
    <div class="alert alert-primary alert-dismissible container">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Successs! {{ session()->get('succcess') }}</strong>
    </div>
    @endif
    @if(session()->has('failed'))
    <div class="alert alert-danger alert-dismissible container">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Failed! {{ session()->get('failed') }}</strong>
    </div>
    @endif
    <div class="container" style="background-color:white;">
        <table class="table table-striped p-3">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Role</th>
                    <th>Verified</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($d as $i)
                @if(($i->status)==false)
                <tr>
                    <td>{{$i->name}}</td>
                    <td>{{$i->role}}</td>
                    <td>{{($i->verified) ?'Verified':'Not Verified'}}</td>
                    <td>{{ !($i->status)?'Panding':''}}</td>
                    <td>
                        <a href="{{url('accept/'.$i->id)}}" class="btn btn-primary">Accept</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                            Delete
                        </button>
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Are you sure to delete?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <a href="{{url('delete/'.$i->id)}}" class="btn btn-danger">Confirm</a>
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection