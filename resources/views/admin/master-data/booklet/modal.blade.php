<div class="modal fade text-left" id="modal-booklet" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Booklet</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fe fe-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-booklet" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Kategori: </label>
                    <div class="form-group">
                        <select name="id_category" id="id_category" class="form-control form-control-sm bg-transparent">
                            <option value="">--Silahkan Pilih Kategori--</option>
                            @foreach ($category_booklets as $cf)
                                <option value="{{ $cf->id }}">{{ $cf->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="section-sub-category">
                        <label>Sub Kategori: </label>
                        <div class="form-group">
                            <select name="id_sub_category" id="id_sub_category"
                                class="form-control form-control-sm bg-transparent">
                                <option value="">--Silahkan Pilih Sub Kategori--</option>
                            </select>
                        </div>
                    </div>

                    {{-- <label>Kode: </label>
                    <div class="form-group">
                        <input type="text" id="code" name="code"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div> --}}
                    <label>Nama: </label>
                    <div class="form-group">
                        <input type="text" id="name" name="name"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                    <label>Link: </label>
                    <div class="form-group">
                        <input type="text" id="link" name="link"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                    {{-- <div class="form-group">
                        <label for="logo">Logo:</label>
                        <input type="file" id="logo" name="logo" class="form-control-file">
                    </div> --}}
                    <label>Deskripsi: </label>
                    <div class="form-group">
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-booklet" class="btn btn-sm btn-success text-white mr-1"
                        onclick="manageData('save')"><i class="fe fe-check fe-16"></i> Submit</button>
                    <button type="submit" id="edit-booklet" class="btn btn-sm btn-warning text-white mr-1"
                        onclick="manageData('update')"><i class="fe fe-edit fe-16"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
