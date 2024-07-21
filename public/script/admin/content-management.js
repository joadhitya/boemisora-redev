

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

const getUrl = () => {
    var url = window.location.href;
    var arr = url.split("/");
    var url4 = arr[4];
    var url5 = arr[5];
    var url6 = arr[6];
    var url6 = arr[6];
    dataUrl = {
        url4,
        url5,
        url6,
    };
    return { url4, url5, url6 };
};
const data = getUrl();
const url = `/admin/${data.url4}/${data.url5}`;



$(document).ready(function () {
    activityDetail(`${data.url5}`, 'preview')
});

const activityDetail = (type, action, id = null) => {
    $(`#activity-detail-${type}`).html(loadingElement)
    var urlTarget;
    if (action == 'preview' || action == 'manage') {
        urlTarget = `${url}/${action}`
    } else {
        urlTarget = `${url}/${id}`
    }
    $.ajax({
        type: "get",
        url: urlTarget,
        data: {
            type,
            action,
            id
        },
        success: function (response) {
            if (action == 'preview' || action == 'manage') {
                $(`#activity-detail-${type}`).html(response)
                $(`#table-${data.url5}`).DataTable();
            } else {
                $(`#activity-detail-${type}`).html(response)

                pondFileUpload()
                var content_id = $("#content_id").val();
                handleCkEditor("edit", content_id, 'content_id')

                var content_en = $("#content_en").val();
                handleCkEditor("edit", content_en, 'content_en')
            }
        }, error: function (err) {
            console.log(err)
        }
    });
}


function manageData(type, id = null) {
    switch (type) {
        case "save":
            $(`#form-${data.url6}`).on("submit", function (e) {
                e.preventDefault();
                $(`#add-${data.url6}`).attr("disabled", true);
                var formData = new FormData(this);
                var pondFiles = $('.my-pond').filepond('getFiles');
                pondFiles.forEach(fileItem => {
                    formData.append('image', fileItem.file);
                });

                $.ajax({
                    url: url,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        handlingSuccessResponse("add", response.message)
                        $(`#modal-${data.url6}`).modal("hide");
                    },
                    error: function (err) {
                        console.log(err);
                        $(`#add-${data.url6}`).attr("disabled", false);
                        $(`#form-${data.url6}`).off("submit");
                        let err_log = err.responseJSON.errors;
                    }
                });
            });
            break;
        case "update":
            var id = $("#id").val();
            $(`#form-${data.url5}`).on("submit", function (e) {
                e.preventDefault();
                $(`#edit-${data.url5}`).attr("disabled", true);
                var formData = new FormData(this)
                var pondFiles = $('.my-pond').filepond('getFiles');
                pondFiles.forEach(fileItem => {
                    formData.append('image', fileItem.file);
                });
                var checkAdditionalFile = false

                for (let data of formData) {
                    if (data[1] instanceof File) {
                        checkAdditionalFile = true
                    }
                }
                let ajaxParams = {
                    url: checkAdditionalFile ? `${url}/${id}?_method=PATCH` : `${url}/${id}`,
                    type: checkAdditionalFile ? 'post' : 'patch',
                    data: checkAdditionalFile ? formData : $(this).serialize(),
                    dataType: "json",
                    success: function (response) {
                        handlingSuccessResponse("edit", response.message);
                        createLogRecord('success', response, url);
                    },
                    error: function (err) {
                        console.log(err);
                        $(`#edit-${data.url5}`).attr("disabled", false);
                        $(`#form-${data.url5}`).off("submit");
                        let err_log = err.responseJSON.errors;
                    }
                }

                if (checkAdditionalFile) {
                    ajaxParams.contentType = false
                    ajaxParams.processData = false
                }

                $.ajax(ajaxParams);

            });
            break;
        case "delete":
            $.ajax({
                type: "post",
                url: `${url}/check-category-content`,
                data: { id },
                dataType: "json",
                success: function (response) {
                    console.log(response)
                    if (response.status == 400) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Tidak dapat menghapus konten'
                        })
                        return;
                    }

                    Swal.fire({
                        title: "Apakah anda yakin ingin menghapus data?",
                        text: "Data yang di hapus tidak dapat dikembalikan",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "red",
                        cancelButtonColor: "grey",
                        confirmButtonText: "Delete",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: `${url}/${id}`,
                                method: "delete",
                                dataType: "json",
                                success: function (response) {
                                    handlingSuccessResponse("delete", response.message)
                                },
                                error: function (err) {
                                    console.log(err);
                                }
                            });
                        }
                    });

                },
                error: function (err) {
                    console.log(err)
                }
            });
            break;

        case "hide":
            Swal.fire({
                title: "Apakah anda yakin ingin tidak menampilkan konten?",
                text: "Konten akan hilang dari tampilan website client",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "red",
                cancelButtonColor: "grey",
                confirmButtonText: "Ya hilangkan!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: `${url}/activity-detail`,
                        data: {
                            type: 'hide',
                            action: 'hide',
                            id
                        },
                        success: function (response) {
                            Toast.fire({
                                icon: "success",
                                title: 'Berhasil menyembunyikan konten website'
                            });
                            $(`#activity-detail-${data.url6}`).html(response);
                            $(`#table-${data.url6}`).DataTable();
                        }, error: function (err) {
                            console.log(err)
                        }
                    });
                }
            });

            break;
        case "unhide":
            Swal.fire({
                title: "Apakah anda yakin ingin menampilkan konten?",
                text: "Konten akan tampil pada website client",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "green",
                cancelButtonColor: "grey",
                confirmButtonText: "Ya tampilkan!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: `${url}/activity-detail`,
                        data: {
                            type: 'unhide',
                            action: 'unhide',
                            id
                        },
                        success: function (response) {
                            Toast.fire({
                                icon: "success",
                                title: 'Berhasil menampilkan konten website'
                            });
                            $(`#activity-detail-${data.url6}`).html(response)

                            $(`#table-${data.url6}`).DataTable();

                            // activityDetail(`${data.url6}`, 'update')
                        }, error: function (err) {
                            console.log(err)
                        }
                    });
                }
            });

            break;
    }
}



let handlingSuccessResponse = (type, message) => {
    switch (type) {
        case "add":
            activityDetail(`${data.url6}`, 'update')
            $(`#${type}-${data.url6}`).attr("disabled", false);
            $(`#form-${data.url6}`).off("submit");
            Toast.fire({
                icon: "success",
                title: message
            });
            break;
        case "edit":
            activityDetail(`${data.url5}`, 'manage')
            $(`#${type}-${data.url5}`).attr("disabled", false);
            $(`#form-${data.url5}`).off("submit");
            $(`#form-${data.url5}`).fadeOut();
            Toast.fire({
                icon: "success",
                title: message
            });
            break;
        case "delete":
            activityDetail(`${data.url6}`, 'update')
            Toast.fire({
                icon: "success",
                title: message
            });
            break;
        default:
            break;
    }

}

