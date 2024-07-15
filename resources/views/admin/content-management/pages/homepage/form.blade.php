<form action="javascript:void(0)" id="form-about-us" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="id_detail" name="id" value="">
    <div class="row">
        <div class="col-md-4">
            <input type="hidden" class="form-control" id="id" name="id"
                value="{{ $data ? $data->id : '' }}">
            <label>Kode: </label>            
            <div class="form-group">
                <input type="text" id="code" name="code" readonly class="form-control form-control-sm bg-transparent"
                    value="{{ $data ? $data->code : '' }}">
            </div>
        </div>
        <div class="col-md-8">
            <label>Nama Konten: </label>
            <div class="form-group">
                <input type="text" id="name" name="name" class="form-control form-control-sm bg-transparent"
                    value="{{ $data ? $data->name : '' }}">
            </div>
        </div>
        <div class="col-md-2">
            <label>Tipe: </label>
            <div class="form-group">
                <select name="type" id="type" class="form-control form-control-sm bg-transparent">
                    <option value="label">label</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <label>Jenis Konten: </label>
            <div class="form-group">
                <select name="data_type" id="data_type" class="form-control form-control-sm bg-transparent"
                    onchange="chooseCategoryContent()">
                    <option value="undefined">Tidak tahu</option>
                    <option value="html">HTML</option>
                    <option value="json">JSON</option>
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <label>Judul Link: </label>
            <div class="form-group">
                <input type="text" id="link_title" name="link_title" value="{{ $data ? $data->link_title : '' }}"
                    class="form-control form-control-sm bg-transparent">
            </div>
        </div>
        <div class="col-md-4">
            <label>URL Link: </label>
            <div class="form-group">
                <input type="text" id="link_url" name="link_url" value="{{ $data ? $data->link_url : '' }}"
                    class="form-control form-control-sm bg-transparent">
            </div>
        </div>
        <div class="col-md-2">
            <label>Gambar: </label>
            <div class="form-group">
                <input type="file" id="image" name="image"
                    class="form-control form-control-sm bg-transparent">
            </div>
        </div>
        <div class="col-md-12">
            <label>Deskripsi: </label>
            <div class="form-group">
                <input type="text" id="description" name="description" value="{{ $data ? $data->description : '' }}"
                    class="form-control form-control-sm bg-transparent">
            </div>
        </div>
        <div class="col-md-12">
            <label>Konten: </label>
            <div class="form-group">
                <textarea class="form-control form-control-sm bg-transparent" rows="10" name="content" id="content">{{ $data ? $data->content : '' }}</textarea>
            </div>
        </div>
    </div>
    <hr>
    <div class="row" id="button-action-add-on">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            @if (!$data)
                <button type="submit" id="add-about-us"
                    class="btn text-uppercase btn-success btn-sm text-white btn-block" onclick="manageData('save')"><i
                        class="fe fe-check mr-2"></i>Save Data</button>
            @else
                <button type="submit" id="edit-about-us"
                    class="btn text-uppercase btn-warning btn-sm text-white btn-block" onclick="manageData('update')"><i
                        class="fe fe-edit mr-2"></i>Update Data</button>
            @endif
        </div>
    </div>
</form>
