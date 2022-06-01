<!DOCTYPE html>
<html>
<head>
<p id="myP2" class="testclass" onmousedown="mouseDown()" onmouseup="mouseUp()">

    <div id="div1" class="div1class" onmousedown=""> 
    </div>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
<link rel="stylesheet" href="styling/style.css"/>

    <p id="text">test <p>
</head>
<body>
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

// CREATE CARD CODE

include("auth_session.php");
require('db.php');
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

// DISPLAY CARD CODE

       $sql = "SELECT * FROM cards";
       $result = mysqli_query($con, $sql);
       echo "<br>";
       while ($row = mysqli_fetch_assoc($result)) { 
           echo "<tr>";

           foreach ($result as $value) 
           {
                if ($value['isDoing'] == true) 
                {
                $divID = $value['id']; 

               echo "<div id='" . $divID . "' class='cardsisDoing'>  <td>" . $value['name'] . " </td> <br> <td>" . $value['description'] . "</td> ";                    
               echo "</div>";
               echo "<br>";

                } 
                else if ($value['isReview'] == true) 
                {
                    $divID = $value['id']; 

                    echo "<div id='" . $divID . "' class='cardsisReview'>  <td>" . $value['name'] . " </td> <br> <td>" . $value['description'] . "</td> ";                    
                    echo "</div>";
                    echo "<br>";
                } 
                else if ($value['isDone'] == true)
                {
                    $divID = $value['id']; 

                    echo "<div style='position: relative;' id='" . $divID . "' class='cardsisDone'>  <td>" . $value['name'] . " </td> <br> <td>" . $value['description'] . "</td> ";                    
                    echo "</div>";
                    echo "<br>";
                }
                else
                {
                    $divID = $value['id']; 

               echo "<div style='position: relative;' id='" . $divID . "' class='cards'>  <td>" . $value['name'] . " </td> <br> <td>" . $value['description'] . "</td> ";                    
               echo "</div>";
               echo "<br>";
                }


               
            
        
       echo "<br>";
            }
       echo "</tr>";
       echo "<br>";

       }
?>






<script>

function hideShow() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

// Make the DIV element draggable:
dragElement(document.getElementById("div1"));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    // if present, the header is where you move the DIV from:
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    // otherwise, move the DIV from anywhere inside the DIV:
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    // stop moving when mouse button is released:
    document.onmouseup = null;
    document.onmousemove = null;
    draggedObject();
  }
}

function draggedObject()
{
    var rect = div1.getBoundingClientRect();
    $lol = rect.left;
    if ($lol > 350 && $lol < 600)
    {
    document.getElementById("text").innerHTML = "isDoing " + $lol;
    return;
    }
    if ($lol > 600 && $lol <900)
    {
    document.getElementById("text").innerHTML = "isReview " + $lol;
    }
    if ($lol > 900)
    {
    document.getElementById("text").innerHTML = "isDone " + $lol;
    }
   
}

</script>



<style>
</style>