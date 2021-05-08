function deleteAdmin(){
    let modalUsername = $('#modal-username').text();
    let modalUserId = $('#modal-userid').text();
    let errorText = $('#errorFromBackend');
    let adminDeleteButton = $('#adminDeleteBtn');
    let modalDeleteLine = $('#' + modalUserId);

    $.ajax({
        type: 'post',
        url: '../operations/liveUpdates/adminOperations.php',
        data: {deleteAdmin: modalUsername},
        success: function (msg) {
            if (msg === "Admin already deleted.") {
                adminDeleteButton.attr('data-mdb-dismiss', 'modal');
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