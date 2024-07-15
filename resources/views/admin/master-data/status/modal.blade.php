<div class="modal fade text-left" id="modal-status" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fe fe-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-status" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Status Code: </label>
                    <div class="form-group">
                        <input type="text" id="status_code" name="status_code"
                            class="form-control form-control-sm bg-transparent" value="" readonly>
                    </div>
                    <label>Status Name: </label>
                    <div class="form-group">
                        <input type="text" id="status_name" name="status_name"
                            class="form-control form-control-sm bg-transparent">
                        <p class="text-danger" id="feedback-status_name"></p>
                    </div>

                    <label>Status Type: </label>
                    <div class="form-group">
                        <select name="status_type" id="status_type" class="form-control form-control-sm bg-transparent">
                            <option value="">--Choose Status Type--</option>
                            <option value="PROPOSAL">PROPOSAL</option>
                            <option value="INVOICE">INVOICE</option>
                            <option value="PROJECT">PROJECT</option>
                            <option value="SUBMITTING">SUBMITTING</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-status" class="btn btn-sm btn-success text-white mr-1"
                        onclick="manageData('save')"><i class="fe fe-check fe-16"></i> Submit</button>
                    <button type="submit" id="edit-status" class="btn btn-sm btn-warning text-white mr-1"
                        onclick="manageData('update')"><i class="fe fe-edit fe-16"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
