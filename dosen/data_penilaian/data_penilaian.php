<?php
require "../../database/function.php";
$data_nilai = query("SELECT * FROM tb_nilai");

// tobol cari di tekan
if ( isset($_POST["cari"])) {
  if ($_POST["keyword"]) {
    $data_nilai = cari_datapenilaian($_POST["keyword"]);
  } elseif(isset($_POST["awal"])) {
    $data_nilai = tgl_penilaian($_POST['awal'], $_POST['akhir']);
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
    <title>Data Penilaian</title>
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
      <h2 class="h2">Data Penilaian</h2>
      <form action="" method="post">
        <label>Pencarian:</label>
        <input type="text" name="keyword" autocomplete="off" placeholder="Masukkan Pencarian..." />
        <label>Tanggal awal:</label>
        <input type="date" name="awal" />
        <label>Tanggal akhir</label>
        <input type="date" name="akhir" />
        <div class="btn">
          <button type="submit" name="cari" id="cari">Search!</button>
          <a href="report.php" target="_blank"><button type="button" id="cari">Report!</button></a>
        </div>
      </form>
      <table rules="all" cellpadding="5">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="10%">Nim</th>
            <th width="15%">Nama</th>
            <th width="5%">Prodi</th>
            <th width="12%">Mata Kuliah</th>
            <th width="8%">Pertemuan</th>
            <th width="8%">Tanggal</th>
            <th width="5%">Nilai</th>
            <th width="35%">Keterangan</th>
            <th width="7%">Action</th>
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
            <td><a href="update.php?id=<?= $dn['id_nilai']; ?>"><button>Update</button></a><a href="hapus.php?id=<?= $dn['id_nilai']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data nilai ini?')"><button>Delete</button></a></td>
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
