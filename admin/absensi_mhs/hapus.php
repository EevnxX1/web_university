<?php
require "../../database/function.php";
$id = $_GET["id"];

if( hapus_absenmhs($id) > 0) {
    echo"<script>
    alert('Data absensi mahasiswa berhasil di hapus');
    document.location.href = 'absensi_mhs.php';
    </script>";
} else {
    echo"<script>
    alert('Data absensi mahasiswa gagal di hapus');
    document.location.href = 'absensi_mhs.php';
    </script>";
}
?>