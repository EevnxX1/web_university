<?php
require "../../database/function.php";
$data_dosen = query("SELECT * FROM tb_dosen ORDER BY id_dosen ASC");

// tobol cari di tekan
if ( isset($_POST["cari"])) {
  if ($_POST["keyword"]) {
    $data_dosen = cari_dosen($_POST["keyword"]);
  } elseif (isset($_POST["awal"])) {
    $data_dosen = tgl_dosen($_POST['awal'], $_POST['akhir']);
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
    <title>Data Dosen</title>
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
      <h2 class="h2">Data Dosen</h2>
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
            <th width="8%">NIP</th>
            <th width="13%">nama</th>
            <th width="8%">Matkul</th>
            <th width="15%">Email</th>
            <th width="10%">Password</th>
            <th width="10%">Alamat</th>
            <th width="6%">Tanggal Pendaftaran</th>
            <th width="6%">Tempat lahir</th>
            <th width="8%">Tanggal lahir</th>
            <th width="5%">Gender</th>
            <th width="7%">Gambar</th>
            <th width="7%">Action</th>
          </tr>
        </thead>
        <?php $i = 1; ?>
        <?php foreach($data_dosen as $ds) : ?>
        <tbody>
          <tr>
            <td height="100px"><?= $i ?></td>
            <td><?= $ds['nip']; ?></td>
            <td><?= $ds['nm_dosen']; ?></td>
            <td><?= $ds['matkul']; ?></td>
            <td><?= $ds['email_dosen']; ?></td>
            <td><?= $ds['pass_dosen']; ?></td>
            <td><?= $ds['alamat_dosen']; ?></td>
            <td><?= $ds['tgldaftar_dosen']; ?></td>
            <td><?= $ds['tmplhr_dosen']; ?></td>
            <td><?= $ds['tgllahir_dosen']; ?></td>
            <td><?= $ds['gender_dosen']; ?></td>
            <td><img src="../img/<?= $ds["gambar_dosen"]; ?>" width="50"></td>
            <td><a href="ubah.php?id=<?= $ds["id_dosen"]; ?>"><button>Update</button></a><a href="hapus.php?id=<?= $ds['id_dosen']; ?>" onclick="return confirm('Yakin ingin menghapus data dosen?')"><button>Delete</button></a></td>
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
