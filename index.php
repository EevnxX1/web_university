<?php
require "database/function.php";
if ( isset($_POST["submit"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $mahasiswa = mysqli_query($db, "SELECT * FROM tb_mhs WHERE email_mhs = '$email'");
  $dosen = mysqli_query($db, "SELECT * FROM tb_dosen WHERE email_dosen = '$email'");
  $admin = mysqli_query($db, "SELECT * FROM tb_admin WHERE email = '$email'");

  // cek apakah sama dengan table mahasiswa
  if( mysqli_num_rows($mahasiswa) === 1) {
    // cek password
    $mhs = mysqli_fetch_assoc($mahasiswa);
    if( $password == $mhs["pass_mhs"]) {
      echo"<script>
      alert('Anda berhasil login sebagai mahasiswa');
      document.location.href = 'mahasiswa/dashboard/index.html';
      </script>";
      exit;
  }
} elseif ( mysqli_num_rows($dosen) === 1) {
  // cek password
  $dsn = mysqli_fetch_assoc($dosen);
  if( $password == $dsn["pass_dosen"]) {
    echo"<script>
    alert('Anda berhasil login sebagai dosen');
    document.location.href = 'dosen/dashboard/index.html';
    </script>";
    exit;
}
} elseif ( mysqli_num_rows($admin) === 1) {
  // cek password
  $adm = mysqli_fetch_assoc($admin);
  if($password == $adm["password"]) {
    echo"<script>
    alert('Anda berhasil login sebagai admin');
    document.location.href = 'admin/dashboard/index.html';
    </script>";
    exit;
}
}

$error = true;

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Log In</title>
  </head>
  <body>
    <div class="container">
      <div class="content-left">
        <div class="teks-center">
          <h1>Welcome To University</h1>
          <p class="teks1">Silahkan login terlebih dahulu</p>
        </div>
        <div class="copyright">
          <p class="teks2">Copyright By Miftahul Huda</p>
        </div>
      </div>
      <div class="content-right">
        <div class="intro">
          <p class="nice-day">UNIVERSITY</p>
          <img src="img/1.png" height="50px" width="50px" />
        </div>
        <div class="your">
          <p><span>Login You Account</span></p>
        </div>
        <?php if( isset($error) ) : ?>
        <div class="alert" role="alert">Email / password salah!</div>
        <?php endif; ?>
        <form action="" method="post">
          <div class="form">
            <div class="input">
              <input type="text" name="email" id="username" autocomplete="off" required />
              <label for="username" class="label-name">
                <span class="content-name">Email</span>
              </label>
            </div>
            <div class="input">
              <input type="password" name="password" id="password" required />
              <label for="password" class="label-name">
                <span class="content-name">Password</span>
              </label>
            </div>
          </div>
          <div class="remem-forgot">
            <input type="checkbox" name="checkbox" id="checkbox" class="checkbox" />
            <p class="remember">Remember</p>
          </div>
          <div class="submit-create">
            <button type="submit" name="submit" class="submit">LOGIN</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
