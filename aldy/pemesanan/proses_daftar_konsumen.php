<?php
    include "../config/koneksidb.php";
    
    //inisialisasi
    $nm_lengkap = $_POST['nm_lengkap'];
    $eml        = $_POST['eml'];
    $tgl_lhr    = $_POST['tgl_lhr'];
    $telp       = $_POST['telp'];
    $pass       = $_POST['pass'];
    $almt       = $_POST['almt'];
    
    $query = mysql_query("INSERT into tb_konsumen(nama_konsumen,email,tgl_lahir,no_hp,password,alamat) 
                          VALUES('$nm_lengkap','$eml','$tgl_lhr',$telp,'$pass','$almt')");
    
    header("location:hal_konsumen.php?berkas=pendaftaran&berhasil=ya");

?>