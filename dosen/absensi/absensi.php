<?php
require "../../database/function.php";
if ( isset($_POST["submit"])) {

  if( absen_dosen($_POST) > 0) {
    echo"<script>
    alert('Absensi anda berhasil dikirim!');
    document.location.href = '../dashboard/index.html';
    </script>";
  } else {
    echo"<script>
    alert('Absensi anda gagal dikirim!');
    document.location.href = '../dashboard/index.html';
    </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Absensi</title>
  </head>
  <body>
    <div class="background">
      <nav class="nav-container">
        <img src="../dashboard/asset/1.png" alt="logo" class="logo" width="50px" height="50px" data-aos="fade-right" data-aos-duration="2000" />
        <h2 data-aos="fade-right" data-aos-duration="2000">University</h2>
        <ul class="navbar" data-aos="fade-left" data-aos-duration="2000">
          <li>
          <a href="../dashboard/index.html">Home</a>
            <a href="../list_mahasiswa/list_mhs.php">List Mahasiswa</a>
            <a href="../absensi_mhs/absensi_mhs.php">Absen Mahasiswa</a>
            <a href="../absensi/absensi.php">Absensi</a>
            <a href="../../index.php" class="logout">Log Out</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="container">
      <h2>Absensi Dosen</h2>
      <div class="isi">
        <form action="" method="post">
          <label for="nip">NIP:</label>
          <input type="number" name="nip" id="nip" />
          <label for="nama">Nama:</label>
          <input type="text" name="nama" id="nama" />
          <label for="tanggal">Tanggal:</label>
          <input type="date" name="tanggal" id="tanggal" />
          <label for="absen">Absensi:</label>
          <select name="absen" id="absen">
            <option selected>~Pilih keterangannya~</option>
            <option value="Hadir">Hadir</option>
            <option value="Sakit">Sakit</option>
            <option value="Izin">Izin</option>
          </select>
          <label for="ket">Keterangan:</label>
          <textarea name="ket" id="ket" cols="30" rows="7"></textarea>
          <button type="submit" name="submit">Kirim</button>
        </form>
      </div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
