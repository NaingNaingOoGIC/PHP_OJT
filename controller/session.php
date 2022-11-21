<?php
function checkSession()
{
    $sessionValue = "";
    $session_duration = 5*60;
    session_set_cookie_params($session_duration);
    session_name();
    session_start();
    $_SESSION["sessionTime"] = time();
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), $_COOKIE[session_name()], time() + $session_duration, "/");
    }
    if (isset($_SESSION["id"])) {
        if ($_SESSION['sessionTime'] + $session_duration < time()) {
            session_unset();
            session_destroy();
            $sessionValue = "login";
            return $sessionValue;
        } else {
            $sessionValue = "home";
            return $sessionValue;
        }
    } else {
        $sessionValue = "login";
        return $sessionValue;
    }
}
