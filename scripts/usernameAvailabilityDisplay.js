$(document).ready(function(){
    $("#username").keyup(function(){
        var username = $(this).val().trim();
        // console.log(username);
        if(username !== ''){

            $.ajax({
                url: 'usernameExistsCheck.php',
                type: 'post',
                data: {username:username},
                success: function(response){
                    // Show response
                    $("#userValid").html(response);
                    // console.log(response);
                }
            });
        }else{
            $("#userValid").html("");
        }

    });

});