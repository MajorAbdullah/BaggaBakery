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
<?php
    session_start();
 
    if(session_destroy()) {
        // Redirecting To Home Page
       
        echo "<div class='form'>
        <h3>You are now logged out.</h3><br/>
        <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
        </div>";

    } else {
        echo "<div class='form'>
              <h3> You are not logged in.</h3><br/>
              <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
              </div>";

    }
?>
