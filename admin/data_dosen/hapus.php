<?php
require '../../database/function.php';

$id = $_GET["id"];

if( hapus_dosen($id) > 0 ) {
    echo"<script>
    alert('Data Dosen Berhasil Di Hapus!');
    document.location.href = 'data_dosen.php';
    </script>";
} else {
    echo"<script>
    alert('Data Dosen Gagal Di Hapus!');
    document.location.href = 'data_dosen.php';
    </script>";
}
?>