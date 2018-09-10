$(document).ready(function () {


    var table_user = $('#User').DataTable({
        "order": [[0, "desc" ]],
        "processing": true,
        "serverSide": true,
        "ajax": "/admin/user",
        "columns": [
            {"data": "id"},
            {
                data: "images",
                clssName:"center",
                render:function (data) {
                    return'<img style="width: 50px;height: 40px" src="/storage/files/'+data+'"/>'

                }
            },
            {"data": "username"},
            {"data": "name_level"},
            {"data": "fullname"},
            {"data": "email"},
            {
                data: "id",
                className: "center",
                render: function (data) {

                    return '<a  data-id="' + data + '" class="editor_edit btn btn-primary ShowModalUser " data-type="EditU">Edit</a> / <a href="" class="editor_remove DeleteU btn btn-primary" data-id="' + data + '">Delete</a>'
                }
            }
        ]
    });

    $(document).on('click', '.ShowModalUser', function(event) {
        event.preventDefault();
        var check = $(this).attr('data-type');
        if(check == "EditU"){
            // $('#FormProducts .kill').removeClass('BTNCreateProducts');
            $('#myModalUser input[name=email]').attr('readonly', true);
            $('#myModalUser input[name=username]').attr('readonly', true);
            $('.modal-title.titleOKU').html("Cập nhật sản phẩm");
            $('.BTNCreateU').html("Cập nhật");

            var id = $(this).attr('data-id');
            var url = $("#FormUsers").attr('data-editUrl');
            var _token = $('input[name=_token]').val();
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {id:id , action:"LoadDataEditU",_token:_token}
            })
                .done(function(data) {
                    console.log(data);
                    $('#fullname').val(data.fullname);
                    $('#idOKU').val(data.id);
                    $('#username').val(data.username);
                    $('#email').val(data.email);
                    $('#password').val(data.password);
                    $('#rePassword').val(data.password);
                    $('#optionsRadios').val(data.id_level).attr('checked', 'checked');
                    $('#hinh').html('<img style="width: 200px;height: 100px" src="/storage/files/'+data.images+'" >');
                })
                .fail(function() {
                    alert("Không tim thấy id cần sửa");
                });

            $('#idOKU').val(id);
        }else{
            $('.modal-title.titleOKP').html("Thêm sản phẩm");
            $('.BTNCreateU').html("Thêm mới");
        }
        $('#myModalUser').modal('show');
    });
    $(document).on('submit', '#FormUsers', function(event) {
        event.preventDefault();
        var $this = $(this);
        form = $("#FormUsers");
        var id = $('#idOKU').val();
        var url = form.attr('data-url');
        if(id && id.length  > 0){
            var url = form.attr('data-editUrl');
            $("#FormUsers").validate({
                rules: {
                    fullname: {
                        required: true,
                    },
                    username: {
                        required: true,
                        minlength:3
                    },
                    password: {
                        required: true,
                        minlength: 6

                    },
                    rePassword: {
                        equalTo: "#password",
                    },
                    optionsRadios:{
                        required:true
                    }
                },
                messages: {
                    username: {
                        required: "Vui lòng nhập vào đây",
                        minlength: "User name ít nhất 4 ký tự"
                    },

                    password: {
                        required: "Vui lòng nhập vào đây",
                        minlength: "Password name ít nhất 5 ký tự"
                    },
                    rePassword:{
                        equalTo: "Mật khẩu không khớp",

                    },
                    fullname:{
                        required: "Vui lòng nhập vào đây",
                    },
                    optionsRadios:{
                        required: "Vui lòng chọn 1",
                    }
                }
            });
        }else{
            var url = form.attr('data-url');
            $("#FormUsers").validate({
                rules: {
                    fullname: {
                        required: true,
                    },
                    username: {
                        required: true,
                        minlength:3
                    },
                    email: {
                        required: true,
                        email: true,
                        remote: "/admin/user/add/check-email"

                    },
                    password: {
                        required: true,
                        minlength: 6

                    },
                    rePassword: {
                        required:true,
                        equalTo: "#password",
                    },
                    optionsRadios:{
                        required:true,
                    }
                },
                messages: {
                    username: {
                        required: "Vui lòng nhập vào đây",
                        minlength: "User name ít nhất 3 ký tự"
                    },
                    email: {
                        required: "Vui lòng nhập vào đây",
                        email: "Email chưa đúng định dạng",
                        remote: "Email đã tồn tại!"
                    },
                    password: {
                        required: "Vui lòng nhập vào đây",
                        minlength: "Password name ít nhất 5 ký tự"
                    },
                    rePassword:{
                        equalTo: "Mật khẩu không khớp",
                        required: "Vui lòng nhập vào đây",

                    },
                    fullname:{
                        required: "Vui lòng nhập vào đây",
                    },
                    optionsRadios:{
                        required: "Vui lòng chọn 1",
                    }
                }
            });
        }

        if(form.valid()){

            var formData = new FormData(this);
            console.log(formData);
            $.ajax({
                type:'POST',
                url: url,
                data:formData,
                dataType: 'json',
                cache:false,
                contentType: false,
                processData: false,
                success:function(success){
                    table_user.ajax.reload();
                    $('#myModalUser').modal('hide');
                    $('#idOKU').val('');
                    if(success==false){
                        alert('bạn không có quyền thêm');
                    }
                    if(success=='noedit'){
                        alert('bạn không thể sửa thông tin người khác!');

                    }
                },
                error: function(data){
                    alert("Đã Có Lỗi Xẩy RA");
                }
            });
        }

    });

    $('#User').on('click', '.DeleteU', function (e) {

        e.preventDefault();
        if (confirm("Bạn có chắc muốm xóa id này không ?")) {
            var $that= $(this);
            var id = $(this).data('id');
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "/admin/user/del/"+id,
                type: 'POST',
                dataType: 'json',
                data: {"_token": token, "id": id},
            })
                .done(function (data) {
                    table_user.ajax.reload();
                    // $('.editor_edit[data-id='+id+']').closest('tr').remove();
                    if(data=='god'){
                        alert('He id God!!!');
                    }
                    if(data==false){
                        alert('bạn không thể xóa thông tin người khác!')
                    }
                }).fail(function () {
                alert('Đã Có Lỗi Xẩy RA VUI Lòng THử Lại');
            })
        }
    });
});