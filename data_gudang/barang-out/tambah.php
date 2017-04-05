<?php include('../../header_gudang/header2.php'); ?>

<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">


	<h3>Barang Keluar</h3>
	
	<form action="tambah-proses.php" method="post">
		<table cellpadding="3" cellspacing="0">

<div class="row">
                    <div class="col-lg-6">

                        <form role="form">

                            <div class="form-group">
                            <label>Nota : </label>
                            <input type="text" name="no_nota" required class="form-control">

                            <label>Tanggal : </label>
                            <input type="date" name="tgl_out" required class="form-control">


                            	
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



					echo "<option value=$pilih[id_barang]>".'('.
					"$no".') '.'&nbsp;'.

				$pilih['A'].'&nbsp;'.
				$pilih['keterangan_barang'].'&nbsp;'.	
				$pilih['B'].


					'</option>';
					$no++;
					
					}

					echo"</select>";





					
					 ?>

								
                            	<label>No. Rangka / No. Plat / Jual : </label>
                            	<input type="text" name="rangpoljual" required class="form-control">

 								<label>Nama Marketing : </label>
                   <?php 
					

					echo "<select name='nip' required class='form-control'> <option value=0 selected>Pilih Nama Marketing</option>";
					$tampil=mysql_query('SELECT * FROM pegawai WHERE id_jabatan="JAB6"');
					while ($pilih=mysql_fetch_array($tampil)) {
					echo "<option value=$pilih[nip]>$pilih[nama_pegawai]</option>";

					}
					echo"</select>";

					 ?>

                            	



                                <label>Quantity Keluar : </label>
                                <input type="text" name="jumlah_out" required class="form-control">
                               
                               
                            </div>

                           
                        <tr>
				<td>&nbsp;</td>
				<td></td>
				<input type="submit" class="btn btn-primary" name="tambah" id="button" value="Tambah">&nbsp;&nbsp;
      			<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Reset">
			</tr>
		</table>
	</form>
