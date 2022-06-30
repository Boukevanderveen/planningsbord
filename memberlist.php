<html>
<script src="scriptfile.js">
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="styling.css"/>

</html>

<?php
error_reporting(E_ERROR | E_PARSE);
include("auth_session.php");
include("headernarrow.php");
require('db.php');
$username = $_SESSION["username"];
$boardId = $_SESSION["board"];

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
        $sql2 = "SELECT * FROM users WHERE username LIKE '$username'";
        $result2 = mysqli_query($con, $sql2);
        while ($row2 = mysqli_fetch_assoc($result2)) 
        { 
        echo '<p style="position: relative; left: 2%; top: 20%; font-weight: bold; font-size: 18"> ' . $value2['bio']. ' </p>';
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
        
