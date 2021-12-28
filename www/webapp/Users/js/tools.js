function addFavorite(id, title, date, artist, category){
    $.get("./addFavorite.php?id="+id+"&title="+title+"&date="+date+"&artist="+artist+"&category="+category, function(server_response, status){
        alert("Server Response: " + server_response + "\nStatus: " + status);
      });
    
    
    
}