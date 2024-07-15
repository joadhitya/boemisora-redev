<div class="modal fade text-left" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-m modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Video</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fe fe-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-video" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for='title'>Judul Video: </label>
                                <input type="text" id="title" name="title"
                                    class="form-control form-control-sm bg-transparent" value="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for='is_main_video'>Apakah Video Utama? </label>
                                <select type="text" id="is_main_video" name="is_main_video"
                                    class="form-control form-control-sm bg-transparent">
                                <option value="no">Tidak</option>
                                <option value="yes">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for='link_youtube'>Link Youtube: </label>
                                <input type="text" id="link_youtube" name="link_youtube"
                                    class="form-control form-control-sm bg-transparent" value="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Background Link: </label>
                                <textarea class="form-control" id="background_link" name="background_link" rows="4"></textarea>
                            </div>
                        </div>
                        {{-- <div class="col-md-12">
                            <div class="form-group">
                                <label>Konten: </label>
                                <textarea class="form-control" id="content" name="content" rows="4"></textarea>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-video" class="btn btn-sm btn-success text-white mr-1"
                        onclick="manageData('save')"><i class="fe fe-check fe-16"></i> Submit</button>
                    <button type="submit" id="edit-video" class="btn btn-sm btn-warning text-white mr-1"
                        onclick="manageData('update')"><i class="fe fe-edit fe-16"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
