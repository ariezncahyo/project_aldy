<?php
    include "../config/koneksidb.php";
    
    
//if(){    
    
    //inisialisasi
    $harga_baju    = $_POST['harga_baju']; 
    $jns_katagori  = "katalog";
    $tgl_upload    = date("Y-m-d");
    $nm_baju       = $_POST['nm_baju'];
    $ket_baju      = $_POST["keterangan_baju"];
    $tipe_gambar   = array('image/jpeg','image/bmp', 'image/x-png');
    $nama          = $_FILES['gambar']['name'];
    $ukuran        = $_FILES['gambar']['size'];
    $tipe          = $_FILES['gambar']['type'];
    $error         = $_FILES['gambar']['erorr'];
    
    $uploads_dir   = '../upload/'.$nama;
    
    if($nama !=="" && $ukuran > 0 && $error == 0){
        if(in_array(strtolower($tipe), $tipe_gambar)){
            $move = move_uploaded_file($_FILES["gambar"]["tmp_name"],$uploads_dir);
            //proses upload
            if($move){
                $kirim = mysql_query("INSERT into tb_katalog(nama_baju,
                                                             nama_gambar,
                                                             ukuran,
                                                             jenis_file,
                                                             jenis_katagori,
                                                             harga_baju,
                                                             tgl_upload,
                                                             keterangan)
                                    VALUES('$nm_baju',
                                           '$nama',
                                           $ukuran,
                                           '$tipe',
                                           '$jns_katagori',
                                           $harga_baju,
                                           '$tgl_upload',
                                           '$ket_baju')
                                    ") or die(mysql_error());
                
                //jika berhasil masuk database, kembali ke tampilan data baranng
                    if($kirim){
                        header("location:../index.php?berkas=barang/data_barang");
                    }
               }
            }else{
                header("location:../index.php?berkas=barang/data_barang&error=gagal_upload");
            }
        }
        
//}        
        
?>