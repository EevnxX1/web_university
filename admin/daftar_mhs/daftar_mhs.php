<?php
require '../../database/function.php';
if( isset($_POST["daftar"])) {

  if( daftar($_POST) > 0) {
    echo"<script>
    alert('Mahasiswa baru berhasil di tambahkan!');
    document.location.href = '../data_mhs/data_mhs.php';
    </script>";
  } else {
    echo mysqli_error($db);
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
    <title>Pendaftaran Mahasiswa</title>
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
      <form method="post" enctype="multipart/form-data">
        <h2>Pendaftaran Mahasiswa</h2>
        <div class="left">
          <label for="nim">Nim:</label>
          <input type="number" name="nim" id="nim" />
          <label for="nama">Nama:</label>
          <input type="text" name="nama" id="nama" />
          <label for="prodi">Prodi:</label>
          <input type="text" name="prodi" id="prodi" />
          <label for="email">Email</label>
          <input type="email" name="email" id="email" />
          <label for="password">Password:</label>
          <input type="text" name="password" id="pasword" />
          <label for="gambar">Gambar Mahasiswa:</label>
          <input type="file" name="gambar" id="gambar" class="file" />
        </div>
        <div class="right">
          <label for="alamat">Alamat:</label>
          <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="Masukkan alamat saat ini..."></textarea>
          <label for="tgl_daftar">Tanggal Pendaftaran:</label>
          <input type="date" name="tgl_daftar" id="tgl_daftar" />
          <label for="tmp_lhr">Tempat Lahir:</label>
          <input type="text" name="tmp_lhr" id="tmp_lhr" />
          <label for="tgl_lahir">Tanggal Lahir:</label>
          <input type="date" name="tgl_lahir" id="tgl_lahir" />
          <label for="gender">Gender</label>
          <select name="gender" id="gender">
            <option selected>~Pilih Gender Anda~</option>
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
            <option value="Netral">Netral</option>
          </select>
        </div>
        <div class="tombol">
          <button type="submit" name="daftar">Daftar</button>
          <a href="kwitansi/kwitansi.html"><button type="button">Lihat Data Mahasiswa</button></a>
        </div>
      </form>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
