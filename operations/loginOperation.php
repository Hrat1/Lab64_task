<?php
include_once "db.php";

if (isset($_POST['log_submit']) && isset($_POST['log_username']) && isset($_POST['log_password'])) {
    $username = $_POST['log_username'];
    $password = $_POST['log_password'];
    if (strlen($username) < 3) {
        $errorMsg = "Username length is less than 3";
    } elseif (strlen($password) < 5) {
        $errorMsg= "Password length is less than 5";
    } else {
        $signInCommand = "SELECT * FROM admins WHERE username='$username'";
        $requestResult = $conn->query($signInCommand);

        if ($requestResult->num_rows > 0) {
            $row = mysqli_fetch_assoc($requestResult);
            $passwordRow = $row['password'];

            if ($passwordRow === $password) {
                echo "<script>window.location = window.location.href;</script>";
            }else{
                $errorMsg = "Please write correct password";
            }
        }else{
            $errorMsg = "Username don't registered";
        }
    }
}
