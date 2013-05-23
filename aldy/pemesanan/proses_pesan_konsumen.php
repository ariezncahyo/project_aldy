<?php
session_start();
if($_SESSION['hak_akses']!="konsumen"){
    header("location:hal_konsumen.php?berkas=pesanan_konsumen&pesan=tidak");
}else{
      include "../config/koneksidb.php";
     //inisialisasi/mengambil data dari form inputan

     //data-data tb katalog
     $id_konsumen   = $_SESSION["id_konsumen"]; 
     $nm_baju       = $_POST['nm_baju'];
     $ket_baju      = $_POST['keterangan'];
     $jns_katagori  = "design";
     $tgl_upload    = date("Y-m-d");
     
     //memproses gambar
    $tipe_gambar   = array('image/jpeg','image/bmp', 'image/x-png');
    $nama          = $_FILES['gambar']['name'];
    $ukuran        = $_FILES['gambar']['size'];
    $tipe          = $_FILES['gambar']['type'];
    $error         = $_FILES['gambar']['error'];
    $uploads_dir   = '../upload/'.$nama;
    
    //memproses data data tb_pemesanan
    $ukuran_pesan  = $_POST['ukuran'];
    $jml           = $_POST['jml'];
    $id_pengiriman = $_POST['daerah'];
    $alamat_kirim  = $_POST['alamat_kirim'];
    
    
    
    if($nama !=="" && $ukuran > 0 && $error == 0){
        if(in_array(strtolower($tipe), $tipe_gambar)){
            $move = move_uploaded_file($_FILES["gambar"]["tmp_name"],$uploads_dir);
            if($move){
                 $kirim = mysql_query("INSERT into tb_katalog(nama_baju,
                                                             nama_gambar,
                                                             ukuran,
                                                             jenis_file,
                                                             jenis_katagori,
                                                             tgl_upload,
                                                             keterangan)
                                    VALUES('$nm_baju',
                                           '$nama',
                                           $ukuran,
                                           '$tipe',
                                           '$jns_katagori',
                                           '$tgl_upload',
                                           '$ket_baju')
                                    ") or die(mysql_error());
                 
                 //jika proses memasukan barang sudah selesai maka simpan sebagai pemesanan sementara
                 if($kirim){
                     //masukan ke dalam pemesanan
                     //id konsumen, tanggal pesan, jumlah, id baju, status pesan
                     
                     //mengambil id katalog yang telah di input untuk katagori design
                     $ambil_katalog_terahkir = mysql_query("SELECT MAX(id) AS id FROM tb_katalog WHERE jenis_katagori = 'design'");
                     $ambil_data_katalog     = mysql_fetch_array($ambil_katalog_terahkir);
                     $id_katalog             = $ambil_data_katalog['id'];
                     
                     $masukan_pemesanan = mysql_query("INSERT into tb_pemesanan(id_konsumen,
                                                                                id_katalog,
                                                                                tgl_pesan,
                                                                                ukuran_pesan,
                                                                                jumlah_pesan,
                                                                                id_pengiriman,
                                                                                tujuan_pengiriman,
                                                                                status_pesan
                                                                               )
                                                       VALUES($id_konsumen,
                                                              $id_katalog,
                                                              '$tgl_upload',
                                                              '$ukuran_pesan',
                                                              $jml,
                                                              $id_pengiriman,
                                                              '$alamat_kirim',
                                                              'belum deal'
                                                        )") or die(mysql_error());
                     
                     
                        if($masukan_pemesanan){
                             
                             header("location:hal_konsumen.php?berkas=pesanan_konsumen&pesan=ya");
                        } 
                     
                 }
            }
        }
    }
    //masukan ke pemesan
}
    
    
     
     
     
?>
