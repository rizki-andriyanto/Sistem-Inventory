

  <div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading"><?php include('../../header_gudang/header2.php'); ?>

                           
                                <h3 class="panel-title"><i class="fa fa-file fa-fw"></i> Laporan Permintaan Barang </h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
   


<?php
  
//untuk menantukan tanggal awal dan tanggal akhir data di database
$min_tanggal=mysql_fetch_array(mysql_query("select min(tgl_request) as min_tanggal from barang_request"));
$max_tanggal=mysql_fetch_array(mysql_query("select max(tgl_request) as max_tanggal from barang_request"));



?>

<form action="report-req.php" method="post" name="postform">
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
    $query=mysql_query("select * from barang_request");
    $jumlah=mysql_fetch_array(mysql_query("select sum(jumlah_request) as total from barang_request"));
    
  }else{
    
    ?><i><b>Informasi : </b> Pencarian Kode Barang <b><?php echo ucwords($_POST['id_barang']);?></b> dari tanggal <b><?php echo $_POST['tanggal_awal']?></b> sampai dengan tanggal <b><?php echo $_POST['tanggal_akhir']?></b></i><?php
    
    $query=mysql_query("select * from barang_request where id_barang like '%$id_barang%' and tgl_request between '$tanggal_awal' and '$tanggal_akhir'");
    $jumlah=mysql_fetch_array(mysql_query("select sum(jumlah_request) 
      as total from barang_request where id_barang like '%$id_barang%' and tgl_request between '$tanggal_awal' and '$tanggal_akhir'"));
  }
  
  ?>
</p>
<div class="col-lg-10">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <a href="report-req.php"><h3 class="panel-title"><i class="fa fa-edit fa-fw"></i>Cari Data Permintaan</h3></a><br>
                                <h3 class="panel-title"><i class="fa fa-file fa-fw"></i> Data Permintaan Barang </h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>

      
      
      <th>No</th>
      <th>Tanggal</th>
      <th>Kode Barang</th>
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
        <?php echo '<td>'.date('d-m-Y', strtotime($row['tgl_request'])).'</td>';?>
      <td><?php echo $row['id_barang'];?>
      </td><td align="right"><?php echo $row['jumlah_request'];?></td>
    </tr>
    <?php
  }
  ?>
    <tr>
      <td colspan="3" align="right"><strong>TOTAL</strong></td><td align="right"><?php echo $jumlah['total'];?></td>
    </tr>
    
    <tr>
      <td colspan="4" align="center"> 
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

