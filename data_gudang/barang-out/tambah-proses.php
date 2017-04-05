<?php include('../../header_gudang/header2.php'); ?>
<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">
<?php

if(isset($_POST['tambah'])){
	
	
	
	
	
	$no_nota				= $_POST['no_nota'];	
	$tgl_out				= $_POST['tgl_out'];	
	$id_barang				= $_POST['id_barang'];	
	$rangpoljual			= $_POST['rangpoljual'];
	$jumlah_out				= $_POST['jumlah_out'];	
	$nip					= $_POST['nip'];	

	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysql_query("INSERT INTO barang_out VALUES(NULL ,'$no_nota','$tgl_out','$id_barang' ,'$rangpoljual','$jumlah_out','$nip')") or die(mysql_error());
	
	$q2=mysql_query("Select * from persediaan where id_barang ='$id_barang'");
	$rw=mysql_fetch_array($q2);
	$rc=mysql_num_rows($q2);




	if($rc==1)
	{
		if($jumlah_out <= $rw['stok_tersedia']) 
		{

			if ($input) 
		{
				$q3=mysql_query("Update persediaan SET keluar=keluar + $jumlah_out,stok_tersedia=stok_tersedia - $jumlah_out Where id_barang='$id_barang'");
# code...		
				if($q3)
				{
			echo "Data sudah disimpan";
				}
			}
		}else{
		echo "Stok Barang Kode <font color ='red'><h1><b> $id_barang </b></h1></font> Kosong, Segera Pesan !";
		}
	}else{
		echo "Mau Jual, Tapi barang kosong ? OMG !!!";
	}
}



?>
