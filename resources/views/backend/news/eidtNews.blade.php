
@extends('backend.layout.master')
@section('content')
    <div class="content-wrapper pl-3" style="min-height: 1302.12px;">

        <div class="row pt-4">
            <div class="col-md-6 text-left">
                <h1 class="h5 mb-2 text-gray-800">News Eidt Page</h1>
            </div>
            <div class="col-md-6 text-right mb-2">
                <a href="{{url('news')}}" class="btn btn-primary">News List</a>
            </div>
        </div>

        <div class="card-body">

            <form action="{{ route('news.update', $data->id) }}" method="POST">

                @csrf
                @method('PUT')


                <span class="text-success">{{Session::has('success') ? Session::get('success') : ''}}</span>


                <input type="hidden" name="id" value="{{$data->id}}">

                <div class="form-group">
                    <label>Category name </label>
                    <select class="form-control" name="category_id">
                        <option value="">Select</option>

                        @foreach($item as $category)
                            <option value="{{ $category->category_id }}" {{ $category->id == $data->category_id ? 'selected' : '' }}>
                                {{ $category->categrory_name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{$errors->has('category_name') ? $errors->first('category_name') : ''}}</span>
                </div>

                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" name="title" value="{{$data->title}}">
                    <span class="text-danger">{{$errors->has('title') ? $errors->first('title') : ''}}</span>
                </div>
                <div class="form-group">
                    <label> Image</label>
                    <input class="form-control" name="img" value="{{$data->img}}">
                    <span class="text-danger">{{$errors->has('img') ? $errors->first('img') : ''}}</span>
                </div>
                <div class="form-group">
                    <label>Details</label>
                    <textarea class="form-control" name="details"> {{$data->details}}</textarea>
                    <span class="text-danger">{{$errors->has('details') ? $errors->first('details') : ''}}</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection