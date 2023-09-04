@extends('layouts.master')
@section('title', 'Admin Settings')
@section('css')
<style>

    .badge-delete:hover{
        cursor: pointer;
        background-color: rgb(228, 121, 121);
    }



    .category-title{

        font-size: 1.2em;
        font-weight: bold;
    }

</style>
@endsection
@section('content')

    <!-- end page title end breadcrumb -->
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 offset-xl-3">
                    <div class="card">
                        <div class="card-header bg-light">
                            <span class="font-weight-bolder category-title">Change Referral Export Password</span>
                        </div>
                        <div class="card-body" >
                            <form action="{{route('changeReferralExportPassword')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <input type="password" name="oldpassword" class="form-control cus-rounded" placeholder="Previous Password" required minlength="5">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <input type="password" name="newpassword" class="form-control cus-rounded" placeholder="New Password" required minlength="5">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <input type="password" name="confirmpassword" class="form-control cus-rounded" placeholder="Confirm New Password" required minlength="5">
                                    </div>
                                    <div class="col-md-2 offset-md-10 mr-1">
                                        <input type="submit" class="btn btn-primary btn-sm cus-rounded">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- end container-fluid -->
@endsection
@section('js')
@if (session()->has('success'))
    <script>
        toastSuccess("{{ session('success') }}");
    </script>
@endif
@if (session()->has('error'))
    <script>
        toastSuccess("{{ session('error') }}",'error');
    </script>
@endif
@endsection
