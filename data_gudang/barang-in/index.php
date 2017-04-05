<?php include('../../header_gudang/header2.php'); ?>

	<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <a href="tambah.php"><h3 class="panel-title"><i class="fa fa-edit fa-fw"></i>Tambah Data</h3></a><br>
                                <h3 class="panel-title"><i class="fa fa-file fa-fw"></i> Data Barang Masuk</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>

			
			
			<th>No</th>
			<th>No. Surat Jalan</th>
			<th>Tanggal Masuk</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Keterangan</th>
			<th>Mobil</th>
			<th>Jumlah Masuk</th>
			
			
		
			
								</tr>
			
									</thead>




<?php


		$query2 = mysql_query("SELECT
	barang_in.id_barang_in,
	barang_in.no_surat_jalan,
	barang.id_barang,
	barang_in.tgl_in,
	(
		SELECT
			nama_kategori
		FROM
			kategori
		WHERE
			barang.id_kategori = kategori.id_kategori
	) AS A,
	barang.keterangan_barang,
	(
		SELECT
			nama_mobil
		FROM
			mobil
		WHERE
			barang.id_mobil = mobil.id_mobil
	) AS B,
	barang_in.jumlah_in
FROM
	barang_in
INNER JOIN barang ON barang_in.id_barang = barang.id_barang
ORDER BY
	A ASC

") or die(mysql_error());
		
		//cek, apakakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
		if(mysql_num_rows($query2) == 0){	
			
			
		echo '<tr><td colspan="8">Tidak ada data!</td></tr>';
			
		}else{	
		
		$no=1;
			while($data2 = mysql_fetch_assoc($query2)){	//perulangan while dg membuat variabel $data yang akan mengambil data di database
			
				
				
					
					
					
					echo '<td>'.$no.'</td>';
					echo '<td>'.$data2['no_surat_jalan'].'</td>';
					echo '<td>'.date("d-M-Y", strtotime($data2['tgl_in'])).'</td>';	
					echo '<td>'.$data2['id_barang'].'</td>';
					echo '<td>'.$data2['A'].'</td>';
					echo '<td>'.$data2['keterangan_barang'].'</td>';	
					echo '<td>'.$data2['B'].'</td>';
					echo '<td>'.$data2['jumlah_in'].'</td>';
					
				
										echo '</tr>';

					
		$no++;
			
			}
			
		}


		?>


						</div>
                               
                            </div>
                        </div>
                    </div>
                        </div>
                    
			</table>
			