<?php
include_once '../config/db.php';
include_once '../controller/session.php';
if (!empty($_POST['name'])) {
    $goTo = checkSession();
    if ($goTo == "login") {
        echo "login";
    } else {
        $name = $_POST['name'];
        $rollno = $_POST['rollno'];
        $age = $_POST['age'];
        $data = updateStudent($name, $rollno, $age);
        if (is_string($data)) {
            echo "db error";
        } else {
            echo "success";
        }
    }
} else if (!empty($_POST['rollno'])) {
    $goTo = checkSession();
    if ($goTo == "login") {
        echo "login";
    } else {
        $rollno = $_POST['rollno'];
        $data = checkRollNO($rollno);
        if (is_string($data)) {
            echo "db error";
        } else {
            echo json_encode($data);
        }
    }
}
