<?php include('../../header_gudang/header2.php'); ?>

	
	
<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">

<?php

if(isset($_POST['simpan'])){
	
	
	$id						= $_POST['id'];
	$nama_satuan_barang		= $_POST['nama_satuan_barang'];

	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
	$update = mysql_query("UPDATE satuan SET id_satuan='$id', nama_satuan_barang='$nama_satuan_barang' WHERE id_satuan='$id'") or die(mysql_error());
	//jika query update sukses
	if($update){
		
		echo 'Data berhasil di update! ';		//Pesan jika proses simpan sukses
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