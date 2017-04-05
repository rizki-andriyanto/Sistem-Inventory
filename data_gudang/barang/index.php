<?php include('../../header_gudang/header2.php'); ?>

	
	<div class="col-lg-10">
	
	

                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <a href="tambah.php"><h3 class="panel-title"><i class="fa fa-edit fa-fw"></i>Tambah Data</h3></a><br>
                                <h3 class="panel-title"><i class="fa fa-file fa-fw"></i> Data Barang</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>

			
			<th>No</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Keterangan Barang</th>
			<th>Mobil</th>
			<th>Ukuran Satuan</th>

			<th>Pengaturan</th>
								</tr>
			
									</thead>




		
		<?php

		//query ke database dg SELECT table karyawan diurutkan berdasarkan NIS paling besar
		$query = mysql_query("SELECT barang.id_barang,
 kategori.id_kategori,
 kategori.nama_kategori,
 barang.keterangan_barang,
 mobil.nama_mobil,
 satuan.nama_satuan_barang,
 persediaan.stok_tersedia
FROM
	barang
INNER JOIN kategori ON barang.id_kategori = kategori.id_kategori
INNER JOIN mobil ON barang.id_mobil = mobil.id_mobil
INNER JOIN satuan ON barang.id_satuan = satuan.id_satuan
LEFT JOIN persediaan ON barang.id_barang = persediaan.id_barang") or die(mysql_error());
		
		//cek, apakakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
		if(mysql_num_rows($query) == 0){	//ini artinya jika data hasil query di atas kosong
			
			//jika data kosong, maka akan menampilkan row kosong
			echo '<tr><td colspan="7">Tidak ada data!</td></tr>';
			
		}else{	//else ini artinya jika data hasil query ada (data di database tidak kosong)
			
			//jika data tidak kosong, maka akan melakukan perulangan while
			$no=1;
			while($data = mysql_fetch_assoc($query)){	//perulangan while dg membuat variabel $data yang akan mengambil data di database
			
				//menampilkan row dengan data di database
				echo '<tr>';
					
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$data['id_barang'].'</td>';
					echo '<td>'.$data['nama_kategori'].'</td>';	
					echo '<td>'.$data['keterangan_barang'].'</td>';
					echo '<td>'.$data['nama_mobil'].'</td>';
					echo '<td>'.$data['nama_satuan_barang'].'</td>';
					
					echo '<td><a href="edit.php?id='.$data['id_barang'].'"><span class="glyphicon glyphicon-edit"></span> </a> &nbsp&nbsp/&nbsp&nbsp<a href="hapus.php?id='.$data['id_barang'].'" onclick="return confirm(\'Yakin?\')"><span class="glyphicon glyphicon-trash"></span></a></td>';	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
				echo '</tr>';

			
			$no++;		
			
			}
			
		}
		?>
		</table>


						</div>
                               
                            </div>
                        </div>
                    </div>
                        </div>
