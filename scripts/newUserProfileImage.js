$(document).ready(function(){
    var img =  $("#profile-image");
    img.hide();
    $("#profile").change(function (){
        if($(this).val() === "None")
        {
            img.hide();
        }
        else
        {
            img.show();
            img.attr("src", "../images/user/"+$(this).val());
        }

    });
});