<?php
include("auth_session.php");
require('db.php');
$boardId = $_SESSION["board"];
$sql = "DELETE FROM boards WHERE id = $boardId";
if ($con->query($sql) === TRUE) 
{
    $_SESSION["board"] = 0;
    $sql = "DELETE * FROM invites WHERE boardId = '$boardId' AND username LIKE '$username'";    
    if ($con->query($sql) === TRUE) 
    {
    header("Location: menu.php");
    }
}
?>
