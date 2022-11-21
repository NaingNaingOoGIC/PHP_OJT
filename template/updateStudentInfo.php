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
    <title>生徒更新</title>
    <?php include_once 'stylelink.html' ?>
</head>

<body>
    <?php include_once 'header.php';
    include_once '../config/db.php';
    $all = allRollNo();
    if ($all != "db connect fail") { ?>
        <section class="vh-75">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow" style="border-radius: 1rem;">
                            <div class="card-body">
                                <h3 class="mb-3 text-center text-primary">生徒更新</h3>
                                <div>
                                    <p class="text-danger text-center" id="error"></p>
                                </div>
                                <div class="d-flex justify-content-center mb-2">
                                    <div class="text-info mb-2" role="status" id="loading"></div>
                                </div>
                                <form id="updForm" method="POST">
                                    <div class="form-outline mb-4">
                                        <div class="row">
                                            <label class="form-label col-md-4 mt-2">学生証番号</label>
                                            <div class="col-md-8">
                                                <select class="form-select form-select-lg" aria-label="Default select example" id="rollno" name="rollno" onchange="autoFill(this.value)">
                                                    <option selected value=''>選択してください。</option>
                                                    <?php
                                                    foreach ($all as $no) {
                                                        echo " <option value= $no->rollno> $no->rollno</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <div class="row">
                                            <label class="form-label col-md-4 mt-2">氏名</label>
                                            <div class="col-md-8">
                                                <input type="text" name="name" class="form-control form-control-lg" id="name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <div class="row">
                                            <label class="form-label col-md-4 mt-2">年齢</label>
                                            <div class="col-md-8">
                                                <input type="text" name="age" class="form-control form-control-lg" id="age" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-primary me-1 btn-block" id="update">更新</button>
                                        <input type="reset" class="btn btn-success  btn-block" value="キャンセル">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><?php } else { ?>
        <h3 class="text-center text-danger mt-3">システムエラーです。<br>後でもう一度試してください</h3>
    <?php    } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/updateStudentInfo.js"></script>
</body>

</html>