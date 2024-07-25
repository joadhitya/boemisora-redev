<div class="col-md-12 p-4">
    <form action="javascript:void(0)" id="form-blog" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="id" name="id" value="">
        <div class="row">
            <div class="col-md-6">
                <label>Title: </label>
                <div class="form-group">
                    <input type="text" id="title" name="title"
                        class="form-control form-control-sm bg-transparent" value="">
                </div>
            </div>
            <div class="col-md-6">
                <label>Headline: </label>
                <div class="form-group">
                    <input type="text" id="headline" name="headline"
                        class="form-control form-control-sm bg-transparent" value="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Kategori Artikel: </label>
                <div class="form-group">
                    <select name="id_category[]" multiple id="id_category"
                        class="form-control form-control-sm bg-transparent select2-multi">
                        <option value="">--Silahkan Pilih Kategori--</option>
                        @foreach ($categories as $ca)
                            <option value="{{ $ca->id }}">{{ $ca->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <label>Keyword: </label>
                <div class="form-group">
                    <input type="text" id="keyword" name="keyword"
                        class="form-control form-control-sm bg-transparent" value="">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Tanggal:</label>
                    <input type="date" id="date_archieve" name="date_archieve"
                        class="form-control form-control-sm bg-transparent" value="">
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-6">
                <label>Meta Title: </label>
                <div class="form-group">
                    <input type="text" id="meta_title" name="meta_title"
                        class="form-control form-control-sm bg-transparent" value="">
                </div>
            </div>
            <div class="col-md-6">
                <label>Meta Keywords: </label>
                <div class="form-group">
                    <input type="text" id="meta_keyword" name="meta_keyword"
                        class="form-control form-control-sm bg-transparent" value="">
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-6">
                <label for="image">Gambar:</label>
                <div class="form-group">
                    <input type="file" id="image" name="image" class="form-control-file my-pond">
                </div>
            </div>
            <div class="col-md-6">
                <label for="description">Deskripsi:</label>
                <div class="form-group">
                    <textarea name="" id="description" name="description" cols="30" rows="4"
                        class="form-control form-control-sm bg-transparent"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card-body">
                <ul class="nav nav-tabs mb-3" id="contentTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="id-content-tab" data-toggle="tab" href="#id-content"
                            role="tab" aria-controls="id-content" aria-selected="true">Indonesia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="en-content-tab" data-toggle="tab" href="#en-content" role="tab"
                            aria-controls="en-content" aria-selected="false">English</a>
                    </li>
                </ul>
                <div class="tab-content" id="contentTabContent">
                    <div class="tab-pane fade show active" id="id-content" role="tabpanel"
                        aria-labelledby="id-content-tab">
                        <textarea class="form-control form-control-sm bg-transparent" rows="10" id="content_id" name="content_id">TEST</textarea>
                    </div>
                    <div class="tab-pane fade" id="en-content" role="tabpanel" aria-labelledby="en-content-tab">
                        <textarea class="form-control form-control-sm bg-transparent" rows="10" id="content_en" name="content_en">TEST EN</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <button type="submit" id="add-blog" class="btn btn-sm btn-block btn-success text-white mr-1"
                    onclick="manageData('save')"><i class="fe fe-check fe-16"></i> Submit</button>
                <button type="submit" id="edit-blog" class="btn btn-sm btn-block btn-warning text-white mr-1"
                    onclick="manageData('update')"><i class="fe fe-edit fe-16"></i> Update</button>
            </div>
        </div>
    </form>
</div>



@push('page-scripts')
    <script>
        $('.select2-multi').select2({
            multiple: true,
            theme: 'bootstrap4',
        });
    </script>
@endpush
