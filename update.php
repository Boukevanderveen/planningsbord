<?php
require('db.php');
require('auth_session.php');
    header("Location: login.php");
    $targetdivId = $_POST['selectedCard'];
    $targetStatus = $_POST['targetStatus'];
    if ($targetStatus == "isToDo")
    {
    $update= "UPDATE cards SET isToDo='1', isdoing=NULL, isReview=NULL, isDone=NULL WHERE id=$targetdivId";
    if(mysqli_query($con, $update)) 
    {
    

    } else {
        echo "Cannot Insert";
    }
    }

    if ($targetStatus == "isDoing")
    {
    $update= "UPDATE cards SET isDoing='1', isReview=NULL, isDone=NULL, isToDo=NULL WHERE id=$targetdivId";
    if(mysqli_query($con, $update)) 
    {
    } else {
        echo "Cannot Insert";
    }
    }

    if ($targetStatus == "isReview")
    {
    $update= "UPDATE cards SET isReview='1', isDone=NULL, isToDo=NULL, isDoing=NULL WHERE id=$targetdivId";
    if(mysqli_query($con, $update)) 
    {

    } else {
        echo "Cannot Insert";
    }
    }

    if ($targetStatus == "isDone")
    {
    $update= "UPDATE cards SET isDone='1', isToDo=NULL, isDoing=NULL, isReview=NULL WHERE id=$targetdivId";
    if(mysqli_query($con, $update)) {
    } else {
        echo "Cannot Insert";
    }
    }
    
?>