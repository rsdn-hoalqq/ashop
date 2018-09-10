
$(document).ready(function () {

    $(".update-cart").click(function () {
       var rowid= $(this).attr('id');
       var qty=$(this).parent().parent().find(".txt-qty").val();
       var token=$("input[name='_token']").val();

       $.ajax({
           url:UrLAjax,
           type:'POST',
            cache:false,
             data:{"_token":token, "id" : rowid,"qty" : qty},
            success:function (data) {

                if(data=="ok"){
                 window.location.reload();

                }
            }
       });


    });
});

