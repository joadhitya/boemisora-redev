$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$(document).ready(function () {
    displayData(`${url}/data`, data.url5);
});

const getUrl = () => {
    var url = window.location.href;
    var arr = url.split("/");
    var url4 = arr[4];
    var url5 = arr[5];
    dataUrl = {
        url4,
        url5
    };
    return { url4, url5 };
};

const data = getUrl();
const url = `/admin/${data.url4}/${data.url5}`;

function openModal(target, type, id = null) {
    refreshForm();
    const $contentForm = $(`#content-form-${target}`);
    const modalElement = $(`#modal-${target}`);
    $contentForm.html(loadingElement);
    modalElement.modal("show");
    let urlEndpoint = `${url}/create`;
    let showAdd = true;
    let showEdit = false;
    if (type === 'edit') {
        urlEndpoint = `${url}/${id}/edit`;
        showEdit = true;
        showAdd = false;
    } else if (type === 'detail') {
        urlEndpoint = `${url}/${id}`;
        showAdd = false;
    }
    $.ajax({
        type: "get",
        url: urlEndpoint,
        success: function (response) {
            $contentForm.html(response);
            $(`#edit-${target}`).toggle(showEdit);
            $(`#add-${target}`).toggle(showAdd);
            console.log(response)
            pondFileUpload()
        },
        error: function (xhr, status, error) {
            console.log(xhr)
            console.error("Error fetching data:", error);
        }
    });
}

function manageData(type, id = null) {
    const url = `/admin/${data.url4}/${data.url5}`;
    switch (type) {
        case "save":
            var textConfirmation = `Are you sure want add data ${data.url5.replace("-", " ")}?`;
            createData(textConfirmation, data.url5, url);
            break;
        case "update":
            var id = $("#id").val();
            var textConfirmation = `Are you sure want to update data ${data.url5.replace("-", " ")}?`;
            updateData(textConfirmation, data.url5, url, id);
            break;
        case "delete":
            deleteData(data.url5, url, id);
            break;
    }
}

function refreshForm() {
    $(`#add-${data.url5}`).attr("disabled", false);
    $(`#form-${data.url5}`).off("submit");
    $(`#form-${data.url5} input`).removeClass("error-form");
    $(`#form-${data.url5} select`).removeClass("error-form-select");
}

function handleError(err, err_log, type) {
    refreshForm();
    Toast.fire({
        icon: "error",
        title: "Something went wrong"
    });

    // switch (type) {
    //     case "status":
    //         if (err.status == 422) {
    //             if (typeof err_log.status_name !== "undefined") {
    //                 Toast.fire({
    //                     icon: "error",
    //                     title: err_log.status_name[0]
    //                 });
    //             }
    //             if (typeof err_log.status_code !== "undefined") {
    //                 Toast.fire({
    //                     icon: "error",
    //                     title: err_log.status_code[0]
    //                 });
    //             }
    //         } else {
    //             Toast.fire({
    //                 icon: "error",
    //                 title: "Something went wrong"
    //             });
    //         }
    //         break;
    //     case "booklet":
    //         if (err.status == 422) {
    //             if (typeof err_log.id_category !== "undefined") {
    //                 Toast.fire({
    //                     icon: "error",
    //                     title: err_log.id_category[0]
    //                 });
    //             }
    //             if (typeof err_log.code !== "undefined") {
    //                 Toast.fire({
    //                     icon: "error",
    //                     title: err_log.code[0]
    //                 });
    //             }
    //             if (typeof err_log.name !== "undefined") {
    //                 Toast.fire({
    //                     icon: "error",
    //                     title: err_log.name[0]
    //                 });
    //             }
    //             if (typeof err_log.link !== "undefined") {
    //                 Toast.fire({
    //                     icon: "error",
    //                     title: err_log.link[0]
    //                 });
    //             }
    //         } else {
    //             Toast.fire({
    //                 icon: "error",
    //                 title: "Something went wrong"
    //             });
    //         }
    //     default:
    //         break;
    // }
}