<?php
include_once '../config/db.php';
include_once '../controller/session.php';
if (!empty($_POST['regDate'])) {
    $goTo = checkSession();
    if ($goTo == "login") {
        echo "login";
    } else {
        $regDate = $_POST['regDate'];
        $data = search($regDate);
        if (is_string($data)) {
            echo "db error";
        } else {
            echo json_encode($data);
        }
    }
} else {
    $goTo = checkSession();
    if ($goTo == "login") {
        echo "login";
    } else {
        $data = readAll();
        if (is_string($data)) {
            echo "db error";
        } else {
            echo json_encode($data);
        }
    }
}
