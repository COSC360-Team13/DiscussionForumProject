function showPosts(filter, subtopic, color, textColor) {
    if (filter == "") {
        //document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("center-posts").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","subtopicResults.php?filter="+filter+"&subtopic="+subtopic+"&color="+color+"&textColor="+textColor,true);
        xmlhttp.send();
    }
}

function showComments(filter, subtopic, color, textColor) {
    if (filter == "") {
        //document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("right-comments").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","subtopicCommentResults.php?filter="+filter+"&subtopic="+subtopic+"&color="+color+"&textColor="+textColor,true);
        xmlhttp.send();
    }
}

function vote(voteDiv, pid, direction) {
    var voteCount = parseInt(voteDiv.innerHTML);
    var newVote;
    if (direction == "up"){
        var newVote = voteCount + 1;
    }else {
        var newVote = voteCount - 1;
    }

    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var voteWorked = this.responseText;
            if(voteWorked == "True"){
                voteDiv.innerHTML = newVote;
            }else {
                alert("You've already voted");
            }
        }
    };
    
    xmlhttp.open("GET","registerPostVote.php?pid="+pid+"&direction="+direction,true);
    xmlhttp.send();
}

function deletePost(pid, subtopic, color, textColor) {

    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var voteWorked = this.responseText;
            if(voteWorked == "True"){
                showPosts("Top", subtopic, color, textColor);
                showComments("Top", subtopic, color, textColor);
            }
        }
    };
    
    xmlhttp.open("GET","deletePost.php?pid="+pid,true);
    xmlhttp.send();

}
