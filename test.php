<?php
require('db.php');
$result = mysqli_query($con, "SELECT * FROM cards");
$rows = mysqli_num_rows($result);
echo "There are " . $rows . " rows in my table.";
?>