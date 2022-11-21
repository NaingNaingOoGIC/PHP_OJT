$(document).ready(function () {
    jQuery.validator.addMethod("noSpecialCharacter", function (value) {
        let spChars = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        return (!spChars.test(value));
    }, "特殊文字を入力しないでください");
    jQuery.validator.addMethod("noSpaceAtStart", function (value) {
        return !(/^\s/.test(value));
    }, "スペースから始めないでください");
    $("#updForm").validate({
        ignore: [],
        rules: {
            name: {
                required: true,
                noSpecialCharacter: true,
                noSpaceAtStart: true
            },
            rollno: "required",
            age: {
                number: true,
                required: true,
                range: [5, 25]
            }
        }, messages: {
            name: "氏名を入力してください!",
            rollno: "学生証番号を入力してください!",
            age: {
                number: "有効な数値を入力してください。",
                required: "年齢を入力してください!",
                range: "年齢は範囲外です!"
            }
        }
    });
})
function autoFill(rollno) {
    if (rollno == "") {
        $("#name").val("");
        $("#age").val("");
    } else {
        $.ajax({
            type: 'post',
            url: '../controller/updateStudentInfo.php',
            data: {
                rollno: rollno,
            },
            beforeSend: function () {
                $("#loading").toggleClass("spinner-border");
                $("#error").empty();
            },
            success: function (list) {
                $("#loading").toggleClass("spinner-border");
                $("#error").empty();
                if (list == "login") {
                    window.location.href = "../template/login.php";
                }
                else if (list.includes("db error")) {
                    $("#name").val("");
                    $("#age").val("");
                    document.getElementById("error").innerHTML = "システムエラーです。<br>後でもう一度試してください";
                } else {
                    const data = JSON.parse(list);
                    if (data != null) {
                        $("#name").val(data.name);
                        $("#age").val(data.age);
                    }
                }
            }
        });
    }
}
$('#update').on('click', function () {
    if ($("#updForm").valid()) {
        var name = $("#name").val();
        var rollno = $("#rollno").val();
        var age = $("#age").val();
        $.ajax({
            type: 'post',
            url: '../controller/updateStudentInfo.php',
            data: {
                name: name,
                rollno: rollno,
                age: age
            }, beforeSend: function () {
                $("#loading").toggleClass("spinner-border");
                $("#error").empty();
            },
            success: function (response) {
                $("#loading").toggleClass("spinner-border");
                $("#error").empty();
                if (response == "login") {
                    window.location.href = "../template/login.php";
                }
                else if (response == "success") {
                    swal({
                        title: "正常に更新しました。",
                        button: "オーケー",
                        icon: "success"
                    }).then(function () {
                        window.location.href = "../template/view.php";
                    });

                } else {
                    document.getElementById("error").innerHTML = "システムエラーです。<br>後でもう一度試してください";
                }
            }
        });
    } else {
        $("#updForm").submit()
    }
})