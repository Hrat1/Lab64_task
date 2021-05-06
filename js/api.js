function deleteAdmin(){
    let modalUsername = $('#modal-username').text();
    let modalUserId = $('#modal-userid').text();
    let errorText = $('#modal-userid');
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
                errorText.val(msg);
            }
        },
    });
}