@extends('admin.layouts.master')
@section('title', 'Content Management - Blog')
@section('content')
    <div class="col-md-12 ">
        <div class="card shadow">
            <div class="card-header">
                <div class="toolbar row ">
                    <div class="col-md-6 col-sm-6 col-6">
                        <h5 class="h5 text-uppercase">List Blog</h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6">
                        <button id="create-data-blog" type="button"
                            class="btn btn-sm btn-primary mr-1 float-right text-uppercase"
                            onclick="openForm('blog','add')"><i class="fe fe-plus"></i> Tambah Data</button>
                        <button id="back-data-blog" style="display: none" type="button"
                            class="btn btn-sm btn-warning mr-1 text-white float-right text-uppercase"
                            onclick="openForm('blog','back')"><i class="fe fe-skip-back"></i> Kembali</button>
                    </div>
                </div>
            </div>

            <div class="card-body pt-2" id="show-data-blog">
                <div class="d-flex text-center ">
                    <div class="spinner-border spinner-border text-black mr-2"> <span class="sr-only">Loading...</span>
                    </div>
                    <h4 for="" class="ml-2">Please Wait ......</h4>
                </div>
            </div>
            <div class="card-body py-0 px-1" id="activity-detail-blog" style="display: none">
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
@endsection

@push('page-scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('script/admin/handle-ckeditor.js') }}"></script>
    <script src="{{ asset('script/admin/blog.js') }}"></script>
    <script src="{{ asset('script/admin/general.js') }}"></script>
@endpush
