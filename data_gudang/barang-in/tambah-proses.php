<?php include('../../header_gudang/header2.php'); ?>
<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">


<?php


if(isset($_POST['tambah'])){
	
	
	
	$no_surat_jalan		= $_POST['no_surat_jalan'];	
	$tgl_in				= $_POST['tgl_in'];	
	$id_barang			= $_POST['id_barang'];	
	$jumlah_in			= $_POST['jumlah_in'];


	

	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysql_query("INSERT INTO barang_in VALUES(NULL ,'$no_surat_jalan','$tgl_in','$id_barang' ,'$jumlah_in')") or die(mysql_error());
	
	
	$q2=mysql_query("Select * from persediaan where id_barang ='$id_barang'");
	$rc=mysql_num_rows($q2);

	if($rc==1)
	{
		$q3=mysql_query("Update persediaan SET masuk=masuk + $jumlah_in,stok_tersedia=stok_tersedia + $jumlah_in Where id_barang='$id_barang'");
		if($q3)
		{
			echo "Data berhasil disimpan";
		}
	}else{
		$q4=mysql_query("Insert into persediaan (`id_barang`,`stok_awal`,`masuk`,`stok_tersedia`) values ('$id_barang','$jumlah_in','$jumlah_in','$jumlah_in')");
		if($q4)
		{
			echo "Data sudah disimpan";
		}
	}
}



?>