
    $("#create-user").on('submit',function(e){
    e.preventDefault();
    $.ajax({
        url: "users",
        data:$('#create-user').serialize(),
        type: 'post',
        success: function(result){
            
            if(result.status=='error'){
                $.each(result.error, function(key, val){
                    $('#'+key+'_error').css("display","block");
                    $('#'+key+'_error').html(val[0]);
                })
            }
            if(result.status=='success'){
                window.location.href = 'users';
            }
        }

    })
});

$('#deposit-form').on('change', function() {
    $.ajax({
        url: "/backend/balance",
        data:{id:$('#deposit-form').val()},
        type: 'get',
        success: function(result){
           $('#account-balance').text(result);
        }

    });

  });

