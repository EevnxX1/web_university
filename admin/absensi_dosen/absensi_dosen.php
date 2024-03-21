<?php
require "../../database/function.php";
$absensi_dosen = query("SELECT * FROM tb_absendosen");
// tobol cari di tekan
if ( isset($_POST["cari"])) {
  if ($_POST["keyword"]) {
    $absensi_dosen = cari_absen_dosen($_POST["keyword"]);
  } elseif (isset($_POST["awal"])) {
    $absensi_dosen = tgl_absendosen($_POST['awal'], $_POST['akhir']);
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
    <title>Data Absensi Dosen</title>
  </head>
  <body>
    <div class="background">
      <nav class="nav-container">
        <img src="../dashboard/asset/1.png" alt="logo" class="logo" width="50px" height="50px" data-aos="fade-right" data-aos-duration="2000" />
        <h2 data-aos="fade-right" data-aos-duration="2000">University</h2>
        <ul class="navbar" data-aos="fade-left" data-aos-duration="2000">
          <li>
            <a href="../dashboard/index.html">Home</a>
            <a href="../data_dosen/data_dosen.php">Data Dosen</a>
            <a href="../data_mhs/data_mhs.php">Data Mahasiswa</a>
            <a href="../data_pembayaran/pembayaran.php">Data Pembayaran</a>
            <a href="../../index.php">Log Out</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="container">
      <h2 class="h2">Data-data Absensi Dosen</h2>
      <form action="" method="post">
        <label>Pencarian:</label>
        <input type="text" name="keyword" autocomplete="off" placeholder="Masukkan Pencarian..." />
        <label>Tanggal awal:</label>
        <input type="date" name="awal" />
        <label>Tanggal akhir</label>
        <input type="date" name="akhir">
        <div class="btn">
        <button type="submit" name="cari" id="cari">Search!</button>
        </div>
      </form>
      <table rules="all" cellpadding="5">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="12%">NIP</th>
            <th width="22%">Nama</th>
            <th width="11%">Tanggal</th>
            <th width="10%">Absensi</th>
            <th width="32%">Keterangan</th>
            <th width="8%">Action</th>
          </tr>
        </thead>
        <?php $i = 1; ?>
        <?php foreach($absensi_dosen as $ad) : ?>
        <tbody>
          <tr>
            <td height="100px"><?= $i; ?></td>
            <td><?= $ad['nip']; ?></td>
            <td><?= $ad['nama']; ?></td>
            <td><?= $ad['tanggal']; ?></td>
            <td><?= $ad['absensi']; ?></td>
            <td><?= $ad['ket']; ?></td>
            <td><a href="hapus.php?id=<?= $ad['id_absen']; ?>" onclick="return confirm('Yakin ingin menghapus data absensi dosen ini?')"><button>Delete</button></a></td>
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
