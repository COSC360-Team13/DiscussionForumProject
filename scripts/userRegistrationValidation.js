//check passwords
function checkPasswordMatch(event)
{
    // alert(password.val());
    // console.log(password.value !== passwordCheck.value)
    var password = document.getElementById("password");
    var passwordCheck = document.getElementById("password-check")
    if (password.value !== passwordCheck.value)
    {
        // console.log("passwords don't match!");
        // alert("Passwords do not match!");
        var match = document.getElementById("no-match");
        match.setAttribute("class", "red");
        match.removeAttribute("hidden");
        makeRed(password);
        makeRed(passwordCheck);
        event.preventDefault();


    }

}
function isBlank(inputField)
{
    if (inputField.value == "")
    {
        return true;
    }
    return false;
}

function makeRed(inputDiv){
    inputDiv.style.borderColor="#AA0000";
}

function makeClean(inputDiv){
    inputDiv.style.borderColor="#92EAA6";
}
$(document).ready(function(){
    $("#mainForm").submit(function(event){
        var requiredInputs = $(".required");
        var error = false;
        for (var i=0; i < requiredInputs.length; i++)
        {
            if(isBlank(requiredInputs[i]))
            {
                error |= true;
                makeRed(requiredInputs[i]);
            }
            else
            {
                makeClean(requiredInputs[i]);
            }
        }
        if (error == true)
        {
            event.preventDefault();
        }
        else
        {
            console.log('checking match');
            checkPasswordMatch(event);
        }

    });
});
