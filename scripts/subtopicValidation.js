$(document).ready(function(){
    // This file controls all the javascript for newSubtopic.php

    // Color Preview
    $("#color").on("change", function(){
        $(".grid-header").css("background-color", this.value);
    });
    $(".color-text").on("change", function(){
        $(".grid-header").css("color", this.value);
    });
    
    // Characters remaining
    $("#title").keyup(function() {
        var maxLength = $(this).attr("maxlength");
        //alert(this.value+ "  "+this.value.trim());
        var charRemaining = maxLength - this.value.trim().length;
        $("#title-counter").html(charRemaining+" characters remaining");
    });
    $("#about").keyup(function() {
        var maxLength = $(this).attr("maxlength");
        var charRemaining = maxLength - this.value.length;
        $("#about-counter").html(charRemaining+" characters remaining");
    });

    // Showing if subtopic name is available
    $("#title").keyup(function(){
        var title = $(this).val().trim();
        //alert(title);
        if(title !== ''){
            $.ajax({
                url: 'subtopicValidationCheck.php',
                type: 'post',
                data: {title:title},
                success: function(response){
                    // Show response
                    $("#subtopicValid").html(response);
                }
            });
        }else{
            $("#subtopicValid").html("");
        }
    });

    // Validating subtopic title for form submission
    $("#mainForm").submit(function(e){
        var subtopicValid = document.getElementById("subtopicValid");
        if (subtopicValid.innerText === "Unavailable"){
            e.preventDefault();
        }
        
    });
});