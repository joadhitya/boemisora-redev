@extends('admin.layouts.master')
@section('title', 'Content Management - Homepage')
@section('content')
    <div class="col-md-12 ">
        <div class="card shadow">
            <div class="card-header">
                <div class="toolbar row ">
                    {{-- COMPONENT --}}
                    <div class="col-md-4 col-sm-4 col-4">
                        <h5 class="h5 text-uppercase">{{ $data->name }}</h5>
                    </div>

                    <div class="col-md-8 col-sm-8 col-8 ">
                        <button type="button" class="btn btn-sm btn-outline-warning mr-1 float-right text-uppercase"
                            onclick="activityDetail('{{ $data->code }}','manage')"><i class="fe fe-edit"></i> Kelola
                            Konten</button>
                        <button type="button" class="btn btn-sm btn-outline-success mr-1 float-right text-uppercase"
                            onclick="activityDetail('{{ $data->code }}','preview')"><i class="fe fe-eye"></i> Preview
                            Konten</button>
                    </div>
                </div>
            </div>
            <div class="card p-1">
                <div class="card-header">
                    <div class="toolbar row">
                        <div class="col-md-12 col-sm-12 col-12 text-center">{{ $data->description }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card p-2" id="activity-detail-{{ $data->code }}">
                <div class="d-flex text-center p-2">
                    <div class="spinner-border spinner-border text-black mr-2" role="status"> <span
                            class="sr-only">Loading...</span> </div>
                    <h4 for="" class="ml-2">Please Wait ......</h4>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('modal')
    {{-- @include('admin.content-management.profile-company.homepage.modal') --}}
@endsection

@push('page-scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script src="{{ asset('script/admin/general.js') }}"></script>
    <script src="{{ asset('script/admin/content-management.js') }}"></script>
    <script src="{{ asset('script/admin/handle-ckeditor.js') }}"></script>
@endpush
