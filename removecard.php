<?php
require('db.php');
require('auth_session.php');
    
$card = $_POST['selectedCard'];

$sql = "DELETE FROM cards WHERE id=$card";
$result = mysqli_query($con, $sql);


?>