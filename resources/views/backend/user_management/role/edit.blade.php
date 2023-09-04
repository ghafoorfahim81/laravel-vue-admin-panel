@extends('backend.layouts.master')
@section('title', __('lang.edit').' '.__('lang.role'))
@section('css')


@endsection
@section('content')

        <div class="page-content-wrapper" id="myapp" v-cloak>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <form action="{{route('role.update',$role->id)}}" @submit="handleSubmit($event)"
                                  method="post" id="roleForm">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="permission_id" id="permission_id">
                                <div class="card-body" style="padding-bottom: 0px">
                                    <div class="card-body client-nav">
                                        <h4 class="header-title">@lang('lang.edit') @lang('lang.role')</h4>


                                        <div class="row">
                                            <div class="col-xl-12">
                                                <span><span style="color:red">@lang('lang.note')</span>: @lang('lang.required_note')</span><br>
                                                <hr>

                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="validationCustom02">@lang('lang.name')
                                                        <span class="rq">*</span>
                                                    </label>
                                                    <input type="text" name="name" value="{{$role->name}}"
                                                           v-validate="'required'" data-vv-as="@lang('lang.name')"
                                                           class="form-control" id="validationCustom02"
                                                           placeholder="@lang('lang.name')">

                                                    <span class="help-block rq-hint">
                                                    @{{errors.first('name')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-3" v-for="(item,g_index) of permission_group">
                                                    <div class="card bg-white shadow-5 p-3">
                                                        <h5 class="card-header bg-transparent border-bottom mt-0">
                                                            <input type="checkbox"
                                                                    class="form-check-input"
                                                                   @click="checkPoint(item.permission_group_id,0,'parent')"
                                                                   id="item.permission_group_name"
                                                                   :checked="item.checked">

                                                            @{{item.permission_group_name}}</h5>
                                                        <div class="card-body">
                                                            <span v-for="permessions of item.permissions">
                                                                <!-- <h4 class="card-title font-size-16 mt-0">Special title treatment</h4> -->
                                                                <p class="card-text">
                                                                <input type="checkbox"
                                                                        class="form-check-input"
                                                                       @click="checkPoint(item.permission_group_id,permessions.permission_id,'child')"
                                                                       id="jack" value="permessions.permission_name"
                                                                       :checked="permessions.checked">

                                                                @{{permessions.permission_name}}</p>
                                                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer ">
                                    <button class="btn btn-md btn-primary" type="button" @click="handleSubmit($event)">
                                        <span hidden id="btn-loading" class="spinner-border spinner-border-sm"
                                              role="status" aria-hidden="true"></span> @lang('lang.save')</button>
                                    <button class="btn btn-md btn-danger" type="reset">@lang('lang.reset')</button>

                                    <button class="btn btn-md btn-danger" type="button"
                                            onclick="location.href='{{route('role.index')}}'">@lang('lang.cancel')</button>

                                </div>

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
    <script>
        var permission_group = {!! $permission_data !!};

        var vm = new Vue({
            el: '#myapp',
            data: {
                permission_group: permission_group,
                permission: [],
                selected_permission: [],
                select_all: false,
            },
            mounted: function () {

                this.checkIfAllSelected();
            },
            methods: {
                //handle check and uncheck or permission
                checkPoint(p_g_id, p_id, type) {

                    if (type == 'all') {
                        this.select_all = !this.select_all;
                        if (this.select_all == true) {

                            for (var i = 0; i < this.permission_group.length; i++) {
                                for (var m = 0; m < this.permission_group[i].permissions.length; m++) {

                                    this.permission_group[i].permissions[m].checked = true;
                                }
                                this.permission_group[i].checked = true;

                            }
                        } else {
                            for (var i = 0; i < this.permission_group.length; i++) {
                                for (var m = 0; m < this.permission_group[i].permissions.length; m++) {

                                    this.permission_group[i].permissions[m].checked = false;
                                }
                                this.permission_group[i].checked = false;

                            }
                        }
                    }
                    //begin parent
                    if (type == 'parent') {
                        for (var i = 0; i < this.permission_group.length; i++) {
                            if (this.permission_group[i].permission_group_id == p_g_id) {
                                this.permission_group[i].checked = !this.permission_group[i].checked;
                                var flag = this.permission_group[i].checked;
                                for (var m = 0; m < this.permission_group[i].permissions.length; m++) {

                                    this.permission_group[i].permissions[m].checked = flag;
                                }
                            }
                        }
                    }

                    // end parent


                    //begin child

                    if (type == 'child') {
                        for (var i = 0; i < this.permission_group.length; i++) {

                            let flag_temp = false;
                            for (var m = 0; m < this.permission_group[i].permissions.length; m++) {
                                if (p_id == this.permission_group[i].permissions[m].permission_id) {
                                    var temp = !this.permission_group[i].permissions[m].checked;
                                    this.permission_group[i].permissions[m].checked = temp;
                                }

                                if (this.permission_group[i].permissions[m].checked == false) {
                                    flag_temp = true;
                                    this.permission_group[i].checked = false;
                                }


                            }

                            if (flag_temp == false) {
                                // this.permission_group[i].checked = true;
                            }

                        }
                    }
                    // end child


                    let check_all_check = false;
                    for (var i = 0; i < this.permission_group.length; i++) {
                        for (var m = 0; m < this.permission_group[i].permissions.length; m++) {

                            if (this.permission_group[i].permissions[m].checked == false) {
                                check_all_check = true;
                            }
                        }

                    }

                    if (check_all_check == true) {
                        // not check all
                        this.select_all = false;
                    } else {
                        this.select_all = true;
                    }
                },

                checkIfAllSelected() {
                    let check_all_check = false;
                    for (var i = 0; i < this.permission_group.length; i++) {
                        for (var m = 0; m < this.permission_group[i].permissions.length; m++) {

                            if (this.permission_group[i].permissions[m].checked == false) {
                                check_all_check = true;
                            }
                        }

                    }

                    if (check_all_check == true) {
                        // not check all
                        this.select_all = false;
                    } else {
                        this.select_all = true;
                    }
                },


                /**
                 * handleSubmit
                 */
                handleSubmit(e, type = 'save') {
                    this.$validator.validate().then(valid => {

                        if (valid) {
                            let selected_p = [];
                            for (var i = 0; i < this.permission_group.length; i++) {
                                for (var m = 0; m < this.permission_group[i].permissions.length; m++) {

                                    if (this.permission_group[i].permissions[m].checked) {
                                        selected_p.push(this.permission_group[i].permissions[m].permission_id);
                                    }
                                }

                            }
                            document.getElementById('permission_id').value = selected_p;


                            e.preventDefault();
                            let url = (e.target.form == undefined) ? e.target.action : e.target.form.action;
                            let data = (e.target.form == undefined) ? $(e.target).serialize() : $(e.target.form).serialize();
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
                                        window.location.href = "{{route('role.index')}}";
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
                },

            }
        });

    </script>
@endsection
