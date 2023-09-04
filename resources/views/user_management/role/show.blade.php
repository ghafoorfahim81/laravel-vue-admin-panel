@extends('layouts.master')
@section('title', __('lang.detail_of').' '.__('lang.role'))
@section('css')


@endsection
@section('content')

        <div class="page-content-wrapper" id="myapp" v-cloak>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">

                            <div class="card-body" style="padding-bottom: 0px">
                                <div class="card-body client-nav">
                                    <h4 class="header-title">@lang('lang.detail_of') @lang('lang.role')</h4>


                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">@lang('lang.name')</label>
                                                : {{$role->name}}

                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">

                                        <div>


                                            <div class="col-xl-12" v-for="(item,g_index) of permission_group">
                                                <div class="card">
                                                    <h5 class="card-header bg-transparent border-bottom mt-0">
                                                        <input type="checkbox"
                                                               @click="checkPoint(item.permission_group_id,0,'parent')"
                                                               id="item.permission_group_name" :checked="item.checked"
                                                               disabled>

                                                        @{{item.permission_group_name}}</h5>
                                                    <div class="card-body">
                                                            <span v-for="permessions of item.permissions">
                                                                <!-- <h4 class="card-title font-size-16 mt-0">Special title treatment</h4> -->
                                                                <p class="card-text">
                                                                <input type="checkbox"
                                                                       @click="checkPoint(item.permission_group_id,permessions.permission_id,'child')"
                                                                       id="jack" value="permessions.permission_name"
                                                                       :checked="permessions.checked" disabled>

                                                                @{{permessions.permission_name}}</p>
                                                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                                            </span>
                                                    </div>
                                                </div>
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


            }
        });

    </script>
@endsection
