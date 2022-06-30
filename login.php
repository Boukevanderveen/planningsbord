<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
<link rel="stylesheet" href="styling/style.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
    //TEST COMMIT
    //TEST
    // Als db.php niet in de directory zit gaat de code niet verder
    require('db.php');
    session_id( 'auth' );
    session_start();
    // When form submitted, check and create user session.
    // Valideert of er input is in de username veld.
    if (isset($_POST['username'])) {
        // Zet username variable naar wat vanuit de form gesubmit
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        // Zorgt ervoor dat speciale symbolen wegfiltered zijn
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        // Haalt uit naar de password in de database dat hiervoor uit de form is ge submit
        $password = mysqli_real_escape_string($con, $password);
        // Checkt of de user in de database zit doormiddel van usernamen checken en de gehashte password
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        // Als de user niet bestaat wat gebleken is uit de $query, dan stopt de code en geeft het een mysql error
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        //Checkt of er geen meerdere accounts zijn op basis van de row
        if ($rows == 1) {
            //Checkt of je session nog dezelfde username bevat. Dus het checkt of dezelfde session voor de code hiervoor nog opereert.
            //Voordat deze session kapot gaat, wordt de username nog opgeslagen
            $_SESSION['username'] = $username;
            // Redirect to user menu page
            header("Location: menu.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
                  //Session gaat kapot als je een andere page start
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link">Geen account? <a href="registration.php">Registreren</a></p>
  </form>
<?php
    }
?>
</body>
</html>
