
	
	<?php include('../header_gudang/header_pengunjung.php'); ?>

	
	
	<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                          
                                <h3 class="panel-title"><i class="fa fa-file fa-fw"></i> Data Pengunjung </h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>

           
			<th>Username</th>
			<th>Password</th>
			

			<th>Pengaturan</th>

			
								</tr>
			
									</thead>
			
		
		
		<?php
		
		//query ke database 
		$query = mysql_query("SELECT * FROM user where level='gudang'") or die(mysql_error());
		
		//cek, apakakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
		if(mysql_num_rows($query) == 0){	//ini artinya jika data hasil query di atas kosong
			
			//jika data kosong, maka akan menampilkan row kosong
			echo '<tr><td colspan="5">Tidak ada data!</td></tr>';
			
		}else{	//else ini artinya jika data hasil query ada (data di database tidak kosong)
			
			//jika data tidak kosong, maka akan melakukan perulangan while
		
			while($data = mysql_fetch_assoc($query)){	//perulangan while dg membuat variabel $data yang akan mengambil data di database
				
				//menampilkan row dengan data di database
				echo '<tr>';

				

					echo '<td>'.$data['username'].'</td>';
					echo '<td>'.$data['password'].'</td>';	
					
					
					echo '<td><a href="edit.php?id='.$data['username'].'"><span class="glyphicon glyphicon-edit">&nbsp;Ubah</span> </a> 
					
					</td>';	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
				echo '</tr>';
					
					
				
				
			}
			
		}
		?>
						</table>


						</div>
                               
                            </div>
                        </div>
                    </div>
                        </div>
                    