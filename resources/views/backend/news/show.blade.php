@extends('backend.layout.master')
@section('content')
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
    <div class="container">
        <h1>{{ $news->title }}</h1>
        <p><strong>Category:</strong> {{ $news->category_id }}</p>
        <p><strong>Created by:</strong> {{ $news->user_name }}</p>
        <p><strong>Date:</strong> {{ $news->date }}</p>
        <div>
            <img class="w-50 h-50" src="{{$news->img }}" alt="{{ $news->title }}" />
        </div>
        <div>
            <h3>Details:</h3>
            <p>{{ $news->details }}</p>
        </div>
        <a href="{{ route('news.index') }}" class="btn btn-primary">Back to News List</a>

    </div>
            </div>
        </div>
    </div>
@endsection

