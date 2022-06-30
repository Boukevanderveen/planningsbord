<?php
require('db.php');
require('auth_session.php');
    
$username = $_POST['selectedUser'];
$boardId = $_SESSION["board"];

$sql = "UPDATE boardmembers SET isAdmin=1 WHERE username LIKE '$username' AND boardId='$boardId'";
$result = mysqli_query($con, $sql);


?>