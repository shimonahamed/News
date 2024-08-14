@extends('backend.layout.master')
{{--@section('header')--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css" rel="stylesheet">--}}
{{--@endsection--}}
@section('content')
    <div class="content-wrapper pl-3" style="min-height: 1302.12px;">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 text-left">
                <h1 class="h5 mb-2 text-gray-800">Comment List</h1>
            </div>
            <div class="col-md-6 text-right mb-2">
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">

            </div>
            <div class="card-body" id="viewBlock">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Comment</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data,index) in datList">
                            <th>@{{ index + 1 }}</th>
                            <th>@{{ data.visitor.name }}</th>
                            <th v-text="data.comment"></th>

                                <th>

                                    <a  @click="deleteComment(data)" class="btn btn-danger">Delete</a>
                                </th>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('backend/js/vue/vue.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}

<script>
    // const axios = require('axios');
    var app=new Vue({
        el: '#viewBlock',
        data: {
            message: 'hello vue',
            datList: []

        },
        props: {},
        watch: {
            'message': function (olVal, newVal) {
                console.log('sahfd')

            }
        },
        mounted() {
            this.getDataList();
        },
        created() {

        },
        methods: {

            getDataList:function() {
                const _this = this

                axios.get(`${baseUrl}/api/comments_data`)
                    .then(function (response) {
                        _this.datList = response.data.result

                    })
                    .catch(function (error) {
                        console.log(error);


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




    {{--    <script>--}}
{{--        var app = new Vue({--}}
{{--            el: '#viewbook',--}}
{{--            data: {--}}
{{--                message: 'Hello Vue!',--}}
{{--                datList: {}--}}
{{--            },--}}
{{--            props : {--}}

{{--            },--}}
{{--            watch : {--}}
{{--                message: function (olVal, newVal){--}}
{{--                    console.log("dfgdsg");--}}
{{--                }--}}
{{--            },--}}
{{--            mounted() {--}}
{{--                const _this = this;--}}
{{--                axios.get(`${baseUrl}/api/comments_data`)--}}

{{--                    .then(function (response) {--}}
{{--                        _this.datList = response.data.result;--}}
{{--                    })--}}
{{--                    .catch(function (error) {--}}
{{--                        console.log("tfyugjhk");--}}
{{--                    });--}}
{{--            },--}}
{{--            created(){--}}

{{--            },--}}
{{--            methods : {--}}
{{--              --}}

{{--            },--}}
{{--        })--}}
{{--    </script>--}}
    @endsection


