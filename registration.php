<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="styling/style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");

        $sql_u = "SELECT * FROM users WHERE username='$username'";
        $res_u = mysqli_query($con, $sql_u);

        if (mysqli_num_rows($res_u) > 0) {
            echo "<div class='form'>
                  <h3>Sorry... username already taken!</h3><br/>
                  <p class='link'>Click here to <a href='menu.php'>Register</a></p>
                  </div>";
        }else{
            $query    = "INSERT into users (username, password, email, create_datetime)
            VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
            $sql = "INSERT INTO profilepicture (username, filename) VALUES ('$username', 'default.png')";
            $result   = mysqli_query($con, $query);
            $result2   = mysqli_query($con, $sql);

            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        }

    } else {
?>

    <form class="form" action="" method="post">
        <h1 class="login-title">Registratie</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Heb je all een account? <a href="login.php">Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>
