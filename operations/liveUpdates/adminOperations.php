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

if (isset($_POST['addAdmin'])) {
    if (isset($_POST['addFullName']) && isset($_POST['addUsername']) && isset($_POST['addPass'])) {
        $fullName = $_POST['addFullName'];
        $username = trim(strtolower($_POST['addUsername']), " ");
        $password = trim($_POST['addPass'], " ");

        if (strlen($fullName) < 3 || strlen($fullName) > 90) {
            echo "Name length is not correct";
        } elseif (strlen($username) < 3 || strlen($username) > 20) {
            echo "Username length is not correct";
        } elseif (strlen($password) < 5 || strlen($password) > 40) {
            echo "Password length is not correct";
        }else{
            $usernameEnc = encrypt($username);
            $fullNameEnc = encrypt($fullName);
            $passEnc = encrypt($password);

            $selectAdminCommand = "SELECT * FROM admins WHERE username='$usernameEnc' LIMIT 1";
            $selectAdmRequestResult = $conn->query($selectAdminCommand);

            if ($selectAdmRequestResult->num_rows > 0) {
                echo "Username is not free";
            }elseif($selectAdmRequestResult->num_rows < 1){
                $insertAdminCommand = "INSERT INTO admins (username, name, password) VALUES ('$usernameEnc', '$fullNameEnc', '$passEnc')";
                if (mysqli_query($conn, $insertAdminCommand)) {
                    echo "Admin successfully added";
                }else{
                    echo "Something is wrong";
                }
            }else{
                echo "Something is wrong";
            }

        }
    }else{
        echo "Something is wrong";
    }
}
