<?php
include("auth_session.php");
include("headernarrow.php");
require('db.php');
?>

<html>
<script src="scriptfile.js">
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="styling.css"/>

 <div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>

    <div id="display-image">
    <?php
        $username = $_SESSION["username"];

        $query = " select * from profilepicture where username LIKE '$username' ";
        $result = mysqli_query($con, $query);
 
        while ($data = mysqli_fetch_assoc($result)) 
        {
    ?>
      <img id='profilepagepfp' src="./profilepictures/<?php echo $data['filename']; ?>">

    <?php
        }
    ?>

</html>


<?php 
$sql = "SELECT * FROM users WHERE username LIKE '$username'";
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($result)) 
{ 
    echo "<div id='profilecontent'> $username <p id='biocontent'> $row[bio] </p> <a href='editbio.php' id='usernameprofileedit'> (bewerk) </a></div> ";
//<p> Aanmaak datum:</p>
}

if (isset($_POST['upload'])) {
 
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./profilepictures/" . $filename;
  
    // Get all the submitted data from the form
    //$sql = "INSERT INTO profilepicture (filename, username) VALUES ('$filename', '$username')";
    $sql= "UPDATE profilepicture SET filename='$filename' WHERE username LIKE '$username'";
 

    // Execute query
    mysqli_query($con, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        header("Location: profile.php");
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
}



?>
