<?php
    include "config/koneksidb.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>HOME</title>
    <meta charset=utf-8>
    <meta name="description" content="hal utama" />
    <meta name="keywords" content="html5" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.9.2.custom.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
    <script type="text/javascript" src="js/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="js/js_config.js"></script>
    </head>
    <body>
        <div id="keterangan">
           berisi logut, hak akses , anda berada di menu apa
        </div>
        <div id="navigasi">
            <ul>
                <li><a href="index.php?berkas=home/home">HOME</a></li>
                <li><a href="index.php?berkas=barang/data_barang">KATALOG</a></li>
                <li><a href="index.php">PEMESANAN</a></li>
                <li><a href="index.php">PEMBAYARAN</a></li>
            </ul>
        </div>
        <div id="outer">
            <div id="content">
            <?php
            // ngeload file yang akan dipilih, sesuai link yang di pilih
                if(!isset($_GET['berkas'])){
                    include "home/home.php";
                }else{
                    include $_GET['berkas'].".php";
                }
                
                //tampilkan error jika,pada saat proses upload ada error 
                if(isset($_GET['error'])){
                    echo $_GET['error'];
                }
            ?>
            </div>
        </div>
        <div class="clear"></div>
    </body>
</html>