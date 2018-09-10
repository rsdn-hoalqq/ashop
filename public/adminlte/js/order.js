$(document).ready(function () {
    var table_detail = null;
    var idorders = null;
    var table_Order= $('#Order').DataTable({
        "order": [[0, "desc" ]],
        "processing": true,
        "serverSide": true,
        "ajax": "/admin/bills",
        "columns": [
            {"data": "id_order"},
            {"data": "total"},
            {"data": "created_at"},
            { data: null,
                className:"center",
                render:function (data) {
                    if(data.active==1){
                        return'<a href="javascript:void (0)"   id="'+data.id_order+'" class="tipS"><img src="/storage/files//images/accept.png" alt="" /></a>'

                    }else {
                        return'<a href="javascript:void (0)"   id="'+data.id_order+'" class="tipS"><img src="/storage/files//images/exclamation.png" alt="" /></a>'

                    }

                }
            },
            {
                data: "id_order",
                className: "center",
                render: function (data) {
                    return '<a   data-id="' + data + '" class="editor_edit btn btn-primary ShowModalOrder" data-type="View">View</a>  <a href="" class="editor_remove clickDell btn btn-primary" data-id="' + data + '">Delete</a>'
                }
            }
        ]
    });

    $(document).on('click', '#Order tr td a', function(event) {
        var idRead = $(this).attr('id');
        var token=$("input[name='_token']").val();
        var this_button = $(this);

        if(idRead > 0){

            $.ajax({
                url: '/admin/bills/active_order',
                type: 'post',
                dataType: 'json',
                data: {'_token':token,idRead: idRead}
            })
                .done(function(data) {
                    table_Order.ajax.reload();
                    console.log(data);
                    if (data.status) {
                        this_button.replaceWith(data.html);
                    }

                })
        }
    });

    $(document).on('click', '.ShowModalOrder', function(event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        var url = $("#FormOrder").attr('data-url');
        var _token = $('input[name=_token]').val();
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            data: {id:id,_token:_token}
        })
            .done(function(data) {
                if (data.OneOrder) {
                    var OneOrder  = data.OneOrder;
                    var OrderDetail=data.OrderDetail;
                    var City=data.City;
                    var Town=data.Town;
                    // var Commune=data.Commune;
                    // console.log(Commune);

                    $('a[name=show]').attr('data-id',OneOrder.id_order);
                    $('input[name=idbill]').val(OneOrder.id_order);
                    $('input[name=users]').val(OneOrder.fullname);
                    $('input[name=name]').val(OrderDetail.name);
                    $('input[name=tinh]').val(City.name);
                    $('input[name=huyen]').val(Town.name);
                    // $('input[name=xa]').val(Commune.name);
                    $('input[name=diachi]').val(OneOrder.hamlet);
                    $('input[name=sdt]').val(OneOrder.phone);
                    // OrderDetail.forEach( function(element, valua) {
                    //     $('input[name=name]').val(element.name);
                    //     $('input[name=sl]').val(element.soluong);
                    //     $('input[name=goangia]').val(element.unit_price);
                    // });
                    $('input[name=tongtien]').val(OneOrder.total);
                }
            })
            .fail(function() {
                alert("Không tim thấy id");
            });
        $('#idOrder').val(id);
        $('#myModalOrder').modal('show');
    });
    $(document).on('click','.showdetail',function () {
        console.log(1);
        $('#classModal').modal('show');
        var url = $("#FormOrder").attr('data-show');
        var _token = $('input[name=_token]').val();
        if (idorders == null) {
            idorders = $(this).attr('data-id');
            initTable();
        } else {
            idorders = $(this).attr('data-id');
            table_detail.ajax.reload(false);
        }

    });
    $('#Order').on('click', '.clickDell', function (e) {
        e.preventDefault();
        if (confirm("Bạn có chắc muốm xóa id này không ?")) {
            var $this = $(this);
            var id = $(this).data('id');
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "/admin/bills/dell/"+id,
                type: 'POST',
                dataType: 'json',
                data: {"_token": token, "id": id}
            })
                .done(function (data) {
                    table_Order.ajax.reload();
                }).fail(function () {
                alert('Đã Có Lỗi Xẩy RA VUI Lòng THử Lại');
            })
        }
    });

    function initTable() {
        table_detail= $('#classTable').DataTable({
            "order": [[0, "desc" ]],
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "/admin/bills/showdetail",
                type:"get",
                data: function (dt) {
                    dt.idorder = idorders;
                }
            },
            "columns": [
                {"data": "pid"},
                {"data": "name"},
                {"data": "unit_price"},
                {"data": "promotion_price"},
                {"data": "quantity"},
                {
                    data: "image",
                    className:"center",
                    render:function (data) {
                        return'<img style="width: 50px;height:20px ;" src="/storage/files/'+data+'"/>'
                    }
                }
            ]
        });
    }
});