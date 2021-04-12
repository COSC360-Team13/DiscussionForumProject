$(document).ready(function(){
    $("#email").keyup(function(){
        var email = $(this).val().trim();
        // console.log(username);
        if(email !== ''){

            $.ajax({
                url: 'emailExistsCheck.php',
                type: 'post',
                data: {email:email},
                success: function(response){
                    // Show response
                    $("#emailValid").html(response);
                    // console.log(response);
                }
            });
        }else{
            $("#emailValid").html("");
        }

    });

});