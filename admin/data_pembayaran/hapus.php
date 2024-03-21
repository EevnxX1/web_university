<?php
require '../../database/function.php';

$id = $_GET["id"];

if( hapus_pembayaran($id) > 0 ) {
    echo"<script>
    alert('Data pembayaran Berhasil Di Hapus!');
    document.location.href = 'pembayaran.php';
    </script>";
} else {
    echo"<script>
    alert('Data pembayaran Gagal Di Hapus!');
    document.location.href = 'pembayaran.php';
    </script>";
}
?>