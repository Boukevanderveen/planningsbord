<html>
<script src="scriptfile.js">
</script>
</html>

<?php
error_reporting(E_ERROR | E_PARSE);
include("auth_session.php");
include("headernarrow.php");
require('db.php');
$username = $_SESSION["username"];
$boardId = $_SESSION["board"];

$sql = "SELECT * FROM boardmembers WHERE username LIKE '$username' AND boardId='$boardId'";
   $result = mysqli_query($con, $sql);
   while ($row = mysqli_fetch_assoc($result)) {  
        if($row['isOwner'] == NULL && $row['isAdmin'] == NULL)
        {
            header("Location: dashboard.php");
        }
   }

echo '<p style="font-weight: bold; font-size: 30; position: absolute; left: 40%">Leden</p>';

$boardId = $_SESSION["board"];
$position = 40;

$sql = "SELECT * FROM boardmembers WHERE boardId=$boardId";
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($result)) 
{ 
    foreach ($result as $value) 
    {
        if ($value['username'] == $username)
        {

        }
        else
        {
        $position += 20;
        echo '<div class="profilelistboardsettings">';
        $username = $value['username'];
        echo '<p style="position: relative; left: 2%; top: 10%; font-weight: bold; font-size: 18"> ' . $value['username']. ' </p>';

        $sql = "SELECT * FROM boardmembers WHERE username LIKE '$username' AND boardId='$boardId'";
   $result = mysqli_query($con, $sql);
   while ($row = mysqli_fetch_assoc($result)) {  
        if($row['isOwner'] == NULL && $row['isAdmin'] == NULL)
        {
            echo '<div class="deleteuserbutton" style="position: absolute; left: 25%; top: 20%;" onclick="return runRemoveUserFromBoardPHP(\'' . $username . '\')">Verwijder Gebruiker</div>';
            echo '<div class="deleteuserbutton" style="position: absolute; left: 12%; top: 20%;" onclick="return runMakeUserAdminPHP(\'' . $username . '\')">Geef admin priveleges </div>';

        }
        if($row['isAdmin'] == 1)
        {
            
        $username2 = $_SESSION["username"];
        $boardId = $_SESSION["board"];
        
        $sql = "SELECT * FROM boardmembers WHERE username LIKE '$username2' AND boardId='$boardId'";
           $result = mysqli_query($con, $sql);
           while ($row = mysqli_fetch_assoc($result)) {  
                if($row['isOwner'] == 1)
                {
            echo '<div class="deleteuserbutton" style="position: absolute; left: 25%; top: 20%;" onclick="return runRemoveUserFromBoardPHP(\'' . $username . '\')">Verwijder Gebruiker</div>';
            echo '<div class="deleteuserbutton" style="position: absolute; left: 12%; top: 20%;" onclick="return runRemoveAdminFromUserPHP(\'' . $username . '\')">Verwijder Admin Privileges</div>';
            
                }
           }


        }

        }
        
        

        $query = " select * from profilepicture where username LIKE '$username' ";
        $result = mysqli_query($con, $query);
 
        while ($data = mysqli_fetch_assoc($result)) 
        {
    ?>
      <img style='position: relative; right: 10%; top: 0%;'class='userdisplayimage' src="./profilepictures/<?php echo $data['filename']; ?>">

    <?php
        }
        

        echo '</div>';
        echo '<br> <br> <br> <br> <br> <br>';


    }
}
    echo '<br> <br> <br>';
}
echo '<br><br>';

$username2 = $_SESSION["username"];
        $boardId = $_SESSION["board"];
        
        $sql = "SELECT * FROM boardmembers WHERE username LIKE '$username2' AND boardId='$boardId'";
           $result = mysqli_query($con, $sql);
           while ($row = mysqli_fetch_assoc($result)) {  
                if($row['isOwner'] == 1)
                {
                    echo '<p style="font-weight: bold; font-size: 30; position: absolute; left: 40%" top: 70%>Verwijder bord</p>';
                    echo '<div class="deleteboardbutton" onclick="goToConfirmBoardDeletion()" style="position: relative; left: 3%; top: 20%;">Verwijder </div>';                    
                }
           }

?>

<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="styling.css"/>
</html>

