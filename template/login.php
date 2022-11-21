<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'stylelink.html' ?>
    <title>ログイン</title>
</head>

<body>
    <div w3-include-html="styleLink.html"></div>
    <section class="vh-100 gradient-violet">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 ">
                            <h3 class="mb-5 text-center">ログイン</h3>
                            <div>
                                <p class="text-danger text-center" id="error"></p>
                            </div>
                            <div id="loginLoading"></div>
                            <form id="loginForm" method="POST">
                                <div class="form-outline mb-4">
                                    <label class="form-label">メール</label>
                                    <input type="email" name="email" class="form-control form-control-lg" id="email" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label">パスワード</label>
                                    <input type="password" name="password" class="form-control form-control-lg" id="password" />
                                </div>
                                <!-- Checkbox -->
                                <div class="container text-center">
                                    <button type="button" class="btn btn-info  " name="login" id="login">ログイン</button>
                                    <input type="reset" class="btn btn-success  btn-block" value="キャンセル">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="../js/login.js"></script>

</html>