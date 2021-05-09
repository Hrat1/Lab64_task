<?php
include_once("../../db.php");
include_once("../encrypt.php");
include_once("../session.php");

$somethingIsWrongError = "Something is wrong";

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
                    echo $somethingIsWrongError;
                }
            }else{
                echo $somethingIsWrongError;
            }

        }
    }else{
        echo $somethingIsWrongError;
    }
}

if (isset($_POST['editAdmin'])) {
    if (isset($_POST['editFullName']) && $_POST['editUsername'] && $_POST['editPass'] && $_POST['editId']) {
        $fullName = $_POST['editFullName'];
        $username = trim(strtolower($_POST['editUsername']), " ");
        $password = trim($_POST['editPass'], " ");
        $userId = $_POST['editId'];

        if (strlen($fullName) < 3 || strlen($fullName) > 90) {
            echo "Name length is not correct";
        } elseif (strlen($username) < 3 || strlen($username) > 20) {
            echo "Username length is not correct";
        } elseif (strlen($password) < 5 || strlen($password) > 40) {
            echo "Password length is not correct";
        }else{
            $usernameEnc = encrypt($username);
            $fullNameEnc = encrypt($fullName);
            $passwordEnc = encrypt($password);

            $selectAdminCommand = "SELECT * FROM admins WHERE id='$userId' LIMIT 1";
            $selectAdmRequestResult = $conn->query($selectAdminCommand);

            if ($selectAdmRequestResult->num_rows > 0) {
                $row = $selectAdmRequestResult->fetch_assoc();

                $usernameDb = $row['username'];

                $checkIsExistsUsername= "SELECT * FROM admins WHERE username='$usernameEnc' LIMIT 1";
                $checkIsExistsUsernameResult = $conn->query($checkIsExistsUsername);

                if ($checkIsExistsUsernameResult->num_rows > 0 && $usernameEnc === $usernameDb) {
                    $usernameCheck = 0;
                } elseif ($checkIsExistsUsernameResult->num_rows < 1) {
                    $usernameCheck = 0;
                }elseif ($checkIsExistsUsernameResult->num_rows > 0) {
                    $usernameCheck = 1;
                }else{
                    $usernameCheck = 0;
                }

                if ($usernameCheck == 1) {
                    echo "Username is not free";
                }elseif ($usernameCheck == 0){
                    $updateAdminSQL = "UPDATE admins SET name='$fullNameEnc', username='$usernameEnc', password='$passwordEnc' WHERE id='$userId'";

                    if (mysqli_query($conn, $updateAdminSQL)) {
                        $_SESSION["admin"] = $usernameEnc;
                        echo "Admin successfully updated";
                    }else{
                        echo $somethingIsWrongError;
                    }
                }
            }else{
                echo "Admin not exists.";
            }
        }
    }else{
        echo $somethingIsWrongError;
    }
}