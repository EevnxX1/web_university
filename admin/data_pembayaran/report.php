<?php
require "../../database/function.php";
$data_pembayaran = query("SELECT * FROM tb_pembayaran");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Data Pembayaran</title>
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
        <center><b>Data Pembayaran</b></center>
      </font>
    </label>

    <p>&nbsp;</p>

    <table rules="all" cellpadding="5" border="1" class="table">
    <thead>
    <tr>
            <th width="2%">No</th>
            <th width="10%">Nim</th>
            <th width="18%">nama</th>
            <th width="8%">Prodi</th>
            <th width="11%">Tanggal Pembayaran</th>
            <th width="6%">Semester</th>
            <th width="16%">Harga semester</th>
            <th width="16%">Total Yang Di Transfer</th>
            <th width="17%">Total Kembali</th>
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
