<?php
require '../../database/function.php';

// ambil data di url
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$dosen = query("SELECT * FROM tb_dosen WHERE id_dosen = $id")[0];

if( isset($_POST["submit"])) {

  if( ubah_dosen($_POST) > 0) {
    echo"<script>
    alert('Data dosen Berhasil Di Ubah!');
    document.location.href = 'data_dosen.php';
    </script>";
  } else {
    echo"<script>
    alert('Data dosen Gagal Di Ubah!');
    document.location.href = 'data_dosen.php';
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
    <link rel="stylesheet" href="../data_mhs/style1.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Ubah Data Dosen</title>
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
      <input type="hidden" name="id" value="<?= $dosen["id_dosen"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $dosen["gambar_dosen"]; ?>">
        <h2>Ubah Data Mahasiswa</h2>
        <div class="left">
          <label for="nip">NIP:</label>
          <input type="number" name="nip" id="nip" value="<?= $dosen['nip']; ?>" required/>
          <label for="nama">Nama:</label>
          <input type="text" name="nama" id="nama" value="<?= $dosen['nm_dosen']; ?>" required/>
          <label for="matkul">Matkul:</label>
          <input type="text" name="matkul" id="matkul" value="<?= $dosen['matkul']; ?>" required/>
          <label for="email">Email</label>
          <input type="email" name="email" id="email" value="<?= $dosen['email_dosen']; ?>" required/>
          <label for="password">Password:</label>
          <input type="text" name="password" id="pasword" value="<?= $dosen['pass_dosen']; ?>" autocomplete="off" required/>
          <label for="gambar">Gambar Dosen:</label>
          <img src="../img/<?= $dosen['gambar_dosen']; ?>" height="120px" width="100px">
          <input type="file" name="gambar" id="gambar" class="file" />
        </div>
        <div class="right">
          <label for="alamat">Alamat:</label>
          <textarea name="alamat" id="alamat" cols="30" rows="10" required><?= $dosen['alamat_dosen']; ?></textarea>
          <label for="tgl_daftar">Tanggal Pendaftaran:</label>
          <input type="date" name="tgl_daftar" id="tgl_daftar" value="<?= $dosen['tgldaftar_dosen']; ?>" required/>
          <label for="tmp_lhr">Tempat Lahir:</label>
          <input type="text" name="tmp_lhr" id="tmp_lhr" value="<?= $dosen['tmplhr_dosen']; ?>" required/>
          <label for="tgl_lahir">Tanggal Lahir:</label>
          <input type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $dosen['tgllahir_dosen']; ?>" required/>
          <label for="gender">Gender</label>
          <select name="gender" id="gender" required>
            <option selected><?= $dosen['gender_dosen']; ?></option>
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
