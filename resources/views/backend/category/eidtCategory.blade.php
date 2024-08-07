
@extends('backend.layout.master')
@section('content')
    <div class="content-wrapper pl-3" style="min-height: 1302.12px;">

        <div class="row pt-4">
            <div class="col-md-6 text-left">
                <h1 class="h5 mb-2 text-gray-800">Category Eidt Page</h1>
            </div>
            <div class="col-md-6 text-right mb-2">
                <a href="{{url('categoryList')}}" class="btn btn-primary">Category List</a>
            </div>
        </div>

        <div class="card-body">
            <form method="post" action="{{url('update')}}">
                {{csrf_field()}}

                <span class="text-success">{{Session::has('success') ? Session::get('success') : ''}}</span>


                <input type="hidden" name="id" value="{{$id}}">

                <div class="form-group">
                    <label>Category name</label>
                    <input class="form-control" name="category_name" value="{{$categrory_name}}">
                    <span class="text-danger">{{$errors->has('category_name') ? $errors->first('category_name') : ''}}</span>
                </div>
{{--                <div class="form-group">--}}
{{--                    <label> Image</label>--}}
{{--                    <input class="form-control" name="img" value="{{$img}}">--}}
{{--                    <span class="text-danger">{{$errors->has('img') ? $errors->first('img') : ''}}</span>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label>Details</label>--}}
{{--                    <textarea class="form-control" name="details"> {{$details}}</textarea>--}}
{{--                    <span class="text-danger">{{$errors->has('details') ? $errors->first('details') : ''}}</span>--}}
{{--                </div>--}}
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection