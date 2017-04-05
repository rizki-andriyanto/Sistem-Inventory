<?php
    $query=mysql_query("SELECT barang.id_barang,
 kategori.id_kategori,
 kategori.nama_kategori,
 barang.keterangan_barang,
 mobil.nama_mobil,
 satuan.nama_satuan_barang,
sum(persediaan.stok_tersedia) as sum
FROM
  barang
INNER JOIN kategori ON barang.id_kategori = kategori.id_kategori
INNER JOIN mobil ON barang.id_mobil = mobil.id_mobil
INNER JOIN satuan ON barang.id_satuan = satuan.id_satuan
LEFT JOIN persediaan ON barang.id_barang = persediaan.id_barang ");
    
 
  
  
  
  //menampilkan data
  while($row=mysql_fetch_array($query)){

        echo $row['sum'];
         
   };
?>
