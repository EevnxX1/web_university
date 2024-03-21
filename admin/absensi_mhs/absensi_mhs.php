<?php
require "../../database/function.php";
$absen_mhs = query("SELECT * FROM tb_absenmhs");

// tobol cari di tekan
if ( isset($_POST["cari"])) {
  if ($_POST["keyword"]) {
    $absen_mhs = cari_absenmhs($_POST["keyword"]);
  } elseif(isset($_POST["awal"])) {
    $absen_mhs = tgl_absenmhs($_POST['awal'], $_POST['akhir']);
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
    <title>Absensi Mahasiswa</title>
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
      <h2 class="h2">Data-data Absensi Mahasiswa</h2>
      <form action="" method="post">
        <label>Pencarian:</label>
        <input type="text" name="keyword" autocomplete="off" placeholder="Masukkan Pencarian..." />
        <label>Tanggal awal:</label>
        <input type="date" name="awal" />
        <label>Tanggal akhir</label>
        <input type="date" name="akhir" />
        <div class="btn">
          <button type="submit" name="cari" id="cari">Search!</button>
          <a href="report.html"><button type="button" id="cari">Report</button></a>
        </div>
      </form>
      <table rules="all" cellpadding="5">
        <thead>
          <tr>
            <th width="3%">No</th>
            <th width="10%">Nim</th>
            <th width="15%">nama</th>
            <th width="7%">Prodi</th>
            <th width="8%">Tanggal</th>
            <th width="10%">Matkul</th>
            <th width="5%">Pertemuan</th>
            <th width="8%">Absensi</th>
            <th width="27%">Keterangan</th>
            <th width="7%">Action</th>
          </tr>
        </thead>
        <?php $i = 1; ?>
        <?php foreach($absen_mhs as $am) : ?>
        <tbody>
          <tr>
            <td height="100px"><?= $i; ?></td>
            <td><?= $am["nim"]; ?></td>
            <td><?= $am["nama"]; ?></td>
            <td><?= $am["prodi"]; ?></td>
            <td><?= $am["tanggal"]; ?></td>
            <td><?= $am["matkul"]; ?></td>
            <td><?= $am["pertemuan"]; ?></td>
            <td><?= $am["absensi"]; ?></td>
            <td><?= $am["ket"]; ?></td>
            <td><a href="hapus.php?id=<?= $am['id']; ?>" onclick="return confirm('Yakin ingin menghapus data absensi mahasiswa ini?')"><button>Delete</button></a></td>
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
