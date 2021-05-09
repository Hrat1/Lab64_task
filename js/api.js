////////////////////////////////////////////////////////////////////
// admin side start

function deleteAdmin() {
    let modalUsername = $('#modal-username').text();
    let modalUserId = $('#modal-userid').text();
    let errorText = $('#errorFromBackend');
    let adminDeleteButton = $('#closeDelAdminM');
    let modalDeleteLine = $('#' + modalUserId);

    $.ajax({
        type: 'post',
        url: '../operations/liveUpdates/adminOperations.php',
        data: {deleteAdmin: modalUsername},
        success: function (msg) {
            if (msg === "Admin already deleted.") {
                adminDeleteButton.click();
                modalDeleteLine.remove();
            } else {
                errorText.html(msg);
            }
        },
    });
}

function addAdmin() {
    let fullName = $('#addFullName').val();
    let username = $('#addUsername').val();
    let password = $('#addPass').val();
    let errorText = $('#errorFromBackendAddAdmin');
    let cancelButton = $('#closeAddAdminM');

    errorText.css("color", "red");
    username = username.toLowerCase();

    if (fullName.length < 3 || fullName.length > 90) {
        errorText.html("Name length is not correct");
    } else if (username.length < 3 || username.length > 20) {
        errorText.html("Username length is not correct");
    } else if (password.length < 5 || password.length > 40) {
        errorText.html("Password length is not correct");
    } else {
        $.ajax({
            type: 'post',
            url: '../operations/liveUpdates/adminOperations.php',
            data: {
                addAdmin: 1,
                addFullName: fullName,
                addUsername: username,
                addPass: password
            },
            success: function (msg) {
                if (msg === "Admin successfully added") {
                    errorText.css("color", "green");
                    errorText.html(msg);
                    $('#addFullName').val("");
                    $('#addUsername').val("");
                    $('#addPass').val("");

                    setTimeout(function () {
                        cancelButton.click();
                        errorText.html("");
                    }, 700);
                } else {
                    errorText.html(msg);
                }
            }
        });
    }
}

function editAdmin() {
    let fullName = $('#editFullName').val();
    let username = $('#editUsername').val();
    let password = $('#editPass').val();
    let id = $('#editIdDB').text();
    let userId = $('#editUserId').text();
    let nameFTable = $('#' + userId + ' td:nth-child(1)').text();
    let usernameFTable = $('#' + userId + ' td:nth-child(2)').text();
    let passFTable = $('#' + userId + ' td:nth-child(3)').text();
    let closeButton = $('#closeEditAdminM');
    let errorText = $('#errorFromBackendEditAdmin');

    errorText.css("color", "red");

    errorText.html("");
    if (nameFTable === fullName && usernameFTable === username && passFTable === password) {
        closeButton.click();
    } else {
        if (fullName.length < 3 || fullName.length > 90) {
            errorText.html("Name length is not correct");
        } else if (username.length < 3 || username.length > 20) {
            errorText.html("Username length is not correct");
        } else if (password.length < 5 || password.length > 40) {
            errorText.html("Password length is not correct");
        } else {
            $.ajax({
                type: 'post',
                url: '../operations/liveUpdates/adminOperations.php',
                data: {
                    editAdmin: 1,
                    editFullName: fullName,
                    editUsername: username,
                    editPass: password,
                    editId: id
                },
                success: function (msg) {
                    if (msg === "Admin successfully updated") {
                        errorText.css("color", "green");
                        errorText.html(msg);
                        $('#' + userId + ' td:nth-child(1)').html(fullName);
                        $('#' + userId + ' td:nth-child(2)').html(username);
                        $('#' + userId + ' td:nth-child(3)').html(password);
                        $('#' + userId + ' td:nth-child(4) span').attr("data-mdb-username", username);
                        $('#' + userId + ' td:nth-child(4) span').attr("data-mdb-name", fullName);
                        $('#' + userId + ' td:nth-child(4) span').attr("data-mdb-pass", password);

                        setTimeout(function () {
                            closeButton.click();
                            errorText.html("");
                        }, 600);
                    } else {
                        errorText.html(msg);
                    }
                }
            });
        }
    }
}

// admin side End
////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////
// products side start


// get Data From db with unlimited scroll

let startProd = 0;
let limitProd = 11;
let reachedMax = false;

$(window).scroll(function () {
    if ($(window).scrollTop() === $(document).height() - $(window).height() && $("#v-tabs-products-tab").attr("aria-selected") === "true") {
        getData();
    }
});

$(document).ready(function () {
    getData();
});

function getData() {
    startProd = $('.resultsProd tr').length;

    $.ajax({
        method: 'post',
        url: '../operations/liveUpdates/productOperations.php',
        dataType: 'text',
        data: {
            getProdData: 1,
            start: startProd,
            limit: limitProd
        },
        success: function (response) {
            if (response !== "reachedMax") {
                $(".resultsProd").append(response);
            }
        }
    });
}


function addProduct() {
    let addProductName = $('#addProdName').val();
    let addProdPrice = $('#addProdPrice').val();
    let addProdImg = $('#addProdImg').val();
    let ext = addProdImg.split('.').pop().toLowerCase();
    let closeButton = $('#closeAddProdM');
    let errorText = $('#errorFromBackendAddProduct');

    errorText.css("color", "red");

    if (addProductName.length <= 4 || addProductName.length > 20) {
        errorText.html("Product name length is not valid");
    } else if (addProdPrice.length < 1 || addProdPrice.length > 10) {
        errorText.html("Product price length is not valid");
    } else if (addProdImg.length > 4 && addProductName.length >= 3 && addProdPrice.length > 0) {
        if ($.inArray(ext, ['png', 'jpg', 'jpeg']) === -1) {
            errorText.html("Please select JPG, JPEG or PNG format file");
        } else {
            let addFormData = document.getElementById('addProdForm');

            $.ajax({
                url: "../operations/liveUpdates/productOperations.php",
                type: "post",
                data: new FormData(addFormData),
                contentType: false,
                cache: false,
                processData: false,
                success: function (msg) {
                    if (msg === 'Data Inserted') {
                        $("#addProdForm")[0].reset();
                        errorText.css("color", "green");
                        errorText.html(msg);
                    } else {
                        errorText.html(msg);
                    }
                },
            });
        }
    } else {
        errorText.html("Please select product image");
    }
}


// products side End
////////////////////////////////////////////////////////////////////
