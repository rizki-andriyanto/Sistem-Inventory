

  <div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading"><?php include('../../header_gudang/header2.php'); ?>

                          
                                <h3 class="panel-title"><i class="fa fa-file fa-fw"></i> Pencarian Stok </h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
   




<form action="cari-stok.php" method="post" name="postform">
<table cellpadding="3" cellspacing="0">

<div class="row">
                    <div class="col-lg-6">

                        <form role="form">

                            <div class="form-group">
                            <label>Masukkan Kode Barang : </label>
                            <input type="text" name="id_barang" placeholder='Kode Barang' class="form-control" value="<?php if(isset($_POST['id_barang'])){ echo $_POST['id_barang']; }?>">
                           
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
 
  
  if(empty($id_barang)){
    //jika tidak menginput apa2
    $query=mysql_query("SELECT barang.id_barang,
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
LEFT JOIN persediaan ON barang.id_barang = persediaan.id_barang");
   
    
  }else{
    
    ?><i><b>Informasi : </b> Pencarian Kode Barang <b><?php echo ucwords($_POST['id_barang']);?></b>
     <?php
    
   
   
    $query=mysql_query("SELECT barang.id_barang,
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
LEFT JOIN persediaan ON barang.id_barang = persediaan.id_barang where barang.id_barang like '%$id_barang%'");
    
  }
  
  ?>
</p>
<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <a href="cari-stok.php"><h3 class="panel-title"><i class="fa fa-edit fa-fw"></i>Cari Data Stok</h3></a><br>
                                <h3 class="panel-title"><i class="fa fa-file fa-fw"></i> Data Stok  Barang </h3>
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
      <th>Jumlah</th>
      <th>Ukuran Satuan</th>

    
      
    
      
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

      
      
      <td><?php echo $row['id_barang'];?></td>
      <td><?php echo $row['nama_kategori'];?></td>
       <td><?php echo $row['keterangan_barang'];?></td>
        <td><?php echo $row['nama_mobil'];?></td>
         <td><?php echo $row['stok_tersedia'];?></td>
          <td><?php echo $row['nama_satuan_barang'];?></td>




    </tr>
    <?php
  }
  ?>
   
    <tr>
      <td colspan="7" align="center"> 
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