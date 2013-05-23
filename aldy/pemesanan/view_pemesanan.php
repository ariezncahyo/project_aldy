<?php
    session_start();
    include "../config/koneksidb.php";
    
    //Mencari Data-Data Pesanan by Konsumen yang login
    $id_konsumen = $_SESSION["id_konsumen"];
    
    $mencari_data_pesanan = mysql_query("SELECT p.id_pemesanan AS id_pemesanan, p.id_konsumen AS id_konsumen, 
                                         p.tgl_pesan AS tgl_pesan, p.ukuran_pesan AS ukuran_pesan, p.jumlah_pesan AS jumlah_pesan,
                                         p.total AS sub_total, k.nama_baju AS nama_baju 
                                         FROM tb_pemesanan p, tb_katalog k
                                         WHERE p.total <> 0
                                         AND k.harga_baju <> 0
                                         AND p.id_katalog = k.id 
                                        ");
    
    
    
    
?>
<html>
    <head>
        <title>Pesanan Konsumen</title>
        <link rel="stylesheet" href="../css/css_hal_konsumen.css" type="text/css" />
    </head>
    <body>
        <div id="pesanan_konsumen">
        <h2>Pesanan Anda</h2>
        <table>
            <tr>
                <th>NO.</th>
                <th>ID PESAN</th>
                <th>TGL. PESAN</th>
                <th>NAMA BAJU</th>
                <th>UKURAN</th>
                <th>JUMLAH</th>
                <th>SUBTOTAL</th>
            </tr>
        <?php 
        $no = 1;
        $total = 0;
        while($data_pesanan =  mysql_fetch_array($mencari_data_pesanan)){ 
        $total = $total+$data_pesanan['sub_total'];    
        ?>    
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data_pesanan['id_pemesanan']; ?></td>
                <td><?php echo $data_pesanan['tgl_pesan']; ?></td>
                <td><?php echo $data_pesanan['nama_baju']; ?></td>
                <td><?php echo $data_pesanan['ukuran_pesan']; ?></td>
                <td><?php echo $data_pesanan['jumlah_pesan']; ?></td>
                <td><?php echo $data_pesanan['sub_total']; ?></td>
            </tr>
             
        <?php } ?>
            <tr>
                <td colspan="6">Total</td>
                <td>
                    <?php
                        echo $total;
                    ?>     
                </td>
            </tr>
        </table>
        </div>
    </body>
</html>
