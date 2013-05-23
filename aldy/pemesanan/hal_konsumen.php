<?php
    session_start();
    include "../config/koneksidb.php";
    //ambil data dari tbl_katalog 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Denim House</title>
    <meta charset=utf-8>
    <meta name="description" content="hal utama" />
    <meta name="keywords" content="html5" />
    <link rel="stylesheet" type="text/css" href="../css/css_hal_konsumen.css" />
    <link rel="stylesheet" type="text/css" href="../css/ui-lightness/jquery-ui-1.9.2.custom.css" />
    <link rel="stylesheet" type="text/css" href="../css/coin-slider-styles.css" />
    <script type="text/javascript" src="../js/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.9.2.custom.min.js"></script>
    <script type="text/javascript" src="../js/coin-slider.min.js"></script>
    <script type="text/javascript" src="../js/js_konsumen.js"></script>
    <?php if(isset($_GET['gagal_login'])){ ?>
        <script>
            alert("Silahkan mendaftar terlebih dahulu");
        </script>
    <?php } ?>
</head>
    <body> 
        <header id="header">
            <h1 align="center">WELCOME TO DENIM HOUSE</h1>
        </header>
        <nav id="menu" class="clearfix">
            <ul>
                <li><a href="hal_konsumen.php?berkas=home_konsumen">HOME</a></li>
                <li><a href="hal_konsumen.php?berkas=ttg_kami">TENTANG KAMI</a></li>
                <li><a href="hal_konsumen.php?berkas=cr_psn_byr">CARA PEMESANAN & PEMBAYARAN</a></li>
                <li><a href="hal_konsumen.php?berkas=pendaftaran">PENDAFTARAN</a></li>
                <li><a href="hal_konsumen.php?berkas=pesanan_konsumen">PESANAN ANDA</a></li>
            </ul>
        </nav>
   <div id="bg-site">
        <div id="outer" class="clearfix">
            <div id="content-wrapper">
                <?php if(isset($_GET['berhasil'])){ ?>
                <script>alert("terima kasih telah mendaftar");</script>
                <?php }?>
                
                 <?php
                 //jika tidak lum berisi apapun, maka default nya adalah
                   
                    if(!isset($_GET['berkas'])){
                        include "home_konsumen.php";
                    }else{
                        include $_GET['berkas'].".php";
                    }
                 
                   // include "home_konsumen.php";
                 ?>
              </div>
            <aside>
                <?php if(isset($_SESSION["hak_akses"])){
                    echo "<a href=proses_logout.php>Logout</a><br><br>";
                }else{ ?>

                <h2>SILAHKAN LOGIN</h2>
                <form action="proses_login.php" method="POST">
                <table cellspacing="10">
                    <tr>
                        <td>Email </td>
                        <td>:</td>
                        <td><input type="text" name="user" id="user" /></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input type="password" name="pass" id="pass" /></td>
                    </tr>
                    <tr>
                        <td align="right" colspan="3">
                            <input type="submit" value="masuk" />
                        </td>
                    </tr>
                </table>
                </form>
                <?php } ?>
            </aside>
            <aside>
                <section>
                    <img src="../css/images/bg-noise.png" alt="" />
                    <article>
                        <span>0 Pesanan</span>
                        <br>
                        <a href="#">cek</a><a href="#">batal</a>
                    </article>
                        <a href="#">[ Lihat Ongkos Kirim ]</a>
                        <span>dikirim ke seluruh pelosok nusantara</span>
                </section>
                <section>
                    <p>
                        Khusus untuk pembeli di daerah Pekanbaru, 
                        gratis ongkos kirim dan langsung dikirim ke tempat dan bisa langsung bayar di tempat.
                        Segera pesan lewat sms atau telepon ke 085271060136
                    </p>
                </section>
            </aside>
        </div> 
    </div>   
    </body>
</html>