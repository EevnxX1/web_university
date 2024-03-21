<?php
require '../../database/function.php';

$id = $_GET["id"];

if( hapus($id) > 0 ) {
    echo"<script>
    alert('Data Mahasiswa Berhasil Di Hapus!');
    document.location.href = 'data_mhs.php';
    </script>";
} else {
    echo"<script>
    alert('Data Mahasiswa Gagal Di Hapus!');
    document.location.href = 'data_mhs.php';
    </script>";
}
?>