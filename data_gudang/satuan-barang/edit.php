<?php include('../../header_gudang/header2.php'); ?>
<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">
	
	<?php
	
	
	$id = $_GET['id'];
	
	//melakukan query ke database dg SELECT table siswa dengan kondisi WHERE siswa_id = '$id'
	$show = mysql_query("SELECT * FROM satuan WHERE id_satuan='$id'");
	
	//cek apakah data dari hasil query ada atau tidak
	if(mysql_num_rows($show) == 0){
		
		//jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
		echo '<script>window.history.back()</script>';
		
	}else{
	
		//jika data ditemukan, maka membuat variabel $data
		$data = mysql_fetch_assoc($show);	//mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
	
	}
	?>
	
	<form action="edit-proses.php" method="post">
	<input type="hidden" name="id" value="<?php echo $id; ?>">	<!-- membuat inputan hidden dan nilainya adalah siswa_id -->
		<table cellpadding="3" cellspacing="0">





		<div class="row">
                    <div class="col-lg-6">

                        <form role="form">

                            <div class="form-group">
                                
                               
                                <label>Nama Satuan : </label>
                                
                                <input type="text" name="nama_satuan_barang" value="<?php echo $data['nama_satuan_barang']; ?>" required class="form-control">
                            </div>


			
                         <tr>
				<td>&nbsp;</td>
				<td></td>
				<td> <button type="submit" name="simpan" class="btn btn-primary">Simpan
			</tr>
		</table>
	</form>
