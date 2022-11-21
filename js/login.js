$(document).ready(function () {
    $("#loginForm").validate({
        rules: {
            email: { required: true, email: true },
            password: "required",
        }, messages: {
            email: {
                required: "メールを入力してください!",
                email: "有効なメールアドレスを入力してください!"
            },
            password: "パスワードを入力してください!",

        }
    });
})
$('#login').on('click', function () {
    if ($("#loginForm").valid()) {
        var email = $("#email").val();
        var pass = $("#password").val();
        $.ajax({
            type: 'post',
            url: '../controller/login.php',
            data: {
                email: email,
                password: pass
            }, beforeSend: function () {
                $("#loginLoading").empty();
                $("#error").empty();
                $("#loginLoading").append("<div class='text-center'><i class='fas fas fa-spinner fa-pulse'></i>");
            },
            success: function (response) {
                $("#loginLoading").empty();
                $("#error").empty();
                if (response.includes("db error")) {
                    document.getElementById("error").innerHTML = "システムエラーです。<br>後でもう一度試してください";
                }
                else if (response == "success") {
                    window.location.href = "../template/home.php";
                } else {
                    $("#loginLoading").empty();
                    document.getElementById("error").innerHTML = "無効なログイン";
                }
            }
        });
    } else {
        $("#loginForm").submit()
    }
})