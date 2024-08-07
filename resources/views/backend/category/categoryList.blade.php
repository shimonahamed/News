@extends('backend.layout.master')
@section('content')
    <div class="content-wrapper pl-3" style="min-height: 1302.12px;">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 text-left">
                <h1 class="h5 mb-2 text-gray-800">Category List</h1>
            </div>
            <div class="col-md-6 text-right mb-2">
                <a href="{{url('addCategory')}}" class="btn btn-primary">Add New</a>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
{{--                            <th>Image</th>--}}
{{--                            <th>Details</th>--}}
                            <th>Action</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key => $value)
                            <tr>
                                <th>{{$key+1}}</th>
                                <th>{{$value->categrory_name}}</th>
{{--                                <td><img src="{{$value->img}}" class="w-25 h-25" alt="Image"></td>--}}
{{--                                <th>{{$value->details}}</th>--}}
                                <th>{{$value->status}}</th>

                                <th><a href="{{url('categroy/eidt', $value->id)}}" class="btn btn-warning">Edit</a></th>
                                <th>
                                    <a onclick="return confirm('Are you sure to delete?')" href="{{url('delete', $value->id)}} "class="btn btn-danger">Delete</a>
                                </th>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


