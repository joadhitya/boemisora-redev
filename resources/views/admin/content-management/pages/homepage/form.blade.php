<div class="card-body pt-2">
    <div class="card-header p-0 pb-2">
        <div class="toolbar row">
            <div class="col-6">
                <h6 class="text-uppercase">Form Content - Homepage</h6>
            </div>
        </div>
    </div>
    <div class="card-body px-0">
        <form action="javascript:void(0)" id="form-homepage" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id"
                value="{{ $data ? $data->id : '' }}">

            <input type="hidden" class="form-control" id="form_type" name="form_type" value="content">
            <div class="row">
                <div class="col-md-4">
                    <label for="code">Kode:</label>
                    <div class="form-group">
                        <input type="text" id="code" name="code" readonly
                            class="form-control form-control-sm bg-transparent" value="{{ $data ? $data->code : '' }}">
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="name">Nama Konten:</label>
                    <div class="form-group">
                        <input type="text" id="name" name="name"
                            class="form-control form-control-sm bg-transparent" value="{{ $data ? $data->name : '' }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="type">Tipe:</label>
                    <div class="form-group">
                        <select name="type" id="type" class="form-control form-control-sm bg-transparent">
                            <option value="label">Label</option>
                            <option value="button">Button</option>
                            <option value="image">Gambar</option>
                            <option value="description">Deskripsi</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="link_title">Judul Link:</label>
                    <div class="form-group">
                        <input type="text" id="link_title" name="link_title"
                            value="{{ $data ? $data->link_title : '' }}"
                            class="form-control form-control-sm bg-transparent">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="link_url">URL Link:</label>
                    <div class="form-group">
                        <input type="text" id="link_url" name="link_url" value="{{ $data ? $data->link_url : '' }}"
                            class="form-control form-control-sm bg-transparent">
                    </div>
                </div>
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
                            <textarea class="form-control form-control-sm bg-transparent" rows="10"id="content_id" name="content_id">{{ $data ? $data->content_id : '' }}</textarea>
                        </div>
                        <div class="tab-pane fade" id="en-content" role="tabpanel" aria-labelledby="en-content-tab">
                            <textarea class="form-control form-control-sm bg-transparent" rows="10" id="content_en" name="content_en">{{ $data ? $data->content_en : '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row" id="button-action-add-on">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    @if (!$data)
                        <button type="submit" id="add-homepage"
                            class="btn btn-success btn-sm text-uppercase text-white btn-block"
                            onclick="manageData('save')">
                            <i class="fe fe-check mr-2"></i>Save Data
                        </button>
                    @else
                        <button type="submit" id="edit-homepage"
                            class="btn btn-warning btn-sm text-uppercase text-white btn-block"
                            onclick="manageData('update')">
                            <i class="fe fe-edit mr-2"></i>Update Data
                        </button>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
