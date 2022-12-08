<html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>

    <link rel="stylesheet" href="styling.css"/>

</head>
<body onload="hideShowAddCard(), hideShowAddMember()">
<!-- 
    <div class="form">
        <p>Hallo, <?php //echo $_SESSION['username']; ?>!</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
//-->

<div id="addCardDiv">
        <form class="form" action="" method="post">

        <h1 class="login-title">Voeg een kaart toe</h1>
        <input type="text" class="login-input" name="name" placeholder="Kaart naam" required />

        <input type="text" class="login-input" name="description" placeholder="beschrijving">
        <input type="submit" name="submit" value="Voeg kaart toe" class="login-button">

        </form>
</div>

<div id="addMemberDiv">
        <form class="form" action="" method="post">

        <h1 class="login-title">Nodig leden uit</h1>
        <input type="text" class="login-input" name="username" placeholder="username" required />

        <input type="submit" name="submit" value="Nodig lid uit" class="login-button">

        </form>
        </div>
</html>


<?php 

if($_SESSION["board"] < 10000)
{
    header("Location: menu.php");
}

$boardId = $_SESSION["board"];

displayistoDoCards($con, $boardId);

displayisDoingCards($con, $boardId);

displayisReviewCards($con, $boardId);

displayisDoneCards($con, $boardId);

?>
<?php

// CREATE CARD CODE

if (isset($_REQUEST['name'])) {
    // removes backslashes
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];;
    $query    = "INSERT into `cards` (name, description, boardId, isToDo)
                 VALUES ('$name', '$description', '$boardId', 1)";
    $result   = mysqli_query($con, $query);
    if ($result) {
        echo '<script type="text/javascript">',
        header("Location: dashboard.php");        '</script>';
    } else {
        echo "<div class='form'>
              <h3>Required fields are missing.</h3><br/>
              </div>";
    }
}

// CREATE INVITE CODE

if (isset($_REQUEST['username'])) {
    // removes backslashes
    $username = $_REQUEST['username'];

    $sql_b = "SELECT * FROM boardmembers WHERE username='$username' AND boardId='$boardId'";
    $res_b = mysqli_query($con, $sql_b);

    if (mysqli_num_rows($res_b) > 0) {
        echo "<div class='form'>
            <h3>Sorry... can't send invite, has already been sent!</h3><br/>
            <p class='link'>ga <a href='dashboard.php'> terug</a></p>
            </div>";
    }else{

    $sql_i = "SELECT * FROM invites WHERE username='$username' AND boardId='$boardId'";
    $res_i = mysqli_query($con, $sql_i);

    if (mysqli_num_rows($res_i) > 0) {
        echo "<div class='form'>
            <h3>Sorry... can't send invite, has already been sent!</h3><br/>
            <p class='link'>ga <a href='dashboard.php'> terug</a></p>
            </div>";
    }else{
    }

    $query    = "INSERT into invites (username, boardId)
                 VALUES ('$username', '$boardId')";

    $result   = mysqli_query($con, $query);
    if ($result) {
        echo '<script type="text/javascript">',
        refreshPage();
        '</script>';
    } 
}
}



// DISPLAY CARD CODE

    function displayistoDoCards($con, $boardId)
    {
       $position = 12;
       $sql = "SELECT * FROM cards WHERE istoDo  = 1 AND boardId = $boardId;";
       $result = mysqli_query($con, $sql);
       echo "<br>";
       while ($row = mysqli_fetch_assoc($result)) { 
           echo "<tr>";
            
           foreach ($result as $value) 
           {
                
            $position += 13;
                 
            $divID = $value['id']; 

            echo '<div id=' . $divID . ' style="position: absolute; left: 10%; top:' . $position. '%" class=cardsistoDo onmouseover= startDrag("' . $divID. '");> <td>' . $value['name'] . " </td> <br> <td>" . $value['description'] . '</td> 
            <td>
            <button type="submit" onclick= runDeleteCardPHP("'.$divID.'") id="delete" style="position: absolute; left:75%; top: 70% width: 6%; " class="btn btn-danger">
            <span class="bi bi-trash"></span> </td>
            </div> ';

            echo "</div>";
            echo '<script type="text/javascript">',
            '</script>';

            }
       }
       echo "<br>";
       echo "</tr>";
       echo "<br>";
    }

    function displayisDoingCards($con, $boardId)
    {  
        $position = 12;
        $sql = "SELECT * FROM cards WHERE isDoing  = 1 AND boardId = $boardId";
        $result = mysqli_query($con, $sql);
        echo "<br>";
        while ($row = mysqli_fetch_assoc($result)) { 

            echo "<tr>";
    
            foreach ($result as $value) 
            {
                 
                $position += 13;
                 
                $divID = $value['id']; 
    
                echo '<div id=' . $divID . ' style="position: absolute; left: 30%; top:' . $position. '%" class=cardsisDoing onmouseover= startDrag("' . $divID. '");> <td>' . $value['name'] . " </td> <br> <td>" . $value['description'] . '</td>
                <td>
                <button type="submit" onclick= runDeleteCardPHP("'.$divID.'") id="delete" style="position: absolute; left:75%; top: 70% width: 6%; " class="btn btn-danger">
                <span class="bi bi-trash"></span> </td>';
                echo "</div>";
                echo '<script type="text/javascript">',
                '</script>';
                 }
        }
        echo "<br>";
        echo "</tr>";
        echo "<br>";
    }

    function displayisReviewCards($con, $boardId)
    {  
        $position = 12;
        $sql = "SELECT * FROM cards WHERE isReview  = 1 AND boardId = $boardId";
        $result = mysqli_query($con, $sql);
        echo "<br>";
        while ($row = mysqli_fetch_assoc($result)) { 
            echo "<tr>";
    
            foreach ($result as $value) 
            {
                 
                $position += 13;
                 
                $divID = $value['id']; 
   
               echo '<div id=' . $divID . ' style="position: absolute; left: 50%; top:' . $position. '%" class=cardsisReview onmouseover= startDrag("' . $divID. '");> <td>' . $value['name'] . " </td> <br> <td>" . $value['description'] . '</td>
               <button type="submit" onclick= runDeleteCardPHP("'.$divID.'") id="delete" style="position: absolute; left:75%; top: 70% width: 6%; " class="btn btn-danger">
               <td>
               <span class="bi bi-trash"></span> </td>
               </div>';
               '</script>';
                 }
        }
        echo "<br>";
        echo "</tr>";
        echo "<br>";
    }

    function displayisDoneCards($con, $boardId)
    {
        $position = 12;
        $sql = "SELECT * FROM cards WHERE isDone  = 1 AND boardId = $boardId";
        $result = mysqli_query($con, $sql);
        echo "<br>";
        while ($row = mysqli_fetch_assoc($result)) { 
            echo "<tr>";
            
            //Print elke card record met de name en description. Met onmouseover dat startDrag roept en de gezette ID zonder hoeven te klikken voor het draggen.
            foreach ($result as $value) 
            {
                //Loopt de $position in for each en wordt groter bij elke kaart dat geloopt is zodat de positie elke keer meer naar onder is.
                 $position += 13;
                 
                 $divID = $value['id']; 
    
                echo '<div id=' . $divID . ' style="position: absolute; left: 70%; top:' . $position. '%" class=cardsisDone onmouseover= startDrag("' . $divID. '");> <td>' . $value['name'] . " </td> <br> <td>" . $value['description'] . '</td>
                <button type="submit" onclick= runDeleteCardPHP("'.$divID.'") id="delete" style="position: absolute; left:75%; top: 70% width: 6%; " class="btn btn-danger">
                <td>
                <span class="bi bi-trash"></span> </td>
                </div>';

                 }
        }
        echo "<br>";
        echo "</tr>";
        echo "<br>";
    }   
?>
