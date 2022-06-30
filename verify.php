<?php


$username = $_SESSION["username"];
$boardId = $_SESSION["board"];

$sql = "SELECT * FROM boardmembers WHERE username LIKE '$username' AND boardId='$boardId'";
   
   $result = mysqli_query($con, $sql);

   while ($row = mysqli_fetch_assoc($result)) 
   {  
        if($row['isAdmin' == false] && $row['isOwner' == false])
        {
            header("Location: dashboard.php");
        }
        else
        {
            
        }
   }
?>