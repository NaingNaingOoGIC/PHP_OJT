$(document).ready(function () {
    jQuery.validator.addMethod("noSpecialCharacter", function (value) {
        let spChars = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        return (!spChars.test(value));
    }, "特殊文字を入力しないでください");
    jQuery.validator.addMethod("noSpaceAtStart", function (value) {
        return !(/^\s/.test(value));
    }, "スペースから始めないでください");
    $("#regForm").validate({
        rules: {
            name: {
                required: true,
                noSpecialCharacter: true,
                noSpaceAtStart: true
            },
            rollno: "required",
            rollno: "required",
            age: {
                required: true,
                number: true,
                range: [5, 25]
            }
        }, messages: {
            name: {
                required: "氏名を入力してください!",
                noSpecialCharacter: "特殊文字を入力しないでください",
                noSpaceAtStart: "スペースから始めないでください"
            },
            rollno: "学生証番号を入力してください!",
            age: {
                required: "年齢を入力してください!",
                number: "有効な数値を入力してください。",
                range: "年齢は範囲外です!"
            }
        }
    });
})
$('#add').on('click', function () {
    $("#rollNoError").empty();
    if ($("#regForm").valid()) {
        var name = $("#name").val();
        var rollno = $("#rollno").val();
        var age = $("#age").val();
        $.ajax({
            type: 'post',
            url: '../controller/addStudent.php',
            data: {
                name: name,
                rollno: rollno,
                age: age
            },
            beforeSend: function () {
                $("#loading").toggleClass("spinner-border");
                $("#error").empty();
            },
            success: function (response) {
                $("#loading").toggleClass("spinner-border");
                $("#error").empty();
                $("#rollNoError").empty();
                if (response == "login") {
                    window.location.href = "../template/login.php";
                }
                else if (response == "success") {
                    swal({
                        title: "正常に登録しました。",
                        button: "オーケー",
                        icon: "success"
                    }).then(function () {
                        window.location.href = "../template/view.php";
                    });
                } else if (response == "exit") {
                    $("#rollNoError").append("学生証番号は既に存在します。");
                } else if (response.includes("db error")) {
                    document.getElementById("error").innerHTML = "システムエラーです。<br>後でもう一度試してください";
                }
            }
        });
    } else {
        $("#regForm").submit()
    }
})