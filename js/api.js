////////////////////////////////////////////////////////////////////
// admin side start

function deleteAdmin(){
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
            }else{
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
    }else if(username.length < 3 || username.length > 20){
        errorText.html("Username length is not correct");
    }else if (password.length < 5 || password.length > 40){
        errorText.html("Password length is not correct");
    }else {
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
                    },700);
                }else {
                    errorText.html(msg);
                }
            }
        });
    }
}

function editAdmin(){
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
    }else {
        if (fullName.length < 3 || fullName.length > 90) {
            errorText.html("Name length is not correct");
        }else if(username.length < 3 || username.length > 20){
            errorText.html("Username length is not correct");
        }else if (password.length < 5 || password.length > 40){
            errorText.html("Password length is not correct");
        }else {
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
                        },600);
                    }else {
                        errorText.html(msg);
                    }
                }
            });
        }

    }

}

// admin side End
////////////////////////////////////////////////////////////////////
