<?php 
include("auth_session.php");
require('db.php');

?>
<!DOCTYPE html>
<script src="scriptfile.js">
</script>
<html>
<head>
<p id="myP2" class="testclass" onmousedown="mouseDown()" onmouseup="mouseUp()">

    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
<link rel="stylesheet" href="styling.css"/>

</head>
<body onload="hideShow()">
<!-- 
    <div class="form">
        <p>Hallo, <?php //echo $_SESSION['username']; ?>!</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
//-->

<div id="newcardButton" onclick="hideShow()">Nieuwe Kaart</button> </div>
<div id="myDIV">
        <form class="form" action="" method="post">

        <h1 class="login-title">Voeg een kaart toe</h1>
        <input type="text" class="login-input" name="name" placeholder="Kaart naam" required />

        <input type="text" class="login-input" name="description" placeholder="beschrijving">
        <input type="submit" name="submit" value="Voeg kaart toe" class="login-button">

        </form>
        </div>
</html>

<?php 
displayCards($con);
?>
<?php 
displayCards2($con);
?>
<?php 
displayCards3($con);
?>
<?php

// CREATE CARD CODE


if (isset($_REQUEST['name'])) {
    // removes backslashes
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];;
    $query    = "INSERT into `cards` (name, description)
                 VALUES ('$name', '$description')";
    $result   = mysqli_query($con, $query);
    if ($result) {
    } else {
        echo "<div class='form'>
              <h3>Required fields are missing.</h3><br/>
              <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
              </div>";
    }
}


if (isset($_REQUEST['name'])) 
{

}



// DISPLAY CARD CODE

    function displayCards($con)
    {
       $sql = "SELECT * FROM cards WHERE istoDo  = 1";
       $result = mysqli_query($con, $sql);
       echo "<br>";
       while ($row = mysqli_fetch_assoc($result)) { 
           echo "<tr>";

           foreach ($result as $value) 
           {
                
                $divID = $value['id']; 
               
               echo '<div id=' . $divID . ' class=cardsisDoing onmouseover= startDrag("' . $divID. '");> <td>' . $value['name'] . " </td> <br> <td>" . $value['description'] . '</td> </div> ';
               echo "</div>";
               echo "<br><br><br><br><br><br>";
                
                }
       }
       echo "<br>";
       echo "</tr>";
       echo "<br>";
    }

    function displayCards2($con)
    {  
        $sql = "SELECT * FROM cards WHERE isDoing  = 1";
        $result = mysqli_query($con, $sql);
        echo "<br>";
        while ($row = mysqli_fetch_assoc($result)) { 
            echo "<tr>";
    
            foreach ($result as $value) 
            {
                 
                 $divID = $value['id']; 
    
                echo '<div id=' . $divID . ' class=cardsisReview onmouseover= startDrag("' . $divID. '");> <td>' . $value['name'] . " </td> <br> <td>" . $value['description'] . '</td> </div> ';
                echo "</div>";
                echo "<br><br><br><br><br><br><br>";
                 
                 }
        }
        echo "<br>";
        echo "</tr>";
        echo "<br>";
    }

    function displayCards3($con)
    {
        $sql = "SELECT * FROM cards WHERE isDone  = 1";
        $result = mysqli_query($con, $sql);
        echo "<br>";
        while ($row = mysqli_fetch_assoc($result)) { 
            echo "<tr>";
    
            foreach ($result as $value) 
            {
                 
                 $divID = $value['id']; 
    
                echo '<div id=' . $divID . ' class=cardsisDone onmouseover= startDrag("' . $divID. '");> <td>' . $value['name'] . " </td> <br> <td>" . $value['description'] . '</td> </div> ';
                echo "</div>";
                echo "<br><br><br><br><br><br><br>";
                 
                 }
        }
        echo "<br>";
        echo "</tr>";
        echo "<br>";
    }
       
       function updatetoIsDoing($divID)
       {
       //Update de is doing bool naar true
       $sql = "UPDATE cards SET isDoing='1' WHERE id=$divID";    
           $result   = mysqli_query($con, $query);
           if ($result) {
           } else {
           echo "<div class='form'>
               <h3>Required fields are missing.</h3><br/>
               </div>";
           }
        }
    
    
?>
