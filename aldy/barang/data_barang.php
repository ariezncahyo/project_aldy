<?php
    $pilih_file = mysql_query("SELECT*FROM tb_katalog");
    //jika terdapat id, yang didapat dari tombol hapus
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $pilih = mysql_query("DELETE from tb_katalog WHERE id=$id") or die(mysql_error());
        if($pilih){
            header("location:index.php?berkas=barang/data_barang");
            exit();
        }
    }
    
    
?>  
<div id="fm_upload">
    <form name="form_upload" method="POST" action="barang/proses_upload.php" enctype="multipart/form-data"> 
        <h3>FORM INPUT DATA BARANG</h3>
        <table cellspacing="20">
            <tr>
                <td>Silahkan upload foto </td>
                <td>:</td>
                <td>
                    <input type="file" name="gambar" value="" />
                </td>
            </tr>
            <tr>
                <td>Nama Baju</td>
                <td>:</td>
                <td><input type="text" name="nm_baju" value="" /></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input type="text" name="harga_baju" id="harga" /></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td>
                    <textarea name="keterangan_baju"> </textarea>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right">
                    <input type="submit" name="upload" value="input" />
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="tbl_barang">
    <h3>TABEL KATALOG</h3>
    <table class="auto_tabel">
        <thead>
            <tr>
                <th>NO. </th>
                <th>NAMA BAJU</th>
                <th>NAMA GAMBAR</th>
                <th>TANGGAL UPLOAD</th>
                <th>HARGA BAJU</th>
                <th>JENIS KATALOG</th>
                <th>KETERANGAN</th>
                <th>AKSI</th>
            </tr>
        </thead>  
        <tbody>
<?php $no=1; while($data=mysql_fetch_array($pilih_file)){?>            
        <tr>
            <td><?php echo $no++."."; ?></td>
            <td><?php echo $data['nama_baju']; ?></td>
            <td><?php echo $data['nama_gambar']; ?></td>
            <td><?php echo $data['tgl_upload']; ?></td>
            <td><?php echo $data['harga_baju']; ?></td>
            <td><?php echo $data['jenis_katagori']; ?></td>
            <td><?php echo $data['keterangan']; ?></td>
            <td align="center">
                <a href="index.php?berkas=barang/data_barang&id=<?php echo $data['id']; ?>" class="delete_id">HAPUS</a>
            </td>
        </tr>
<?php } ?>        
        </tbody>
    </table>
</div>
