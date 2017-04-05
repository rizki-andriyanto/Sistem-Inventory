<?php include('../../header_gudang/header2.php'); ?>

<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">


	<h3>Request Barang</h3>
	
	<form action="tambah-proses.php" method="post">
		<table cellpadding="3" cellspacing="0">

<div class="row">
                    <div class="col-lg-6">

                        <form role="form">

                            <div class="form-group">

                            <label>Tanggal : </label>
                            <input type="date" name="tgl_request" required class="form-control">


                            	
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

								
                                <label>Quantity Request : </label>
                                <input type="text" name="jumlah_request" required class="form-control">
                               
                               
                            </div>

                           
                        <tr>
				<td>&nbsp;</td>
				<td></td>
				<input type="submit" class="btn btn-primary" name="tambah" id="button" value="Request">&nbsp;&nbsp;
      			<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Reset">
			</tr>
		</table>
	</form>
