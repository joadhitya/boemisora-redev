$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$(document).on(function () {
    // getNotification()
});


// REUSABLE ELEMENT


function successResponse(type, target, message, id = null, url) {
    $(`#modal-${target}`).modal("hide");
    $(`#form-${target}`).unbind("submit");
    displayData(`${url}`, target, id);
    if (type == 'add') {
        $(`#add-${target}`).attr("disabled", false);
        $(`#form-${target}`)[0].reset();
        $(`#btn-back-${target}`).hide();
        $(`#btn-add-${target}`).show();
        $(`#action-data-${target}`).hide();
        $(`#show-data-${target}`).show();
    }
    Toast.fire({
        icon: "success",
        title: message
    });
};


function createLogActivity(activity_name, activity_endpoint, activity_method, activity_module, request_body = null) {
    $.ajax({
        type: "post",
        url: "/admin/log-management/log-activity",
        data: {
            activity_endpoint,
            activity_method,
            activity_name,
            activity_module,
            request_body
        },
        dataType: "json",
        success: function (response) {
            console.log(response)
        },
        error: function (err) {
            console.log(err)
        }
    });
}

function createLogError(error_type, error_endpoint, error_method, error_module, error_name, request_body = null, error_message) {
    $.ajax({
        type: "post",
        url: "/admin/log-management/log-error",
        data: {
            error_type, error_endpoint, error_method, error_module, error_name, request_body, error_message
        },
        dataType: "json",
        success: function (response) {
            Swal.fire(
                'Something Went Wrong',
                `Plase Contact Admin PT Rhema Graha Indah for Ticket : ${response} `,
                'error'
            )
        },
        error: function (err) {
            console.log(err)
        }
    });
}

function createNotification(user_id, user_from, icon_notification, header, message) {
    $.ajax({
        type: "post",
        url: "/admin/general/notification",
        data: {
            user_id, user_from, icon_notification, header, message
        },
        dataType: "json",
        success: function (response) {
            getNotification()
        },
        error: function (err) {
            console.log(err)
        }
    });
}

function timeSince(date) {
    var seconds = Math.floor((new Date() - date) / 1000);
    var interval = seconds / 31536000;
    if (interval > 1) {
        return Math.floor(interval) + " years";
    }
    interval = seconds / 2592000;
    if (interval > 1) {
        return Math.floor(interval) + " months";
    }
    interval = seconds / 86400;
    if (interval > 1) {
        return Math.floor(interval) + " days";
    }
    interval = seconds / 3600;
    if (interval > 1) {
        return Math.floor(interval) + " hours";
    }
    interval = seconds / 60;
    if (interval > 1) {
        return Math.floor(interval) + " minutes";
    }
    return Math.floor(seconds) + " seconds";
}
var aDay = 24 * 60 * 60 * 1000;

function getNotification() {
    var user_id = $("#id_user_login").val()
    $.ajax({
        type: "get",
        url: `/admin/general/notification/${user_id}`,
        dataType: "json",
        success: function (response) {
            var data = response.data;
            var htmlNotification = ``;
            if (data.length > 0) {
                data.forEach(notification => {
                    var splitCa = notification.created_at.split('T');
                    var splitTime = splitCa[1].split('.');
                    var createdAt = `${splitCa[0]} ${splitTime[0]}`;
                    var date = new Date(createdAt.replace(/-/g, "/"));
                    var since_time = timeSince(new Date(date - aDay));
                    htmlNotification += `<div class="list-group-item bg-transparent">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="fe ${notification.icon_notification} fe-24"></span>
                            </div>
                            <div class="col">
                                <small><strong>Assign Client</strong></small>
                                <div class="my-0 text-muted small">${notification.message}</div>
                                <small class="badge badge-pill badge-light text-muted">${since_time} ago</small>
                            </div>
                        </div>
                    </div>`
                });
            } else {
                htmlNotification += `<div class="list-group-item bg-transparent"><h6>No Notifications</h6></div>`;
            }
            $("#list-notification").html(htmlNotification);
        },
        error: function (err) {
            console.log(err)
        }
    });
}

function readAllNotification() {
    Toast.fire({
        icon: "info",
        title: "On Develop 🙏",
    });
}


function displayData(url, target, id = null) {
    $.ajax({
        url: `${url}`,
        method: "get",
        success: function (response) {
            $(`#show-data-${target}`).html(response);
            $(`#row-${target}-${id}`).addClass("success-alert");
            setTimeout(() => {
                $(`#row-${target}-${id}`).removeClass("success-alert");
            }, 3000);
            $(`#table-${target}`).DataTable();
        },
        error: function (err) {
            console.log(err);
        }
    });
}

function createData(textConfirmation, target, url, closeForm = false) {
    $(`#form-${target}`).on("submit", function (e) {
        e.preventDefault();
        $(`#add-${target}`).attr("disabled", true);
        var formData = new FormData(this);

        // Add FilePond files to formData
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
                successResponse(
                    "add",
                    target,
                    response.message,
                    response.data.id,
                    `${url}/data`
                );

                console.log(response);
                createLogRecord('success', response, url);
            },
            error: function (err) {
                console.log(err);
                $(`#add-${target}`).attr("disabled", false);
                $(`#form-${target}`).off("submit");
                let err_log = err.responseJSON.errors;
                createLogRecord('error', err.responseJSON, url);
                handleError(err, err_log, target);
            }
        });
    });
}

function createLogRecord(type, data, uri) {
    console.log(data)
    $.ajax({
        type: "POST",
        url: "/admin/general/log-record",
        data:
        {
            type,
            uri,
            data
        },
        dataType: "json",
        success: function (response) {
            console.log(response)
        },
        error: function (err) {
            console.log(err)
        }
    });
}

function updateData(textConfirmation, target, url, id = null, closeForm = false) {
    $(`#form-${target}`).on("submit", function (e) {
        e.preventDefault();
        let formData = new FormData(this)
        let checkAdditionalFile = false
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
                successResponse(
                    "edit",
                    target,
                    response.message,
                    response.data.id,
                    `${url}/data`
                );
                createLogRecord('success', response, url);
            },
            error: function (err) {
                let err_log = err.responseJSON.errors;
                createLogRecord('error', err.responseJSON, url);
                handleError(err, err_log, data);
            }
        }

        if (checkAdditionalFile) {
            ajaxParams.contentType = false
            ajaxParams.processData = false
        }

        $.ajax(ajaxParams);

    });
}

function deleteData(target, url, id = null) {
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
                    successResponse(
                        "delete",
                        target,
                        response.message,
                        response.data.id,
                        `${url}/data`
                    );
                    createLogRecord('success', response, url);
                },
                error: function (err) {
                    console.log(err);
                    createLogRecord('error', err.responseJSON, url);
                }
            });
        }
    });
}

function getDetailData(url, target, id = null) {
    $.ajax({
        url: url,
        method: "get",
        dataType: "json",
        success: function (response) {
            fetchData(target, response.data)
        },
        error: function (err) {
            console.log(err);
        }
    });
}
var loadingElement = `<div class="d-flex text-center p-2"> <div class="spinner-border spinner-border text-black mr-2" role="status"> <span class="sr-only">Loading...</span> </div> <h4 for="" class="ml-2">Please Wait ......</h4> </div>`;

function maskingCurrencyRupiah(nominal, triggerEvent) {

    let numberString = triggerEvent ? nominal.replace(/[^,\d]/g, '').toString() : nominal.toString()

    let split = numberString.split(',')
    let sisa = split[0].length % 3
    let rupiah = split[0].substr(0, sisa)
    let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

    return rupiah
}


function generateMaskingToNominal(maskingNominal) {
    return parseInt(maskingNominal.split(".").join(""))
}


function chooseSelectedData(selectData, fromData, targetTo, isEdit = null, id_target = null) {
    var id = $(`#${fromData}`).val();
    $.ajax({
        type: "post",
        url: "/admin/general/get-master-data-to",
        data: {
            selected_lov: selectData,
            id: id
        },
        dataType: "json",
        success: function (response) {
            var html = '';
            var lov = response.data;
            if (selectData == 'category-material') {
                html += '<option value="">--Silahkan Pilih Sub Kategori--</option>';
                lov.forEach(sub_category => {
                    html += `<option value="${sub_category.id}" ${id_target == sub_category.id ? 'selected' : ''}>${sub_category.sub_category_material_name}</option>`;
                });
            } else if (selectData == 'block-house') {
                html += '<option value="">--Pilih Lot--</option>'
                lov.forEach(lot_houses => {
                    if (isEdit !== 'Y') {
                        if (lot_houses.lot_house_status == 'AVAILABLE') {
                            html += `<option value="${lot_houses.lot_house_name}">${lot_houses.lot_house_name}</option>`;
                        }
                    } else {
                        html += `<option value="${lot_houses.lot_house_name}">${lot_houses.lot_house_name}</option>`;
                    }
                });
            }
            $(`#${targetTo}`).html(html)
        },
        error: function (err) {
            console.log(err)
        }
    });
}

function checkInput(cbxName, cbxTarget, showHideTarget = null, targetId = null) {
    if ($(`#${cbxName}`).is(':checked')) {
        $(`#${cbxTarget}`).val('Y')
        $(`#${showHideTarget}`).show();
        if (cbxName === 'isDitributionPoCheck') {
            $(`#select2-id_distribution_Po-container`).html('--Silahkan Pilih PO--');
        }
    } else {
        $(`#${cbxTarget}`).val('N')
        $(`#${targetId}`).val('')
        $(`#${showHideTarget}`).hide();

    }
}

function handleExportExcel(section) {
    let url = window.location.href
    let arr = url.split("/")

    $.ajax({
        url: `${arr[5]}/export/excel`,
        method: "get",
        xhrFields: {
            responseType: 'blob'
        },
        success: function (response) {
            let link = document.createElement('a');
            link.href = window.URL.createObjectURL(response);
            link.download = `registration-list.xlsx`;
            link.click();
        },
        error: function (err) {
            console.log(err);
        }
    });

}


function pondFileUpload() {

    $(function () {
        $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
        $('.my-pond').filepond();
        // $('.my-pond').filepond('allowMultiple', true);
        $('.my-pond').filepond('acceptedFileTypes', ['image/*']);
        $('.my-pond').filepond('imagePreviewHeight', 150);
        $('.my-pond').on('FilePond:addfile', function (e) {
            console.log('file added event', e);
        });
        $('.my-pond').on('FilePond:processfile', function (e) {
            console.log('file processed', e);
        });
    });
}