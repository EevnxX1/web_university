<?php
require "../../../database/function.php";
if (isset($_POST["submit"])) {
  if (absen_mhs($_POST) > 0) {
    echo"<script>
    alert('Absensi berhasil di kirim!');
    document.location.href = '../../elearning/elearning.html';
    </script>";
  } else {
    echo"<script>
    alert('Absensi gagal di kirim!');
    document.location.href = '../data_mhs/data_mhs.php';
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
        <img src="asset/1.png" alt="logo" class="logo" width="50px" height="50px" data-aos="fade-right" data-aos-duration="2000" />
        <h2 data-aos="fade-right" data-aos-duration="2000">University</h2>
        <ul class="navbar" data-aos="fade-left" data-aos-duration="2000">
          <li>
          <a href="../../dashboard/index.html">Home</a>
            <a href="../../pembayaran/pembayaran.php">Pembayaran</a>
            <a href="#">Absen</a>
            <a href="../../elearning/elearning.html">E-learning</a>
            <a href="../../../index.php" class="logout">Log Out</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="container">
      <h2>Absensi Mahasiswa</h2>
      <div class="isi">
        <form action="" method="post">
          <label for="nim">Nim:</label>
          <input type="number" name="nim" id="nim" />
          <label for="nama">Nama:</label>
          <input type="text" name="nama" id="nama" />
          <label for="prodi">Prodi:</label>
          <input type="text" name="prodi" id="prodi" />
          <label for="tanggal">Tanggal:</label>
          <input type="date" name="tanggal" id="tanggal" />
          <label for="matkul">Mata Kuliah:</label>
          <select name="matkul" id="matkul">
            <option selected>-Pilih Mata kuliah-</option>
            <option value="Pemrograman Internet">Pemrograman Internet</option>
            <option value="Algoritma Dan Pemrograman">Algoritma Dan Pemrograman</option>
            <option value="Arsitektur Dan Organisasi Komputer">Arsitektur Dan Organisasi Komputer</option>
          </select>
          <label for="prtmn">Pertemuan:</label>
          <select name="prtmn" id="prtmn">
            <option selected>-Pilih Pertemuan Ke-</option>
            <option value="1">Pertemuan Ke 1</option>
            <option value="2">Pertemuan Ke 2</option>
            <option value="3">Pertemuan Ke 3</option>
            <option value="4">Pertemuan Ke 4</option>
            <option value="5">Pertemuan Ke 5</option>
            <option value="6">Pertemuan Ke 6</option>
            <option value="7">Pertemuan Ke 7</option>
          </select>
          <label for="absen">Absensi:</label>
          <select name="absen" id="absen">
            <option selected>~Pilih keterangannya~</option>
            <option value="Hadir">Hadir</option>
            <option value="Sakit">Sakit</option>
            <option value="Izin">Izin</option>
          </select>
          <label for="ket">Keterangan:</label>
          <textarea name="ket" id="ket" cols="30" rows="7" placeholder="Jika memilih selain hadir. Masukkan alasannya?"></textarea>
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
