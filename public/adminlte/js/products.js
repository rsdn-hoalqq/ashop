
$(document).ready(function () {
    var table_Pro= $('#Products').DataTable({
        "order": [[0, "desc" ]],
        "processing": true,
        "serverSide": true,
        "ajax": "/admin/products",
        "columns": [
        {"data": "pid"},
        {"data": "proname"},
        {"data": "cname"},
        {"data": "pname"},
        {"data": "unit_price"},
        {"data": "promotion_price"},
        {"data": "soluong"},
        {
            data: "image",
            className:"center",
            render:function (data) {
                return'<img src="/storage/files/'+data+'"/>'

            }
        },
        {"data": "created_at"},
        {
            data: "pid",
            className: "center",
            render: function (data) {
                return '<a   data-id="' + data + '" class=" btn btn-primary ShowModalProducts" data-type="EditPro">Edit</a> '
                    + ' <a class="editor_remove btn btn-warning clickDeleteP" data-id="' + data + '">Delete</a>'
            }
        }
        ]
    });

    $('#Products').on('click', '.clickDeleteP', function (e) {

        e.preventDefault();
        if (confirm("Bạn có chắc muốm xóa id này không ?")) {
            var $that= $(this);
            var id = $(this).data('id');
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "/admin/products/dell/"+id,
                type: 'POST',
                dataType: 'json',
                data: {"_token": token, "id": id},
            })
            .done(function (data) {
                table_Pro.ajax.reload();
                    // $('.editor_edit[data-id='+id+']').closest('tr').remove();
                }).fail(function () {
                    alert('Đã Có Lỗi Xẩy RA VUI Lòng THử Lại');
                })
            }
        });

    $(document).on('click', '.ShowModalProducts', function(event) {
        event.preventDefault();
        var check = $(this).attr('data-type');
        if(check == "EditPro"){
            // $('#FormProducts .kill').removeClass('BTNCreateProducts');
            $('.modal-title.titleOKP').html("Cập nhật sản phẩm");
            $('.BTNCreateProducts').html("Cập nhật");

            var id = $(this).attr('data-id');
            var url = $("#FormProducts").attr('data-editUrl');
            var _token = $('input[name=_token]').val();
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {id:id , action:"LoadDataEditP",_token:_token}
            })
            .done(function(data) {
                console.log(data);
                $('#ten').val(data.name);
                $('#idOKP').val(data.pid);
                $('#producer_id').val(data.producer_id);
                $('#gia').val(data.unit_price);
                $('#giam').val(data.promotion_price);
                $('#sl').val(data.soluong);
                $('#mota').val(data.description);
                $('#chitiet').val(data.detail);
                $('#hinh').html('<img style="width: 300px; height: 500px" src="/storage/files/'+data.image+'" >');
            })
            .fail(function() {
                alert("Không tim thấy id cần sửa");
            });

            $('#idOKP').val(id);
        }else{
            $('.modal-title.titleOKP').html("Thêm sản phẩm");
            $('.BTNCreateProducts').html("Thêm mới");
        }
        $('#myModalProducts').modal('show');
    });
    $(document).on('submit', '#FormProducts', function(event) {
        event.preventDefault();
        var $this = $(this);
        form = $("#FormProducts");
        var id = $('#idOKP').val();
        var url = form.attr('data-url');
        if(id && id.length  > 0){
            var url = form.attr('data-editUrl');
        }else{
            var url = form.attr('data-url');
        }

        $("#FormProducts").validate({
            rules: {
                ten: {
                    required: true,
                    minlength: 5,
                    maxlength: 100,
                },
                producer_id: {
                    required: true
                },
                gia:{
                    required: true,
                    digits: true
                },
                giam:{
                    required: true,
                    digits: true
                },
                sl:{
                    required: true,
                    digits: true
                }

            },
            messages: {
                ten: {
                    required:"Vui lòng nhập tên",
                    minlength:"Tên thể loại tối thiệu 5 ký tự."
                },
                producer_id: {
                    required: "Vui lòng chọn thể loại cha",

                }
            }
        });
        if(form.valid()){
         var formData = new FormData(this);
         $.ajax({
            type:'POST',
            url: url,
            data:formData,
            dataType: 'json',
            cache:false,
            contentType: false,
            processData: false,
            success:function(success){
             table_Pro.ajax.reload();
             $('#myModalProducts').modal('hide');
             $('#idOKP').val('');
         },
         error: function(data){
          alert("Đã Có Lỗi Xẩy RA");
      }
  });
     }

 });


    $(document).ready(function (){
        $("#producer_id").change(function () {
            var idTheloai=$(this).val();
            $.ajax({
                url: '/admin/ajax/loaitin/',
                type: 'get',
                dataType: 'json',
                data: {idTheloai: idTheloai},
            })
            .done(function(data) {
                var html = '<option selected value="">Vui lòng chọn thể loại</option>';
                if (data.length > 0) {
                    data.forEach( function(element, valua) {
                        html += '<option value="'+element.id +'">'+element.name+'</option>';
                    });
                }

                $("#id_type").html(html);
            })
        });
    });

});
