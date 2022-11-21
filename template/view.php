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
    <title>生徒一覧</title>
    <?php include_once 'stylelink.html' ?>
</head>

<body>
    <?php include_once 'header.php';
    include_once '../config/db.php';
    $allStud = readAll();
    if ($allStud != "db connect fail") {
    ?>
        <div class="container mt-3">
            <h3 class="text-center text-primary">生徒一覧</h3>
            <div class=" row d-flex  justify-content-end">
                <div class="col-auto">
                    <label for="regDate" class="mt-2 h5">登録日</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" name="regDate" id="regDate" onchange="showList()">
                </div>
            </div>
            <p id="empty" class="text-center h4 text-danger">対象データが見つかりませんでした。</p>
            <div>
                <p class="text-danger text-center" id="error"></p>
            </div>
            <div class="d-flex justify-content-center ">
                <div class="text-info" role="status" id="loading"></div>
            </div>
            <div id="tableView" class="table-responsive mb-4">
                <table class="table table-striped " id="studentTable">
                    <thead class="violet">
                        <tr>
                            <th>番</th>
                            <th>氏名</th>
                            <th>学生証番号</th>
                            <th>年齢</th>
                            <th>登録日</th>
                        </tr>
                    </thead>
                    <tbody id="studentList">
                        <?php
                        $i = 1;
                        foreach ($allStud as $stu) {
                            echo "<tr>
                        <td>$i </td>
                        <td>$stu->name</td>
                        <td>$stu->rollno </td>
                        <td>$stu->age </td>
                        <td>$stu->reg_date </td>
                        </tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div><?php } else { ?>
        <h3 class="text-center text-danger mt-3">システムエラーです。<br>後でもう一度試してください</h3>
    <?php } ?>
    <script src="../js/view.js"></script>
</body>

</html>