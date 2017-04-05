<?php include('../../header_gudang/header2.php'); ?>

<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">

<?php

if(isset($_POST['simpan'])){
	$id						= $_POST['id'];
	$id_barang				= $_POST['id_barang'];
	$id_kategori			= $_POST['id_kategori'];
	$keterangan_barang		= $_POST['keterangan_barang'];
	$id_mobil				= $_POST['id_mobil'];
	$id_satuan				= $_POST['id_satuan'];


	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
	$update = mysql_query("UPDATE barang SET id_barang='$id_barang',id_kategori='$id_kategori', keterangan_barang='$keterangan_barang',
		id_mobil='$id_mobil' , id_satuan='$id_satuan' WHERE id_barang='$id'") or die(mysql_error());
	//jika query update sukses
	if($update){
		
		echo 'Data berhasil di simpan! ';		//Pesan jika proses simpan sukses
		echo '<a href="edit.php?id='.$id_barang.'"></a>';	//membuat Link untuk kembali ke halaman edit
		
	}else{
		
		echo 'Gagal menyimpan data! ';		//Pesan jika proses simpan gagal
		echo '<a href="edit.php?id='.$id_barang.'"></a>';	//membuat Link untuk kembali ke halaman edit
		
	}

}else{	//jika tidak terdeteksi tombol simpan di klik

	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';

}
?>