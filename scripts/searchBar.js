function search(){
    var searchTerm = $("#searchTerm").val();
    var url = "searchResultsPage.php?searchTerm="+ searchTerm;
    // alert(url);
    $(location).attr('href',url);
}