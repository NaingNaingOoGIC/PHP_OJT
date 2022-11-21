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
    <title>生徒削除</title>
    <?php include_once 'stylelink.html' ?>
</head>

<body>
    <?php include_once 'header.php';
    include_once '../config/db.php';
    $allStud = readAll();
    if ($allStud != "db connect fail") { ?>
        <div class="container mt-3">
            <h3 class="text-center text-primary">生徒削除</h3>
            <div id="tableView" class="table-responsive mb-4">
                <table class="table table-striped mt-2" id="studentTable">
                    <thead class="violet">
                        <tr>
                            <th>番</th>
                            <th>氏名</th>
                            <th>学生証番号</th>
                            <th>年齢</th>
                            <th>削除</th>
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
                        <td><button type='button' onclick='deleteId($stu->id)' class='btn btn-outline-danger border-0' data-bs-toggle='modal' data-bs-target='#deleteModal'>
                        <i class='fa-solid fa-trash'></i>
                      </button></td>
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
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title text-center w-100" id="exampleModalLabel">本当に削除しますか?</h5>
                    <input type="hidden" id="deleteId">
                    <div class="d-flex justify-content-center mt-3">
                        <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">キャンセル</button>
                        <button type="button" class="btn btn-danger" id="deleteBtn">削除</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border text-info" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/removeStudent.js"></script>
</body>

</html>