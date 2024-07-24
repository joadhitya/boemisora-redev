<form action="javascript:void(0)" id="form-homepage" enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="form-control" id="id" name="id" value="{{ $data ? $data->id : '' }}">
    <input type="hidden" class="form-control" id="form_type" name="form_type" value="image">
    <input type="hidden" class="form-control" id="id_master" name="id_master"
        value="{{ $data ? $data->id_master : $master->id }}">
    <div class="row">
        <div class="col-md-4">
            <label for="sequence">Urutan:</label>
            <div class="form-group">
                <input type="text" id="sequence" name="sequence" readonly
                    class="form-control form-control-sm bg-transparent"
                    value="{{ $data ? $data->sequence : $sequence }}">
            </div>
        </div>
        <div class="col-md-8">
            <label for="name">Nama Gambar:</label>
            <div class="form-group">
                <input type="text" id="name" name="name" class="form-control form-control-sm bg-transparent"
                    value="{{ $data ? $data->name : '' }}">
            </div>
        </div>
        <div class="col-md-4">
            <label for="type">Tipe:</label>
            <div class="form-group">
                <select name="type" id="type" class="form-control form-control-sm bg-transparent">
                    <option value="HORIZONTAL {{ $data && $data->type == 'HORIZONTAL' ? 'selected' : '' }}">HORIZONTAL
                    </option>
                    <option value="VERTIKAL" {{ $data && $data->type == 'VERTIKAL' ? 'selected' : '' }}>VERTIKAL
                    </option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <label for="width">Width:</label>
            <div class="form-group">
                <input type="text" id="width" name="width" value="{{ $data ? $data->width : '' }}"
                    class="form-control form-control-sm bg-transparent">
            </div>
        </div>
        <div class="col-md-4">
            <label for="height">Height:</label>
            <div class="form-group">
                <input type="text" id="height" name="height" value="{{ $data ? $data->height : '' }}"
                    class="form-control form-control-sm bg-transparent">
            </div>
        </div>
        <div class="col-md-12">
            <label for="image">Gambar:</label>
            <div class="form-group">
                <input type="file" id="image" name="image" class="form-control-file my-pond">
            </div>
        </div>
    </div>
    <hr>
    <div class="row" id="button-action-add-on">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            @if (!$data)
                <button type="submit" id="add-homepage"
                    class="btn btn-success btn-sm text-uppercase text-white btn-block" onclick="manageData('save')">
                    <i class="fe fe-check mr-2"></i>Save Data
                </button>
            @else
                <button type="submit" id="edit-homepage"
                    class="btn btn-warning btn-sm text-uppercase text-white btn-block" onclick="manageData('update')">
                    <i class="fe fe-edit mr-2"></i>Update Data
                </button>
            @endif
        </div>
    </div>
</form>
