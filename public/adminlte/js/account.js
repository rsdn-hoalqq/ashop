$(document).ready(function () {
    var table_account= $('#account').DataTable({
        "order": [[0, "desc" ]],
        "processing": true,
        "serverSide": true,
        "ajax": "/admin/account",
        "columns": [
            {"data": "id"},
            {"data": "fullname"},
            {"data": "email"},
            {"data": "phone"},
            {"data": "created_at"},
            {
                data: "id",
                className: "center",
                render: function (data) {
                    return '<a class="editor_remove btn btn-warning clickDeleteAcc" data-id="' + data + '">Delete</a>'
                }
            }
        ]
    });

    $('#account').on('click', '.clickDeleteAcc', function (e) {

        e.preventDefault();
        if (confirm("Bạn có chắc muốm xóa id này không ?")) {
            var $that= $(this);
            var id = $(this).data('id');
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "/admin/account/dell/"+id,
                type: 'GET',
                dataType: 'json',
                data: {"_token": token, "id": id},
            })
                .done(function (data) {
                    table_account.ajax.reload();
                    // $('.editor_edit[data-id='+id+']').closest('tr').remove();
                }).fail(function () {
                alert('Đã Có Lỗi Xẩy RA VUI Lòng THử Lại');
            })
        }
    });
});