$(document).ready(function () {
    var table_re= $('#review').DataTable({
        "order": [[0, "desc" ]],
        "processing": true,
        "serverSide": true,
        "ajax": "/admin/review",
        "columns": [
            {"data": "id"},
            {"data": "id_products"},
            {"data": "name"},
            {"data": "comment"},
            {"data": "created_at"},
            { data: null,
                clssName:"center",
                render:function (data) {
                console.log(data) // chỉ nhận đc active
                if(data.active==1){
                    return'<a href="javascript:void (0)"   id="'+data.id+'" class="tipS"><img src="/storage/files//images/accept.png" alt="" /></a>'

                }else {
                    return'<a href="javascript:void (0)"   id="'+data.id+'" class="tipS"><img src="/storage/files//images/exclamation.png" alt="" /></a>'

                }

                }},
            {
                data: "id",
                className: "center",
                render: function (data) {
                    return '<a class="editor_remove btn btn-warning clickDeleteR" data-id="' + data + '">Delete</a>'
                }
            }
        ]
    });

    $(document).on('click', '#review tr td a', function(event) {

        var idRead = $(this).attr('id');
        var token=$("input[name='_token']").val();
        var this_button = $(this);

        if(idRead > 0){

            $.ajax({
                url: '/admin/review/active',
                type: 'get',
                dataType: 'json',
                data: {"_token":token,idRead: idRead},
            })
                .done(function(data) {
                    table_re.ajax.reload();
                    console.log(data);
                    if (data.status) {
                        this_button.replaceWith(data.html);
                    }

                })
        }
    });
    $('#review').on('click', '.clickDeleteR', function (e) {

        e.preventDefault();
        if (confirm("Bạn có chắc muốm xóa id này không ?")) {
            var $that= $(this);
            var id = $(this).data('id');
             var token = $("input[name='_token']").val();
            $.ajax({
                url: "/admin/review/dell/"+id,
                type: 'POST',
                dataType: 'json',
                data: {"_token": token, "id": id},
            })
                .done(function (data) {
                    table_re.ajax.reload();
                    // $('.editor_edit[data-id='+id+']').closest('tr').remove();
                }).fail(function () {
                alert('Đã Có Lỗi Xẩy RA VUI Lòng THử Lại');
            })
        }
    });
});