<?php include('../../header_gudang/header2.php'); ?>
<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">
<?php


if(isset($_POST['tambah'])){
	
	
	
	
	
	$id_barang				= $_POST['id_barang'];	
	$id_kategori			= $_POST['id_kategori'];
	$keterangan_barang		= $_POST['keterangan_barang'];
	$id_satuan				= $_POST['id_satuan'];
	$id_mobil				= $_POST['id_mobil'];

	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysql_query("INSERT INTO barang VALUES('$id_barang','$id_kategori','$keterangan_barang','$id_mobil','$id_satuan')") or die(mysql_error());
	
	//jika query input sukses
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