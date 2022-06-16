<?php
require('db.php');

    $targetdivId = $_POST['selectedCard'];
    $targetStatus = $_POST['targetStatus'];
    if ($targetStatus == "isToDo")
    {
    $insert= "UPDATE cards SET isToDo='1', isdoing=NULL, isReview=NULL, isDone=NULL WHERE id=$targetdivId";
    if(mysqli_query($con, $insert)) {
        echo $targetStatus;
    } else {
        echo "Cannot Insert";
    }
    }

    if ($targetStatus == "isDoing")
    {
    $insert= "UPDATE cards SET isDoing='1', isReview=NULL, isDone=NULL, isToDo=NULL WHERE id=$targetdivId";
    if(mysqli_query($con, $insert)) {
        echo $targetStatus;
    } else {
        echo "Cannot Insert";
    }
    }

    if ($targetStatus == "isReview")
    {
    $insert= "UPDATE cards SET isReview='1', isDone=NULL, isToDo=NULL, isDoing=NULL WHERE id=$targetdivId";
    if(mysqli_query($con, $insert)) {
        echo $targetStatus;
    } else {
        echo "Cannot Insert";
    }
    }

    if ($targetStatus == "isDone")
    {
    $insert= "UPDATE cards SET isDone='1', isToDo=NULL, isDoing=NULL, isReview=NULL WHERE id=$targetdivId";
    if(mysqli_query($con, $insert)) {
        echo $targetStatus;
    } else {
        echo "Cannot Insert";
    }
    }
    
?>