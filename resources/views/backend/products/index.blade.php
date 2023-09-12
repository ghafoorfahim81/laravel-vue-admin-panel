@extends('backend.layouts.master')
@section('title', 'Products Management')
@section('css')

@endsection
@section('content')

    <div class="page-content-wrapper" id="app">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <input type="hidden" name="permission_id" id="permission_id">
                        <div class="card-body" style="padding-bottom: 0px">
                            <div class="card-body client-nav">
                                <div class="row pb-2">
                                    <div class="col-sm-12 col-md-2 form-inline">
                                        <div class="form-group">
                                            @if(hasPermission(['product_create']))
                                                <button onclick="location.href='{{route('products.create')}}'"
                                                        class="btn btn-info btn-sm waves-effect waves-light"
                                                        type="button">@lang('lang.add') @lang('lang.new')
                                                    <i class="mdi mdi-plus-thick"></i></button>&nbsp
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class=" ">
                                    <datatable ref="child" :per-page="{{perPage()}}"
                                               :no-record-found-text="'@lang('lang.no_record_found')'"
                                               :per-page-text="'@lang('lang.show')'"
                                               :showing-text="'@lang('lang.showing')'"
                                               :from-text="'@lang('lang.from')'" :to-text="'@lang('lang.to')'"
                                               :record-text="'@lang('lang.record')'"
                                               :app-per-page="{!! perPage(1) !!}" :columns="columns" :data="apiData"
                                               @pagination-change-page="getRecord" :limit="1"
                                               :filterRecord="getRecord"
                                               :multiple-select="true"
                                               :selected-rows="selectedRows"
                                               @delete-method-action="deleteRecord"
                                    >
                                        <template slot="tbody">
                                            <tbody v-show="!apiData.data">
                                            <tr v-for="skeleton in 6">
                                                <td v-for="skeleton in 7">
                                                    <skeleton-loader-vue
                                                        type="rect"
                                                        :height="15"
                                                        :width="50"
                                                        class="m-3"
                                                        animation="fade"
                                                    />
                                                </td>
                                            </tr>
                                            </tbody>
                                            <tbody v-show="apiData.data">
                                            <tr v-for="(record,index) in apiData.data" :key="record.id">
                                                <td>
                                                    <input type="checkbox" class="" v-model="selectedRows"
                                                           :value="record.id" :id="`checked-${record.id}}`">
                                                </td>
                                                <td> @{{++index}}</td>
                                                <td> @{{record.name}}</td>
                                                <td> @{{record.price}}</td>
                                                <td> @{{record.stock_quantity}}</td>
                                                <td> @{{record.category}}</td>
                                                <td class="">
                                                    <div class="pt-1" role="group"
                                                         style="width: 180px; text-align: center;">
                                                        @if(hasPermission(['user_view']))
                                                            <a class="btn btn-info btn-sm"
                                                               :href="`{{url('user/')}}/${record.id}`"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="View">
                                                                <i class="mdi mdi-eye"></i>
                                                            </a>&nbsp;
                                                        @endif
                                                        @if(hasPermission(['user_edit']))
                                                            <a class="btn btn-primary btn-sm"
                                                               :href="`{{url('user/edit')}}/${record.id}`"
                                                               data-toggle="tooltip"
                                                               data-placement="top" title="Edit">
                                                                <i class="dripicons-document-edit"></i>
                                                            </a>&nbsp;
                                                        @endif
                                                        @if(hasPermission(['user_delete']))
                                                            <a class="btn btn-danger btn-sm"
                                                               v-if="record.type !=current_user"
                                                               @click="deleteRecord(record.id)"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Delete">
                                                                <i style="color: white" class="mdi mdi-delete"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>

                                            </tbody>

                                        </template>
                                    </datatable>

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
        // import _ from "lodash";
        //Vue.component('pagination', require('laravel-vue-pagination'));
        var vm = new Vue({
            el: '#app',
            components: {
                'avatar': window.Avatar,
                'skeleton-loader-vue': window.VueSkeletonLoader,
            },
            data() {
                return {
                    current_user: "{{ auth()->user()->type }}",
                    url: '{{route("products.index")}}?',
                    columns: [
                        {
                            label: "@lang('lang.index')",
                            name: 'id',
                            sort: false,
                        },
                        {
                            label: "@lang('lang.name')",
                            name: 'products.name',
                            sort: false,
                            activeSort: true,
                            order_direction: 'desc',
                        },
                        {
                            label: "@lang('lang.price')",
                            name: 'products.price',
                            sort: true,
                            activeSort: true,
                            order_direction: 'desc',
                        },
                        {
                            label: "stock_quantity",
                            name: 'products.stock_quantity',
                            sort: true,
                            activeSort: true,
                            order_direction: 'desc',
                        },
                        {
                            label: "@lang('lang.category')",
                            name: 'products.category',
                            sort: true,
                            activeSort: true,
                            order_direction: 'desc',
                        },
                        {
                            label: "@lang('lang.actions')",
                            name: 'action',
                            sort: false
                        }
                    ],

                    apiData: {},
                    appPerPage: {!! perPage(1) !!},
                    perPage: "{{perPage()}}",
                    page: 1,
                    selectedRows: [],

                }

            },
            mounted: function () {
                this.getRecord();
            },
            methods: {

                /**
                 * get record from api
                 */
                showFilterModal() {
                    $('#filterModal').modal('show');
                    this.getProvinces();
                },
                getRecord: _.debounce((page = vm.page) => {
                    axios.get(vm.url +
                        '&current_page=' +
                        page + '&per_page=' + vm.perPage)
                        .then((response) => {
                            if (response.data) {
                                vm.page = response.data.current_page;
                            }
                            vm.apiData = response.data;
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                }, 200),

                // delete record
                deleteRecord(id = null) {

                    if (id && id != null) {
                        deleteItem(`products/${id}`);
                        this.selectedRows = [];
                    } else {
                        deleteItem(`products/${this.selectedRows}`);
                        this.selectedRows = [];
                    }

                },
                // send data for editing
                editRecord(url = null, id = null) {
                    if (url != null && id != null) {
                        var url = "{{url('/')}}" + "/" + url + "/edit/" + id;

                        window.location = url;
                    }
                }
            }
        });

    </script>
@endsection
