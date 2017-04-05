<?php include('../../header_gudang/header2.php'); ?>
<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">
<?php

if(isset($_POST['tambah'])){
	
	
	
	
	
	$tgl_request				= $_POST['tgl_request'];	
	$id_barang			= $_POST['id_barang'];	
	$jumlah_request		= $_POST['jumlah_request'];	
	

	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysql_query("INSERT INTO barang_request VALUES(NULL ,'$tgl_request','$id_barang' ,'$jumlah_request')") or die(mysql_error());
	
	if($input){
		
		echo 'Data berhasil di tambahkan! ';		//Pesan jika proses tambah sukses
		echo '<a href="tambah.php"></a>';	//membuat Link untuk kembali ke halaman tambah
		
	}else{
		
		echo 'Gagal menambahkan data! ';		//Pesan jika proses tambah gagal
		echo '<a href="tambah.php"></a>';	//membuat Link untuk kembali ke halaman tambah
		
	}

}else{	//jika tidak terdeteksi tombol tambah di klik

	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';

}
?>