function search(){
    var searchTerm = $("#searchTerm").val();
    var url = "searchResultsPage.php?searchTerm="+ searchTerm;
    // alert(url);
    $(location).attr('href',url);
}
function profile(){
    var url = "profile.php";
    $(location).attr('href',url);
}