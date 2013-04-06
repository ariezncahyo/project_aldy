<?php
    if(isset($_GET['id'])){     
        $id         = $_GET['id'];
        $query_edit = mysql_query("SELECT*FROM tb_katalog WHERE id=$id");
        $dt_edit    = mysql_fetch_array($query_edit);
        
        //ingin mengetahui jumlah data, yang di edit
        $jml_edit   = mysql_num_rows($query_edit);
    }
    $pilih_file = mysql_query("SELECT*FROM tb_katalog");
?>  
<div id="fm_upload">
    <form name="form_upload" method="POST" action="barang/proses_upload.php" enctype="multipart/form-data"> 
        <h3>FORM INPUT DATA BARANG</h3>
        <table cellspacing="20">
            <tr>
                <td>Silahkan upload foto </td>
                <td>:</td>
                <td>
                    <input type="file" name="gambar" value="<?php if($jml_edit>0){echo $dt_edit['file']; }?>" />
                </td>
            </tr>
            <tr>
                <td>Nama Baju</td>
                <td>:</td>
                <td><input type="text" name="nm_baju" /></td>
            </tr>
            <tr>
                <td>Pilih jenis</td>
                <td>:</td>
                <td>
                    <select name="pil_jenis">
                        <option value="">--silahkan pilih--</option>
                        <option value="katalog">Katalog</option>
                        <option value="design">Design</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3">
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
                <th width="30%">NAMA BAJU</th>
                <th>NAMA GAMBAR</th>
                <th>TANGGAL UPLOAD</th>
                <th>JENIS KATALOG</th>
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
            <td><?php echo $data['jenis_katagori']; ?></td>
            <td align="center">
                <a href="index.php?berkas=barang/data_barang&id=<?php echo $data['id']; ?>">EDIT</a> |
                <a href="index.php?id=<?php echo $data['id']; ?>">HAPUS</a>
            </td>
        </tr>
<?php } ?>        
        </tbody>
    </table>
</div>

teteetete