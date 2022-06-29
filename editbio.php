<?php
include("auth_session.php");
include("headernarrow.php");
require('db.php');
?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="styling.css"/>
<script type="text/javascript" src="scriptfile.js"></script>
<div id="addCardDiv">
        <form class="form" action="" method="post">

        <h1 class="login-title">Bewerk je bio</h1>
        <input type="text" class="login-input" name="bio" placeholder="Nieuwe bio" required />

        <input type="submit" name="submit" value="Bevestig nieuwe bio" class="login-button">

        </form>
        </div>
</html>

<?php
$username = $_SESSION["username"];
if (isset($_REQUEST['bio'])) {
    $bio = $_REQUEST['bio'];
    $update= "UPDATE users SET bio='$bio' WHERE username='$username'";
    if(mysqli_query($con, $update)) 
    {
        header("Location: profile.php");
    } 
    else {
        echo "Cannot Insert";
    }
    }
?>