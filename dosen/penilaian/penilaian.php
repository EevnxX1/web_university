<?php
require "../../database/function.php";
if( isset($_POST["submit"])) {

  if( nilai($_POST) > 0) {
    echo"<script>
    alert('Nilai berhasil dikirim!');
    document.location.href = '../dashboard/index.html';
    </script>";
  } else {
    echo"<script>
    alert('Nilai gagal dikirim!');
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
    <title>Penilaian</title>
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
      <h2 class="h2">Penilaian Mahasiswa</h2>
      <div class="isi">
        <form action="" method="post">
          <label for="nim">Nim:</label>
          <input type="text" name="nim" id="nim" />
          <label for="nama">Nama:</label>
          <input type="text" name="nama" id="nama" />
          <label for="prodi">prodi</label>
          <input type="text" name="prodi" id="prodi" />
          <label for="matkul">Mata Kuliah:</label>
          <select name="matkul" id="matkul">
            <option selected>~Pilih Mata Kuliah~</option>
            <option value="Algoritma Dan Pemrograman">Algoritma Dan Pemrograman</option>
            <option value="Pemrograman Internet">Pemrograman Internet</option>
            <option value="Arsitektur Dan Organisasi Komputer">Arsitektur Dan Organisasi Komputer</option>
          </select>
          <label for="pertemuan">Pertemuan:</label>
          <input type="number" name="pertemuan" id="pertemuan" />
          <label for="tanggal">Tanggal:</label>
          <input type="date" name="tanggal" id="tanggal" />
          <label for="nilai">Nilai:</label>
          <input type="number" name="nilai" id="nilai" />
          <label for="ket">Keterangan:</label>
          <textarea name="ket" id="ket" cols="30" rows="7" placeholder="Berikan pendapat.."></textarea>
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
