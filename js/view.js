$(document).ready(function () {
    $('#studentTable').DataTable({
        searching: false,
        "ordering": false,
        "info": true,
        "lengthChange": false,
        language: {
            "info": "_START_ から _END_ まで _TOTAL_ 人の生徒を表示しする",
            "infoEmpty": "Showing 0 to 0 of 0 entries",
            "paginate": {
                "first": "初め",
                "last": "終わり",
                "next": "次へ",
                "previous": "前へ"
            },
        }
    });
    $('#empty').hide();
    $('#regDate').datepicker({
        beforeShow: function () {
            setTimeout(function () {
                $('.ui-datepicker').css('z-index', 99999999999999);
            }, 0);
        }, dateFormat: 'yy-mm-dd'
    });
})
function showList() {
    var regDate = $("#regDate").val();
    $.ajax({
        type: 'post',
        url: '../controller/view.php',
        data: {
            regDate: regDate,
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
                document.getElementById("error").innerHTML = "システムエラーです。<br>後でもう一度試してください";
            } else {
                $('#loadingModal').modal('hide');
                const data = JSON.parse(list);
                if (data != null) {
                    if (data.length > 0) {
                        createList(data);
                        $('#empty').hide();
                        $('#tableView').show()
                    }
                    else {
                        $('#empty').show();
                        $('#tableView').hide();
                    }
                }
            }
        }
    });
}
function createList(data) {
    var table = $('#studentTable').DataTable();
    table.clear().draw();
    data.forEach((stu, index) => {
        table.row.add([`${index + 1}`, `${stu.name}`, `${stu.rollno}`, `${stu.age}`, `${stu.reg_date}`]).draw();
    });
}
