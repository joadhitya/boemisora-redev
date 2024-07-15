<div class="modal fade text-left" id="modal-dashboard" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Update Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fe fe-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="id" value="">
                <div id="modal-dashboard-body" class="modal-body">

                </div>
            </form>
        </div>
    </div>
</div>
