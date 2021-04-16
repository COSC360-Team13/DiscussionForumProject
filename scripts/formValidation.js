// function checkImage(event){
//     var image = document.getElementById("profile");
//     console.log(image.value);
//     var imageIndicator = document.getElementById("no-img");
//     if(image.value === "None"){
//         makeRed(image);
//         imageIndicator.setAttribute("class", "red");
//         imageIndicator.removeAttribute("hidden");
//         event.preventDefault();
//     }
// }
// Verify valid username

function Reset(){
    makeClean($("#username"));
}


function checkUsername(event){
    var userValid = document.getElementById("userValid");
    var username = document.getElementById("username");
    if(userValid.innerText === "Unavailable")
    {
        makeRed(username);
        event.preventDefault();
    }
}
function checkEmail(event){
    var emailValid = document.getElementById("emailValid");
    var email = document.getElementById("email");
    if(emailValid.innerText === "Email already in use"){
        makeRed(email);
        event.preventDefault();
    }
}

// Check for matching passwords
function checkPasswordMatch(event)
{
    // alert(password.val());
    // console.log(password.value !== passwordCheck.value)
    var password = document.getElementById("password");
    var passwordCheck = document.getElementById("password-check");
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
// Check empty fields
function isBlank(inputField)
{
    if (inputField.value == "" || inputField.value == "None")
    {
        return true;
    }
    return false;
}
// Make field element red
function makeRed(inputDiv){
    inputDiv.style.borderColor="#AA0000";
}
// Clear styling on field element
function makeClean(inputDiv){
    inputDiv.style.borderColor="#92EAA6";
}
// Event listener to prevent submission
$(document).ready(function(){
    mainForm = $("#mainForm");
    mainForm.on("click", "input[type='reset']", function(){
        var requiredInputs = $(".required");
        for(var i =0; i < requiredInputs.length; i++)
            makeClean(requiredInputs[i]);

        $("#emailValid").html("");
        $("#userValid").html("");
        $("#no-match").attr("hidden",true);
        $("#profile-image").hide();
        $("#no-img").attr("hidden", true);
    });
    mainForm.submit(function(event){

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
            // console.log('checking match');
            checkPasswordMatch(event);
            checkUsername(event);
            checkEmail(event);
            checkImage(event);
        }
    });
});

