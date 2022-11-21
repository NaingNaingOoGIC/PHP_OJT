<?php include_once '../controller/session.php';
$goTo = checkSession();
if ($goTo == "login") {
    header("Location:login.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム</title>
    <?php include_once 'stylelink.html' ?>
</head>

<body>
    <?php include_once 'header.php'; ?>
    <div class="container mt-3">
        <h2 class="text-primary">学生登録システム  </h2>
        <h2 class="text-center text-primary">ホーム</h2>
        <div class="d-flex justify-content-center "><img src="../images/home.jfif" class="w-75 mb-2" alt=""></div>
        <div class="d-flex justify-content-center">
            <?php if (isset($_COOKIE["" . "adminId" . $_SESSION['id'] . ""])) {
                echo "<p class='h2 text-center text-primary'>毎度ご利用してありがとうございます。</p>";
            } else {
                $cookie_name = "adminId" . $_SESSION['id'];
                setcookie($cookie_name, $_SESSION['id'], time() + (30 * 24 * 60 * 60));
                echo "<p class='h2 text-center text-primary'>ご利用してありがとうございます。</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>