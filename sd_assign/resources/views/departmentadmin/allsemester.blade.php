@extends('departmentadmin.layouts.default')
@section('title','All Semester')
@section('content')
<div style="background-color:aquamarine;height:100vh">
   <h2 class="text-center text-uppercase p-4">@yield('title') Info.</h2>
   <div class="container" style="background-color:white;">
        <table class="table table-striped p-3">
            <thead>
                <tr>
                    <th>Department</th>
                    
                    <th>Batch</th>
                    <th>Session</th>
                    <th>Semester</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($sem as $semester)
                <tr> 
                    @foreach($s as $i)
                        @foreach($d as $r)   
                            @if($i->dept_id == $r->id)              
                                <td>{{$r->name}}</td>
                            @endif
                        @endforeach
                        
                        <td>{{$i->batch}}th</td>
                        <td>{{$i->year}}th</td>
                        <td>{{$semester->name}}</td>
                    @endforeach
                    <td>
                        <a href="{{url('department/editsession/'.$semester->id)}}" class="btn btn-primary">Edit</a>
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
                                        <a href="{{url('sessiondelete/'.$semester->id)}}" class="btn btn-danger">Confirm</a>
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