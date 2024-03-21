<?php
require "../../database/function.php";
$data_nilai = query("SELECT * FROM tb_nilai");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style1.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Data Penilian</title>
  </head>
  <body onload="javascript:window.print()" style="margin: 0; width: 1000px">
    <div style="margin-left: 20px"></div>
    <img src="../../mahasiswa/pembayaran/kwitansi/asset/1.png" alt="" width="70px" height="70px" style="position: absolute; left: 267px; top: -6px" />
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
            <font size="5"><b>JL Pancuran No. 19, Kejaksan, Sukapura, Cirebon, Jawa Barat</b></font>
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
        <center><b>Data Penilaian</b></center>
      </font>
    </label>

    <p>&nbsp;</p>

    <table rules="all" cellpadding="5" border="1" class="table-total">
    <thead>
          <tr>
            <th width="5%">No</th>
            <th width="10%">Nim</th>
            <th width="15%">Nama</th>
            <th width="8%">Prodi</th>
            <th width="12%">Mata Kuliah</th>
            <th width="5%">Pertemuan</th>
            <th width="12%">Tanggal</th>
            <th width="8%">Nilai</th>
            <th width="35%">Keterangan</th>
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
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
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
          <img src="../../mahasiswa/pembayaran/kwitansi/asset/tanda_tangan1.png" alt="" width="160px" height="100px" style="margin-left: 40px" />
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
