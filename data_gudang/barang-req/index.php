<?php include('../../header_gudang/header2.php'); ?>

	<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <a href="tambah.php"><h3 class="panel-title"><i class="fa fa-edit fa-fw"></i>Tambah Data</h3></a><br>
                                <h3 class="panel-title"><i class="fa fa-file fa-fw"></i> Data Request Barang</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>

			
			
			<th>No</th>
			<th>Tanggal Request</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Keterangan</th>
			<th>Mobil</th>
			<th>Jumlah Request</th>
			
			
		
			<th>Pengaturan</th>
								</tr>
			
									</thead>




<?php


		$query2 = mysql_query("SELECT
	barang_request.id_request,
	barang.id_barang,
	barang_request.tgl_request,
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
	barang_request.jumlah_request
FROM
	barang_request
INNER JOIN barang ON barang_request.id_barang = barang.id_barang
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
					echo '<td>'.date("d-M-Y", strtotime($data2['tgl_request'])).'</td>';	
					echo '<td>'.$data2['id_barang'].'</td>';
					echo '<td>'.$data2['A'].'</td>';
					echo '<td>'.$data2['keterangan_barang'].'</td>';	
					echo '<td>'.$data2['B'].'</td>';
					echo '<td>'.$data2['jumlah_request'].'</td>';
					echo '<td><a href="edit.php?id='.$data2['id_request'].'"><span class="glyphicon glyphicon-edit"></span> </a> &nbsp&nbsp/&nbsp&nbsp<a href="hapus.php?id='.$data2['id_request'].'" onclick="return confirm(\'Yakin?\')"><span class="glyphicon glyphicon-trash"></span></a></td>';	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
			
				
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
			