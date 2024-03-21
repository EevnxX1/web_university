<?php
require "../../database/function.php";
$id = $_GET["id"];

if(hapus_absendosen($id) > 0) {
    echo"<script>
    alert('Data absensi dosen berhasil dihapus');
    document.location.href = 'absensi_dosen.php';
    </script>";
} else {
    echo"<script>
    alert('Data absensi dosen gagal dihapus');
    document.location.href = 'absensi_dosen.php';
    </script>";
}
?>