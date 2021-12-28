<?php
    function MenuBar(){
        echo 
        "<div class=\"container-fluid bg-dark text-white\">".
            "<div class=\"row\">
                <div class=\"col\">
                    <div class=\"dropdown\">
                        <button type=\"button\" class=\"btn btn-dark dropdown-toggle\" data-bs-toggle=\"dropdown\">
                            Menu
                        </button>
                        <ul class=\"dropdown-menu\">
                            <li><a class=\"dropdown-item\" href=\"#\">Create Event</a></li>
                            <li><a class=\"dropdown-item\" href=\"#\">Quit</a></li>
                        </ul>
                    </div> 
                </div>
                <div class=\"col\">
                    <h6 style=\"text-align: right\">".$_SESSION['username']." ( ".$_SESSION['role']." )</h6>
                </div>    
            </div>". 
       "</div>";
    }




?>