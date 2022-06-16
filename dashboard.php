<html>
<script type="text/javascript" src=".js"></script>
</html>
<?php 
include("auth_session.php");
include("header.php");
require('db.php');
?>
<!DOCTYPE html>
<p id="toDoTag">To Do</p>
<p id="doingTag">Doing</p>
<p id="reviewTag">For Review</p>
<p id="doneTag">Done</p>


<script src="scriptfile.js">
</script>
<html>
<head>
<p id="myP2" class="testclass" onmousedown="mouseDown()" onmouseup="mouseUp()">

    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="styling.css"/>

</head>
<body onload="hideShow()">
<!-- 
    <div class="form">
        <p>Hallo, <?php //echo $_SESSION['username']; ?>!</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
//-->

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
displayistoDoCards($con);

displayisDoingCards($con);

displayisReviewCards($con);

displayisDoneCards($con);

?>
<?php

if (isset($_REQUEST['id'])) 
{
   echo 'alerrt()';
}
  

// CREATE CARD CODE


if (isset($_REQUEST['name'])) {
    // removes backslashes
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];;
    $query    = "INSERT into `cards` (name, description, isToDo)
                 VALUES ('$name', '$description', 1)";
    $result   = mysqli_query($con, $query);
    if ($result) {
        echo '<script type="text/javascript">',
        refreshPage();
        '</script>';
    } else {
        echo "<div class='form'>
              <h3>Required fields are missing.</h3><br/>
              <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
              </div>";
    }
}



// DISPLAY CARD CODE

    function displayistoDoCards($con)
    {
       $position = 12;
       $sql = "SELECT * FROM cards WHERE istoDo  = 1";
       $result = mysqli_query($con, $sql);
       echo "<br>";
       while ($row = mysqli_fetch_assoc($result)) { 
           echo "<tr>";

           foreach ($result as $value) 
           {
                
            $position += 13;
                 
            $divID = $value['id']; 

            echo '<div id=' . $divID . ' style="position: absolute; left: 10%; top:' . $position. '%" class=cardsistoDo onmouseover= startDrag("' . $divID. '");> <td>' . $value['name'] . " </td> <br> <td>" . $value['description'] . '</td> </div> ';
            echo "</div>";
            echo '<script type="text/javascript">',
            '</script>';

            }
       }
       echo "<br>";
       echo "</tr>";
       echo "<br>";
    }

    function displayisDoingCards($con)
    {  
        $position = 12;
        $sql = "SELECT * FROM cards WHERE isDoing  = 1";
        $result = mysqli_query($con, $sql);
        echo "<br>";
        while ($row = mysqli_fetch_assoc($result)) { 

            echo "<tr>";
    
            foreach ($result as $value) 
            {
                 
                $position += 13;
                 
                $divID = $value['id']; 
    
                echo '<div id=' . $divID . ' style="position: absolute; left: 30%; top:' . $position. '%" class=cardsisDoing onmouseover= startDrag("' . $divID. '");> <td>' . $value['name'] . " </td> <br> <td>" . $value['description'] . '</td> </div> ';
                echo "</div>";
                echo '<script type="text/javascript">',
                '</script>';
                 }
        }
        echo "<br>";
        echo "</tr>";
        echo "<br>";
    }

    function displayisReviewCards($con)
    {  
        $position = 12;
        $sql = "SELECT * FROM cards WHERE isReview  = 1";
        $result = mysqli_query($con, $sql);
        echo "<br>";
        while ($row = mysqli_fetch_assoc($result)) { 
            echo "<tr>";
    
            foreach ($result as $value) 
            {
                 
                $position += 13;
                 
                $divID = $value['id']; 
   
               echo '<div id=' . $divID . ' style="position: absolute; left: 50%; top:' . $position. '%" class=cardsisReview onmouseover= startDrag("' . $divID. '");> <td>' . $value['name'] . " </td> <br> <td>" . $value['description'] . '</td> </div> ';
               echo "</div>";
               echo '<script type="text/javascript">',
               '</script>';
                 }
        }
        echo "<br>";
        echo "</tr>";
        echo "<br>";
    }

    function displayisDoneCards($con)
    {
        $position = 12;
        $sql = "SELECT * FROM cards WHERE isDone  = 1";
        $result = mysqli_query($con, $sql);
        echo "<br>";
        while ($row = mysqli_fetch_assoc($result)) { 
            echo "<tr>";
    
            foreach ($result as $value) 
            {
                 $position += 13;
                 
                 $divID = $value['id']; 
    
                echo '<div id=' . $divID . ' style="position: absolute; left: 70%; top:' . $position. '%" class=cardsisDone onmouseover= startDrag("' . $divID. '");> <td>' . $value['name'] . " </td> <br> <td>" . $value['description'] . '</td> </div> ';
                echo "</div>";

                 }
        }
        echo "<br>";
        echo "</tr>";
        echo "<br>";
    }   
?>
