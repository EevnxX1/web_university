<?php
require "../../database/function.php";
$data_semester = query("SELECT * FROM tb_semester");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Pembayaran</title>
  </head>
  <body>
    <div class="background">
      <nav class="nav-container">
        <img src="../kelas/asset/1.png" alt="logo" class="logo" width="50px" height="50px" data-aos="fade-right" data-aos-duration="2000" />
        <h2 data-aos="fade-right" data-aos-duration="2000">University</h2>
        <ul class="navbar" data-aos="fade-left" data-aos-duration="2000">
          <li>
            <a href="../dashboard/index.html">Home</a>
            <a href="#">Pembayaran</a>
            <a href="../kelas/absen/absensi.php">Absen</a>
            <a href="../elearning/elearning.html">E-learning</a>
            <a href="logout.php" class="logout">Log Out</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="container">
      <form action="kwitansi/kwitansi.php" method="post">
        <h2>Pembayaran Uang Semester</h2>
        <div class="left">
          <label for="nim">Nim:</label>
          <input type="number" name="nim" id="nim" />
          <label>Nama:</label>
          <input type="text" name="nama" id="nama" />
          <label>Prodi:</label>
          <input type="text" name="prodi" id="prodi" />
          <label for="tgl">Tanggal Pembayaran</label>
          <input type="date" name="tgl" id="tgl" />
        </div>
        <div class="right">
          <label>Semester:</label>
          <select name="id_semester" onchange="changeValue(this.value)">
            <option selected>~Pilih Semester berapa~</option>
            <?php
              $jsArray = "var prdName = new Array();\n";
              foreach ($data_semester as $ds) {
                echo"<option value='$ds[semester]'>$ds[semester]</option>";
              $jsArray .= "prdName['".$ds['semester']."'] = {
                harga_semester:'".addslashes($ds['harga_semester'])."'};\n";
              }
              ?>
          </select>
          <label>Total Biaya Semester</label>
          <input type="number" name="harga_semester" id="harga_semester" readonly="readonly" />
          <label for="biaya">Biaya Yang Dikeluarkan:</label>
          <input type="number" name="biaya" id="biaya" />
        </div>
        <div class="tombol">
          <button type="submit" name="bayar">Bayar</button>
        </div>
      </form>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
	<?php echo"$jsArray"; ?>
	function changeValue(x){
		document.getElementById('harga_semester').value = prdName[x].harga_semester;
	}
</script>
  </body>
</html>
