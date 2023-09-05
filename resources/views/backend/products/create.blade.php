@extends('backend.layouts.master')
@section('title', __('lang.add').' '.__('lang.product'))
@section('css')
    <link href="{{ asset('css/vue-select.css') }}" rel="stylesheet" type="text/css"/>

@endsection
@section('content')

    <div class="page-content-wrapper" id="myapp" v-cloak>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <form action="{{route('products.store')}}" method="post" id="userForm"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body" style="padding-bottom: 0px">
                                <div class="card-body client-nav">
                                    <div class="needs-validation" novalidate>
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Price</label>
                                                <input type="number" class="form-control" id="validationCustom01"
                                                       name="price"
                                                       placeholder="Price" value="Mark" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Stock Quantity</label>
                                                <input type="number" class="form-control" id="validationCustom02"
                                                       placeholder="Stock Quantity" name="stock_quantity" value="Otto">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Category</label>
                                                <v-select :options="categories" label="name" v-model="selected_category"
                                                          class="mb-2" placeholder="Category"></v-select>
                                                <input type="hidden" name="category" :value="selected_category.id??null">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Weight</label>
                                                <input type="text" class="form-control" id="validationCustom02"
                                                       name="weight"
                                                       placeholder="Weight">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label>Image</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                           name="image"
                                                           id="validationCustomFile" >
                                                    <label class="custom-file-label" for="validationCustomFile">Choose
                                                        file...</label>
                                                    <div class="invalid-feedback">
                                                        Example invalid custom file feedback
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h2>Product translations</h2>
                                        <hr>
                                        <div class="row" v-for="lang in languages">
                                            <div class="col-md-2 mb-3 mb-6">
                                                <label for="validationCustom02">@{{ lang.name }}</label>
                                                <input type="hidden" name="lang[]" :value="lang.code">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Name</label>
                                                <input type="text" class="form-control" id="validationCustom02"
                                                       name="name[]"
                                                       placeholder="Name">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Description</label>
                                                <textarea id="elm1" name="description[]"></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <!-- <button class="btn btn-md btn-primary" type="submit">
                                        <span hidden id="btn-loading" class="spinner-border spinner-border-sm"
                                              user="status" aria-hidden="true"></span> @lang('lang.save')</button>
                                    <button class="btn btn-md btn-danger" type="reset">@lang('lang.reset')</button>
                                    <button class="btn btn-md btn-danger" type="button"
                                            onclick="location.href='{{route('user.index')}}'">@lang('lang.cancel')</button> -->

                                <!-- <button type="submit" class="btn btn-info mr-0">
                                                Save Changes
                                                </button> -->

                                <button class="btn btn-info" type="submit" >
                                    <span :class="spinner" class="spinner-border-sm" role="status"
                                          aria-hidden="true"></span>
                                    <span class="ml-2">Save Changes</span>
                                </button>

                            </div>

                            <!-- Save-Banner Start -->
                            <!--<save-banner v-show="form.fullname && form.email && form.password && form.confirm_password && (selected_role != null)" cancelRoute="{{ route('user.index') }}" @click="handleSubmit()" />-->
                            <!-- Save-Banner End -->
                            @{{ submitStatus}}
                        </form>
                    </div>

                </div>
            </div>
            <!-- end row -->

        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end page-content-wrapper -->

@endsection
@section('js')
{{--    <script src="{{asset('assets/libs/tinymce/tinymce.min.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('assets/libs/ckeditor4/ckeditor.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('assets/js/pages/form-editor.init.js')}}" type="text/javascript"></script>--}}

    <script>
        var vm = new Vue({
            el: '#myapp',
            data: {
                spinner: '',
                disabled: true,
                select_all: false,
                role: [],
                selected_category: [],
                form: {
                    fullname: null,
                    email: null,
                    password: null,
                    confirm_password: null,
                    role_ids: [],
                    selected_member: null
                }

            },
            computed: {
                submitStatus() {
                    if (!this.form.fullname || this.selected_role.length == 0 || this.form.email == null || document.getElementById("check-email").innerText != "") {
                        this.disabled = true;
                    } else this.disabled = false;
                    // console.log("this.disabled",this.disabled)
                }
            },
            created() {
                this.getDropdownItem(['languages', 'categories']);
            },
            methods: {

                checkEmail() {
                    axios.get("{{route('users.check')}}?email=" + this.form.email).then((res) => {
                        if (res.data) {
                            document.getElementById("check-email").innerText = `email already exist`;
                            this.disabled = true;
                        } else {
                            document.getElementById("check-email").innerText = "";
                            // this.disabled = false;
                            this.submitStatus;
                        }
                    });
                },
                /**
                 * handleSubmit
                 */
                handleSubmit(e, type = 'save') {
                    let ids = [];
                    for (let i = 0; i < this.selected_role.length; i++) {
                        ids.push(this.selected_role[i].id)

                    }
                    console.log("ids", ids);
                    // return;
                    $('#role_ids').val(ids);
                    this.$validator.validate().then(valid => {

                        if (valid) {

                            let ids = [];
                            for (let i = 0; i < this.selected_role.length; i++) {
                                ids.push(this.selected_role[i].id)

                            }
                            console.log("ids", ids);
                            $('#role_ids').val(ids);

                            // let selected_p = [];
                            // for (var i = 0; i < this.permission_group.length; i++) {
                            //     for (var m = 0; m < this.permission_group[i].permissions.length; m++) {

                            //         if (this.permission_group[i].permissions[m].checked) {
                            //             selected_p.push(this.permission_group[i].permissions[m].permission_id);
                            //         }
                            //     }

                            // }
                            // document.getElementById('permission_id').value = selected_p;


                            e.preventDefault();
                            let url = (e.target.form == undefined) ? e.target.action : e.target.form.action;
                            let data = (e.target.form == undefined) ? $(e.target).serialize() : $(e.target.form).serialize();
                            data = new FormData(e.target.form);
                            toggleBlock(1);
                            axios.post(url, data)
                                .then(function (response) {
                                    toggleBlock(0);
                                    let message = "{{__('message.success')}}";
                                    if (response.data) {
                                        message = response.data.message;
                                    }
                                    alertify.success(message);
                                    if (type != 'save') {
                                        vm.defaultValue(e);
                                    } else {
                                        // window.location.href = "{{route('user.index')}}";
                                    }
                                })
                                .catch(function (error) {
                                    toggleBlock(0);
                                    let warning = "{{__('message.error')}}";
                                    if (error.response.data) {
                                        if (error.response.data.message) {
                                            warning = error.response.data.message;
                                        }
                                        if ((error.response.status == 422) == true) {
                                            let my_error = error.response.data.errors;

                                            for (index in my_error) {

                                                alertify.error(my_error[index][0]);
                                            }

                                        }
                                    }

                                    alertify.error(warning);
                                })
                        }
                    });
                },
                /**
                 * this is used to set default value
                 */
                defaultValue(e) {
                    $(e.target.form).trigger('reset');
                    this.selected_role = null;
                    this.form = {
                        name: null,
                        email: null,
                        password: null,
                        confirm_password: null,
                        role_ids: [],
                    };

                },


                //handle check and uncheck or permission
                // checkPoint(p_g_id, p_id, type) {

                //     if (type == 'all') {
                //         this.select_all = !this.select_all;
                //         if (this.select_all == true) {

                //             for (var i = 0; i < this.permission_group.length; i++) {
                //                 for (var m = 0; m < this.permission_group[i].permissions.length; m++) {

                //                     this.permission_group[i].permissions[m].checked = true;
                //                 }
                //                 this.permission_group[i].checked = true;

                //             }
                //         } else {
                //             for (var i = 0; i < this.permission_group.length; i++) {
                //                 for (var m = 0; m < this.permission_group[i].permissions.length; m++) {

                //                     this.permission_group[i].permissions[m].checked = false;
                //                 }
                //                 this.permission_group[i].checked = false;

                //             }
                //         }
                //     }
                //     //begin parent
                //     if (type == 'parent') {
                //         for (var i = 0; i < this.permission_group.length; i++) {
                //             if (this.permission_group[i].permission_group_id == p_g_id) {
                //                 this.permission_group[i].checked = !this.permission_group[i].checked;
                //                 var flag = this.permission_group[i].checked;
                //                 for (var m = 0; m < this.permission_group[i].permissions.length; m++) {

                //                     this.permission_group[i].permissions[m].checked = flag;
                //                 }
                //             }
                //         }
                //     }

                //     // end parent


                //     //begin child

                //     if (type == 'child') {
                //         for (var i = 0; i < this.permission_group.length; i++) {

                //             let flag_temp = false;
                //             for (var m = 0; m < this.permission_group[i].permissions.length; m++) {
                //                 if (p_id == this.permission_group[i].permissions[m].permission_id) {
                //                     var temp = !this.permission_group[i].permissions[m].checked;
                //                     this.permission_group[i].permissions[m].checked = temp;
                //                 }

                //                 if (this.permission_group[i].permissions[m].checked == false) {
                //                     flag_temp = true;
                //                     this.permission_group[i].checked = false;
                //                 }


                //             }

                //             if (flag_temp == false) {
                //                 this.permission_group[i].checked = true;
                //             }

                //         }
                //     }
                //     // end child


                //     let check_all_check = false;
                //     for (var i = 0; i < this.permission_group.length; i++) {
                //         for (var m = 0; m < this.permission_group[i].permissions.length; m++) {

                //             if (this.permission_group[i].permissions[m].checked == false) {
                //                 check_all_check = true;
                //             }
                //         }

                //     }

                //     if (check_all_check == true) {
                //         // not check all
                //         this.select_all = false;
                //     } else {
                //         this.select_all = true;
                //     }

                // },


            }
        });
    </script>

@endsection
