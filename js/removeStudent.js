$(document).ready(function () {
    $('#studentTable').DataTable({
        searching: true,
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
})
function deleteId(id) {
    $('#deleteId').val(id);
}
$('#deleteBtn').on('click', function () {
    var id = $('#deleteId').val();
    $.ajax({
        type: 'post',
        url: '../controller/removeStudent.php',
        data: {
            id: id,
        },
        beforeSend: function () {
            $('#deleteModal').modal('hide');
            $('#loadingModal').modal('show');
        },
        success: function (data) {
            $('#loadingModal').modal('hide');
            if (data == "login") {
                window.location.href = "../template/login.php";
            }
            else if (data == 'success') {
                swal({
                    title: "正常に削除しました。",
                    button: "オーケー",
                    icon: "success"
                }).then(function () {
                    window.location.href = "../template/view.php";
                });
            } else {
                swal({
                    title: "システムエラー",
                    text: "システムエラーで、削除できませんでした。後でもう一度試してください。。",
                    button: "オーケー",
                    icon: "error"
                })
            }
        }
    });

})
