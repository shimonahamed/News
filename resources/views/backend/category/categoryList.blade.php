 @extends('backend.layout.master')
@section('content')
    <div class="content-wrapper pl-3" style="min-height: 1302.12px;">

    <div class="container-fluid" id="viewBlock">
        <div class="row">
            <div class="col-md-6 text-left">
                <h1 class="h5 mb-2 text-gray-800">Category List</h1>
            </div>
            <div class="col-md-6 text-right mb-2">
                <a @click="openEditModal"   class="btn btn-primary">Add New</a>
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
                            <th>Details</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data , index) in datList">
                                <th>@{{index +1}}</th>
                                <th>@{{data.categrory_name}}</th>
                                <th>@{{data.details}}</th>

                                <th>
                                    <a @click="openEditModal(data)" class="btn btn-warning">Edit</a>
                                    
                                    <a @click="deleteCategory(data)" class="btn btn-danger">Delete</a>
                                </th>
                            </tr>

                        </tbody>
                    </table>
                </div>
              
                
            </div>
        </div>
        <div class="modal" id="categoryModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Category Modal</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="submitForm">
                            <div class="form-group">
                                <label>Category name</label>
                                <input v-model="formData.categrory_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Details</label>
                                <textarea v-model="formData.details" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <a @click="submitCategoryData" class="btn btn-success">Submit and next</a>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" @click="showHideModal('categoryModal', 'hide')">Close</button>
                    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        var app = new Vue({
            el: '#viewBlock',
            data: { 
                datList: [],
                formData: {
                
                } 
            },
            mounted() {
                this.getDataList();
            },
            methods: {
                // modalHideshow(modalId, status, callback = false) {
                //     this.formData = {};
                //     $(`#${modalId}`).modal(status);
                //     if (typeof callback === 'function') {
                //         callback(true);
                //     }
                // },
                modalHideshow(id, status) {
                    $('#' + id).modal(status);
                 
                },
                openEditModal(data) {
                this.formData = { ...data }; 
                this.modalHideshow('categoryModal', 'show');
                },

      
            
                submitCategoryData() {
                    const _this = this;
                    if (_this.formData.id) {
                        axios.put(`${baseUrl}/api/category/${_this.formData.id}`, _this.formData)
                            .then(function (response) {
                                _this.getDataList();
                                toastr.success('Data Update Is Complete');
                                _this.modalHideshow('categoryModal', 'hide');
                            })
                            .catch(function (error) {
                                console.error('Error updating category:', error);
                                toastr.error('Not Updated This Data');

                            });
                    } else {
                        axios.post(`${baseUrl}/api/categoryAdd`, _this.formData)
                            .then(function (response) {
                                _this.getDataList();
                                toastr.success('Data Add Is complete');
                                _this.modalHideshow('categoryModal', 'hide');

                            })
                            .catch(function (error) {
                                console.error('Error adding category:', error);
                                toastr.error('Not Added This Data');

                            });
                    }
                },
                getDataList() {
                    axios.get(`${baseUrl}/api/category_api`)
                        .then(response => {
                            this.datList = response.data.result; 
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                        });
                },
            deleteCategory(data) {
            const _this = this;
            axios.delete(`${baseUrl}/api/categoryDelete/${data.id}`)
                .then(response => {
                    _this.getDataList();
                    toastr.success('Data Deletion Is Complete');
                })
                .catch(error => {
                    console.error('Error deleting category:', error);
                    toastr.error(' Not Deleted');

                });
        }
            
            }
        });
    </script>
 @endsection

 