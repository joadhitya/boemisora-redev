
$(document).ready(function () {
    displayData(`${url}/create`, data.url5);
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

function openForm(target, type, id = null) {
    const showData = $(`#show-data-${target}`);
    const form = $(`#form-${target}`);
    const create = $(`#create-${target}`);
    const back = $(`#back-${target}`);
    switch (type) {
        case "add":
            showData.hide();
            form.show();
            create.hide();
            back.show();
            $.ajax({
                type: "post",
                url: `${url}/activity-detail`,
                data: {
                    type,
                    id
                },
                success: function (response) {
                    form.html(response)
                }, error: function (err) {
                    console.log(err)
                }
            });
            break;
        case "back":
            showData.show();
            form.hide();
            create.show();
            back.hide();
            break;
    }
}

function openModal(target, type, id = null) {
    console.log('test');
    refreshForm()
    if (type === "add" || type === "edit") {
        $(`#modal-${target}`).modal("show");
    }
    switch (type) {
        case "add":
            $(`#form-${target}`)[0].reset();
            $(`#add-${target}`).show();
            $(`#edit-${target}`).hide();
            break;
        case "edit":
            $(`#edit-${target}`).show();
            $(`#add-${target}`).hide();
            const url = `/admin/${data.url4}/${data.url5}/${id}`;
            getDetailData(url, data.url5);
            break;
        case "detail":
            $(`#modal-detail-${data}`).LoadingOverlay("hide");
            break;
        default:
            break;
    }
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
        case "post":
            $.ajax({
                type: "patch",
                url: `${url}/${id}`,
                data: {
                    type: "post"
                },
                dataType: "json",
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: response.message
                    });

                    displayData(`${url}/create`, data.url5);
                },
                error: function (err) {
                    console.log(err)
                }
            });
            break;
        case "takeout":
            $.ajax({
                type: "patch",
                url: `${url}/${id}`,
                data: {
                    type: "takeout"
                },
                dataType: "json",
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: response.message
                    });

                    displayData(`${url}/create`, data.url5);
                },
                error: function (err) {
                    console.log(err)
                }
            });
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
    switch (type) {
        case "status":
            if (err.status == 422) {
                if (typeof err_log.status_name !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.status_name[0]
                    });
                }
                if (typeof err_log.status_code !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.status_code[0]
                    });
                }
            } else {
                Toast.fire({
                    icon: "error",
                    title: "Something went wrong"
                });
            }
            break;
        case "booklet":
            if (err.status == 422) {
                if (typeof err_log.id_category !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.id_category[0]
                    });
                }
                if (typeof err_log.code !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.code[0]
                    });
                }
                if (typeof err_log.name !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.name[0]
                    });
                }
                if (typeof err_log.link !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.link[0]
                    });
                }
            } else {
                Toast.fire({
                    icon: "error",
                    title: "Something went wrong"
                });
            }
        default:
            break;
    }
}

function fetchData(target, data) {
    switch (target) {
        case "md-shooting-field":
            $("#id").val(data.id);
            $("#name").val(data.name);
            $("#code").val(data.code);
            break;
        default:
            break;
    }
}

function handleSectionForm(type) {

    let idActive = $('#section-sign').find(".active").attr("id")
    let getIterationArray = idActive.split("-")
    let lenghtIterationArray = getIterationArray.length
    let getIteration = getIterationArray[lenghtIterationArray-1]

    if(type === 'next'){
        if(getIteration !== '3'){
            $(`#${idActive}`).removeClass('active text-white bg-primary')
            $(`#${idActive}`).addClass('bg-light')
            $(`#card-form-${parseInt(getIteration)+1}`).removeClass('bg-light')
            $(`#card-form-${parseInt(getIteration)+1}`).addClass('active text-white bg-primary')
            $(`#form-${getIteration}`).addClass('d-none')
            $(`#form-${parseInt(getIteration)+1}`).removeClass('d-none')
        }
    }else{
        if(getIteration !== '1'){
            $(`#${idActive}`).removeClass('active text-white bg-primary')
            $(`#${idActive}`).addClass('bg-light')
            $(`#card-form-${parseInt(getIteration)-1}`).removeClass('bg-light')
            $(`#card-form-${parseInt(getIteration)-1}`).addClass('active text-white bg-primary')
            $(`#form-${getIteration}`).addClass('d-none')
            $(`#form-${parseInt(getIteration)-1}`).removeClass('d-none')
        }
    }


}
