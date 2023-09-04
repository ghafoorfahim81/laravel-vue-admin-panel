@extends('backend.layouts.master')
@section('title', 'Category List')
@section('css')

<link href="{{ asset('css/vue-select.css') }}" rel="stylesheet" type="text/css"/>
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
                                        @if(hasPermission(['category_create']))
                                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light"
                                                @click="openCreateModal">@lang('lang.add') @lang('lang.category')</button>&nbsp
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class=" ">
                                <datatable ref="child" :per-page="{{perPage()}}" :no-record-found-text="'@lang('lang.no_record_found')'" :per-page-text="'@lang('lang.show')'" :showing-text="'@lang('lang.showing')'" :from-text="'@lang('lang.from')'" :to-text="'@lang('lang.to')'" :record-text="'@lang('lang.record')'" :app-per-page="{!! perPage(1) !!}" :columns="columns" :data="apiData" @pagination-change-page="getRecord" :limit="1" :filterRecord="getRecord" :multiple-select="true" :selected-rows="selectedRows" @delete-method-action="deleteRecord">
                                    <template slot="tbody">
                                        <tbody v-show="!apiData.data">
                                            <tr v-for="skeleton in 4">
                                                <td>
                                                    <skeleton-loader-vue
                                                        type="rect"
                                                        :height="15"
                                                        :width="50"
                                                        class="m-3"
                                                        animation="fade"
                                                        />
                                                </td>

                                                <td>
                                                <skeleton-loader-vue
                                                        type="circle"
                                                        :height="65"
                                                        :width="65"
                                                        class="m-3"
                                                        animation="fade"
                                                        />
                                                </td>

                                                <td>
                                                    <skeleton-loader-vue
                                                        type="rect"
                                                        :height="15"
                                                        :width="50"
                                                        class="m-3"
                                                        animation="fade"
                                                        />
                                                </td>

                                                <td>
                                                    <skeleton-loader-vue
                                                        type="rect"
                                                        :height="15"
                                                        :width="50"
                                                        class="m-3"
                                                        animation="fade"
                                                        />
                                                </td>

                                                <td>
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
                                                    <input type="checkbox" class="" v-model="selectedRows" :value="record.id" :id="`checked-${record.id}}`">

                                                </td>
                                                <td> @{{++index}}</td>
                                                <td> @{{record.name}}</td>
                                                <td> @{{record.description}}</td>
                                                <td class="">
                                                    <div class="p-1" role="group" style="width: 180px; text-align: center;">

                                                        @if(hasPermission(['category_edit']))

                                                        <button type="button" class="btn btn-primary btn-sm" @click="showUpdateModal(record.id)"><i class="dripicons-document-edit"></i></button>&nbsp
                                                        @endif
                                                        @if(hasPermission(['category_delete']))
                                                        <a class="btn btn-danger btn-sm" @click="deleteRecord(record.id)" data-toggle="tooltip" data-placement="top" title="Delete">
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
    <!-- Small modal -->

    <div class="modal fade bs-example-modal-center" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"  >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" v-if="is_update">@lang('lang.update') @lang('lang.category')</h5>
                    <h5 class="modal-title mt-0" v-else>@lang('lang.create') @lang('lang.category')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="hideModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <v-select  :options="categories" label="name" v-model="selected_category" class="mb-2" placeholder="Parent"></v-select>
                    <input type="text" placeholder="@lang('lang.name')" class="form-control mb-2" v-model="form.name">
                    <textarea cols="30" rows="10" placeholder="@lang('lang.description')" class="form-control" v-model="form.description"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal" @click="hideModal()">Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" @click="update()" data-dismiss="modal" v-if="is_update">Update</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" :disabled="!form.name" @click="save()" data-dismiss="modal" v-else>Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection
@section('js')
<script>
    //Vue.component('pagination', require('laravel-vue-pagination'));
    var vm = new Vue({
        el: '#app',
        components: {
            'avatar': window.Avatar,
            'skeleton-loader-vue': window.VueSkeletonLoader,
        },
        data() {
            return {
                url: '{{route("categories.index")}}?',
                columns: [
                    {
                        label: "@lang('lang.index')",
                        name: 'id',
                        sort: false,
                    },
                    {
                        label: "@lang('lang.name')",
                        name: 'name',
                        sort: true,
                        activeSort: true,
                        order_direction: 'desc',
                    },
                    {
                        label: "@lang('lang.description')",
                        name: 'description',
                        sort: false,
                    },
                    {
                        label: "@lang('lang.actions')",
                        name: 'action',
                        sort: false
                    }
                ],

                apiData: {},
                appPerPage: '{!!perPage(1) !!}',
                perPage: "{{perPage()}}",
                selected_category:null,
                page: 1,
                selectedRows: [],
                form:{
                    name:null,
                    description:null,
                    parent_id:null,
                },
                is_update:false,
            }

        },
        mounted() {
            this.getRecord();

        },
        methods: {

            openCreateModal(){
                $('#add_modal').modal('show');
                this.getDropdownItem(['categories']);
                console.log('this is category',this.categories)
            },
            save() {
                this.form.parent_id = this.selected_category?this.selected_category.id:null;
                axios.post("{{route('categories.store')}}", this.form).then((response)=>{
                    console.log('this is response', response.data);
                    if(response.data.status==201){
                        toastSuccess(response.data.message);
                        $('#add_modal').modal('hide')
                        this.reset();
                        this.getRecord();
                    }
                    else{
                        // toastSuccess(response.data.message,'warning');
                    }
                });
            },
            update() {
                $('#add_modal').modal('hide');
                axios.post("{{route('categories.update','')}}"+"/"+this.form.id, this.form).then(()=>{
                    this.is_update = false;
                    this.reset();
                    this.getRecord();
                });
            },
            reset(){
                this.form.name          = null;
                this.form.description   = null;
            },
            showUpdateModal(id=0){
                this.is_update = true;
                axios.get("{{route('categories.edit','')}}"+"/"+id).then(data=>{
                    console.log(data);
                    this.form = data.data;
                })
                $('#add_modal').modal('show')
            },
            hideModal(){
                $('#add_modal').modal('hide');
                this.reset();
            },
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
                        console.log('response',response);
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
                    deleteItem(`expenseCategory/${id}`);
                    this.selectedRows = [];
                } else {
                    deleteItem(`expenseCategory/multiple`, this.selectedRows);
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
