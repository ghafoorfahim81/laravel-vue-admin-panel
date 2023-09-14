@extends('backend.layouts.master')
@section('title', __('lang.add').' '.__('lang.siteInfo'))
@section('css')
    <link href="{{ asset('css/vue-select.css') }}" rel="stylesheet" type="text/css"/>

@endsection
@section('content')

    <div class="page-content-wrapper"  >
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <form action="{{route('site-info.store')}}" method="post" id="userForm"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body" style="padding-bottom: 0px">
                                <div class="card-body client-nav">
                                    <div class="needs-validation">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="title"
                                                           name="title"
                                                           value="{{$siteInfo->title??''}}" >
                                                    <label style="color:#483D8B;font-weight: bold" for="title">Title</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                     <textarea class="form-control"
                                                               id="description"
                                                               name="description">{{$siteInfo->description??''}}</textarea>
                                                    <label style="color:#483D8B;font-weight: bold" for="description">Description</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="slogan"
                                                           name="slogan"
                                                           value="{{$siteInfo->slogan??''}}" >
                                                    <label style="color:#483D8B;font-weight: bold" for="slogan">Slogan</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="email"
                                                           name="email"
                                                           value="{{$siteInfo->email??''}}"  >
                                                    <label style="color:#ea4335;font-weight: bold" for="email">Email</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="contact_number"
                                                           name="contact_number"
                                                           value="{{$siteInfo->contact_number??''}}"  >
                                                    <label style="color:#0a75ad;font-weight: bold" for="contact_number">Contact Number</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <textarea class="form-control"
                                                              id="address"
                                                              name="address">{{$siteInfo->address??''}}</textarea>
                                                    <label style="color:#008080;font-weight: bold" for="address">Address</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                           name="logo"
                                                           id="validationCustomFile">
                                                    <label class="custom-file-label" for="validationCustomFile">Select Logo...</label>
                                                    <div class="invalid-feedback">
                                                        Example invalid custom file feedback
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="facebook"
                                                           name="facebook"
                                                           value="{{$siteInfo->facebook??''}}"  >
                                                    <label style="color:#3b5998;font-weight: bold" for="facebook">Facebook</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="youtube"
                                                           name="youtube"
                                                           value="{{$siteInfo->youtube??''}}"  >
                                                    <label style="color:#cd201f;font-weight: bold" for="youtube">Youtube</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="instagram"
                                                           name="instagram"
                                                           value="{{$siteInfo->instagram??''}}"  >
                                                    <label style="color:#3f729b;font-weight: bold" for="instagram">Instagram</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="twitter"
                                                           name="twitter"
                                                           value="{{$siteInfo->twitter??''}}"  >
                                                    <label style="color:dodgerblue;font-weight: bold" for="twitter">twitter</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="linkedin"
                                                           name="linkedin"
                                                           value="{{$siteInfo->linkedin??''}}"  >
                                                    <label style="color:#0077b5;font-weight: bold" for="linkedin">linkedin</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="tiktok"
                                                           name="tiktok"
                                                           value="{{$siteInfo->tiktok??''}}"  >
                                                    <label style="color:dodgerblue;font-weight: bold" for="tiktok">tiktok</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="whatsapp"
                                                           name="whatsapp"
                                                           value="{{$siteInfo->whatsapp??''}}"  >
                                                    <label style="color:#43d854;font-weight: bold" for="whatsapp">whatsapp</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="wechat"
                                                           name="wechat"
                                                           value="{{$siteInfo->wechat??''}}" >
                                                    <label style="color:#09B83E;font-weight: bold" for="wechat">wechat</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="telegram"
                                                           name="telegram"
                                                           value="{{$siteInfo->telegram??''}}"  >
                                                    <label style="color:#00405d;font-weight: bold" for="telegram">telegram</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="snapchat"
                                                           name="snapchat"
                                                           value="{{$siteInfo->snapchat??''}}" >
                                                    <label style="color:yellowgreen;font-weight: bold" for="snapchat">snapchat</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="pinterest"
                                                           name="pinterest"
                                                           value="{{$siteInfo->pinterest??''}}" >
                                                    <label style="color:#bd081c;font-weight: bold" for="pinterest">pinterest</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="reddit"
                                                           name="reddit"
                                                           value="{{$siteInfo->reddit??''}}" >
                                                    <label style="color:#ff4500;font-weight: bold" for="reddit">reddit</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="quora"
                                                           name="quora"
                                                           value="{{$siteInfo->quora??''}}" >
                                                    <label style="color:#B92B27;font-weight: bold" for="quora">quora</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="twitch"
                                                           name="twitch"
                                                           value="{{$siteInfo->twitch??''}}" >
                                                    <label style="color:#6441a5;font-weight: bold" for="twitch">twitch</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="tumblr"
                                                           name="tumblr"
                                                           value="{{$siteInfo->tumblr??''}}" >
                                                    <label style="color:#00405d;font-weight: bold" for="tumblr">tumblr</label>
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

                                <button class="btn btn-info" type="submit">
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

