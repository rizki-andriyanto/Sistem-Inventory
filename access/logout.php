
<?php
session_start();
unset( $_SESSION['username'] );
?>
<?php include('login.php'); ?>
<body bgcolor="orange" size="100"><h2>Anda telah berhasil logout </h2></bg>
<h3>Silahkan klik <a href="login.php"><b><font size ="5">disini</font></b></a> untuk login kembali