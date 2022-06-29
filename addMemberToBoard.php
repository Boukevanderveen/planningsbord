<?php
include("auth_session.php");
require('db.php');

$username = $_SESSION["username"];
$boardId = $_POST['idOfBoard'];

$query = "INSERT into `boardmembers` (username, boardId)
VALUES ('$username', '$boardId')";
$result   = mysqli_query($con, $query);

$sql = "DELETE FROM invites WHERE username LIKE '$username' AND boardId = '$boardId'";
if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
?>