@extends('layouts.master')
@section('title', __('lang.add').' '.__('lang.user'))
@section('css')
<link href="{{ asset('css/vue-select.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />


@endsection
@section('content')


<div class="page-content-wrapper" id="myapp" v-cloak>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <form action="{{route('user.store')}}" method="post" id="userForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="permission_id" id="permission_id">
                        <div class="card-body" style="padding-bottom: 0px">
                            <div class="card-body client-nav">
                                <h4 class="header-title">@lang('lang.add') @lang('lang.user')</h4>


                                <div class="row">


                                    <div class="col-xl-12">
                                        <span><span style="color:red">@lang('lang.note')</span>: @lang('lang.required_note')</span><br>
                                        <hr>

                                    </div>
                                    <div class="col-xl-12">
                                        <div class="has-success">
                                            <label class="control-label rq">@lang('lang.photo')
                                                <span class="rq">*</span>
                                            </label>
                                            <div>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="{{asset('no_image.png')}}" alt="" />
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new"> @lang('lang.select_image') </span>
                                                            <span class="fileinput-exists"> @lang('lang.change') </span>
                                                            <input type="file" name="photo"> </span>
                                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> @lang('lang.remove') </a>
                                                    </div>
                                                </div>
                                                <span class="help-block rq-hint">
                                                    @{{errors.first('photo')}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label for="">@lang('lang.name')
                                                <span class="rq">*</span>
                                            </label>
                                            <input v-model="form.fullname" type="text" name="name" class="form-control" id="name" v-validate="'required'" data-vv-as="@lang('lang.name')" placeholder="@lang('lang.name')">
                                            <span class="help-block rq-hint">
                                                @{{errors.first('name')}}</span>
                                        </div>
                                    </div>


                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label for="">@lang('lang.email')
                                                <span class="rq">*</span>
                                            </label>
                                            <input v-model="form.email" @blur="checkEmail" type="email" name="email" class="form-control" id="email" v-validate="'required'" data-vv-as="@lang('lang.email')" placeholder="@lang('lang.email')" autocomplete="new-email">
                                            <span class="help-block rq-hint" id="check-email">
                                                @{{errors.first('email')}}</span>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label for="">@lang('lang.role')
                                                <span class="rq">*</span>
                                            </label>
                                            <v-select :select-on-tab="true" v-model="selected_role" multiple label="name" :options="role" placeholder="@lang('lang.role')">

                                                <template v-slot:no-options="{ search, searching }">
                                                    <template v-if="searching">
                                                        @lang('lang.no_record_found_for') @{{search}}
                                                    </template>
                                                    <em class="v-select-search-hint" v-else>@lang('lang.type_to_search')</em>
                                                </template>
                                            </v-select>
                                            <input type="hidden" v-model="selected_role" name="role_ids" id="role_ids" v-validate="'required'" data-vv-as="@lang('lang.role')" class="form-control" placeholder="@lang('lang.role')" />
                                            <span class="help-block rq-hint">
                                                @{{errors.first('role_ids')}}</span>

                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label for="">@lang('lang.province')
                                            </label>
                                            <v-select :select-on-tab="true" v-model="selected_province" label="name" :options="provinces" placeholder="@lang('lang.selectProvince')">
                                                <template v-slot:no-options="{ search, searching }">
                                                    <template v-if="searching">
                                                        @lang('lang.no_record_found_for') @{{search}}
                                                    </template>
                                                    <em class="v-select-search-hint" v-else>@lang('lang.type_to_search')</em>
                                                </template>
                                            </v-select>
                                            <input type="hidden" name="province" :value="(selected_province == null) ? null : selected_province.id">

                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label for="">@lang('lang.password')
                                                <span class="rq">*</span>
                                            </label>
                                            <input v-model="form.password" type="password" name="password" class="form-control" id="password" v-validate="'required'" autocomplete="new-password" data-vv-as="@lang('lang.password')" placeholder="@lang('lang.password')">
                                            <span class="help-block rq-hint">
                                                @{{errors.first('password')}}</span>

                                        </div>
                                    </div>


                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label for="">@lang('lang.confirm_password')
                                                <span class="rq">*</span>
                                            </label>
                                            <input v-model="form.confirm_password" type="password" name="confirm_password" class="form-control" id="" v-validate="'required'" data-vv-as="@lang('lang.confirm_password')" placeholder="@lang('lang.confirm_password')">
                                            <span class="help-block rq-hint">
                                                @{{errors.first('confirm_password')}}</span>

                                        </div>
                                    </div>




                                </div>


                                <!-- end of permission -->


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

                            <button class="btn btn-info" type="submit" :disabled="disabled" @click="handleSubmit()">
                                <span :class="spinner" class="spinner-border-sm" role="status" aria-hidden="true"></span>
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
<script src="{{asset('plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>

<script>
    var vm = new Vue({
        el: '#myapp',
        data: {
            spinner: '',
            disabled: true,
            select_all: false,
            role: {!!$role!!},
            selected_role: [],
            provinces: {!!$provinces!!},
            selected_province: null,
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
            submitStatus(){
                if(!this.form.fullname || this.selected_role.length==0 || this.form.email==null || document.getElementById("check-email").innerText!="") {
                    this.disabled = true;
                } else this.disabled = false;
                // console.log("this.disabled",this.disabled)
            }
        },
        created() {
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
                            .then(function(response) {
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
                            .catch(function(error) {
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