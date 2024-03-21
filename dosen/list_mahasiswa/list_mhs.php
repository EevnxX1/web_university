<?php
require '../../database/function.php';
$data_mahasiswa = query("SELECT * FROM tb_mhs ORDER BY id_mhs ASC");
// Ururan paling awal: ASC.
// Urutan paling akhir: DESC.
// Tampilkan seluruh mahasiswa yang nim = "20221020014"
// dengan cara SELECT * FROM tb_mhs WHERE nim = "20221020014"

// tobol cari di tekan
if ( isset($_POST["cari"])) {
  if ($_POST["keyword"]) {
    $data_mahasiswa = cari($_POST["keyword"]);
  } elseif (isset($_POST["awal"])) {
      $data_mahasiswa = tgl_mhs($_POST['awal'], $_POST['akhir']);
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
    <title>List Mahasiswa</title>
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
      <h2 class="h2">List Mahasiswa</h2>
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
            <th width="2%">No</th>
            <th width="8%">Nim</th>
            <th width="13%">nama</th>
            <th width="6%">Prodi</th>
            <th width="14%">Alamat</th>
            <th width="6%">Tanggal Pendaftaran</th>
            <th width="9%">Tempat lahir</th>
            <th width="8%">Tanggal lahir</th>
            <th width="5%">Gender</th>
            <th width="6%">Gambar</th>
          </tr>
        </thead>
        <?php $i = 1; ?>
        <?php foreach($data_mahasiswa as $mhs): ?>
        <tbody>
          <tr>
            <td height="100px"><?= $i; ?></td>
            <td><?= $mhs["nim"]; ?></td>
            <td><?= $mhs["nm_mhs"]; ?></td>
            <td><?= $mhs["prodi"]; ?></td>
            <td><?= $mhs["alamat_mhs"]; ?></td>
            <td><?= $mhs["tgldaftar_mhs"]; ?></td>
            <td><?= $mhs["tmptlahir_mhs"]; ?></td>
            <td><?= $mhs["tgllahir_mhs"]; ?></td>
            <td><?= $mhs["gender_mhs"]; ?></td>
            <td><img src="../../admin/img/<?= $mhs["gambar_mhs"]; ?>" width="50"></td>
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
