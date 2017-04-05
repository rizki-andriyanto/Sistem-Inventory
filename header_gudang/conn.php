<?php

$host = "localhost";
$user = "root";
$pass = "";
$name = "sumber_jaya_sakti";

$conn = mysql_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
mysql_select_db($name, $conn) or die("Tidak ada database yang dipilih!");

?>