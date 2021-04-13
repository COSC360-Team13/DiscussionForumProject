function search(){
    var searchTerm = $("#searchTerm").val();
    var url = "searchResultsPage.php?subtopic="+ searchTerm;
    alert(url);
    $(location).attr('href',url);
}