function openTab(evt, tab) {
    // Declare all variables
    var i, tabcontent, tablinks;
  
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
  
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tab).style.display = "block";
    evt.currentTarget.className += " active";
}

var editButtonPressed = 0;
function addChangeButtons(){
    var userRow = document.getElementById('username');
    var passRow = document.getElementById('password');
    var emailRow = document.getElementById('email');
    if (editButtonPressed == 0){
        editButtonPressed = 1;
        var userButton = document.createElement("BUTTON");
        var passButton = document.createElement("BUTTON");
        var emailButton = document.createElement("BUTTON");
    }
    else if (userRow.childElementCount == 3) {
        var userButton = document.getElementById("userButton");
        var passButton = document.createElement("BUTTON");
        var emailButton = document.createElement("BUTTON");
    }
    else if (passRow.childElementCount == 3){
        var passButton = document.getElementById("passButton");
        var userButton = document.createElement("BUTTON");
        var emailButton = document.createElement("BUTTON");
    }
    else if (emailRow.childElementCount == 3){
        var emailButton = document.getElementById("emailButton");
        var userButton = document.createElement("BUTTON");
        var passButton = document.createElement("BUTTON");
    }

    userButton.innerHTML = "Change Username";
    userButton.id="userButton"; //might also add class to this
    var userButtonCount = 0;
    userButton.onclick = function(){
        if (userButtonCount == 0){
            userButtonCount = 1;
            passRow.removeChild(passButton);
            emailRow.removeChild(emailButton);
            var form = document.createElement("FORM");
            var formCell = document.createElement("td");
            formCell.colSpan = "3";
            formCell.id = "newForm";
            form.method = "POST";
            form.action = "profile\\updateUsername.php";
            form.id = "mainForm";
            var newRow = document.createElement("tr");
            newRow.id = "newRow";
            userRow.after(newRow);
            var label = document.createElement("label");
            var input = document.createElement("input");
            formCell.append(form);
            newRow.append(formCell);
            form.append(label);
            form.append(input);
            label.innerHTML = "New Username:";
            input.type = "text";
            input.name="username";
            input.classList.add("required");
            input.id="username";
            var submit = document.createElement("input");
            form.append(submit);
            submit.type="submit";
            submit.value="Submit";
        }
        var form = document.getElementById("mainForm");
        form.onsubmit = function(e){
            var requiredInputs = document.querySelectorAll(".required");
            var err = false;
            for (var i=0; i < requiredInputs.length; i++){
                if( isBlank(requiredInputs[i])){
                    err |= true;
                    makeRed(requiredInputs[i]);
                }
                else{
                    makeClean(requiredInputs[i]);
                }
            }
            if (err == true){
                e.preventDefault();
            }
            else{
                console.log('checking match');
                checkPasswordMatch(e);
            }
        }
    }

    passButton.innerHTML = "Change Password";
    passButton.id = "passButton"; //might also add class to this
    var passButtonCount = 0;
    passButton.onclick = function(){
        if (passButtonCount == 0){
            passButtonCount = 1;
            userButton.remove();
            emailRow.removeChild(emailButton);
            var form = document.createElement("FORM");
            var formCell = document.createElement("td");
            formCell.colSpan = "3";
            formCell.id = "newForm";
            form.method = "POST";
            form.action = "profile\\updatePassword.php";
            form.id = "mainForm";
            var newRow = document.createElement("tr");
            newRow.id="newRow";
            var p1 = document.createElement("p");
            var p2 = document.createElement("p");
            var p3 = document.createElement("p");
            passRow.after(newRow);
            var label_old = document.createElement("label");
            var input_old = document.createElement("input");
            var label_new = document.createElement("label");
            var input_new = document.createElement("input");
            var label_confirm = document.createElement("label");
            var input_confirm = document.createElement("input");
            formCell.append(form);
            newRow.append(formCell);
            form.append(p1);
            form.append(p2);
            form.append(p3);
            p1.append(label_old);
            p1.append(input_old);
            p2.append(label_new);
            p2.append(input_new);
            p3.append(label_confirm);
            p3.append(input_confirm);
            label_old.innerHTML = "Old Password:";
            label_new.innerHTML = "New Password:";
            label_confirm.innerHTML="Confirm Password:";
            input_old.type = "password";
            input_new.type = "password";
            input_new.id = "newpassword";
            input_confirm.type="password";
            input_confirm.id="confirmpassword";
            input_old.name="oldpassword";
            input_new.name="newpassword";
            input_confirm.name="confirmpassword";
            input_old.classList.add("required");
            input_new.classList.add("required");
            input_confirm.classList.add("required");
            var submit = document.createElement("input");
            form.append(submit);
            submit.type="submit";
            submit.value="Submit";
        }
        var form = document.getElementById("mainForm");
        form.onsubmit = function(e){
            var requiredInputs = document.querySelectorAll(".required");
            var err = false;
            for (var i=0; i < requiredInputs.length; i++){
                if( isBlank(requiredInputs[i])){
                    err |= true;
                    makeRed(requiredInputs[i]);
                }
                else{
                    makeClean(requiredInputs[i]);
                }
            }
            if (err == true){
                e.preventDefault();
            }
            else{
                console.log('checking match');
                checkPasswordMatch(e);
            }
        }
    }

    emailButton.innerHTML = "Change Email"; 
    emailButton.id = "emailButton";//might also add class to this
    var emailButtonCount = 0;
    emailButton.onclick = function(){
        if (emailButtonCount == 0){
            emailButtonCount = 1;
            userRow.removeChild(userButton);
            passRow.removeChild(passButton);
            var form = document.createElement("FORM");
            var formCell = document.createElement("td");
            formCell.colSpan = "3";
            formCell.id = "newForm";
            form.method = "POST";
            form.action = "profile\\updateEmail.php";
            form.id = "mainForm";
            var newRow = document.createElement("tr");
            newRow.id="newRow";
            emailRow.after(newRow);
            var label = document.createElement("label");
            var input = document.createElement("input");
            formCell.append(form);
            newRow.append(formCell);
            form.append(label);
            form.append(input);
            label.innerHTML = "New Email:";
            input.type = "email";
            input.name="email";
            input.classList.add("required");
            input.id="email";
            var submit = document.createElement("input");
            form.append(submit);
            submit.type="submit";
            submit.value="Submit";
            console.log('checking match');

        }
        var form = document.getElementById("mainForm");
        form.onsubmit = function(e){
            var requiredInputs = document.querySelectorAll(".required");
            var err = false;
            for (var i=0; i < requiredInputs.length; i++){
                if( isBlank(requiredInputs[i])){
                    err |= true;
                    makeRed(requiredInputs[i]);
                }
                else{
                    makeClean(requiredInputs[i]);
                }
            }
            if (err == true){
                e.preventDefault();
            }
            else{
                console.log('checking match');
                checkPasswordMatch(e);
            }
        }
    }

    // control display of buttons depending on condition
    if (userRow.childElementCount < 3 && passRow.childElementCount < 3 && emailRow.childElementCount <3){
        userRow.append(userButton);
        passRow.append(passButton);
        emailRow.append(emailButton);
    }
    else if (userRow.childElementCount == 3 && passRow.childElementCount < 3 && emailRow.childElementCount<3){
        passRow.append(passButton);
        emailRow.append(emailButton);
        document.getElementById("newRow").remove();
    }
    else if (userRow.childElementCount < 3 && passRow.childElementCount == 3 && emailRow.childElementCount<3){
        emailRow.append(emailButton);
        userRow.append(userButton);
        document.getElementById("newRow").remove();
    }
    else if (userRow.childElementCount < 3 && passRow.childElementCount < 3 && emailRow.childElementCount==3){
        userRow.append(userButton);
        passRow.append(passButton);
        document.getElementById("newRow").remove();
    }
       
}

function isBlank(inputField)
  {
      if (inputField.value=="")
      {
           return true;
      }
      return false;
  }
  
function makeRed(inputDiv){
    inputDiv.style.borderColor="#AA0000";
}
  
function makeClean(inputDiv){
    inputDiv.style.borderColor="#FFFFFF";
}

function switchImg(){
    var img = document.getElementById("unban");
    img.src = "../images/unban.png"
}
function banImg(){
    var img = document.getElementById("unban");
    img.src = "../images/banned.png"
}