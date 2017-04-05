<?php include('conn.php'); ?>
<?php


if(isset($_POST['form2'])){
	
	
	
	
	
	$nrp				= $_POST['nrp'];	
	$nama				= $_POST['nama'];
	$agama				= $_POST['agama'];
	$jk					= $_POST['jk'];
	$psd				= $_POST['psd'];
	$status				= $_POST['status'];

	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysql_query("INSERT INTO mhs VALUES('$nrp','$nama','$agama','$jk','$psd','$status')") or die(mysql_error());
	
	//jika query input sukses
	if($input){
		
		echo 'Data berhasil di tambahkan! ';		//Pesan jika proses tambah sukses
		echo '<a href="form2.php"></a>';	//membuat Link untuk kembali ke halaman tambah
		
	}else{
		
		echo 'Gagal menambahkan data! ';		//Pesan jika proses tambah gagal
		echo '<a href="form2.php"></a>';	//membuat Link untuk kembali ke halaman tambah
		
	}

}else{	//jika tidak terdeteksi tombol tambah di klik

	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';

}
?>