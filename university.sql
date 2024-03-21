-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Feb 2023 pada 11.15
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absendosen`
--

CREATE TABLE `tb_absendosen` (
  `id_absen` int(11) NOT NULL,
  `nip` bigint(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `absensi` varchar(100) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_absendosen`
--

INSERT INTO `tb_absendosen` (`id_absen`, `nip`, `nama`, `tanggal`, `absensi`, `ket`) VALUES
(1, 19523432, 'Chairun Nas, S.Kom., M.Kom.', '2023-02-08', 'Hadir', 'Saya telah hadir. dan akan memasuki jam mengajar.'),
(4, 1952623, 'yulius', '2023-02-16', 'Hadir', 'Hadir'),
(5, 195212, 'mifta', '2023-02-10', 'Hadir', 'Hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absenmhs`
--

CREATE TABLE `tb_absenmhs` (
  `id` int(11) NOT NULL,
  `nim` bigint(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `matkul` varchar(100) NOT NULL,
  `pertemuan` int(11) NOT NULL,
  `absensi` varchar(50) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_absenmhs`
--

INSERT INTO `tb_absenmhs` (`id`, `nim`, `nama`, `prodi`, `tanggal`, `matkul`, `pertemuan`, `absensi`, `ket`) VALUES
(1, 20221020014, 'Miftahul Huda', 'TI 1/1', '2023-02-08', 'Pemrograman Internet', 1, 'Hadir', 'Ok'),
(3, 20221020026, 'Rinaldi', 'TI 5/3', '2023-02-07', 'Algoritma Dan Pemrograman', 4, 'Izin', 'Izin pergi ke luar angkasa.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nm_dosen` varchar(200) NOT NULL,
  `matkul` varchar(100) NOT NULL,
  `email_dosen` varchar(200) NOT NULL,
  `pass_dosen` varchar(200) NOT NULL,
  `alamat_dosen` text NOT NULL,
  `tgldaftar_dosen` date NOT NULL,
  `tmplhr_dosen` varchar(100) NOT NULL,
  `tgllahir_dosen` date NOT NULL,
  `gender_dosen` varchar(100) NOT NULL,
  `gambar_dosen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nip`, `nm_dosen`, `matkul`, `email_dosen`, `pass_dosen`, `alamat_dosen`, `tgldaftar_dosen`, `tmplhr_dosen`, `tgllahir_dosen`, `gender_dosen`, `gambar_dosen`) VALUES
(1, '195323232', 'Chairun Nas, S.Kom., M.Kom.', 'Pemrograman Internet', 'chairun_nas@gmail.com', '123456789', 'jl. kesambi cirebon', '2013-02-11', 'Cirebon', '2013-02-01', 'Pria', '63e0c50dc94fb.jpg'),
(2, '19523234', 'Kusnadi, M.Kom.', 'Algoritma Dan Pemrograman', 'kusnadi@gmail.com', 'kusnadi123', 'jl. kesambi', '2013-02-15', 'Cirebon', '2013-02-07', 'Pria', '63e0c6001fbb7.png'),
(3, '19523642', 'Victor Asih, S.Si., M.T.', 'Arsitektur Dan Organisasi Komputer', 'victor@gmail.com', 'victor123', 'jl. perjuangan', '2000-02-09', 'Amerika', '1993-02-11', 'Pria', '63e0c6cc01fbd.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `id_mhs` int(11) NOT NULL,
  `nim` bigint(50) NOT NULL,
  `nm_mhs` varchar(200) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `email_mhs` varchar(200) NOT NULL,
  `pass_mhs` varchar(200) NOT NULL,
  `alamat_mhs` text NOT NULL,
  `tgldaftar_mhs` date NOT NULL,
  `tmptlahir_mhs` varchar(50) NOT NULL,
  `tgllahir_mhs` date NOT NULL,
  `gender_mhs` varchar(50) NOT NULL,
  `gambar_mhs` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mhs`
--

INSERT INTO `tb_mhs` (`id_mhs`, `nim`, `nm_mhs`, `prodi`, `email_mhs`, `pass_mhs`, `alamat_mhs`, `tgldaftar_mhs`, `tmptlahir_mhs`, `tgllahir_mhs`, `gender_mhs`, `gambar_mhs`) VALUES
(5, 20221020014, 'Miftahul Huda', 'TI 1/1', 'miftamartin1@gmail.com', '123123', 'jl. pancuran', '2022-10-11', 'Batam', '2003-08-13', 'Pria', '63de6c6849f69.jpeg'),
(7, 20221020015, 'Desi susanti', 'TI 1/1', 'martin666@gmail.com', '12345', 'jl. pancuran', '2023-02-13', 'Cirebon', '2023-02-07', 'Wanita', '63df4deb1a3d7.jpg'),
(9, 20221020019, 'dika', 'TI 1/4', 'jokowiyntkts38@gmail.com', '321321', '123123', '2023-02-09', 'cirebon', '2023-02-02', 'Netral', '63e0c492aa24c.jpeg'),
(10, 20221020020, 'Reza arab', 'TI 3/6', 'reza_arab@gmail.com', 'reza123', 'jl. apasaja', '2023-02-09', 'Jakarta', '1995-06-13', 'Pria', '63e51671c7ec3.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `nim_nilai` bigint(50) NOT NULL,
  `nama_nilai` varchar(200) NOT NULL,
  `prodi_nilai` varchar(100) NOT NULL,
  `matkul_nilai` varchar(100) NOT NULL,
  `prtmn_nilai` int(10) NOT NULL,
  `tgl_nilai` date NOT NULL,
  `nilai` int(10) NOT NULL,
  `ket_nilai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `nim_nilai`, `nama_nilai`, `prodi_nilai`, `matkul_nilai`, `prtmn_nilai`, `tgl_nilai`, `nilai`, `ket_nilai`) VALUES
(1, 20221020014, 'Miftahul huda', 'TI 1/1', 'Algoritma Dan Pemrograman', 1, '2023-02-07', 80, 'Bagus. di asah lagi skillnya'),
(3, 20221020014, 'Miftahul Huda', 'TI 1/1', 'Arsitektur Dan Organisasi Komputer', 3, '2023-02-10', 80, 'Di asah lagi belajarnya.'),
(4, 20221020015, 'Reza Arab', 'TI 1/5', 'Pemrograman Internet', 1, '2023-02-10', 95, 'Sip');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nim` bigint(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `id_semester` int(11) NOT NULL,
  `hrg_semester` double NOT NULL,
  `tot_transfer` double NOT NULL,
  `tot_kembali` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `nim`, `nama`, `prodi`, `tgl_pembayaran`, `id_semester`, `hrg_semester`, `tot_transfer`, `tot_kembali`) VALUES
(46, 20221020014, 'Miftahul huda', 'TI 1/1', '2023-02-14', 4, 4048000, 4100000, 52000),
(47, 20221010001, 'Reza', 'TI 1/3', '2023-02-23', 3, 4117000, 5000000, 883000),
(48, 20221020013, 'Rangga', 'TI 3/6', '2023-02-10', 6, 3921500, 4000000, 78500),
(49, 20221020012, 'Tegar', 'TI 2/4', '2023-02-22', 4, 4048000, 4200000, 152000),
(50, 20221020014, 'martin', 'TI 1/1', '2023-02-21', 5, 3967500, 4000000, 32500),
(51, 2022142412, 'Reza', 'TI 1/3', '2023-02-20', 5, 3967500, 4000000, 32500),
(71, 20221020025, 'Reza Arab', 'TI 1/4', '2023-02-16', 6, 3921500, 4000000, 78500),
(72, 20221020010, 'Reza rahardian', 'TI 3/6', '2023-02-15', 6, 3921500, 4000000, 78500),
(73, 20221020005, 'Rizky mencari rahmat', 'TI 4/8', '2023-02-23', 8, 3737500, 3800000, 62500),
(75, 20221020026, 'Raffi', 'TI 5/3', '2023-02-16', 3, 4117000, 4200000, 83000),
(76, 20221020027, 'luffy', 'TI 6/7', '2023-02-01', 7, 3852500, 3860000, 7500),
(77, 20221020029, 'Chandra martino syafaat', 'TI 2/4', '2023-02-09', 4, 4048000, 4100000, 52000),
(78, 20221020010, 'desty susanti', 'TI 6/4', '2023-02-02', 4, 4048000, 4050000, 2000),
(79, 20221020030, 'Adam sukamto', 'TI 5/8', '2023-02-10', 8, 3737500, 3800000, 62500),
(82, 20221020042, 'Rinaldi', 'TI 6/5', '2023-02-08', 5, 3967500, 4000000, 32500),
(83, 20221020042, 'Rizal', 'TI 7/6', '2023-02-08', 6, 3921500, 3950000, 28500),
(85, 20221020054, 'Rahmat', 'TI 4/1', '2023-02-08', 1, 4309625, 4500000, 190375),
(86, 20221020014, 'Miftahul huda', 'TI 1/2', '2023-02-09', 4, 4048000, 4100000, 52000),
(88, 20221020014, 'martin', 'TI 1/2', '2023-02-11', 2, 4220500, 4500000, 279500),
(89, 20221050014, 'Andovi', 'TI 1/3', '2023-02-11', 3, 4117000, 4200000, 83000),
(90, 202210200, 'Novi kustiyuani', 'TI 3/6', '2023-02-11', 1, 4309625, 4500000, 190375);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id_semester` int(11) NOT NULL,
  `semester` int(10) NOT NULL,
  `harga_semester` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `semester`, `harga_semester`) VALUES
(14, 1, 4312500),
(15, 2, 4220500),
(16, 3, 4117000),
(17, 4, 4048000),
(18, 5, 3967500),
(19, 6, 3921500),
(20, 7, 3852500),
(21, 8, 3737500);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_absendosen`
--
ALTER TABLE `tb_absendosen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `tb_absenmhs`
--
ALTER TABLE `tb_absenmhs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_absendosen`
--
ALTER TABLE `tb_absendosen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_absenmhs`
--
ALTER TABLE `tb_absenmhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_mhs`
--
ALTER TABLE `tb_mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
