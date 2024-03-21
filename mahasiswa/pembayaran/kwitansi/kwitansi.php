<?php
require "../../../database/function.php";
if ( isset($_POST["bayar"])) {
  if( pembayaran($_POST) > 0) {
    echo"<script>
    alert('Pembayaran berhasil di transfer');
    </script>";
  } else {
    echo"<script>
    alert('Pembayaran gagal di transfer');
    </script>";
  }

  $nim = $_POST["nim"];
  $nama = $_POST["nama"];
  $prodi = $_POST["prodi"];
  $tgl_bayar = $_POST["tgl"];
  $tot_semester = $_POST["harga_semester"];
  $by_keluar = $_POST["biaya"];
  $semester = $_POST["id_semester"];

  if ($tot_semester == 4312500) {
    $biaya_dosen = 2000000;
    $operasi_kampus = 500000;
    $gedung = 700000;
    $biaya_praktik = 400000;
    $jaz_almamater = 150000;
    $pajak = 0.15;
    $total = $biaya_dosen + $operasi_kampus + $gedung + $biaya_praktik + $jaz_almamater;
    $pjk = $total * $pajak;
    $tot_seluruh = $pjk + $total;
    $kembali = $by_keluar - $tot_seluruh;
  } elseif ($tot_semester == 4220500) {
    $biaya_dosen = 2000000;
    $operasi_kampus = 470000;
    $gedung = 650000;
    $biaya_praktik = 400000;
    $jaz_almamater = 150000;
    $pajak = 0.15;
    $total = $biaya_dosen + $operasi_kampus + $gedung + $biaya_praktik + $jaz_almamater;
    $pjk = $total * $pajak;
    $tot_seluruh = $pjk + $total;
    $kembali = $by_keluar - $tot_seluruh;
  } elseif ($tot_semester == 4117000) {
    $biaya_dosen = 2000000;
    $operasi_kampus = 450000;
    $gedung = 630000;
    $biaya_praktik = 350000;
    $jaz_almamater = 150000;
    $pajak = 0.15;
    $total = $biaya_dosen + $operasi_kampus + $gedung + $biaya_praktik + $jaz_almamater;
    $pjk = $total * $pajak;
    $tot_seluruh = $pjk + $total;
    $kembali = $by_keluar - $tot_seluruh;
  } elseif ($tot_semester == 4048000) {
    $biaya_dosen = 2000000;
    $operasi_kampus = 430000;
    $gedung = 600000;
    $biaya_praktik = 340000;
    $jaz_almamater = 150000;
    $pajak = 0.15;
    $total = $biaya_dosen + $operasi_kampus + $gedung + $biaya_praktik + $jaz_almamater;
    $pjk = $total * $pajak;
    $tot_seluruh = $pjk + $total;
    $kembali = $by_keluar - $tot_seluruh;
  } elseif ($tot_semester == 3967500) {
    $biaya_dosen = 2000000;
    $operasi_kampus = 400000;
    $gedung = 580000;
    $biaya_praktik = 320000;
    $jaz_almamater = 150000;
    $pajak = 0.15;
    $total = $biaya_dosen + $operasi_kampus + $gedung + $biaya_praktik + $jaz_almamater;
    $pjk = $total * $pajak;
    $tot_seluruh = $pjk + $total;
    $kembali = $by_keluar - $tot_seluruh;
  } elseif ($tot_semester == 3921500) {
    $biaya_dosen = 2000000;
    $operasi_kampus = 400000;
    $gedung = 560000;
    $biaya_praktik = 300000;
    $jaz_almamater = 150000;
    $pajak = 0.15;
    $total = $biaya_dosen + $operasi_kampus + $gedung + $biaya_praktik + $jaz_almamater;
    $pjk = $total * $pajak;
    $tot_seluruh = $pjk + $total;
    $kembali = $by_keluar - $tot_seluruh;
  } elseif ($tot_semester == 3852500) {
    $biaya_dosen = 2000000;
    $operasi_kampus = 380000;
    $gedung = 540000;
    $biaya_praktik = 280000;
    $jaz_almamater = 150000;
    $pajak = 0.15;
    $total = $biaya_dosen + $operasi_kampus + $gedung + $biaya_praktik + $jaz_almamater;
    $pjk = $total * $pajak;
    $tot_seluruh = $pjk + $total;
    $kembali = $by_keluar - $tot_seluruh;
  } elseif ($tot_semester == 3737500) {
    $biaya_dosen = 2000000;
    $operasi_kampus = 350000;
    $gedung = 500000;
    $biaya_praktik = 250000;
    $jaz_almamater = 150000;
    $pajak = 0.15;
    $total = $biaya_dosen + $operasi_kampus + $gedung + $biaya_praktik + $jaz_almamater;
    $pjk = $total * $pajak;
    $tot_seluruh = $pjk + $total;
    $kembali = $by_keluar - $tot_seluruh;
  } else {
    echo"<script>
    alert('data gagal di kwitansi');
    document.location.href = '../../dashboard/index.php';
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
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Kwitansi</title>
  </head>
  <body onload="javascript:window.print()" style="margin: 0; width: 1000px">
    <div style="margin-left: 20px"></div>
    <img src="asset/1.png" alt="" width="70px" height="70px" style="position: absolute; left: 267px; top: -6px" />
    <table width="90%" cellspacing="0" cellpadding="0" style="margin-left: 60px">
      <tr>
        <td>
          <div align="center">
            <font size="7"><b>UNIVERSITY</b></font>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div align="center">
            <font size="5"><b>JL Pancuran Sukapura, Kejaksan, Kota Cirebon, Jawa Barat</b></font>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div align="center">
            <font size="4" color="blue"><b>No. Telp : 0857(97127694), E-Mail : miftahul.huda.ti.22@cic.ac.id</b></font>
          </div>
        </td>
      </tr>
    </table>
    <br />
    <hr />
    <label>
      <font size="6">
        <center><b>Kwitansi Pembayaran</b></center>
      </font>
    </label>

    <p>&nbsp;</p>

    <h2>Kwitansi Pembayaran</h2>
    <table class="table-info" rules="rows" cellpadding="10" width="90%" height="25%">
      <tbody>
        <tr>
          <td class="head">NIM</td>
          <td>:</td>
          <td><?= $nim; ?></td>
        </tr>
        <tr>
          <td class="head">Nama Mahasiswa</td>
          <td>:</td>
          <td><?= $nama; ?></td>
        </tr>
        <tr>
          <td class="head">Prodi</td>
          <td>:</td>
          <td><?= $prodi; ?></td>
        </tr>
        <tr>
          <td class="head">Semester</td>
          <td>:</td>
          <td><?= $semester; ?></td>
        </tr>
        <tr>
          <td class="head">Tahun Ajaran</td>
          <td>:</td>
          <td>2022/2023</td>
        </tr>
      </tbody>
    </table>
    <table rules="all" cellpadding="5" border="1" class="table-total">
      <thead>
        <tr>
          <th height="40px" width="15%" style="background-color: gray; border-right: 1px solid gray">Biaya Dosen</th>
          <th width="15%" style="background-color: gray; border-right: 1px solid gray">Operational Kampus</th>
          <th width="15%" style="background-color: gray; border-right: 1px solid gray">Gedung</th>
          <th width="15%" style="background-color: gray; border-right: 1px solid gray">Biaya Praktik</th>
          <th width="15%" style="background-color: gray; border-right: 1px solid gray">Jaz Almamater</th>
          <th width="15%" style="background-color: gray; border-right: 1px solid gray">Pajak 15%</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td height="40px"><span>Rp. <?=number_format($biaya_dosen); ?></span></td>
          <td><span>Rp. <?=number_format($operasi_kampus); ?></span></td>
          <td><span>Rp. <?=number_format($gedung); ?></span></td>
          <td><span>Rp. <?=number_format($biaya_praktik); ?></span></td>
          <td><span>Rp. <?=number_format($jaz_almamater); ?></span></td>
          <td><span>Rp. <?=number_format($pjk); ?></span></td>
        </tr>
      </tbody>
      <tr>
        <th colspan="4" height="50px" style="background-color: gray">Total biaya</th>
        <td colspan="2"><span>Rp. <?=number_format($tot_seluruh); ?></span></td>
      </tr>
      <tr>
        <th colspan="4" height="50px" style="background-color: gray">Total yang di bayar</th>
        <td colspan="2"><span>Rp. <?=number_format($by_keluar); ?></span></td>
      </tr>
      <tr>
        <th colspan="4" height="50px" style="background-color: gray">Total kembali</th>
        <td colspan="2">Rp. <span><?=number_format($kembali); ?></span></td>
      </tr>
    </table>

    <p>&nbsp;</p>

    <table align="right" cellspacing="0" cellpadding="0">
      <tr>
        <td>
          <center>
            Cirebon,
            <?php echo date("d F Y") ?>
          </center>
        </td>
      </tr>
      <tr>
        <td>
          <center>Rektor. University</center>
          <p></p>
          <img src="asset/tanda_tangan1.png" alt="" width="160px" height="100px" style="margin-left: 40px" />
          <p></p>
          <center><u>Miftahul Huda S.kom</u></center>
        </td>

        <td></td>
      </tr>
    </table>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
