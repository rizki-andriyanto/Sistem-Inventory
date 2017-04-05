
                            <div class="panel-heading"><?php include('../../header_gudang/header2.php'); ?>

                          
                                <h3 class="panel-title"><i class="fa fa-file fa-fw"></i> Laporan Barang Keluar</h3>
                            </div>
                            <div class="panel-body">
                            
                             <div class="page-header">
                    
   


<?php
  
//untuk menantukan tanggal awal dan tanggal akhir data di database
$min_tanggal=mysql_fetch_array(mysql_query("select min(tgl_out) as min_tanggal from barang_out"));
$max_tanggal=mysql_fetch_array(mysql_query("select max(tgl_out) as max_tanggal from barang_out"));



?>

<form action="kode-barang.php" method="post" name="postform">
<table cellpadding="3" cellspacing="0">

<div class="row">
                    <div class="col-lg-6">

                        <form role="form">

                            <div class="form-group">
                            <label>Kode Barang : </label>
                            <input type="text" name="id_barang" class="form-control" value="<?php if(isset($_POST['id_barang'])){ echo $_POST['id_barang']; }?>">
                            
                            <label>Tanggal Awal : </label>
                            <input type="date" name="tanggal_awal" value="<?php  echo $min_tanggal['min_tanggal'];?>" required class="form-control">
                            <label>Tanggal Akhir : </label>
                            <input type="date" name="tanggal_akhir" value="<?php  echo $max_tanggal['max_tanggal'];?>" required class="form-control">

                    </div>

                           
                        <tr>
        <td>&nbsp;</td>
        <td></td>
   
                    <br>
            <input type="submit" class="btn btn-primary" name="cari" id="button" value="Cari">&nbsp;&nbsp;
            <input type="reset" class="btn btn-danger" name="reset" id="reset" value="Reset">
                    </table>
                    </form>
                    <p>

<?php
//di proses jika sudah klik tombol cari
if(isset($_POST['cari'])){
  
  //menangkap nilai form
  $id_barang=$_POST['id_barang'];
  $tanggal_awal=$_POST['tanggal_awal'];
  $tanggal_akhir=$_POST['tanggal_akhir'];
  
  if(empty($id_barang) and empty($tanggal_awal) and empty($tanggal_akhir)){
    //jika tidak menginput apa2
    $query=mysql_query("select * from barang_out");
    $jumlah=mysql_fetch_array(mysql_query("select sum(jumlah_out) as total from barang_out"));
    
  }else{
    
    ?><i><b>Informasi : </b> Pencarian Kode Barang <b><?php echo ucwords($_POST['id_barang']);?></b> dari tanggal <b><?php echo $_POST['tanggal_awal']?></b> sampai dengan tanggal <b><?php echo $_POST['tanggal_akhir']?></b></i><?php
    
    $query=mysql_query("SELECT
  barang_out.no_nota,
  barang_out.tgl_out,
  barang_out.id_barang,
  kategori.nama_kategori,
  barang.keterangan_barang,
  mobil.nama_mobil,
  satuan.nama_satuan_barang,
  barang_out.jumlah_out,
  barang_out.rangpoljual,
  barang_out.nama_marketing


FROM
  barang_out
INNER JOIN barang ON barang_out.id_barang = barang.id_barang
INNER JOIN kategori ON kategori.id_kategori = barang.id_kategori
INNER JOIN satuan ON satuan.id_satuan = barang.id_satuan
INNER JOIN mobil ON mobil.id_mobil = barang.id_mobil

WHERE
  barang_out.id_barang LIKE '%$id_barang%'
AND barang_out.tgl_out BETWEEN '$tanggal_awal'
AND '$tanggal_akhir'");
    $jumlah=mysql_fetch_array(mysql_query("select sum(jumlah_out) 
      as total from barang_out where barang_out.id_barang like '%$id_barang%' and tgl_out between '$tanggal_awal' and '$tanggal_akhir'"));
  }
  
  ?>
</p>
<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <a href="kode-barang.php"><h3 class="panel-title"><i class="fa fa-edit fa-fw"></i>Cari Data Keluar</h3></a><br>
                                <h3 class="panel-title"><i class="fa fa-file fa-fw"></i> Data Barang Keluar</h3>
                            </div>
                            <div class="panel-body">
                              
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>

      
      
      <th>No</th>
      <th>Nota</th>
      <th>Tanggal</th>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Keterangan Barang</th>
      <th>Mobil</th>
      <th>No. Rangka / No. Polisi / Jual</th>
      <th>Marketing</th>
      <th>Ukuran Satuan</th>
      <th>Total</th>
      
      
    
      
                </tr>
      
                </thead>


  <?php
  //untuk penomoran data
  $no=0;
  
  //menampilkan data
  while($row=mysql_fetch_array($query)){
  ?>
    <tr>
      <td><?php echo $no=$no+1; ?></td>
       </td><td><?php echo $row['no_nota'];?>
      <?php echo '<td>'.date('d-m-Y', strtotime($row['tgl_out'])).'</td>';?>

     </td><td><?php echo $row['id_barang'];?>
     </td><td><?php echo $row['nama_kategori'];?>
     </td><td><?php echo $row['keterangan_barang'];?>
     </td><td><?php echo $row['nama_mobil'];?>
     </td><td><?php echo $row['rangpoljual'];?>
     </td><td><?php echo $row['nama_marketing'];?>
     </td><td><?php echo $row['nama_satuan_barang'];?>
      </td><td align="right"><?php echo $row['jumlah_out'];?></td>
    </tr>
    <?php
  }
  ?>
    <tr>
      <td colspan="10" align="right"><strong>TOTAL</strong></td><td align="right"><?php echo $jumlah['total'];?></td>
    </tr>
    
    <tr>
      <td colspan="11" align="center"> 
    <?php
    //jika data tidak ditemukan
    if(mysql_num_rows($query)==0){
      echo "<font color=red><blink>Tidak ada data yang dicari !</blink></font>";
    }
    ?>
        </td>
    </tr>
     
</table>


<?php
}else{
  unset($_POST['cari']);
}
?>

<iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
</body>
</html>