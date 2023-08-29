@extends('departmentadmin.layouts.default')
@section('title','All session')
@section('content')
<div style="background-color:aquamarine;height:100vh">
   <h2 class="text-center text-uppercase p-4">@yield('title') Info.</h2>
   <div class="container" style="background-color:white;">
        <table class="table table-striped p-3">
            <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Batch</th>
                    <th>Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($s as $i)
                <tr> 
                    @foreach($d as $r)   
                        @if($i->dept_id == $r->id)              
                            <td>{{$r->name}}</td>
                        @endif
                    @endforeach
                    <td>{{$i->batch}}th</td>
                    <td>{{$i->year}}th</td>
                    <td>
                        <a href="{{url('department/editsession/'.$i->id)}}" class="btn btn-primary">Edit</a>
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
                                        <a href="{{url('sessiondelete/'.$i->id)}}" class="btn btn-danger">Confirm</a>
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