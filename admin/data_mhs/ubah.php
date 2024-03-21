<?php
require '../../database/function.php';

// ambil data di url
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM tb_mhs WHERE id_mhs = $id")[0];

if( isset($_POST["submit"])) {

  if( ubah($_POST) > 0) {
    echo"<script>
    alert('Data Mahasiswa Berhasil Di Ubah!');
    document.location.href = 'data_mhs.php';
    </script>";
  } else {
    echo"<script>
    alert('Data Mahasiswa Gagal Di Ubah!');
    document.location.href = 'data_mhs.php';
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
    <link rel="stylesheet" href="style1.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Ubah Data Mahasiswa</title>
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
      <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $mhs["id_mhs"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar_mhs"]; ?>">
        <h2>Ubah Data Mahasiswa</h2>
        <div class="left">
          <label for="nim">Nim:</label>
          <input type="number" name="nim" id="nim" value="<?= $mhs['nim']; ?>" required/>
          <label for="nama">Nama:</label>
          <input type="text" name="nama" id="nama" value="<?= $mhs['nm_mhs']; ?>" required/>
          <label for="prodi">Prodi:</label>
          <input type="text" name="prodi" id="prodi" value="<?= $mhs['prodi']; ?>" required/>
          <label for="email">Email</label>
          <input type="email" name="email" id="email" value="<?= $mhs['email_mhs']; ?>" required/>
          <label for="password">Password:</label>
          <input type="text" name="password" id="password" value="<?= $mhs['pass_mhs']; ?>" autocomplete="off" required/>
          <label for="gambar">Gambar Mahasiswa:</label>
          <img src="../img/<?= $mhs['gambar_mhs']; ?>" height="120px" width="100px">
          <input type="file" name="gambar" id="gambar" class="file" />
        </div>
        <div class="right">
          <label for="alamat">Alamat:</label>
          <textarea name="alamat" id="alamat" cols="30" rows="10" required><?= $mhs['alamat_mhs']; ?></textarea>
          <label for="tgl_daftar">Tanggal Pendaftaran:</label>
          <input type="date" name="tgl_daftar" id="tgl_daftar" value="<?= $mhs['tgldaftar_mhs']; ?>" required/>
          <label for="tmp_lhr">Tempat Lahir:</label>
          <input type="text" name="tmp_lhr" id="tmp_lhr" value="<?= $mhs['tmptlahir_mhs']; ?>" required/>
          <label for="tgl_lahir">Tanggal Lahir:</label>
          <input type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $mhs['tgllahir_mhs']; ?>" required/>
          <label for="gender">Gender</label>
          <select name="gender" id="gender" required>
            <option selected><?= $mhs['gender_mhs']; ?></option>
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
            <option value="Netral">Netral</option>
          </select>
        </div>
        <div class="tombol">
          <button type="submit" name="submit">Ubah Data!</button>
          <a href="data_dosen.php"><button type="button">Lihat Data Dosen</button></a>
        </div>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
      </form>
    </div>
  </body>
</html>
