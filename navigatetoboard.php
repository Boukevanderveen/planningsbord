<?php
include("auth_session.php");
require('db.php');
$_SESSION["board"] = $_POST['boardId'];
?>