<?php
session_start();
include_once '../config/db.php';
if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $exit = checkLogin($email, $password);
    if (is_string($exit)) {
        echo "db error";
    } else {
        if ($exit) {
            $_SESSION['id'] = $exit->id;
            $_SESSION['sessionTime'] = time();
            echo "success";
        } else {
            echo "fail";
        }
    }
}
