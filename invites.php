<html>
<link rel="stylesheet" href="styling.css"/>
<script src="scriptfile.js">
</script>
</html>
<?php
include("auth_session.php");
require('db.php');

$username = $_SESSION["username"];
$sql = "SELECT * FROM invites WHERE username LIKE '$username'";

$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($result)) { 
    echo "<tr>";
     
    foreach ($result as $value) 
    {
    $boardId = $value['boardId'];
    $sql = "SELECT * FROM boards WHERE id = $boardId";
    $result = $con -> query($sql);
    $row = $result -> fetch_assoc();
        
    $boardName = $row['name'];

    echo '<div id="" class=""> <td>' . $boardName .'</td> </div> ';
    echo '<div id="acceptButton" class="btn btn-outline-primary my-2 my-sm-0" onclick=acceptInvitation("' . $boardId. '")>Accepteer</button></div>';
    echo '<br>';
    echo '<div id="declineButton" onclick=declineInvitation("' . $boardId. '") class="btn btn-outline-primary my-2 my-sm-0">Weiger</button> </div>';
    echo "</div>";

    echo '<br>';
    echo '<br>';
    echo '<br>';

    echo '<script type="text/javascript">',
    '</script>';
    }

     }


?>