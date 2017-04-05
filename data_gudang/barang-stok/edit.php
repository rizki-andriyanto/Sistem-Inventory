<?php include('../../header_gudang/header2.php'); ?>
<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">
	
	<?php
	
	
	//membuat variabel $id yg nilainya adalah dari URL GET id -> edit.php?id=siswa_id
	$id = $_GET['id'];
	
	//melakukan query ke database dg SELECT table siswa dengan kondisi WHERE siswa_id = '$id'
	$show = mysql_query("SELECT * FROM barang WHERE id_barang='$id'");
	
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

                            <label>Kode Barang : </label>
                                <input type="text" name="id_barang" value="<?php echo $data['id_barang']; ?>" required class="form-control" >

                                <label>Nama Barang : </label>&nbsp;<i>( Tidak Ada Pilihan ,Tambahkan Kategori Barang Dulu ! )</i>
                                <?php 
					

					echo "<select name='id_kategori' required class='form-control'> <option value=0 selected>Pilih Barang </option>";
					$tampil=mysql_query('SELECT * FROM kategori ORDER BY id_kategori');
					while ($pilih=mysql_fetch_array($tampil)) {
					echo '<option value="'.$pilih['id_kategori'].'" selected >'.$pilih['nama_kategori'].'</option>';


					}
					echo"</select>";

					 ?>

								<label>Keterangan Barang : </label>
                                <input type="text" name="keterangan_barang" value="<?php echo $data['keterangan_barang']; ?>"required class="form-control">

                     <label>Satuan : </label>&nbsp;<i>( Tidak Ada Pilihan, Tambahkan Data Satuan Dulu ! )</i>
                     
                   <?php 
					

					echo "<select name='id_satuan' required class='form-control'> <option value=0 selected>Pilih Satuan</option>";
					$tampil=mysql_query('SELECT * FROM satuan ORDER BY nama_satuan_barang ASC');
					while ($pilih=mysql_fetch_array($tampil)) {
					echo '<option value="'.$pilih['id_satuan'].'" selected >'.$pilih['nama_satuan_barang'].'</option>';

					}
					echo"</select>";

					 ?>

                              	 <label>Mobil : </label>&nbsp;<i>( Tidak Ada Pilihan, Tambahkan Data Mobil Dulu ! )</i>
                     
                   <?php 
					

					echo "<select name='id_mobil' required class='form-control'> <option value=0 selected>Pilih Mobil</option>";
					$tampil=mysql_query('SELECT * FROM mobil ORDER BY nama_mobil ASC');
					while ($pilih=mysql_fetch_array($tampil)) {
					echo '<option value="'.$pilih['id_mobil'].'" selected >'.$pilih['nama_mobil'].'</option>';

					}
					echo"</select>";

					 ?>

                            </div>

                         <tr>
				<td>&nbsp;</td>
				<td></td>
				<td> 	<input type="submit" class="btn btn-primary" name="simpan" id="button" value="Simpan">&nbsp;&nbsp;
      			<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Reset">
			</tr>
		</table>
	</form>
