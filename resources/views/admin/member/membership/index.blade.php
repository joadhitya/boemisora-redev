@extends('admin.layouts.master')
@section('title', 'Data Membership')
@section('content')
    <div class="col-md-12 ">
        <div class="card shadow">
            <div class="card-header">
                <div class="toolbar row ">
                    <div class="col-md-6 col-sm-6 col-6">
                        <h5 class="h5 text-uppercase">List Membership</h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6">
                        <button id="create-mb-member" type="button"
                            class="btn btn-sm btn-primary mr-1 float-right text-uppercase"
                            onclick="openForm('mb-member','add')"><i class="fe fe-plus"></i> Tambah Data</button>
                        <button id="back-mb-member" style="display: none" type="button"
                            class="btn btn-sm btn-warning mr-1 text-white float-right text-uppercase"
                            onclick="openForm('mb-member','back')"><i class="fe fe-skip-back"></i> Kembali</button>
                    </div>
                </div>
            </div>

            <div class="card-body pt-2" id="show-data-mb-member">
                <div class="d-flex text-center ">
                    <div class="spinner-border spinner-border text-black mr-2"> <span class="sr-only">Loading...</span>
                    </div>
                    <h4 for="" class="ml-2">Please Wait ......</h4>
                </div>
            </div>
            <div class="card-body pt-2" id="form-mb-member" style="display: none">
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
    {{-- @include('admin.master-data.shooting-field.modal') --}}
@endsection

@push('page-scripts')
    <script src="{{ asset('script/admin/general.js') }}"></script>
    <script src="{{ asset('script/admin/member.js') }}"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <script>
        const inputElement = document.querySelector('input[id="fileUpload"]');
        const pond = FilePond.create(inputElement);

        // Optionally configure FilePond
        FilePond.setOptions({
            server: {
                url: '/upload', // Your server upload endpoint
                process: '/process', // The processing route
                revert: '/revert', // The revert route
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // For Laravel or other frameworks requiring CSRF token
                }
            }
        });
    </script>
@endpush
