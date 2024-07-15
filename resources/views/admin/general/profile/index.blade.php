@extends('admin.layouts.master')
@section('title', 'Profile')
@section('content')
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <div class="toolbar row ">
                    <div class="col-md-8 col-sm-8 col-8">
                        <h5 class="h5 text-uppercase">Profile</h5>
                    </div>
                    <div class="col-md-4 col-sm-4 col-4">
                        <button id="btn-edit-profile" type="button"
                            class="btn btn-sm btn-primary mr-1 float-right text-uppercase"
                            onclick="openModal('profile','edit')"><i class="fe fe-edit"></i> Edit</button>
                        <button id="btn-back-profile" type="button" style="display: none"
                            class="btn btn-sm btn-warning text-white mr-1 float-right text-uppercase"
                            onclick="openModal('profile','back')"><i class="fe fe-arrow-left"></i> Back</button>

                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="card-body" id="show-data-profile">
                <div class="row">
                    <div class="col-2">
                        <img src="https://www.w3schools.com/howto/img_avatar.png" width="100%" alt="Avatar" style="border-radius: 50%;">
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <span class="mb-0">Username</span>
                                <h6>{{ $data->username }}</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <span class="mb-0">Role</span>
                                <h6>{{ $data->role_name }}</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <span class="mb-0">Email</span>
                                <h6>{{ $data->email }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    {{-- <script src="{{ asset('script/admin/general/index.js') }}"></script> --}}
@endpush
