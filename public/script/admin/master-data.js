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
    } else if (type === 'image') {
        urlEndpoint = `${url}/image/${id}/layout`;
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


async function manageData(type, id = null) {
    const url = `/admin/${data.url4}/${data.url5}`;
    try {
        switch (type) {
            case "save":
                const saveConfirmation = `Are you sure you want to add data ${data.url5.replace("-", " ")}?`;
                const response = await createData(saveConfirmation, data.url5, url);
                successResponse(
                    "add",
                    data.url5,
                    response.message,
                    response.data.id,
                    `${url}/data`
                );
                break;

            case "update":
                const updateConfirmation = `Are you sure you want to update data ${data.url5.replace("-", " ")}?`;
                await updateData(updateConfirmation, data.url5, url, id);
                break;

            case "delete":
                await deleteData(data.url5, url, id);
                break;

            default:
                console.error("Invalid type specified");
                break;
        }
    } catch (error) {
        console.log(error)
        console.error("An error occurred:", error);
        // Handle errors here
    }
}
