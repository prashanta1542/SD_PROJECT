@extends('superadmin.layouts.default')
@section('title','See all Departments')
@section('content')
<div style="background-color:rgba(120,60,150,0.6); height:100vh;">

    <h2 class="text-center text-uppercase p-3 text-uderline border w-100">@yield('title')</h2>
    <p class="text-center"><a href="{{url('admin/createdepartment')}}" class="btn btn-primary">Create New Department</a></p>
    <div class="container" style="background-color:white;">
        <table class="table table-striped p-3">
            <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Short form</th>
                    <th>Department Admin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($d as $i)
                <tr>
                    <td>{{$i->name}}</td>
                    <td>{{$i->aliase}}</td>
                    <td>
                       <a href="{{url('admin/viewteacher/'.$i->id)}}" class="btn btn-primary">See All Teacher</a>
                    </td>
                    <td>
                        <a href="{{url('admin/editedepartment/'.$i->id)}}" class="btn btn-primary">Edit</a>
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
                                        <a href="{{url('admin/deletedepartment/'.$i->id)}}" class="btn btn-danger">Confirm</a>
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection