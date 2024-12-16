@extends('backend.layout.master')
@section('content')
    <div class="content-wrapper pl-3" style="min-height: 1302.12px;">

    <div class="container-fluid" id="viewBlock">
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
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $key => $value)

                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->categrory_name }}</td>
                                <td class="d-flex ">
                                    <a href="{{ url('/categroy/eidt', $value->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('delete', $value->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form   @submit.prevent="submitUpdateForm()">


                                <div class="form-group">
                                    <label>Category name</label>
                                    <input class="form-control" v-model="editFormData.categrory_name" >
                                </div>
                                <div class="form-group">
                                    <label> Details</label>
                                    <input class="form-control" v-model="editFormData.details" >
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="modalHideshow('exampleModal','hide')">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('backend/js/vue/vue.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var app=new Vue({
            el: '#viewBlock',
            data: {
                datList: {},
                editFormData:{}

            },



            methods: {
                modalHideshow:function(modalId,status,callback = false){
                    const _this=this;
                    _this.editFormData = {};

                    $(`#${modalId}`).modal(status);

                },
                openEditModal:function(data){
                    const _this=this;

                    this.modalHideshow('exampleModal','show',function (data) {
                        _this.editFormData=data;

                    })
                },
                submitUpdateForm : function (){
                    const _this = this;
                    axios({
                        method: "PUT",
                        url: `${baseUrl}/api/category_api/${this.editFormData.id}`,
                        data: this.editFormData
                    }).then(function (response) {
                        if(parseInt(response.data.status) === 2000){
                            showToast(response.data.message);
                            _this.modalHideShow('exampleModal', 'hide');
                        }else if(parseInt(response.data.status) === 3000){
                            console.log(response.data);
                        }else{
                            console.log(response.data);
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });
                },

                // getDataList:function() {
                //     const _this = this
                //
                //     axios.get(`${baseUrl}/api/category_api`)
                //         .then(function (response) {
                //             _this.datList = response.data.result
                //
                //         })
                //         .catch(function (error) {
                //             console.log(error);
                //
                //
                //         })
                // },


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
            },

            mounted() {
                this.getDataList();
            },

        })


    </script>
@endsection





