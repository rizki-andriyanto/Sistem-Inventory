<?php include('../header_admin/header_data.php'); ?>
<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">
<?php
//memulai proses hapus data
include('../conn.php');


if(isset($_GET['id'])){
	
	
	
	$id = $_GET['id'];
	
	
	$cek = mysql_query("SELECT id_user FROM user WHERE id_user='$id'") or die(mysql_error());
	
	//jika data siswa tidak ada
	if(mysql_num_rows($cek) == 0){
		
		//jika data tidak ada, maka redirect atau dikembalikan ke halaman beranda
		echo '<script>window.history.back()</script>';
	
	}else{
		
		//jika data ada di database, maka melakukan query DELETE table siswa dengan kondisi WHERE siswa_id='$id'
		$del = mysql_query("DELETE FROM user WHERE id_user='$id'");
		
		//jika query DELETE berhasil
		if($del){
			
			echo 'Data akses berhasil di hapus! ';		//Pesan jika proses hapus berhasil
			echo '<a href="index.php"></a>';	//membuat Link untuk kembali ke halaman beranda
			
		}else{
			
			echo 'Gagal menghapus data! ';		//Pesan jika proses hapus gagal
			echo '<a href="index.php"></a>';	//membuat Link untuk kembali ke halaman beranda
		
		}
		
	}
	
}else{
	
	//redirect atau dikembalikan ke halaman beranda
	echo '<script>window.history.back()</script>';
	
}
?>