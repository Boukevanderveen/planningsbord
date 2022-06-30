<?php 
include("auth_session.php");
require('db.php');

// cardId is undefined
$targetCard = $_POST['selectedCard'];
$sql = "DELETE FROM cards WHERE id = $targetCard";

if (mysqli_query($con, $sql)) {
    echo "record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($con);
}

?>