<?php
    session_start();
    include "../config/koneksidb.php";

    
    
    $id_katalog = $_POST['id_katalog'];
    $pil_ukuran = $_POST['pil_ukuran'];
    
    
    $_SESSION['cart_'.$id_katalog] +=1;
    $_SESSION['cart_ukuran_'.$id_katalog] = $pil_ukuran;
    
    
    
    
    //masukan ke SESSION/Keranjang sementara
    //$_SESSION['cart_'.$id_katalog]+=1;
    //$_SESSION['cart_ukuran'.$id_katalog] = $pil_ukuran;
    
    
    
    
    
    
    
    
    //mencari data barang yang dimaksud by id
    $mencari_data_barang = mysql_query("SELEC*FROM tb_katalog WHERE id=$id_katalog");
    $ambil_data          = mysql_fetch_array($mencari_data_barang);
    
    //masukan ke pemesana
    

?>