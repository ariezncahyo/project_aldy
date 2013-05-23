<?php
    $ambil_katalog  = mysql_query("SELECT*from tb_katalog");
    $jumlah_katalog = mysql_num_rows($ambil_katalog); 
    
?>
<section>
    <div id="slidebisnis">
        <a href="../images/ukuran_denim.jpg">
            <img src='../images/ukuran_denim.jpg'>
            <span>
                    Koleksi Baju Kaos Denim House <br>
                    Ukuran Panjang x Lebar cm : S(67.5 x 48), M(70 x 50.5), L(72.5 x 53.5), XL(75 x 56)
            </span>
	</a>
        <a href="../images/denim_house.jpg">
            <img src='../images/denim_house.jpg'>
            <span>
                    berisi baju2 yang siap dijual
            </span>
	</a>
        <a href="../images/pahe.jpg">
            <img src='../images/pahe.jpg'>
            <span>
                    Sekarang setiap pembelian 3 atau lebih baju kaos Denim House, <br>
                    anda mendapat diskon 10%
                    Ayo buruan kumpulin teman-teman kamu, supaya belinya sekaligus banyak, 
                    jadi lebih hemat 
            </span>
	</a>
    </div>
    </section>
<section>
    <?php if($jumlah_katalog==0){ 
        echo "<h1>Tidak ada data</h1>";
    }else{
    ?>
    <ul class="clearfix">
        <?php
        //memasukan data/record katalog ke dalam array
        $n = 1;
            while($data_katalog = mysql_fetch_array($ambil_katalog)){        
        ?>
        <li>
            <div>    
                <span>
                    <?php 
                           $format_rupiah = number_format($data_katalog['harga_baju'], 0, ",", ".");
                           echo "Rp. ".$format_rupiah;
                     ?>
                </span>
                <img src="../upload/<?php echo $data_katalog['nama_gambar']; ?>" />
                      <a href="#" class="beli_<?php echo $n; ?>">beli</a>
                <span><?php echo $data_katalog['nama_baju']; ?></span>
            </div>
            <form action="proses_keranjang.php" method="POST" class="fm-beli_<?php echo $n; ?> hilang">
                <input type="hidden" name="id_katalog" value="<?php echo $data_katalog['id']; ?>" />
                <span>silahkan pilih : </span>
                <select name="pil_ukuran">
                    <option value=""> ukuran </option>
                    <option value="S">L</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
                <input type="submit" value="pilih" />
            </form>
            <script>
                $(document).ready(function(){
                    //jika tombol dipencet maka form ukuran akan keluar
                    $('.beli_<?php echo $n; ?>').click(function(){
                        $('.fm-beli_<?php echo $n; ?>').show();
                    });
                });
            </script>   
        </li>
        <?php
        $n++;
        }
        ?>
    </ul>
    <?php } ?>
</section>
<?php if(isset($_GET['login'])) { ?>
<script type="text/javascript">
    alert("Selamat datang <?php echo $_SESSION["nama_konsumen"]; ?> di website kami");
</script>
<?php } ?>
