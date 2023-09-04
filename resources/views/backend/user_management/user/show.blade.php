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
                                        <div class="col-xl-12">

                                            <div class="form-group">
                                                <label for="">@lang('lang.name')</label> : {{$user->name}}<br>
                                                <label for="">@lang('lang.email')</label> : {{$user->email}}<br>
                                                <label for="">@lang('lang.role')</label> : {{$user->role}}<br>
                                            </div>
                                        </div>
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
                form: {
                    name: null,
                    email: null,
                    password: null,
                    confirm_password: null,
                    role_ids: [],
                }

            },
            mounted: function () {

                if (this.userRole && this.userRole.length) {
                    this.selected_role = this.userRole;
                }

                this.form.name = this.user.name;
                this.form.email = this.user.email;


            },
            methods: {

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

                            $('#role_ids').val(ids);
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
