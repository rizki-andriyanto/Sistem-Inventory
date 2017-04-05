
<?php
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:login.php'); 
}
else { 
    $username = $_SESSION['username']; 

}
require_once('../conn.php');
$query = mysql_query("SELECT *   FROM pegawai INNER JOIN user on pegawai.username=user.username WHERE pegawai.username='$username'");
$hasil = mysql_fetch_array($query);


	// jika level gudang
	if ($_SESSION['username'] == "gudang_sjs")
   {   
   	echo '<?php>'.'<?php'. include('../header_gudang/header1.php'); 
   
   }
   
// jika kondisi level user maka akan diarahkan ke halaman lain
   else if ($_SESSION['username'] == "admin_sjs")
   {
      echo '<?php>'.'<?php'. include('../header_gudang/header1.php'); 
   }

   //belum dipakai

   else if ($_SESSION['id_user'] == "sjs3")
   {
        echo '<?php>'.'<?php'. include('../header_guest/guest.php'); 
   }
   else if ($_SESSION['id_user'] == "sjs4")
   {
      echo '<?php>'.'<?php'. include('../header_guest/guest.php');
   }
   else if ($_SESSION['id_user'] == "sjs5")
   {
      echo '<?php>'.'<?php'. include('../header_guest/guest.php');
   }
   else if ($_SESSION['id_user'] == "sjs6")
   {
      echo '<?php>'.'<?php'. include('../header_manager/guest.php');
   }
   else if ($_SESSION['id_user'] == "sjs7")
   {
      echo '<?php>'.'<?php'. include('../header_admin/guest.php');
   }
?>
