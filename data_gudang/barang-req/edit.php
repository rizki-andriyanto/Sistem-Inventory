<?php include('../../header_gudang/header2.php'); ?>
<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">
	
	<?php
	
	
	//membuat variabel $id yg nilainya adalah dari URL GET id -> edit.php?id=siswa_id
	$id = $_GET['id'];
	
	//melakukan query ke database dg SELECT table siswa dengan kondisi WHERE siswa_id = '$id'
	$show = mysql_query("SELECT * FROM barang_request WHERE id_request='$id'");
	
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

                             <label>Tanggal : </label>
                            <input type="date" name="tgl_request" value="<?php echo $data['tgl_request']; ?>" required class="form-control">


                             <label>Nama Barang : </label>
                                
      
					
                     <?php 

					

					echo "<select name='id_barang' required class='form-control'> <option value=0 selected>Pilih Barang</option>";
					$tampil=mysql_query('SELECT
	barang.keterangan_barang,barang.id_barang,
	(
		SELECT
			
			nama_kategori
		FROM
			kategori
		WHERE
			barang.id_kategori = kategori.id_kategori
	) AS A,
	(
		SELECT
		
			nama_mobil
		FROM
			mobil
		WHERE
			barang.id_mobil = mobil.id_mobil
	) AS B
FROM
	barang order by A asc
');
					$no=1;
					while ($pilih=mysql_fetch_array($tampil)) {


					
					echo "<option value=$pilih[id_barang] selected>".'('.
					"$no".') '.'&nbsp;'.

				$pilih['A'].'&nbsp;'.
				$pilih['keterangan_barang'].'&nbsp;'.	
				$pilih['B'].


					'</option>';
					$no++;
					
					}

					echo"</select>";





					
					 ?>

                                <label>Quantity Request : </label>
                                <input type="text" name="jumlah_request" value="<?php echo $data['jumlah_request']; ?>" required class="form-control">
                               
                            </div>

                         <tr>
				<td>&nbsp;</td>
				<td></td>
				<td> <button type="submit" name="simpan" class="btn btn-primary">Simpan
			</tr>
		</table>
	</form>
