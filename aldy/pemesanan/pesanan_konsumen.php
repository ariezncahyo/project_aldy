<?php
    $mencari_pengiriman = mysql_query("SELECT*FROM tb_pengiriman") or die(mysql_error());
?>
<div id="isi">
    <h2>FORM PESANAN</h2>
    <form action="proses_pesan_konsumen.php" enctype="multipart/form-data" method="POST">
        <table>
            <tr>
                <td>Upload</td>
                <td>:</td>
                <td><input type="file" name="gambar" id="gambar" /></td>
            </tr>
            <tr>
                <td>Nama Baju</td>
                <td>:</td>
                <td><input type="text" name="nm_baju" id="nm_baju" /></td>
            </tr>
            <tr>
                <td>Ukuran</td>
                <td>:</td>
                <td>
                    <select name="ukuran">
                        <option value="s">Small</option>
                        <option value="l">Large</option>
                        <option value="xl">Extra Large</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah Pesan</td>
                <td>:</td>
                <td><input type="text" name="jml" id="jml" size="5" /></td>
            </tr>
            <tr>
                <td>Alamat Kirim</td>
                <td>:</td>
                <td>
                    <textarea name="alamat_kirim"></textarea>
                </td>
            </tr>
            <tr>
                <td>Daerah</td>
                <td>:</td>
                <td>
                    <select name="daerah">
                     <?php while($data_p= mysql_fetch_array($mencari_pengiriman)){ ?>    
                        <option value="<?php echo $data_p['id_pengiriman']; ?>"><?php echo $data_p['nama_wilayah']; ?></option>
                    <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Deskripsi Pesanan</td>
                <td>:</td>
                <td>
                    <textarea name="keterangan">
                        
                    </textarea>
                </td>
            </tr>
            <tr>
                <td align="right" colspan="3">
                    <input type="submit" value="Pesan" />
                </td>
            </tr>
        </table>
    </form>
</div>
<?php if(isset($_GET['pesan']) && $_GET['pesan'] == "ya"){ ?>
<script type="text/javascript">
    alert("terima kasih telah memesan");
</script>
<?php }elseif(isset($_GET['pesan']) && $_GET['pesan'] == "tidak"){ ?>
<script type="text/javascript">
    alert("Maaf Anda harus Login Dahulu");
</script>    
<?php } ?>
<br><br>
<?php if(isset($_SESSION['hak_akses'])) { ?>
<a href="#" onclick="tab_baru()">[ Lihat Pesanan Anda Disini ]</a>
<?php } ?>
<script type="text/javascript">
    function tab_baru(){
        window.open("view_pemesanan.php", "_blank", "height=500,width=800");
    }
</script>