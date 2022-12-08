<?php
include("auth_session.php");
require('db.php');
include("headernarrow.php");
?>
 <html>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

 <script src="scriptfile.js">
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="styling.css"/>
 <p id="menufrontText">Planningsbord</p>
 <div id="addBoardButton" onclick=" window.open('http://localhost/planningtoolbord/createboard.php','_self', '_blank'); return false;"> <p class="makeNewBoardButtonText"> Nieuw bord </p> </div>
 <div id="invitesButton" onclick=" window.open('http://localhost/planningtoolbord/invites.php','_self', '_blank'); return false;"> <p class="makeNewBoardButtonText"> Invites </p> </div>
    <form class="form-inline my-2 my-lg-0">
    </form>
 </html>
 <?php
displayBoards($con);
function displayBoards($con)
{
   $username = $_SESSION["username"];
   $position = -28;
   $position2 = -28;
   $topPosition = 25;
   $topPositionCounter = 0;
   $limitCounter = 0;
   $sql = "SELECT * FROM boardmembers WHERE username LIKE '$username'";
   
   $result = mysqli_query($con, $sql);
   while ($row = mysqli_fetch_assoc($result)) { 
        
       foreach ($result as $value) 
       {
         $boardId = $value['boardId'];
         $sql2 = "SELECT * FROM boards WHERE id=$boardId";
         $result2 = mysqli_query($con, $sql2);
         // $row2 ?
         while ($row2 = mysqli_fetch_assoc($result2)) { 
         foreach ($result2 as $value2) 
         {
            $position += 32;
            $topPositionCounter += 1;
            
            if($topPositionCounter < 4)
            {
            echo '<div class="boardsDisplay" style="position: absolute; top: ' . $topPosition. '%; left:' . $position. '%" class=cardsistoDo";> <td>' . $value2['name'] . " </td> <br> <td>" . $value2['description'] . '</td> ';
            echo '<div class="goToBoardButton" onclick= runPHP("' . $boardId. '");> <p class="goToBoardButtonText"> Ga naar bord </p> </div> ';
            echo '</div>';
            
            }
            if($topPositionCounter == 4 || $topPositionCounter > 4)
            {
            $position2 += 32;
            $topPosition = 60;
            echo '<div class="boardsDisplay" style="position: absolute; top: ' . $topPosition. '%; left:' . $position2. '%" class=cardsistoDo;> <td>' . $value2['name'] . " </td> <br> <td>" . $value2['description'] . '</td> ';
            echo '<div class="goToBoardButton"><p class="goToBoardButtonText"> Ga naar bord </p> </div> ';
            echo "</div>";
            echo '<div class="boardsDisplay" style="position: absolute; top: ' . $topPosition. '%; left:' . $position2. '%" class=cardsistoDo";> <td>' . $value2['name'] . " </td> <br> <td>" . $value2['description'] . '</td> ';
            echo '<div class="goToBoardButton" onclick= runPHP("' . $boardId. '");> <p class="goToBoardButtonText"> Ga naar bord </p> </div> ';
            echo '</div>';
            $topPositionCounter = 4;


         }
      }
   }
   }
}
}
 ?>