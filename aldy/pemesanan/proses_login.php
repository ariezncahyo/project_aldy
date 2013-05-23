<?php
    session_start();
    include "../config/koneksidb.php";
    
    //mengambil data inputan login
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    
    //mencari data yang sesuai
    $mencari_data_konsumen = mysql_query("SELECT*FROM tb_konsumen WHERE email='$user' AND password = '$pass'");
    $jumlah_data           = mysql_num_rows($mencari_data_konsumen);
    $ambil_data            = mysql_fetch_array($mencari_data_konsumen);
    $id_konsumen           = $ambil_data['id_konsumen'];
    $nama_konsumen         = $ambil_data['nama_konsumen'];
    //jika jumlah data cuman satu saja, dapat dipastikan dia sudah punya akun
    if($jumlah_data==1){
        
        $_SESSION["username"]      = $user;
        $_SESSION["password"]      = $pass;
        $_SESSION["hak_akses"]     = "konsumen";
        $_SESSION["id_konsumen"]   = $id_konsumen;
        $_SESSION["nama_konsumen"] = $nama_konsumen;
        
        
        
        header("location:hal_konsumen.php?berkas=home_konsumen&login=ya"); 
    }else{
        header("location:hal_konsumen.php?berkas=home_konsumen&gagal_login=ya");
    }
    
    
    

?>