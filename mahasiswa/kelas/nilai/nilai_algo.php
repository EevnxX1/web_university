<?php
require "../../../database/function.php";
$data_nilai = query("SELECT * FROM tb_nilai WHERE matkul_nilai = 'Algoritma Dan Pemrograman' ORDER BY prtmn_nilai ASC");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Nilai</title>
  </head>
  <body>
    <div class="background">
      <nav class="nav-container">
        <img src="../asset/1.png" alt="logo" class="logo" width="50px" height="50px" data-aos="fade-right" data-aos-duration="2000" />
        <h2 data-aos="fade-right" data-aos-duration="2000">University</h2>
        <ul class="navbar" data-aos="fade-left" data-aos-duration="2000">
          <li>
            <a href="../../dashboard/index.html">Home</a>
            <a href="../../pembayaran/pembayaran.php">Pembayaran</a>
            <a href="../absen/absensi.php">Absen</a>
            <a href="../../elearning/elearning.html">E-learning</a>
            <a href="../../../index.php" class="logout">Log Out</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="container">
      <h2 class="h2">Nilai Algorita Dan Pemrograman</h2>
      <form action="" method="post">
        <label>Pencarian:</label>
        <input type="text" name="keyword" autocomplete="off" placeholder="Masukkan Pencarian..." />
        <label>Tanggal awal:</label>
        <input type="date" name="awal" />
        <label>Tanggal akhir</label>
        <input type="date" name="akhir" />
        <div class="btn">
          <button type="submit" name="cari" id="cari">Search!</button>
        </div>
      </form>
      <table rules="all" cellpadding="5">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="10%">Nim</th>
            <th width="17%">Nama</th>
            <th width="5%">Prodi</th>
            <th width="12%">Mata Kuliah</th>
            <th width="8%">Pertemuan</th>
            <th width="8%">Tanggal</th>
            <th width="5%">Nilai</th>
            <th width="40%">Keterangan</th>
          </tr>
        </thead>
        <?php $i = 1; ?>
        <?php foreach($data_nilai as $dn) : ?>
        <tbody>
          <tr>
            <td height="100px"><?= $i; ?></td>
            <td><?= $dn['nim_nilai']; ?></td>
            <td><?= $dn['nama_nilai']; ?></td>
            <td><?= $dn['prodi_nilai']; ?></td>
            <td><?= $dn['matkul_nilai']; ?></td>
            <td><?= $dn['prtmn_nilai']; ?></td>
            <td><?= $dn['tgl_nilai']; ?></td>
            <td><?= $dn['nilai']; ?></td>
            <td><?= $dn['ket_nilai']; ?></td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
