<?php
    session_start();

    require './../../tools/header.php';
    MenuBar();
    Body();

    require './../../tools/footer.php';
?>


<?php
    function SetHeader(){
        echo "<link rel=\"stylesheet\" href=\"./css/card_style.css\">";
    }


    function SetFooter(){
        echo " <script></script> ";
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
                            <li><a class=\"dropdown-item\" href=\"#\">Create Event</a></li>
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

    function Body(){
        echo    '<div class="container-fluid p-2 bd-highlight">
                    <form action="store_edit.php" method="post" class="was-validated">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" id="title" value="'.$_GET['title'].'" placeholder="Enter title" name="title" required>
                            <label for="title">Title</label>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    
                        <div class="form-floating mt-3 mb-3">
                            <input type="text" class="form-control" id="date" value="'.$_GET['date'].'" placeholder="Enter date" name="date" required>
                            <label for="date">Date</label>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>

                        <div class="form-floating mt-3 mb-3">
                            <input type="text" class="form-control" id="artist" value="'.$_GET['artist'].'" placeholder="Enter Artist" name="artist" required>
                            <label for="artist">Artist</label>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>

                        <div class="form-floating mt-3 mb-3">
                            <input type="text" class="form-control" id="category" value="'.$_GET['category'].'" placeholder="Enter Category" name="category" required>
                            <label for="category">Category</label>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-floating mt-3 mb-3">
                            <input type="text" class="form-control" id="id" value="'.$_GET['id'].'" placeholder="Enter Category" name="id" readonly>
                            <label for="id">Event ID (Secret)</label>
                             
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button
                    </form>
                </div>';
    }

    

?>