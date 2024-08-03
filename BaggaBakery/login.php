<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
    <link href="ok.css" type="text/css" rel="stylesheet" />

</head>
<body>
<div class="container">
<?php @include 'header.php'; ?>

<?php
    require('db.php');
    session_start();
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die();
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            echo "<div class='form'> 
            <h3>You are now logged in.</h3><br/>
            <p class='link'> <a href='home.php'>Return to home</a></p>
            </div>";
           
            // header("Location: home.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<section class="registeration">
    <form class="form" method="post" name="login">
    <div class="flex">
               
    <h1 class="login-title">Login</h1>
    <br><hr>
    <div>
    <span>Username</span>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <span>paassword</span>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
        <p class="link"><a href="logout.php">Logout</a></p>
    </div>
         

         </div>
  </form>
</section>
<?php
    }
?>
</body>
</html>