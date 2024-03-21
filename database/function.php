<?php
$db = mysqli_connect("localhost", "root", "", "university");

function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $ruang = [];
    while( $brg = mysqli_fetch_assoc($result)) {
        $ruang[] = $brg;
    }
    return $ruang;
}

function daftar($data) {
    global $db;
    $nim = htmlspecialchars($data["nim"]);
    $nm_mhs = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $email_mhs = htmlspecialchars(strtolower($data["email"]));
    $pass_mhs = mysqli_real_escape_string($db, $data["password"]);
    $alamat_mhs = htmlspecialchars(strtolower($data["alamat"]));
    $tgldaftar_mhs = htmlspecialchars(strtolower($data["tgl_daftar"]));
    $tmplahir_mhs = htmlspecialchars($data["tmp_lhr"]);
    $tgllahir_mhs = htmlspecialchars(strtolower($data["tgl_lahir"]));
    $gender_mhs = $data["gender"];

    // upload gambar
    $gambar_mhs = upload();
    if( !$gambar_mhs ) {
        return false;
    }

    $result = mysqli_query($db, "SELECT * FROM tb_mhs WHERE email_mhs = '$email_mhs'");

    if( mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Email sudah terdaftar');
        </script>";
        return false;
    }

    $result2 = mysqli_query($db, "SELECT * FROM tb_mhs WHERE nim = '$nim'");

    if( mysqli_fetch_assoc($result2)) {
        echo "<script>
        alert('NIM sudah terdaftar');
        </script>";
        return false;
    }

    $query = "INSERT INTO tb_mhs
                VALUES
                ('', '$nim', '$nm_mhs', '$prodi', '$email_mhs', '$pass_mhs', '$alamat_mhs', '$tgldaftar_mhs', '$tmplahir_mhs', '$tgllahir_mhs', '$gender_mhs', '$gambar_mhs')
                ";
                mysqli_query($db, $query);

                return mysqli_affected_rows($db);
}

function absen_dosen($data) {
    global $db;
    $nip = htmlspecialchars($data["nip"]);
    $nama = htmlspecialchars($data["nama"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $absen = htmlspecialchars($data["absen"]);
    $ket = htmlspecialchars($data["ket"]);
    
    $query = "INSERT INTO tb_absendosen
                VALUES
                ('', '$nip', '$nama', '$tanggal', '$absen', '$ket')
                ";
                mysqli_query($db, $query);

                return mysqli_affected_rows($db);
}

function absen_mhs($data) {
    global $db;
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $matkul = $data["matkul"];
    $prtmn = $data["prtmn"];
    $absen = htmlspecialchars($data["absen"]);
    $ket = htmlspecialchars($data["ket"]);
    
    $query = "INSERT INTO tb_absenmhs
                VALUES
                ('', '$nim', '$nama', '$prodi', '$tanggal', '$matkul', '$prtmn', '$absen', '$ket')
                ";
                mysqli_query($db, $query);

                return mysqli_affected_rows($db);
}

function nilai($data) {
    global $db;
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $matkul = $data["matkul"];
    $prtmn = $data["pertemuan"];
    $tanggal = htmlspecialchars($data["tanggal"]);
    $nilai = htmlspecialchars($data["nilai"]);
    $ket = htmlspecialchars($data["ket"]);
    
    $query = "INSERT INTO tb_nilai
                VALUES
                ('', '$nim', '$nama', '$prodi', '$matkul', '$prtmn', '$tanggal', '$nilai', '$ket')
                ";
                mysqli_query($db, $query);

                return mysqli_affected_rows($db);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if( $error === 4 ) {
        echo "<script>
        alert('Pilih Gambar Terlebih Dahulu!');
        </script>";
        return false;
    }

    // cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Yang Anda Upload Bukan Gambar!');
        </script>";
        return false;
    }
    
    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 1000000) {
        echo "<script>
        alert('Ukuran File Terlalu Besar!');
        </script>";
        return false;
    }

    // jika lolos pengecekan, gambar siap di upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id) {
    global $db;
    mysqli_query($db, "DELETE FROM tb_mhs WHERE id_mhs = $id");
    return mysqli_affected_rows($db);
}

function hapus_dosen($id) {
    global $db;
    mysqli_query($db, "DELETE FROM tb_dosen WHERE id_dosen = $id");
    return mysqli_affected_rows($db);
}

function hapus_pembayaran($id) {
    global $db;
    mysqli_query($db, "DELETE FROM tb_pembayaran WHERE id_pembayaran = $id");
    return mysqli_affected_rows($db);
}

function hapus_absenmhs($id) {
    global $db;
    mysqli_query($db, "DELETE FROM tb_absenmhs WHERE id = $id");
    return mysqli_affected_rows($db);
}

function hapus_absendosen($id) {
    global $db;
    mysqli_query($db, "DELETE FROM tb_absendosen WHERE id_absen = $id");
    return mysqli_affected_rows($db);
}

function hapus_nilai($id) {
    global $db;
    mysqli_query($db, "DELETE FROM tb_nilai WHERE id_nilai = $id");
    return mysqli_affected_rows($db);
}

function ubah($data) {
    global $db;
    $id = $data['id'];
    $nim = htmlspecialchars($data["nim"]);
    $nm_mhs = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $email_mhs = htmlspecialchars(strtolower($data["email"]));
    $pass_mhs = mysqli_real_escape_string($db, $data["password"]);
    $alamat_mhs = htmlspecialchars(strtolower($data["alamat"]));
    $tgldaftar_mhs = htmlspecialchars(strtolower($data["tgl_daftar"]));
    $tmplahir_mhs = htmlspecialchars($data["tmp_lhr"]);
    $tgllahir_mhs = htmlspecialchars(strtolower($data["tgl_lahir"]));
    $gender_mhs = $data["gender"];
    $gambarLama = $data["gambarLama"];

    // Cek apakah user memilih gambar baru atau tidak
    if( $_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE tb_mhs SET
                nim = '$nim',
                nm_mhs = '$nm_mhs',
                prodi = '$prodi',
                email_mhs = '$email_mhs',
                pass_mhs = '$pass_mhs',
                alamat_mhs = '$alamat_mhs',
                tgldaftar_mhs = '$tgldaftar_mhs',
                tmptlahir_mhs = '$tmplahir_mhs',
                tgllahir_mhs = '$tgllahir_mhs',
                gender_mhs = '$gender_mhs',
                gambar_mhs = '$gambar'
                WHERE id_mhs = '$id'
                ";
                mysqli_query($db, $query);

                return mysqli_affected_rows($db);
}

function ubah_dosen($data) {
    global $db;
    $id = $data['id'];
    $nip = htmlspecialchars($data["nip"]);
    $nm_dosen = htmlspecialchars($data["nama"]);
    $matkul = htmlspecialchars($data["matkul"]);
    $email_dosen = htmlspecialchars(strtolower($data["email"]));
    $pass_dosen = mysqli_real_escape_string($db, $data["password"]);
    $alamat_dosen = htmlspecialchars(strtolower($data["alamat"]));
    $tgldaftar_dosen = htmlspecialchars(strtolower($data["tgl_daftar"]));
    $tmplahir_dosen = htmlspecialchars($data["tmp_lhr"]);
    $tgllahir_dosen = htmlspecialchars(strtolower($data["tgl_lahir"]));
    $gender_dosen = $data["gender"];
    $gambarLama = $data["gambarLama"];

    // Cek apakah user memilih gambar baru atau tidak
    if( $_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE tb_dosen SET
                nip = '$nip',
                nm_dosen = '$nm_dosen',
                matkul = '$matkul',
                email_dosen = '$email_dosen',
                pass_dosen = '$pass_dosen',
                alamat_dosen = '$alamat_dosen',
                tgldaftar_dosen = '$tgldaftar_dosen',
                tmplhr_dosen = '$tmplahir_dosen',
                tgllahir_dosen = '$tgllahir_dosen',
                gender_dosen = '$gender_dosen',
                gambar_dosen = '$gambar'
                WHERE id_dosen = '$id'
                ";
                mysqli_query($db, $query);

                return mysqli_affected_rows($db);
}

function ubah_nilai($data) {
    global $db;
    $id = $data['id'];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $matkul = htmlspecialchars($data["matkul"]);
    $pertemuan = htmlspecialchars($data["pertemuan"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $nilai = htmlspecialchars($data["nilai"]);
    $ket = htmlspecialchars($data["ket"]);

    $query = "UPDATE tb_nilai SET
                nim_nilai = '$nim',
                nama_nilai = '$nama',
                prodi_nilai = '$prodi',
                matkul_nilai = '$matkul',
                prtmn_nilai = '$pertemuan',
                tgl_nilai = '$tanggal',
                nilai = '$nilai',
                ket_nilai = '$ket'
                WHERE id_nilai = '$id'
                ";
                mysqli_query($db, $query);

                return mysqli_affected_rows($db);

}

function cari($keyword) {
    $query = "SELECT * FROM tb_mhs
                WHERE
                nim LIKE '%$keyword%' OR
                nm_mhs LIKE '%$keyword%' OR
                prodi LIKE '%$keyword%' OR
                email_mhs LIKE '%$keyword%' OR
                gender_mhs LIKE '%$keyword%' OR
                tmptlahir_mhs LIKE '%$keyword%' OR
                tgllahir_mhs LIKE '%$keyword%'
                ";
        return query($query);
}

function tgl_mhs($awal, $akhir) {
    $query = "SELECT * FROM tb_mhs 
                WHERE tgldaftar_mhs BETWEEN '$awal' AND '$akhir' ORDER BY tgldaftar_mhs ASC
                ";
            return query($query) ;
}

function tgl_dosen($awal, $akhir) {
    $query = "SELECT * FROM tb_dosen 
                WHERE tgldaftar_dosen BETWEEN '$awal' AND '$akhir' ORDER BY tgldaftar_dosen ASC
                ";
            return query($query) ;
}

function tgl_pembayaran($awal, $akhir) {
    $query = "SELECT * FROM tb_pembayaran 
                WHERE tgl_pembayaran BETWEEN '$awal' AND '$akhir' ORDER BY tgl_pembayaran ASC
                ";
            return query($query) ;
}

function tgl_absenmhs($awal, $akhir) {
    $query = "SELECT * FROM tb_absenmhs 
                WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY tanggal ASC
                ";
            return query($query) ;
}

function tgl_absendosen($awal, $akhir) {
    $query = "SELECT * FROM tb_absendosen 
                WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY tanggal ASC
                ";
            return query($query) ;
}

function tgl_penilaian($awal, $akhir) {
    $query = "SELECT * FROM tb_nilai 
                WHERE tgl_nilai BETWEEN '$awal' AND '$akhir' ORDER BY tgl_nilai ASC
                ";
            return query($query) ;
}

function cari_dosen($cari) {
    $search = "SELECT * FROM tb_dosen
                WHERE
                nip LIKE '%$cari%' OR
                nm_dosen LIKE '%$cari%' OR
                matkul LIKE '%$cari%' OR
                email_dosen LIKE '%$cari%' OR
                gender_dosen LIKE '%$cari%' OR
                tmplhr_dosen LIKE '%$cari%' OR
                tgldaftar_dosen LIKE '%$cari%' OR
                tgllahir_dosen LIKE '%$cari%'
                ";
        return query($search);
}

function cari_pembayaran($keyword) {
    $query = "SELECT * FROM tb_pembayaran
                WHERE
                nim LIKE '%$keyword%' OR
                nama LIKE '%$keyword%' OR
                prodi LIKE '%$keyword%' OR
                tgl_pembayaran LIKE '%$keyword%' OR
                id_semester LIKE '%$keyword%' OR
                hrg_semester LIKE '%$keyword%' OR
                tot_transfer LIKE '%$keyword%' OR
                tot_kembali LIKE '%$keyword%'
                ";
        return query($query);
}

function cari_absen_dosen($keyword) {
    $query = "SELECT * FROM tb_absendosen
                WHERE
                nip LIKE '%$keyword%' OR
                nama LIKE '%$keyword%' OR
                tanggal LIKE '%$keyword%' OR
                absensi LIKE '%$keyword%' OR
                ket LIKE '%$keyword%'
                ";
                return query($query);
}

function cari_absenmhs($keyword) {
    $query = "SELECT * FROM tb_absenmhs
                WHERE
                nim LIKE '%$keyword%' OR
                nama LIKE '%$keyword%' OR
                prodi LIKE '%$keyword%' OR
                tanggal LIKE '%$keyword%' OR
                matkul LIKE '%$keyword%' OR
                pertemuan LIKE '%$keyword%' OR
                absensi LIKE '%$keyword%' OR
                ket LIKE '%$keyword%'
                ";
                return query($query);
}

function cari_datapenilaian($keyword) {
    $query = "SELECT * FROM tb_nilai
                WHERE
                nim_nilai LIKE '%$keyword%' OR
                nama_nilai LIKE '%$keyword%' OR
                prodi_nilai LIKE '%$keyword%' OR
                matkul_nilai LIKE '%$keyword%' OR
                prtmn_nilai LIKE '%$keyword%' OR
                nilai LIKE '%$keyword%'
                ";
                return query($query);
}

function pembayaran($data) {
    global $db;
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $tgl_pembayaran = $data["tgl"];
    $semester = $data["id_semester"];
    $by_keluar = htmlspecialchars($data["biaya"]);
    $harga_semester = $data["harga_semester"];

            switch ($harga_semester) {
            case 4312500:
                $biaya_dosen = 2000000;
                $operasi_kampus = 500000;
                $gedung = 700000;
                $biaya_praktik = 400000;
                $jaz_almamater = 147500;
                $pajak = 0.15;
                $total = $biaya_dosen + $operasi_kampus + $gedung + $biaya_praktik + $jaz_almamater;
                $pjk = $total * $pajak;
                $tot_seluruh = $pjk + $total;
                $kembali = $by_keluar - $tot_seluruh;
                
                break;
            case 4220500:
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
                
                break;
           case 4117000:
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
                
                break;
            case 4048000:
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
                
                break;
            case 3967500:
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
                
                break;
            case 3921500:
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
                
                break;
            case 3852500:
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
                
                break;
            case 3737500:
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
                
                break;
            default :
            echo"Database tidak di temukan";
            break;
            }

            $query = "INSERT INTO tb_pembayaran
                        VALUES
                        ('', '$nim', '$nama', '$prodi', '$tgl_pembayaran', '$semester', '$tot_seluruh', '$by_keluar', $kembali)
                        ";
                        mysqli_query($db, $query);

                        return mysqli_affected_rows($db);
}