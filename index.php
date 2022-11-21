<?php
include_once 'controller/session.php';
$goTo = checkSession();
if ($goTo == "login") {
    header("Location:template/login.php");
} else if ($goTo = "home") {
    header("Location:template/home.php");
}
