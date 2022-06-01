<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <!-- eet heel veel poep, groetjes Byron -->
    <div class="form">
        <!-- Haalt username uit $_SESSION variable-->
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are in user dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
