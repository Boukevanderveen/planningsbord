<?php
    //Is nodig om de variables te krijgen van de vorige session
    session_id( 'auth' );
    session_start();
    //Als de $_SESSION variable niet geinitializeerd is, dan gaat hij naar login.php. Anders continueerd de code.
    if(!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
?>
