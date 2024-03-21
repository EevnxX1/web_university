<?php
require "../../database/function.php";

$id = $_GET["id"];

if( hapus_nilai($id) > 0) {
    echo"<script>
    alert('Data Penilaian Berhasil Di Hapus!');
    document.location.href = 'data_penilaian.php';
    </script>";
} else {
    echo"<script>
    alert('Data Penilaian Gagal Di Hapus!');
    document.location.href = 'data_penilaian.php';
    </script>";
}
?>