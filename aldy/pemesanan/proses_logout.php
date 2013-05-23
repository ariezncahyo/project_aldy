<?php
    session_start();
    session_destroy();
    
    header("location:hal_konsumen.php?berkas=home_konsumen");
?>
