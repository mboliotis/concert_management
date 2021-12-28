<?php
    session_start();

    require './../../tools/header.php';
    MenuBar();
    SearchBar();
    Body();

    require './../../tools/footer.php';
?>


<?php
    function SetHeader(){
        echo "<link rel=\"stylesheet\" href=\"./css/card_style.css\">";
    }


    function SetFooter(){
        echo '<script src="./js/tools.js"></script>';
    }

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
                            <li><a class=\"dropdown-item\" href=\"\">Favorites</a></li>
                            <li><a class=\"dropdown-item\" href=\"./../signout.php\">Quit</a></li>
                        </ul>
                    </div> 
                </div>
                <div class=\"col\">
                    <h6 style=\"text-align: right\">".$_SESSION['username']." ( ".$_SESSION['role']." )</h6>
                </div>    
            </div>". 
       "</div>";
    }

    function SearchBar(){
        echo 
        "<div class=\"container-fluid bg-dark text-white\">".
            "<div class=\"row\">
                <div class=\"col\">
                    
                </div>
                <div class=\"col\">
                    <input type=\"text\" class=\"form-control\" id=\"search\"  placeholder=\"Enter concert\" name=\"search\" >
                  
                </div>
                <div class=\"col\">
                    <button type=\"button\" class=\"btn btn-light \">
                        Search
                    </button>
                </div>    
            </div>". 
       "</div>";
    }


    function Body(){
        $organizer_concerts = getConcerts();
        echo    '<div id="concerts" class="container-fluid p-2 bd-highlight">';
                    foreach ($organizer_concerts as &$value) {
                        echo EventCard($value['_id']['$oid'], $value['Title'], $value['Date'], $value['Artist'], $value['Category']);
                    }
        echo    '</div>';
    }

    function EventCard($id, $title, $date, $artist, $category){
        $result =  '<div class="card"   id='.$id.'>
                        <div class="card-body">
                            <h5 class="card-title">'.$title.'</h5>
                            <hr>
                            <p class="card-text">Date: '.$date.'</p>
                            <p class="card-text">Artist: '.$artist.'</p>
                            <p class="card-text">Category: '.$category.'</p>
                            <a onclick="addFavorite(\''.$id.'\', \''.$title.'\', \''.$date.'\', \''.$artist.'\', \''.$category.'\')"   class="btn btn-dark">Add to favorites</a>
                            
                        </div>
                    </div>';

        return $result;
    }


    function getConcerts(){
         
        $ch = curl_init();  
        $the_header = array('X-Auth-Token: '.$_SESSION['access_token_info']['access_token']);
    
        curl_setopt($ch, CURLOPT_HTTPHEADER, $the_header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,"http://172.18.1.11/getFavorites.php?username=".$_SESSION['username']);
        curl_setopt($ch, CURLOPT_POST, false);
        
    
        $server_output = curl_exec($ch);
            
        curl_close ($ch);
         
        return json_decode($server_output, true );
        
         
    }

?>