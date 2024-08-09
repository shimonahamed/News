
@extends('backend.layout.master')
@section('header')
    <link href="{{asset('backend/plugin/select2/dist/css/select2.min.css')}}" rel="stylesheet">

@endsection
@section('show')
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

            <form action="{{ route('news.update', $data->id) }}" enctype="multipart/form-data"  method="POST">

                @csrf
                @method('PUT')


                <span class="text-success">{{Session::has('success') ? Session::get('success') : ''}}</span>


                <input type="hidden" name="id" value="{{$data->id}}">

                <div class="form-group">
                    <label>Category name </label>
                    <select class="form-control category_select" name="category_id">
                        <option value="">Select</option>

                        @foreach($item as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $data->category_id ? 'selected' : '' }}>
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
                    <label>Details</label>
                    <textarea class="form-control" id="mytextarea" name="details"> {{$data->details}}</textarea>
                    <span class="text-danger">{{$errors->has('details') ? $errors->first('details') : ''}}</span>
                </div>
                <div class="form-group">
                    <label> Image</label>
                    <input type="file" class="form-control" name="img">
                    <span class="text-danger">{{$errors->has('img') ? $errors->first('img') : ''}}</span>
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
@section('script')
    <script src="{{asset('backend/plugin/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('backend/plugin/select2/dist/js/select2.min.js')}}"></script>

    <script>
        tinymce.init({
            selector: '#mytextarea',
            menubar:false,
            statusbar: false,
            plugins: "powerpaste advcode searchreplace autolink directionality code visualblocks visualchars image link media mediaembed codesample table charmap pagebreak nonbreaking anchor tableofcontents insertdatetime advlist lists checklist wordcount tinymcespellchecker editimage help formatpainter permanentpen charmap linkchecker emoticons advtable export autosave",
            toolbar: "undo redo print spellcheckdialog formatpainter | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | alignleft aligncenter alignright alignjustify lineheight | checklist bullist numlist indent outdent | removeformat | code",
            height: "700px",
        });
    </script>
    <script>
        $('.category_select').select2();
    </script>
@endsection