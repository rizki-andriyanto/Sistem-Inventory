<?php include('../../header_gudang/header2.php'); ?>

<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">

<?php

if(isset($_POST['simpan'])){
	$id					= $_POST['id'];
	
	$tgl_request		= $_POST['tgl_request'];	
	$id_barang			= $_POST['id_barang'];	
	$jumlah_request		= $_POST['jumlah_request'];	
	

	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
	$update = mysql_query("UPDATE barang_request SET  tgl_request='$tgl_request',
		jumlah_request='$jumlah_request' WHERE id_request='$id'") or die(mysql_error());
	//jika query update sukses
	if($update){
		
		echo 'Data berhasil di simpan! ';		//Pesan jika proses simpan sukses
		echo '<a href="edit.php?id='.$id.'"></a>';	//membuat Link untuk kembali ke halaman edit
		
	}else{
		
		echo 'Gagal menyimpan data! ';		//Pesan jika proses simpan gagal
		echo '<a href="edit.php?id='.$id.'"></a>';	//membuat Link untuk kembali ke halaman edit
		
	}

}else{	//jika tidak terdeteksi tombol simpan di klik

	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';

}
?>