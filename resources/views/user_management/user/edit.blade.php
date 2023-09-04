@extends('layouts.master')
@section('title', __('lang.edit').' '.__('lang.user'))
@section('css')
    <link href="{{ asset('css/vue-select.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css"/>



@endsection
@section('content')


        <div class="page-content-wrapper" id="myapp" v-cloak>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <form action="{{route('user.update',$user->id)}}" @submit="handleSubmit($event)"
                                  method="post" class="form-horizontal" accept-charset="utf-8"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="permission_id" id="permission_id">
                                <div class="card-body" style="padding-bottom: 0px">
                                    <div class="card-body client-nav">
                                        <h4 class="header-title">@lang('lang.edit') @lang('lang.user')</h4>
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
                                                            <div class="fileinput-new thumbnail"
                                                                 style="width: 200px; height: 150px;">
                                                                <img src="{{myUrl().$user->profile_photo_path}}" alt=""
                                                                     onerror="this.src='{{myUrl()}}no_image.png';"/>
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                                 style="max-width: 200px; max-height: 150px;"></div>
                                                            <div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-new"> @lang('lang.select_image') </span>
                                                        <span class="fileinput-exists"> @lang('lang.change') </span>
                                                        <input type="file" name="photo"> </span>
                                                                <a href="javascript:;" class="btn red fileinput-exists"
                                                                   data-dismiss="fileinput"> @lang('lang.remove') </a>
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
                                                    <input type="text" name="name" value="{{$user->name}}"
                                                           class="form-control" id="" v-validate="'required'"
                                                           data-vv-as="@lang('lang.name')"
                                                           placeholder="@lang('lang.name')" v-model="form.name">
                                                    <span class="help-block rq-hint">
                                                    @{{errors.first('name')}}</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="form-group">
                                                    <label for="">@lang('lang.email')
                                                        <span class="rq">*</span>
                                                    </label>
                                                    <input type="text" @blur="checkEmail" v-model="form.email" name="email" value="{{$user->email}}"
                                                           class="form-control" id="" v-validate="'required'"
                                                           data-vv-as="@lang('lang.email')"
                                                           placeholder="@lang('lang.email')">
                                                    <span class="help-block rq-hint" id="check-email">
                                                    @{{errors.first('email')}}</span>
                                                </div>
                                            </div>

                                            @if(!$super)
                                            <div class="col-xl-4">
                                                <div class="form-group">
                                                    <label for="">@lang('lang.role')
                                                        <span class="rq">*</span>
                                                    </label>

                                                    <v-select :select-on-tab="true"
                                                              v-model="selected_role"
                                                              multiple
                                                              label="name"
                                                              :options="role" placeholder="@lang('lang.role')"
                                                    >

                                                        <template v-slot:no-options="{ search, searching }">
                                                            <template v-if="searching">
                                                                @lang('lang.no_record_found_for') @{{search}}
                                                            </template>
                                                            <em class="v-select-search-hint"
                                                                v-else>@lang('lang.type_to_search')</em>
                                                        </template>
                                                    </v-select>
                                                    <input type="hidden" v-model="selected_role" name="role_ids"
                                                           id="role_ids" v-validate="'required'"
                                                           data-vv-as="@lang('lang.role')" class="form-control"
                                                           placeholder="@lang('lang.role')"/>
                                                    <span class="help-block rq-hint">
                                                    @{{errors.first('role_ids')}}</span>

                                                </div>
                                            </div>
                                            @endif
                                            <div class="col-xl-4" >
                                                <div class="form-group">
                                                    <label for="">@lang('lang.province')
                                                    </label>
                                                    <v-select :select-on-tab="true" v-model="selected_province" label="name" :options="provinces" placeholder="@lang('lang.selectProvince')" >
                                                      
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
                                                    <input type="password" name="password" class="form-control" id=""
                                                           placeholder="@lang('lang.password')">
                                                    <span class="help-block rq-hint">
                                                    @{{errors.first('password')}}</span>

                                                </div>
                                            </div>


                                            <div class="col-xl-4">
                                                <div class="form-group">
                                                    <label for="">@lang('lang.confirm_password')
                                                        <span class="rq">*</span>
                                                    </label>
                                                    <input type="password" name="confirm_password"
                                                           class="form-control" id=""
                                                           placeholder="@lang('lang.confirm_password')">
                                                    <span class="help-block rq-hint">
                                                    @{{errors.first('confirm_password')}}</span>

                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer ">
                                    <button class="btn btn-md btn-primary" type="button" @click="handleSubmit($event)" :disabled="disabled">
                                        <span hidden id="btn-loading" class="spinner-border spinner-border-sm"
                                              user="status" aria-hidden="true"></span> @lang('lang.save')</button>
                                    <button class="btn btn-md btn-danger " type="button"
                                            onclick="location.href='{{route('user.index')}}'">@lang('lang.cancel')</button>

                                </div>
                            </form>
                            @{{submitStatus}}
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
                role:{!! $role !!},
                user:{!! $user !!},
                selected_role: [],
                disabled: true,
                userRole:{!! $userRole !!},
                provinces: {!!$provinces!!},
                selected_province: null,
                old_email:null,
                form: {
                    name: null,
                    email: null,
                    password: null,
                    confirm_password: null,
                    role_ids: [],
                }

            },
            computed: {
                submitStatus(){
                    if(!this.form.name || this.selected_role.length==0 || this.form.email==null || document.getElementById("check-email").innerText!="") {
                        this.disabled = true;
                    } else  this.disabled = false
                }
            },
            mounted(){

                if (this.userRole.length) {
                    this.selected_role = this.userRole;
                }

                this.form.name = this.user.name;
                this.form.email = this.user.email;
                this.old_email = this.user.email;
                this.selected_province= this.provinces.find(e=>e.id==this.user.province_id);

            },
            methods: {
                checkEmail() {
                    if(this.old_email !== this.form.email) {
                        axios.get("{{route('users.check')}}?email=" + this.form.email).then((res) => {
                            if (res.data) {
                                document.getElementById("check-email").innerText = `email already exist`;
                                this.disabled = true;
                                // this.error = true;
                                // this.submitting = false;
                            } else {
                                document.getElementById("check-email").innerText = "";
                                this.submitStatus;
                                // this.error = false;
                            }
                        });
                    } else {
                        document.getElementById("check-email").innerText = "";
                        this.submitStatus;
                    }
                },
                /**
                 * handleSubmit
                 */
                handleSubmit(e, type = 'save') {
                    this.$validator.validate().then(valid => {

                        if (valid) {
                            //e.target.form.submit()
                            e.preventDefault();
                            let ids = [];
                            for (let i = 0; i < this.selected_role.length; i++) {
                                ids.push(this.selected_role[i].id)

                            }
                            if(this.selected_role?.length==0)ids.push('{!!$super!!}');
                            console.log('ids','{!!$super!!}');
                            $('#role_ids').val(ids);
                            if(this.selected_province==null)
                            this.selected_province ='';
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
                                        window.location.href = "{{route('user.index')}}";
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

            }
        });
    </script>


@endsection
