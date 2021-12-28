function deleteEvent(id){
    $.get("./delete.php?id="+id, function(server_response, status){
        alert("Server Response: " + server_response + "\nStatus: " + status);
      });
    
    $("#"+id).remove();
    
}