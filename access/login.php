
<html>
<head>
<title>Login </title>
</head>

<?php
 include('../conn.php'); 
session_start();
if( isset($_SESSION['username']) ) {
    header('location:index.php'); 
}

?> 

<link rel="stylesheet" href="style.css">
<form action="proseslogin.php" method="post">
<div class="body"></div>
    <div class="grad"></div>
    <div class="header">
      <div>SJS<span>Malang</span></div>
    </div>
    <br>
    <div class="login">
        <input type="text"  placeholder="username" name="username"><br>
        <input type="password" placeholder="password" name="password"><br>
        <input type="submit" name="Login" value="Login">
    </div>

    </form>
</table>
</body>
</html>