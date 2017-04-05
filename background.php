<?php
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:login.php'); 
}
else { 
    $username = $_SESSION['username']; 

}
require_once('conn.php');
$query = mysql_query("SELECT *   FROM pegawai INNER JOIN user on pegawai.username=user.username WHERE pegawai.username='$username'");
$hasil = mysql_fetch_array($query);

?>








<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SJS Malang</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


    <div id="wrapper">
    
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="background.php">SJS Malang</a>
            </div>







            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

            
            
                
                </li>
                
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo '&nbsp'. $hasil['nama_pegawai'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="data_access/index.php"><i class="fa fa-fw fa-gear"></i> Ubah Sandi</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="access/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">

                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
                    </li>
                    <li>
                     <a href="javascript:;" data-toggle="collapse" data-target="#gudang1"><i class="fa fa-fw fa-th"></i> Master <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="gudang1" class="collapse">
                            
                            <li>
                                <a href="data_gudang/barang/index.php"><span class="glyphicon glyphicon-tasks"></span> &nbsp;Data Barang</a>
                            </li>
                             <li>
                                <a href="data_gudang/kategori-barang/index.php"><span class="glyphicon glyphicon-tags"></span> &nbsp;Kategori</a>
                            </li>
                             
                             <li>
                                <a href="data_gudang/satuan-barang/index.php"><span class="glyphicon glyphicon-tags"></span> &nbsp;Satuan</a>
                            </li>
                            <li>
                                <a href="data_gudang/mobil/index.php"><span class="fa fa-fw fa-car"></span> &nbsp;Mobil</a>
                            </li>
                           
                        </ul>
                    </li>
                    <li>
                     <a href="javascript:;" data-toggle="collapse" data-target="#gudang2"><i class="glyphicon glyphicon-transfer"></i>&nbsp;Transaksi <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="gudang2" class="collapse">
                            <li>
                                <a href="data_gudang/barang-in/index.php"><span class="glyphicon glyphicon-arrow-right"></span> &nbsp;Barang Masuk</a>
                            </li>
                             <li>
                                <a href="data_gudang/barang-out/index.php"><span class="glyphicon glyphicon-arrow-left"></span> &nbsp;Barang Keluar</a>
                            </li>
                              <li>
                                <a href="data_gudang/barang-req/index.php"><span class="fa fa-fw fa-shopping-cart"></span> &nbsp;Request Barang</a>
                            </li>
    
    
                        </ul>
                    </li>
                     <li>
                     <a href="javascript:;" data-toggle="collapse" data-target="#gudang3"><i class="glyphicon glyphicon-stats"></i>&nbsp;Laporan <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="gudang3" class="collapse">
                             <li>
                                <a href="data_gudang/stok-cari/cari-stok.php"><span class="glyphicon glyphicon-list-alt"></span> &nbsp;Stok Barang</a>
                            </li> 
                             <li>
                                <a href="data_gudang/month-report/report-in.php"><span class="glyphicon glyphicon-pencil"></span> &nbsp;Laporan Barang Masuk</a>
                            </li>
                             <li>
                                <a href="data_gudang/month-report/choose-search.php"><span class="glyphicon glyphicon-pencil"></span> &nbsp;Laporan Barang Keluar</a>
                            </li>
                           
                            
                            <li>
                                <a href="data_gudang/month-report/report-req.php"><span class="glyphicon glyphicon-pencil"></span> &nbsp;Laporan Request Barang</a>
                            </li>
                            
                        </ul>
                    </li>
            </div>
            <!-- /.navbar-collapse -->
        </nav>


            
            

    

      <div class="item active">
        
         <img src="images/a3.jpg"  width="1200" height="700">
          
        
      </div>

    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="assets/js/plugins/morris/raphael.min.js"></script>
    <script src="assets/js/plugins/morris/morris.min.js"></script>
    <script src="assets/js/plugins/morris/morris-data.js"></script>
    
</body>

</html>