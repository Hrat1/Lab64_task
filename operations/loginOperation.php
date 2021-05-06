<?php
include_once "db.php";
include_once "encrypt.php";
include_once "session.php";
publicSession($conn);

if (isset($_POST['log_submit']) && isset($_POST['log_username']) && isset($_POST['log_password'])) {
    $username = $_POST['log_username'];
    $password = $_POST['log_password'];
    if (strlen($username) < 3) {
        $errorMsg = "Username length is less than 3";
    } elseif (strlen($password) < 5) {
        $errorMsg= "Password length is less than 5";
    } else {
        $usernameEnc = encrypt($username);
        $passwordEnc = encrypt($password);

        $signInCommand = "SELECT * FROM admins WHERE username='$usernameEnc'";
        $requestResult = $conn->query($signInCommand);

        if ($requestResult->num_rows > 0) {
            $row = mysqli_fetch_assoc($requestResult);
            $passwordRow = $row['password'];

            if ($passwordRow === $passwordEnc) {
                $_SESSION["admin"] = $usernameEnc;
                echo "<script>window.location = window.location.href;</script>";
            }else{
                $errorMsg = "Please write correct password";
            }
        }else{
            $errorMsg = "Username don't registered";
        }
    }
}
