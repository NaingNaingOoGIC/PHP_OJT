<?php
$active = $_SERVER['PHP_SELF'];
if (str_contains($active, 'addStudent.php')) {
    $add = 'active';
} elseif (str_contains($active, 'removeStudent.php')) {
    $remove = 'active';
} elseif (str_contains($active, 'updateStudentInfo.php')) {
    $update = 'active';
} elseif (str_contains($active, 'view.php')) {
    $view = 'active';
}
