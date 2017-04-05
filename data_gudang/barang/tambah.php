<?php include('../../header_gudang/header2.php'); ?>
<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">


	
	<h3>Tambah Data Barang</h3>
	
	<form action="tambah-proses.php" method="post">
		<table cellpadding="3" cellspacing="0">

<div class="row">
                    <div class="col-lg-6">

                        <form role="form">

                            <div class="form-group">

                     			<label>Kode Barang : </label>
                                <input type="text" name="id_barang" required class="form-control">

                                <label>Nama Barang : </label>&nbsp;<i>( Tidak Ada Pilihan ,Tambahkan Kategori Barang Dulu ! )</i>
                                <?php 
					

					echo "<select name='id_kategori' required class='form-control'> <option value=0 selected>Pilih Barang </option>";
					$tampil=mysql_query('SELECT * FROM kategori ORDER BY id_kategori');
					while ($pilih=mysql_fetch_array($tampil)) {
					echo "<option value=$pilih[id_kategori]>$pilih[nama_kategori]</option>";

					}
					echo"</select>";

					 ?>

								<label>Keterangan Barang : </label>
                                <input type="text" name="keterangan_barang" required class="form-control">

                      <label>Satuan : </label>&nbsp;<i>( Tidak Ada Pilihan, Tambahkan Data Satuan Dulu ! )</i>
                     
                   <?php 
					

					echo "<select name='id_satuan' required class='form-control'> <option value=0 selected>Pilih Satuan</option>";
					$tampil=mysql_query('SELECT * FROM satuan ORDER BY nama_satuan_barang ASC');
					while ($pilih=mysql_fetch_array($tampil)) {
					echo "<option value=$pilih[id_satuan]>$pilih[nama_satuan_barang]</option>";

					}
					echo"</select>";

					 ?>


                              	 <label>Mobil : </label>&nbsp;<i>( Tidak Ada Pilihan, Tambahkan Data Mobil Dulu ! )</i>
                     
                   <?php 
					

					echo "<select name='id_mobil' required class='form-control'> <option value=0 selected>Pilih Mobil</option>";
					$tampil=mysql_query('SELECT * FROM mobil ORDER BY nama_mobil ASC');
					while ($pilih=mysql_fetch_array($tampil)) {
					echo "<option value=$pilih[id_mobil]>$pilih[nama_mobil]</option>";

					}
					echo"</select>";

					 ?>


                            </div>

                           
                        <tr>
				<td>&nbsp;</td>
				<td></td>
				<td> 

				<input type="submit" class="btn btn-primary" name="tambah" id="button" value="Tambah">&nbsp;&nbsp;
      			<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Reset">
			</tr>
		</table>
	</form>
