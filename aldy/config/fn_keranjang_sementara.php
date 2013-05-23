<?php
    
    function barang_pilihan($id){
        $mencari_barang = mysql_query("SELECT id, nama_baju, nama_gambar, harga_baju FROM tb_katalog WHERE id IN ($id)");
    }
    
?>
