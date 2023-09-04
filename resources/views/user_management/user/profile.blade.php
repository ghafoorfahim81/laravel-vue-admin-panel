@extends('layouts.master')
@section('title', __('lang.detail_of').' '.__('lang.user'))
@section('css')
    <link href="{{ asset('css/vue-select.css') }}" rel="stylesheet" type="text/css"/>


@endsection
@section('content')

        <div class="page-content-wrapper" id="myapp" v-cloak>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body" style="padding-bottom: 0px">
                                <div class="card-body client-nav">
                                    <h4 class="header-title">@lang('lang.detail_of') @lang('lang.user')</h4>
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="form-group">
                                                <label for="">@lang('lang.name')
                                                    <span class="rq">*</span>
                                                </label>
                                                <input type="text" name="name" v-model="form.name"
                                                       class="form-control" id="" v-validate="'required'"
                                                       data-vv-as="@lang('lang.name')"
                                                       placeholder="@lang('lang.name')">
                                                <span class="help-block rq-hint">
                                                    @{{errors.first('name')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-group">
                                                <label for="">@lang('lang.email')
                                                    <span class="rq">*</span>
                                                </label>
                                                <input type="text" name="email" v-model="form.email"
                                                       class="form-control" id="" v-validate="'required'"
                                                       data-vv-as="@lang('lang.email')"
                                                       placeholder="@lang('lang.email')">
                                                <span class="help-block rq-hint">
                                                    @{{errors.first('email')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-group">
                                                <label for="">@lang('lang.currentPassword')
                                                    <span class="rq">*</span>
                                                </label>
                                                <input type="password" name="current_password" v-model="form.current_password" @blur="checkCurrentPassword" class="form-control" autocomplete="off"
                                                       placeholder="@lang('lang.password')">
                                                <span class="help-block rq-hint" v-if="flag">
                                                    @{{message}}</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-group">
                                                <label for="">@lang('lang.password')
                                                    <span class="rq">*</span>
                                                </label>
                                                <input type="password" v-model="form.password" name="password" class="form-control" id=""
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
                                                       placeholder="@lang('lang.confirm_password')" @input="checkConfirmation" v-model="form.confirm_password">
                                                <span class="help-block rq-hint" v-if="flagC">
                                                    @{{confirmation_error}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer ">
                                        <button class="btn btn-md btn-primary" type="button" :disabled="flag || flagC" @click="handleSubmit" ><span hidden id="btn-loading" class="spinner-border spinner-border-sm" user="status" aria-hidden="true"></span>  @lang('lang.save')</button>
                                        <button class="btn btn-md btn-danger " type="button" onclick="location.href='{{route('user.index')}}'">@lang('lang.cancel')</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                            </div>
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
    <script>
        var vm = new Vue({
            el: '#myapp',
            data: {
                user:{!! $user !!},
                selected_role: [],
                flag:false,
                flagC:false,
                message:'',
                confirmation_error:'',
                form: {
                    name: null,
                    id: null,
                    email: null,
                    password: null,
                    confirm_password: null,
                    current_password: null,
                }

            },
            mounted: function () {

                this.form.name  = this.user.name;
                this.form.email = this.user.email;
                this.form.id    = this.user.id;


            },
            methods: {

                /**
                 * handleSubmit
                 */

                /**
                 * check current password
                 */
                checkCurrentPassword() {
                    axios.get("{{route('users.password')}}?" + "pass=" +
                        this.form.current_password +
                        "&id=" +
                        this.form.id
                    )
                        .then((res) => {
                            let x = res.data;
                            if (x == 0) {
                                this.flag = true
                                this.message = 'Current password does not match'
                            } else {
                                this.flag = false
                                this.message = 'Current password match'
                            }
                        });
                },
                checkConfirmation() {
                    if (this.form.password && this.form.confirm_password != this.form.password) {
                        this.confirmation_error = "Password doesnt Match";
                        this.flagC =true;
                    } else {
                        this.flagC =false;
                        this.confirmation_error = "";
                    }
                },
                /**
                 * handleSubmit
                 */
                handleSubmit() {
                    axios.post("{{route('user.updateProfile')}}",this.form)
                        .then((res) => {
                            this.form.current_password = null;
                            this.form.password         = null;
                            this.form.confirm_password = null;
                            toastSuccess('Successfully Updated');
                            window.location.href = "{{route('dashboard')}}";

                        })
                },


            }
        });
    </script>


@endsection
