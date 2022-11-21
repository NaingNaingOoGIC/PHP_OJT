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
        $regDate = date("Y/m/d");
        $exit = checkRollNO($rollno);
        if (is_string($exit)) {
            echo "db error";
        } else if (is_object($exit)) {
            echo "exit";
        } else {
            $addResult = addStudent($name, $rollno, $age, $regDate);
            if (is_string($addResult)) {
                echo "db error";
            } else {
                echo "success";
            }
        }
    }
}
