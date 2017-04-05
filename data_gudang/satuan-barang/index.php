<?php include('../../header_gudang/header2.php'); ?>

	
	
	
	
	<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <a href="tambah.php"><h3 class="panel-title"><i class="fa fa-edit fa-fw"></i>Tambah Data</h3></a><br>
                                <h3 class="panel-title"><i class="fa fa-file fa-fw"></i> Data Satuan Barang</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>

		
			<th>No</th>
			<th>Satuan Barang</th>
			<th>Pengaturan</th>
								</tr>
			
									</thead>

		
		<?php
		
		
		//query ke database dg SELECT table karyawan diurutkan berdasarkan NIS paling besar
		$query = mysql_query("SELECT * FROM satuan ORDER BY id_satuan ASC") or die(mysql_error());
		
		//cek, apakakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
		if(mysql_num_rows($query) == 0){	//ini artinya jika data hasil query di atas kosong
			
			//jika data kosong, maka akan menampilkan row kosong
			echo '<tr><td colspan="3">Tidak ada data!</td></tr>';
			
		}else{	//else ini artinya jika data hasil query ada (data di database tidak kosong)
			
			//jika data tidak kosong, maka akan melakukan perulangan while
			$no=1;
			while($data = mysql_fetch_assoc($query)){	//perulangan while dg membuat variabel $data yang akan mengambil data di database
				
				//menampilkan row dengan data di database
				echo '<tr>';
					
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$data['nama_satuan_barang'].'</td>';
					echo '<td><a href="edit.php?id='.$data['id_satuan'].'"><span class="glyphicon glyphicon-edit"></span> </a> &nbsp&nbsp/&nbsp&nbsp<a href="hapus.php?id='.$data['id_satuan'].'" onclick="return confirm(\'Yakin?\')"><span class="glyphicon glyphicon-trash"></span></a></td>';	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
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
                    