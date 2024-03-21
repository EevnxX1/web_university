<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Algoritma Dan Pemrograman</title>
  </head>
  <body>
    <div class="background">
      <nav class="nav-container">
        <img src="asset/1.png" alt="logo" class="logo" width="50px" height="50px" data-aos="fade-right" data-aos-duration="2000" />
        <h2 data-aos="fade-right" data-aos-duration="2000">University</h2>
        <ul class="navbar" data-aos="fade-left" data-aos-duration="2000">
          <li>
            <a href="../dashboard/index.html">Home</a>
            <a href="../pembayaran/pembayaran.php">Pembayaran</a>
            <a href="../kelas/absen/absensi.php">Absen</a>
            <a href="../elearning/elearning.html">Elearning</a>
            <a href="../../index.php" class="logout">Log Out</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="container1">
      <div class="left">
        <img src="asset/lecture.png" height="150px" width="150px" />
        <div class="teks">
          <p class="kelas">TI 1/1</p>
          <p class="ket">Dosen:</p>
          <p class="dosen">Kusnadi, M.Kom.</p>
        </div>
      </div>
      <div class="right">
        <h2>Rincian Kelas</h2>
        <table rules="rows" cellpadding="10" width="90%" height="80%">
          <tbody>
            <tr>
              <th>Mata Pelajaran</th>
              <td>:</td>
              <td>Algoritma Dan Pemrograman</td>
            </tr>
            <tr>
              <th>SKS</th>
              <td>:</td>
              <td>4</td>
            </tr>
            <tr>
              <th>Tahun Ajaran</th>
              <td>:</td>
              <td>2022/2023</td>
            </tr>
            <tr>
              <th>Semester</th>
              <td>:</td>
              <td>1</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <?php
    include "../../database/function.php";
    $query = mysqli_query($db, "SELECT * FROM tb_materi_algo");
    while($data = $query->fetch_array()) {
    ?>
    <div class="container2">
      <h2>Materi Perkuliahan</h2>
      <div class="pertemuan">
        <h3>Materi Perkuliahan Pertemuan ke <?= "$data[pertemuan]" ?></h3>
        <p><?= "$data[hari]" ?>, <?= "$data[tanggal]" ?></p>
        <h3>Uraian Materi</h3>
        <li><?= "$data[uraian]" ?></li>
        <a href="absen/absensi.php"><button>ABSEN</button></a>
        <a href="<?= "$data[tugas]" ?>" target="_blank"><button>TUGAS</button></a>
        <a href="nilai/nilai_algo.php"><button>NILAI</button></a>
      </div>
    </div>
    <?php } ?>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
