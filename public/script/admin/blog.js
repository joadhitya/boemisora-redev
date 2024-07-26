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
                $(`#show-data-${data.url5}`).show();
                $(`#activity-detail-${data.url5}`).hide();
                $(`#create-data-${data.url5}`).show();
                $(`#back-data-${data.url5}`).hide();
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

function openForm(type, action, id = null) {
    refreshForm();
    const visibilityMap = {
        addEdit: [
            { selector: `#show-data-${type}`, method: 'hide' },
            { selector: `#activity-detail-${type}`, method: 'show' },
            { selector: `#create-data-${type}`, method: 'hide' },
            { selector: `#back-data-${type}`, method: 'show' }
        ],
        back: [
            { selector: `#show-data-${type}`, method: 'show' },
            { selector: `#activity-detail-${type}`, method: 'hide' },
            { selector: `#create-data-${type}`, method: 'show' },
            { selector: `#back-data-${type}`, method: 'hide' }
        ]
    };
    const toggleVisibility = (actions) => {
        actions.forEach(({ selector, method }) => $(selector)[method]());
    };
    let urlEndpoint = `${url}/create`;
    if (type === 'edit') {
        urlEndpoint = `${url}/${id}/edit`;
    } else if (type === 'detail') {
        urlEndpoint = `${url}/${id}`;
    }
    if (action === "add" || action === "edit") {
        toggleVisibility(visibilityMap.addEdit);
        $.ajax({
            type: "GET",
            url: urlEndpoint,
            success: function (response) {
                $(`#activity-detail-${type}`).html(response);
                $(`#form-${type}`)[0].reset();
                $(`#add-${type}`).show();
                $(`#edit-${type}`).hide();
                pondFileUpload();
                ['content_id', 'content_en'].forEach(content => {
                    handleCkEditor("add", $(`#${content}`).val(), content);
                });
            },
            error: function (err) {
                console.log(err);
            }
        });
    } else if (action === "back") {
        Swal.fire({
            title: 'Apakah yakin anda ingin kembali?',
            text: "Data yang di masukan akan terhapus.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya saya yakin'
        }).then((result) => {
            if (result.isConfirmed) {
                toggleVisibility(visibilityMap.back);
            }
        });
    }
}
