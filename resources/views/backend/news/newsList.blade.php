@extends('backend.layout.master')
@section('show')
    <div class="content-wrapper pl-3" style="min-height: 1302.12px;">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 text-left">
                <h1 class="h5 mb-2 text-gray-800">News List</h1>
            </div>
            <div class="col-md-6 text-right mb-2">
                <a href="{{url('news/create')}}" class="btn btn-primary">Add New</a>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr class="text-center">
                            <th>SL</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>date</th>
                            <th>Details</th>
                            <th>Auth</th>

                            <th >Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($news as $key => $value)
                            <tr class="text-center">
                                <th>{{$key+1}}</th>
                                <th>{{$value->title}}</th>
                                <td><img src="{{env('STORAGE_PATH')}}/{{$value->img}}" class="w-25 h-25" alt="Image"></td>
                                <th>{{$value->date}}</th>
                                <th>{{$value->details}}</th>
                                <th>{{$value->user_name}}</th>

                                <th class="d-flex justify-content-between">
                                    <a href="{{ route('news.show', $value->id) }}" class="btn btn-primary btn-sm">view</a>
                                    <a href="{{ route('news.edit', $value->id) }}" class="btn btn-primary btn-sm">Edit</a>


                                    <form action="{{ route('news.destroy', $value->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure to del ete?')" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
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


