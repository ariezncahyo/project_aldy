<?php
    session_start();
    
    //menampilkan data2 pemesanan
    
    $menampilkan_pesanan = mysql_query("SELECT k.nama_baju AS nama_baju, p.ukuran_pesan AS ukuran_pesan, p.tgl_pesan AS tgl_pesan, 
                                        p.jumlah_pesan AS jumlah_pesan, k.harga_baju AS harga_baju, p.keuntungan AS keuntungan,
                                        t.id_pengiriman AS id_pengiriman, t.nama_wilayah AS nama_wilayah, p.total AS sub_total,
                                        p.id_konsumen AS id_konsumen, kon.nama_konsumen, k.nama_gambar AS nama_gambar
                                        FROM tb_pemesanan p, tb_konsumen kon, tb_pengiriman t, tb_katalog k
                                        WHERE p.id_konsumen = kon.id_konsumen
                                        AND p.id_katalog = k.id
                                        AND p.id_pengiriman = t.id_pengiriman
                                        AND p.status_pesan IN ('belum deal','deal')
                                       ") or die(mysql_error());
    
?>
<div id="fm_deal_pesan">
    <form>
        <table cellpadding="10">
            <tr>
                <td>Nama Baju</td>
                <td>:</td>
                <td>data</td>
            </tr>
            <tr>
                <td>Ukuran</td>
                <td>:</td>
                <td>data</td>
            </tr>
            <tr>
                <td>Jumlah pesan</td>
                <td>:</td>
                <td>data</td>
            </tr>
            <tr>
                <td>Harga barang</td>
                <td>:</td>
                <td>
                    <input type="text" name="harga_barang" value="" />
                </td>
            </tr>
            <tr>
                <td>Keuntungan</td>
                <td>:</td>
                <td>
                    <input type="text" name="keuntungan" value="" />
                </td>
            </tr>
            <tr>
                <td>Pengiriman</td>
                <td>:</td>
                <td>data</td>
            </tr>
            <tr>
                <td>Total Bayar</td>
                <td>:</td>
                <td><input type="text" name="total_bayar" id="total_bayar" value="" /></td>
            </tr>
        </table>
    </form>
</div>
<div id="tabel_deal_pesan">
    <table>
        <tr>
            <th>NO. </th>
            <th>ID KONSUMEN</th>
            <th>NAMA KONSUMEN</th>
            <th>NAMA BAJU</th>
            <th>NAMA FILE</th>
            <th>TANGGAL PESAN</th>
            <th>KEUNTUNGAN</th>
            <th>PENGIRIMAN</th>
            <th>TOTAL BAYAR</th>
            <th>AKSI</th>
        </tr>
<?php 
$no = 1; 
while( $data_pesanan = mysql_fetch_array($menampilkan_pesanan)){ ?>        
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data_pesanan['id_konsumen']; ?></td>
            <td><?php echo $data_pesanan['nama_konsumen']; ?></td>
            <td><?php echo $data_pesanan['nama_baju']; ?></td>
            <td><?php echo $data_pesanan['nama_gambar']; ?></td>
            <td><?php echo $data_pesanan['tgl_pesan']; ?></td>
            <td><?php echo $data_pesanan['keuntungan']; ?></td>
            <td><?php echo $data_pesanan['nama_wilayah']; ?></td>
            <td><?php echo $data_pesanan['sub_total']; ?></td>
            <td>Edit | Delete</td>
        </tr>
<?php } ?>        
    </table>
</div>