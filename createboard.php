<?php
include("auth_session.php");
require('db.php');
include("headernarrow.php");
?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="styling.css"/>

<div id="createBoardForm">
        <form class="form" action="" method="post">

        <h1 class="login-title">Nieuw Bord</h1>
        <input type="text" class="login-input" name="name" placeholder="Bord naam" required />

        <input type="text" class="login-input" name="description" placeholder="Bord beschrijving">
        <input type="submit" name="submit" value="Creëer" class="login-button">

        </form>
</div>
</html>
<?php
$username = $_SESSION["username"];
if (isset($_REQUEST['name'])) {
    // removes backslashes
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];
    $id = rand(100000,199999);

    $query    = "INSERT into `boards` (id, name, description)
                 VALUES ('$id', '$name', '$description')";
    $result   = mysqli_query($con, $query);
    if ($result) {
        $query = "INSERT into `boardmembers` (boardId, username, isOwner)
        VALUES ('$id','$username', 1)";
        $result   = mysqli_query($con, $query);
        header("Location: menu.php");
        exit;
        } else {
        echo "<div class='form'>
              <h3>Required fields are missing.</h3><br/>
              <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
              </div>";
    }
}
?>