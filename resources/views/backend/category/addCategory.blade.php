
@extends('backend.layout.master')
@section('content')
       <div class="content-wrapper pl-3" style="min-height: 1302.12px;">

            <div class="row pt-4">
                <div class="col-md-6 text-left">
                    <h1 class="h5 mb-2 text-gray-800">Category Add</h1>
                </div>
                <div class="col-md-6 text-right mb-2">
                    <a href="{{url('categoryList')}}" class="btn btn-primary">Category List</a>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{url('saveCat')}}">
                    {{csrf_field()}}

                    <span class="text-success">{{Session::has('success') ? Session::get('success') : ''}}</span>

                    <div class="form-group">
                        <label>Category name</label>
                        <input class="form-control" name="category_name">
                        <span class="text-danger">{{$errors->has('category_name') ? $errors->first('category_name') : ''}}</span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
    </div>
@endsection





{{--@extends('backend.layout.master')--}}
{{--@section('content')--}}
{{--    <div class="content-wrapper pl-3" style="min-height: 1302.12px;">--}}

{{--        <div class="row pt-4">--}}
{{--            <div class="col-md-6 text-left">--}}
{{--                <h1 class="h5 mb-2 text-gray-800">Category Add</h1>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 text-right mb-2">--}}
{{--                <a href="{{url('categoryList')}}" class="btn btn-primary">Category List</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="card-body">--}}
{{--            <form @submit.prevent="submitForm">--}}
{{--                {{csrf_field()}}--}}

{{--                <span class="text-success">{{Session::has('success') ? Session::get('success') : ''}}</span>--}}

{{--                <div class="form-group">--}}
{{--                    <label>Category name</label>--}}
{{--                    <input class="form-control" v-model="form.category_name" id="category_name">--}}
{{--                    <span class="text-danger">{{$errors->has('category_name') ? $errors->first('category_name') : ''}}</span>--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <button type="submit" class="btn btn-success">Submit</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

@section('script')
    <script src="{{asset('backend/js/vue/vue.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        // const axios = require('axios');
        var app=new Vue({
            el: '#viewBlock',
            data: {
                message: 'hello vue',
                datList: [],
                form:{
                    category_name:'',
                }

            },

            props: {

            },
            watch: {
                'message': function (olVal, newVal) {
                    console.log('sahfd')

                }
            },
            mounted() {
                this.submitForm();
            },
            created() {

            },
            methods: {

                submitForm:function() {

                    axios.post('api/categorySave', {
                        category_name: this.categoryName
                    })




                },
                deleteComment: function(data){
                    const _this = this

                    axios.post(`${baseUrl}/api/comments_data/delete`,{id:data.id})
                        .then(function (response) {
                            _this.getDataList()


                        })
                        .catch(function (error) {
                            console.log(error);


                        })
                }
            }

        })


    </script>
@endsection
