function adaptForm(sel){
    var option = sel.options[sel.selectedIndex].text;
    var name = document.getElementById("Name");
    var post = document.getElementById("Post");
    var email = document.getElementById("Email");
    if (option == "Name"){
        name.disabled = !name.disabled;
        post.disabled = true;
        email.disabled = true;
        name.classList.add("required");
        if (post.classList.contains("required")){
            post.classList.remove("required");
        }
        if (email.classList.contains("required")){
            email.classList.remove("required");
        }
    }
    else if(option == "Email"){
        email.disabled = !email.disabled;
        post.disabled = true;
        name.disabled = true;
        email.classList.add("required");
        if (post.classList.contains("required")){
            post.classList.remove("required");
        }
        if (name.classList.contains("required")){
            name.classList.remove("required");
        }
    }
    else{
        post.disabled = !post.disabled;
        name.disabled = true;
        email.disabled = true;
        post.classList.add("required");
        if (name.classList.contains("required")){
            name.classList.remove("required");
        }
        if (email.classList.contains("required")){
            email.classList.remove("required");
        }
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
  
  window.onload = function()
  {
      var mainForm = document.getElementById("mainForm");
  
      mainForm.onsubmit = function(e)
      {
           var requiredInputs = document.querySelectorAll(".required");
         var err = false;
  
           for (var i=0; i < requiredInputs.length; i++)
         {
              if( isBlank(requiredInputs[i]))
            {
                    err |= true;
                    makeRed(requiredInputs[i]);
              }
              else
            {
                    makeClean(requiredInputs[i]);
              }
          }
        if (err == true)
        {
          e.preventDefault();
        }
        else
        {
          console.log('checking match');
          // checkPasswordMatch(e);
        }
      }
  }