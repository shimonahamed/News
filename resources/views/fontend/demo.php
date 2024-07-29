<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Restaurant One Page HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<body>

<!--
Slider start
============================== -->
<section id="slider">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                    <div class="title">
                        <h3>Featured <span>Works</span></h3>
                    </div>
                    <div id="owl-example" class="owl-carousel">
                        <div>
                            <img class="img-responsive" src="images/slider/slider-img-1.jpg" alt="">
                        </div>
                        <div>
                            <img class="img-responsive" src="images/slider/slider-img-2.jpg" alt="">
                        </div>
                        <div>
                            <img class="img-responsive" src="images/slider/slider-img-3.jpg" alt="">
                        </div>
                        <div>
                            <img class="img-responsive" src="images/slider/slider-img-4.jpg" alt="">
                        </div>
                        <div>
                            <img class="img-responsive" src="images/slider/slider-img-1.jpg" alt="">
                        </div>
                        <div>
                            <img class="img-responsive" src="images/slider/slider-img-2.jpg" alt="">
                        </div>
                        <div>
                            <img class="img-responsive" src="images/slider/slider-img-3.jpg" alt="">
                        </div>
                        <div>
                            <img class="img-responsive" src="images/slider/slider-img-4.jpg" alt="">
                        </div>

                    </div>
                </div>
            </div><!-- .col-md-12 close -->
        </div><!-- .row close -->
    </div><!-- .container close -->
</section><!-- slider close -->
<!--
about-us start
============================== -->
<!--
blog start
============================ -->
<!--
price start
============================ -->
<!--
subscribe start
============================ -->
<!--
CONTACT US  start
============================= -->


</body>

</html>




@extends('backend.layouts.master')

@section('dashboard_content')


<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Tables</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="row">
            <div class="col-md-6 text-left">
                <h1 class="h5 mb-2 text-gray-800">News Edit</h1>
            </div>
            <div class="col-md-6 text-right mb-2">
                <a href="{{route('news.index')}}" class="btn btn-primary">News List</a>

            </div>

        </div>
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>

            </div>
            <div class="box-content">

                <form action="{{ route('news.update', $news->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <span class="text-success">  {{\Illuminate\Support\Facades\Session::has('success')?\Illuminate\Support\Facades\Session::get('success'):''}}</span>
                    <input type="hidden"name="id" value="{{$news->id}}">
                    <div class="form-group">

                        <label>Category Name</label>
                        <input class="form-control" name='category_name' value="{{$news->category}}">
                        <span class="text-danger">
                                    {{$errors->has('category_name') ? $errors->first('category_name') :''}}</span>

                    </div>
                    <div class="form-group">
                        <label style="width: 100px">Title</label>
                        <input class="form-control" name='title' value="{{$news->title}}">
                        <span class="text-danger">
                                    {{$errors->has('title') ? $errors->first('title') :''}}</span>
                    </div>

                    <div class="form-group">
                        <label>Details</label>
                        <textarea class="form-control" name='details'>{{$news->details}}</textarea>
                        <span class="text-danger">
                                    {{$errors->has('details') ? $errors->first('details') :''}}</span>

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!--/span-->

</div><!--/row-->
</div>

@endsection



