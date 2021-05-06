<?php
session_start();

function publicSession($conn)
{
    if (isset($_SESSION['admin'])) {
        $checkSession = $_SESSION['admin'];
        $resultSetE = $conn->query("SELECT username FROM admins WHERE username= '" . $checkSession . "' LIMIT 1");
        if ($resultSetE->num_rows > 0) {
            header("Location: /");
            exit;
        }
    }
}

function privateSession($conn)
{
    if (isset($_SESSION['admin'])) {
        $checkSession = $_SESSION['admin'];
        $resultSetE = $conn->query("SELECT username FROM admins WHERE username= '" . $checkSession . "' LIMIT 1");
        if ($resultSetE->num_rows < 1) {
            unset($_SESSION['admin']);
            session_unset();
            session_destroy();
            header("Location: /signin.php");
            exit;
        }
    } elseif (!isset($_SESSION['admin'])) {
        header("Location: /signin.php");
        exit;
    }
}
