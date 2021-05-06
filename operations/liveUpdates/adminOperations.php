<?php
include_once("../../db.php");
include_once("../encrypt.php");

if (isset($_POST['deleteAdmin'])) {
    $username = encrypt($_POST['deleteAdmin']);

    $selectAdminCommand = "SELECT * FROM admins WHERE username='$username' LIMIT 1";
    $selectAdmRequestResult = $conn->query($selectAdminCommand);

    if ($selectAdmRequestResult->num_rows > 0) {
        $deleteAdminCommand = "DELETE FROM admins WHERE username='$username'";
        $deleteAdmRequestResult = $conn->query($deleteAdminCommand);

        if ($deleteAdminCommand) {
            echo "Admin already deleted.";
        }else{
            echo "Something is wrong, Please reload page";
        }

    }
}
