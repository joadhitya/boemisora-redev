@extends('admin.layouts.master')
@section('title', 'Konten Management General')
@section('content')
    <div class="col-md-12 ">
        <div class="card shadow">
            <div class="card-header">
                <div class="toolbar row ">
                    <div class="col-md-4 col-sm-4 col-4">
                        <h5 class="h5 text-uppercase">General</h5>
                    </div>
                </div>
            </div>
            <div class="card p-1">
                <div class="card-header">
                    <div class="row">
                        <div class="col-xl-3 col-md-3 col-sm-6">
                            <div id="card-carousel" class="card shadow bg-primary text-white border-0 detail"
                                onclick="activityDetail('carousel')">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span id="icon-carousel" class="circle circle-sm bg-primary-light">
                                                <i class="fe fe-24 fe-image text-white mb-0"></i>
                                            </span>
                                        </div>
                                        <div class="col pr-0">
                                            <span id="label-carousel" class="h6 mb-0 text-white">Carousel</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 col-sm-6">
                            <div id="card-information" class="card shadow border-0 detail"
                                onclick="activityDetail('information')">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span id="icon-information" class="circle circle-sm bg-primary">
                                                <i class="fe fe-16 fe-info text-white mb-0"></i>
                                            </span>
                                        </div>
                                        <div class="col pr-0">
                                            <span id="label-information" class="h6 mb-0">Informasi Perusahaan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card p-4" id="activity-general-content">
                <div class="d-flex text-center ">
                    <div class="spinner-border spinner-border text-black mr-2"> <span class="sr-only">Loading...</span>
                    </div>
                    <h4 for="" class="ml-2">Please Wait ......</h4>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('modal')
    {{-- @include('admin.content-management.general.carousel.modal') --}}
    {{-- @include('admin.content-management.profile-company.company-information.modal') --}}
@endsection

@push('page-scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    {{-- <script src="{{ asset('script/admin/general-content.js') }}"></script> --}}
@endpush
