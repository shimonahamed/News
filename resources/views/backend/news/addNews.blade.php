
@extends('backend.layout.master')
@section('show')
       <div class="content-wrapper pl-3" style="min-height: 1302.12px;">

            <div class="row pt-4">
                <div class="col-md-6 text-left">
                    <h1 class="h5 mb-2 text-gray-800">News Add</h1>
                </div>
                <div class="col-md-6 text-right mb-2">
                    <a href="{{url('news')}}" class="btn btn-primary">News List</a>
                </div>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="{{route('news.store')}}">
                    {{csrf_field()}}

                    <span class="text-success">{{Session::has('success') ? Session::get('success') : ''}}</span>

                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            <option value="">Select</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category -> categrory_name}}</option>

                            @endforeach
                        </select>

                        <span class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title">
                        <span class="text-danger">{{$errors->has('title') ? $errors->first('title') : ''}}</span>
                    </div>

                    <div class="form-group">
                        <label>Details</label>
                        <textarea class="form-control" name="details"></textarea>
                        <span class="text-danger">{{$errors->has('details') ? $errors->first('details') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label> Image</label>
                        <input type="file" name="img">
                        <span class="text-danger">{{$errors->has('img') ? $errors->first('img') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
    </div>
@endsection