@extends('admin.layouts.master')
@section('title', 'Setting Profile')
@section('content')
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <div class="toolbar row ">
                    <div class="col-md-8 col-sm-8 col-8">
                        <h5 class="h5 text-uppercase">Setting Profile</h5>
                    </div>
                    <div class="col-md-4 col-sm-4 col-4">
                        <button id="btn-edit-setting" type="button"
                            class="btn btn-sm btn-primary mr-1 float-right text-uppercase"
                            onclick="openModal('setting','edit')"><i class="fe fe-edit"></i> Edit</button>
                        <button id="btn-back-setting" type="button" style="display: none"
                            class="btn btn-sm btn-warning text-white mr-1 float-right text-uppercase"
                            onclick="openModal('setting','back')"><i class="fe fe-arrow-left"></i> Back</button>

                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="card-body" id="show-data-setting">
                <div class="row">
                    <div class="col-2 mb-3">
                        <img src="https://www.w3schools.com/howto/img_avatar.png" width="100%" alt="Avatar"
                            style="border-radius: 50%;">
                    </div>
                    <div class="col-10 my-auto mb-3">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <button type="button" class="btn btn-primary">Change</button>
                            </div>
                            <div class="col-12">
                                <button type="button" class="btn btn-outline-primary">Remove</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                                <span class="mb-0">Username</span>
                                <input type="input" class="form-control" value="{{ $data->username }}">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                                <span class="mb-0">Role</span>
                                <h6>{{ $data->role_name }}</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                                <span class="mb-0">Email</span>
                                <h6>{{ $data->email }}</h6>
                            </div>
                        </div>
                        <hr />
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <span class="mb-0">Old Password</span>
                                        <input type="password" class="form-control" value="">
                                    </div>
                                    <div class="col-12 mb-4">
                                        <span class="mb-0">New Password</span>
                                        <input type="password" class="form-control" value="">
                                    </div>
                                    <div class="col-12 mb-4">
                                        <span class="mb-0">Confirm New Password</span>
                                        <input type="password" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <span class="mb-0"><b>Password requirements</b></span>
                                <p>To create a new password, you have to meet all of the following requirements:
                                    <ul>
                                        <li>Minimum 8 character</li>
                                        <li>At least one special character</li>
                                        <li>At least one number</li>
                                        <li>Can't be same as a previous password</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                        <hr/>
                    </div>
                    <div class="col-12 text-right">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        <button type="button" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    {{-- <script src="{{ asset('script/admin/general/index.js') }}"></script> --}}
@endpush
