// Producer

$(document).ready(function () {
    var validateRule = {
        create: {
            userName: {
                required: true,
                minlength: 5
            }
        },
        update: {
            userName: {
                required: true,
                minlength: 5
            }

        }
    };
    var VALIDATE = {};

    var HtmlForm = $('#myModal').html();
    var table=$('#producer').DataTable({
        "order": [[0, "desc" ]],
        "processing": true,
        "serverSide": true,
        "ajax": "/admin/producer",
        "columns": [
            {"data": "producer_id"},
            {"data": "produce_name"},
            {
                data: "producer_id",
                className: "center",
                render: function (data) {
                    return '<a  data-id="' + data + '" class="editor_edit btn btn-primary">Edit</a> / <a href="" class="editor_remove clickDelete btn btn-primary" data-id="' + data + '">Delete</a>'
                }
            }
        ]
    });
    // open model Edit
    $(document).on('click', '.editor_edit', function (event) {
        event.preventDefault();
        $('#FormUser').find('input[name=id]').remove();
        var $this = $(this);
        var $_this = $this.closest('tr');
        var id = $this.attr('data-id');
        var userName = $_this.find('td:nth-child(2)').text();
        $('#myModal input[name=userEmail]').attr('readonly', true);
        $('#myModal input[name=userName]').val(userName);
        $('#myModal input[name=userEmail]').val($_this.find('td:nth-child(3)').text());
        $('#myModal .BTNSubmit').html('<i class="fa fa-save"> Cập nhật');
        $('#myModal .BTNSubmit').removeClass('BTNcreate');
        $('#myModal  .titleOK').html("Cập nhật [ " + userName + " ]");
        $('#FormUser').prepend('<input type="hidden" value="' + id + '" name="id">');
        $('#myModal').modal('show');
        validateUser(validateRule.update);


    });
    $('#myModal').on('hidden.bs.modal', function () {
        $('#myModal').html(HtmlForm);
    });
    $('#producer').on('click', '.clickDelete', function (e) {
        e.preventDefault();
        if (confirm("Bạn có chắc muốm xóa id này không ?")) {
            var $this = $(this);
            var id = $(this).data('id');
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "/admin/producer/del/"+id,
                type: 'POST',
                dataType: 'json',
                data: {"_token": token, "id": id},
            })
                .done(function (data) {
                    table.ajax.reload();
                    // $('.editor_edit[data-id='+id+']').closest('tr').remove();
                }).fail(function () {
                alert('Đã Có Lỗi Xẩy RA VUI Lòng THử Lại');
            })
        }
    });
    $(document).on('click', '.editor_create', function () {
        $('#myModal .BTNcreate').removeClass('BTNSubmit');
        // VALIDATE = validateRule.create;
        validateUser(validateRule.create);
    });

    jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
    });

    function validateUser(typeRule) {
        typeRule || (typeRule = validateRule.create);
        $("#FormUser").validate({
            ignore: [],
            debug: false,
            rules: typeRule,
            messages: {
                userName: {
                    required: "Vui lòng nhập vào đây",
                    minlength: "User name ít nhất 5 ký tự"
                }

            },
            submitHandler: function (form) {
                if ($("#FormUser").find(".BTNSubmit").length === 1) {
                    //ajax Edit
                    event.preventDefault();
                    var url = $('#FormUser').attr('action');
                    var data = $('#FormUser').serializeArray();
                    var id = $("input[name='id']").val();
                    $.ajax({
                        url: "/admin/producer/edit/"+id,
                        type: 'POST',
                        dataType: 'json',
                        data: data
                    })
                        .done(function (data) {
                            // var $_this = $('.editor_edit[data-id='+data.id+']').closest('tr');
                            // $_this.find('td:nth-child(2)').text(data.name);
                            // $_this.find('td:nth-child(3)').text(data.email);
                            // $_this.find('td:nth-child(5)').text(data.updated_at);
                            //đoạn code trên tối ưu hơn.
                            table.ajax.reload();
                            $('#myModal').modal('hide');
                        }).fail(function () {
                        alert('Đã Có Lỗi Xãy RA VUI Lòng Thử Lại');
                    })
                } else if ($("#FormUser").find(".BTNcreate").length === 1) {
                    //ajax add
                    var url = $('#FormUser').attr('action');
                    var data = $('#FormUser').serializeArray();
                    $.ajax({
                        url: "/admin/producer/add",
                        type: 'POST',
                        dataType: 'json',
                        data: data
                    }).done(function (data) {
                        table.ajax.reload();
                        $('#myModal').modal('hide');
                    }).fail(function () {
                        alert('co lỗi xãy ra khi thêm');

                    })
                }
            }
        });
    }
});


