<?php
require "../../database//function.php";
$data_pembayaran = query("SELECT * FROM tb_pembayaran ORDER BY id_pembayaran ASC");

// tobol cari di tekan
if ( isset($_POST["cari"])) {
  if ($_POST["keyword"]) {
    $data_pembayaran = cari_pembayaran($_POST["keyword"]);
  } elseif(isset($_POST["awal"])) {
    $data_pembayaran = tgl_pembayaran($_POST['awal'], $_POST['akhir']);
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
    <title>Data Pembayaran Semester</title>
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
            <a href="../../index.php" class="logout">Log Out</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="container">
      <h2 class="h2">Data Pembayaran Semester</h2>
      <form action="" method="post">
        <label>Pencarian:</label>
        <input type="text" name="keyword" autocomplete="off" placeholder="Masukkan Pencarian..." />
        <label>Tanggal awal:</label>
        <input type="date" name="awal" />
        <label>Tanggal akhir</label>
        <input type="date" name="akhir">
        <div class="btn">
          <button type="submit" name="cari" id="cari">Search!</button>
          <a href="report.php" target="_blank" ><button type="button" id="cari">Report!</button></a>
        </div>
      </form>
      <table rules="all" cellpadding="5" class="table">
        <thead>
          <tr>
            <th width="2%">No</th>
            <th width="10%">Nim</th>
            <th width="20%">nama</th>
            <th width="7%">Prodi</th>
            <th width="11%">Tanggal Pembayaran</th>
            <th width="5%">Semester</th>
            <th width="12%">Harga semester</th>
            <th width="12%">Total Yang Di Transfer</th>
            <th width="12%">Total Kembali</th>
            <th width="7%">Action</th>
          </tr>
        </thead>
        <?php $i = 1; ?>
        <?php foreach($data_pembayaran as $dp) : ?>
        <tbody>
          <tr>
            <td height="80px"><?= $i; ?></td>
            <td><?= $dp['nim']; ?></td>
            <td><?= $dp['nama']; ?></td>
            <td><?= $dp['prodi']; ?></td>
            <td><?= $dp['tgl_pembayaran']; ?></td>
            <td><?= $dp['id_semester']; ?></td>
            <td>Rp. <?=number_format($dp['hrg_semester']); ?></td>
            <td>Rp. <?=number_format($dp['tot_transfer']); ?></td>
            <td>Rp. <?=number_format($dp['tot_kembali']); ?></td>
            <td><a href="hapus.php?id=<?= $dp['id_pembayaran']; ?>" onclick=" return confirm('Yakin ingin menghapus data pembayaran ini?');"><button>Delete</button></a></td>
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
