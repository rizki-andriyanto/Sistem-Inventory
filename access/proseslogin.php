<?php
session_start();
include ('../conn.php');
$username = $_POST['username'];
$password = $_POST['password'];
$cek_user = mysql_query("SELECT * FROM user WHERE username = '$username'");
$jumlah = mysql_num_rows($cek_user);
$hasil = mysql_fetch_array($cek_user);
if ( $jumlah == 0 ) {
    echo 'Username Belum Terdaftar!<br/>';
   echo '<a href="login.php">'; 
        echo '<br>'.'<font size="5">'." Kembali".'</font>'.'</a>';
} else {
    if ( $password <> $hasil['password'] ) {
        echo 'Password Salah!<br/>';
        echo '<a href="login.php">'; 
        echo '<br>'.'<font size="5">'." Kembali".'</font>'.'</a>';
    } else {
        $_SESSION['username'] = $username;
        header('location:index.php');
    }
}
?>