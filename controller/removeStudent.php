<?php
include_once '../config/db.php';
include_once '../controller/session.php';
$data = array();
if (!empty($_POST['id'])) {
    $goTo = checkSession();
    if ($goTo == "login") {
        echo "login";
    } else {
        $id = $_POST['id'];
        $delete = delete($id);
        if (is_string($delete)) {
            echo "db error";
        } else {
            echo "success";
        }
    }
}
