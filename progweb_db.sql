-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2021 pada 22.26
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progweb_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_jual`
--

CREATE TABLE `daftar_jual` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama_penjual` varchar(50) NOT NULL,
  `nama_bangunan` varchar(500) NOT NULL,
  `tipe_bangunan` enum('Apartemen','Ruko','Rumah','Gedung') NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `harga_bangunan` bigint(20) NOT NULL,
  `gambar_bangunan` varchar(100) NOT NULL,
  `lokasi_bangunan` varchar(500) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telepon` varchar(14) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_jual`
--

INSERT INTO `daftar_jual` (`id`, `user_id`, `nama_penjual`, `nama_bangunan`, `tipe_bangunan`, `luas_bangunan`, `harga_bangunan`, `gambar_bangunan`, `lokasi_bangunan`, `keterangan`, `email`, `no_telepon`, `date`) VALUES
(35, 594138267, 'Kevin Wijaya', 'Rumah Bogor BNR', 'Rumah', 90, 850000000, '1.jpg', 'BNR - Bogor Selatan, Cluster - A, 250meter dari rel kereta api', '2 lantai, 2 kamar mandi, 3 kamar tidur.', 'kevin@gmail.com', '(0622)23765', '2021-05-24'),
(36, 9548627103, 'Owen', 'Apartemen FUNERO', 'Apartemen', 10, 26000000, '2.jpg', 'Kota Tangerang', 'Full set furniture apartemen type studio.\r\n\r\nSudah termasuk :\r\n\r\nKitchen set atas bawah\r\nBackdrop TV\r\nLemari pakaian\r\nHead bed &amp; bed stead\r\nMeja kerja\r\n\r\nBonus :\r\nCooker hood\r\nGordyn\r\n\r\nDesain dan model serta finishing mengikuti permintaan desain &amp; budget customer.\r\n\r\nHarga diatas merupakan standard desain kami dan dapat berubah untuk menyesuaikan desain dari customer.\r\n\r\nUntuk keterangan dan detail lebih lanjut dapat menghubungi kami.', 'owen@gmail.com', '081263218892', '2021-05-24'),
(37, 9185346720, 'Juan', 'Mediterania Boulevard Residences', 'Apartemen', 37, 550000000, '3.jpg', 'Jalan Landas Pacu Utara Selatan Blok A1 No. 2, RT 10/RW 13, Kebon Kosong, Kec. Kemayoran, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10630', 'Furnished\r\n3 AC\r\n2 Lemari Pakaian\r\n1 TV\r\n1 Kulkas\r\nKitchen Set\r\nSofa\r\nMeja Makan', 'ju4n@gmail.com', '08981234765', '2021-05-24'),
(38, 6091425738, 'Rio', 'GEDUNG KANTOR BARU BUNCIT 45', 'Gedung', 2070, 65000000000, '4.jpg', 'Jl buncit raya no.45 jakarta selatan', ' Carport\r\nAC\r\nPAM\r\nTelephone\r\nFire Extenguisher', 'goriorio@gmail.com', '08235467342', '2021-05-24'),
(39, 9206487153, 'Filbert', 'Ruko Plaza 3 Pondok Indah', 'Ruko', 993, 22000000000, '5.jpg', 'Tb Simatupang, Pondok Indah, Jakarta Selatan, DKI Jakarta', 'Akses 24 Jam\r\nPendingin Ruangan\r\nTempat Parkir Mobil', 'filbertshu@gmail.com', '085261324354', '2021-05-24'),
(40, 9284036157, 'Kurnia', 'Ruko Gandeng', 'Ruko', 450, 12500000000, '6.jpg', 'Kemang, Kemang, Jakarta Selatan, DKI Jakarta', ' 2 Lantai\r\nParkir Luas\r\nDapur\r\nKamar Mandi\r\nSHM IMB', 'kurniaaditya@gmail.com', '082165604571', '2021-05-24'),
(41, 1860932754, 'Steven', 'Gedung Kantor Oleos 2', 'Gedung', 965, 90000000000, '7.jpg', 'TB Simatupang', '* 11 lantai + 2 basement\r\n* Luas Tanah : +/- 965 m2\r\n* Luas Bangunan Gross : +/- 6.353 m2\r\n* Legalitas: SHGB\r\n* 2 Mitsubishi Lift\r\n* Kap listrik 345 KVA\r\n* Generator 400 KVA\r\n* Kapasitas parkir 25 mobil\r\n* SHGB, legalitas aman dan lengkap\r\n* Kondisi Tersewa 75%', 'steven@gmail.com', '08526165784', '2021-05-24'),
(42, 7082315946, 'Pardono', 'Angrek Residence', 'Apartemen', 26, 690000000, '8.jpg', 'Taman Anggrek, Jakarta Barat', '1 kamar, 1 kamar mandi', 'pardono@gmail.com', '08217395939', '2021-05-24'),
(43, 3528916740, 'Marpaung', 'Rumah Neo Sapphire Regency B 89', 'Rumah', 56, 419000000, '9.jpg', 'Dekat Stasiun Purwokerto 5 menit', 'Kamar Tidur 2\r\nKamar Pembantu/Gudang 1\r\nRuang Tamu 1\r\nKamar Mandi 1\r\nTaman 1\r\nCar Port 1\r\nPantry 1\r\nDapur 1', 'marpaung@gmail.com', '085234654750', '2021-05-24'),
(44, 6509483271, 'Sudung Simatupang', 'Vinaya Residence', 'Rumah', 125, 1925000000, '10.jpg', ' Dekat Bintaro, Vinaya Residence Jombang Bintaro', '- Lantai 2\r\n- Kamar Tidur 3+1\r\n- Kamar Mandi 3+1\r\n- Carport 1\r\n- Daya Listrik 2.200 Watt\r\n- Surat HGB', 'sudungsimatupang@gmail.com', '087865498705', '2021-05-24'),
(45, 8761254039, 'Felix Maxwell', 'Anwa Residence Bintaro', 'Apartemen', 30, 500000000, '11.jpg', 'Ciputat, Tangerang Selatan', 'Ruang Utama\r\nLantai : Homogeneous Tile 60 x 60 cm\r\nPintu : Steel Door\r\nJendela : Kaca 8mm, Frame Alumunium\r\n\r\nKamar Tidur\r\nLantai : Homogeneous Tile 60x60 cm\r\nPintu : Engineering wood\r\n\r\nKamar Mandi\r\nLantai : Ceramic Tile 30x30 cm\r\nDinding : Ceramic Tile 30x60 cm\r\nPintu : WPVC\r\nSanitair : Ex TOTO\r\n\r\nBalkon\r\nLantai : Unpolished Ceramic Tile 30 x x30 cm\r\nRailing : Hollow Steel\r\n\r\nDaya Listrik : 2200 watt', 'felixmaxwell@gmail.com', '087652348783', '2021-05-24'),
(49, 892465371, 'Brian Wijaya', 'BSD City - Sinar Mas Land', 'Apartemen', 61, 1200000000, '12.jpg', 'BSD Tangerang', 'Green Concept\r\n\r\nAsatti berlokasi tepat dipinggir danau Vanya Park BSD City. Dilengkapi dengan Garden Terrace dan fasilitas pool sepanjang 180 M\r\n\r\nKawasan Premium\r\n\r\nKawasan premium dengan swimming pool sepanjang 180 m dan fully furnished\r\n\r\nLokasi Strategis\r\n\r\nDikelilingi 7 Universitas, 100 gedung perkantoran, 70 sekolah, pusat perbelanjaan dan kuliner, akses tol JORR 1 dan JORR 2', 'brianwijaya2003@gmail.com', '082167110099', '2021-05-24'),
(50, 4687059321, 'Bernad', 'Kantor Cantik', 'Rumah', 600, 15500000000, '13.jpg', 'Jalan Senayan Raya, Kebayoran Baru', 'Kantor sekaligus galery dan rumah tinggal.. lokasi komersial lokasi dekat SCBD Sudirman dan jl. Senopati. Kebayoran baru. area komersil bisa ijin domisili.\r\nperuntukan bisa 4 lantai\r\nMemiliki 3 lantai 5 kamar dan 3 kamar mandi.', 'bertold@gmail.com', '0852443567534', '2021-05-24'),
(51, 6980723415, 'Christine', 'Ruko Siap Pakai Di Kebayoran Lama Jakarta Selatan', 'Ruko', 255, 5500000000, '14.jpg', 'Kebayoran Lama, Jakarta Selatan, DKI Jakarta', 'Kondisi bangunan sangat baik dan terawat, terdiri dari 4 lantai dengan 3 kamar mandi, lokasi sangat strategis di jalan utama kebayoran lama jaksel, dekat dengan pasar, sekolah, dan perumahan, sangat cocok untuk usaha resto kuliner, perkantoran, dan lainnya, parkir luas dengan pagar sendiri.\r\nMemiliki 4 lantai 3 kamar mandi.', 'chris_tine@gmail.com', '0852443567534', '2021-05-24'),
(52, 5293784016, 'Yuni Sinaga', 'Ruko Graha Mas Fatmawati', 'Apartemen', 292, 7000000000, '15.jpg', 'Fatmawati, Jakarta Selatan, DKI Jakarta', 'Luas tanah 65m2\r\nDimensi 5x13m\r\nBangunan 4,5 lantai\r\n4 kamar 3 kamar mandi\r\n\r\nHarga Rp. 7 M nego\r\n\r\n*Ruko area komersial bisa keluar surat domisili', 'yunisinaga@gmail.com', '08524364785', '2021-05-24'),
(53, 2567394108, 'Nico Sitinjak', 'Ray White CBD Jakarta', 'Rumah', 500, 33000000000, '16.jpg', 'Kebayoran Lama, Jakarta Selatan', 'Rumah mewah yang berada di Jalan Simprug Golf ini memiliki lingkungan yang cukup tenang. Dekat dengan Senayan City, dan berada di lingkungan yang cukup elite.\r\nMemiliki 5 kamar 4 kamar mandi.', 'nico_sitinjak@gmail.com', '089596934135', '2021-05-24'),
(54, 9847351602, 'Devin Hongo', 'Adipati Residence Sudimara', 'Rumah', 48, 689000000, '17.jpg', 'Bintaro, Jakarta Selatan', 'Hunian Di Ciputat Kawasan Bintaro Dengan Akses Yang Terbaik:\r\n- 1 menit ke St.Sudimara\r\n- 5 menit ke Universitas Pembangunan Jaya\r\n- 8 menit ke Tol Pd.Aren\r\n- 10 menit ke Mall BXC\r\n- 12 menit ke RS International Bintaro\r\n- Lokasi pinggir Aspal\r\n- Harga Perdana jelas kami jamin paling termurah\r\n\r\nMemiliki 3 kamar 2 kamar mandi 2 parkiran mobil.', 'devinhongo@gmail.com', '0811623145', '2021-05-24'),
(55, 2043715986, 'Michael Chris', 'Galleria Court Condominium', 'Apartemen', 167, 2500000000, '18.jpg', 'Mampang Prapatan, Jakarta Selatan, Jakarta', 'This property is a 167 SqM apartment with 3 bedrooms and 2 bathrooms that is available for sale. It is part of the Galleria Court Condominium project in Mampang Prapatan, Jakarta and was completed in Jan 2000. You can buy this apartment for a base price of Rp2,500,000,000 (Rp14,970,060/SqM).', 'miczchris@gmail.com', '081371255135', '2021-05-24'),
(56, 5604327819, 'Angel Djingga', 'Casa Grande Residence', 'Gedung', 285, 9500000000, '19.jpg', 'Jl. Casablanca Raya, Kuningan, Jakarta Selatan, DKI Jakarta', 'Memiliki 4 kamar 3 kamar mandi.', 'angeldjingga@gmail.com', '087865467654', '2021-05-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telepon` varchar(14) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `user_id`, `admin`, `user_name`, `password`, `nama_pengguna`, `email`, `no_telepon`, `date`) VALUES
(37, 594138267, 1, 'vinwijaya', '$2y$10$.L.mK1YSUq5.hurYy2nsdujmy0UtV9j70xPw7QHSjw.GLLdDurfAm', 'Kevin Wijaya', 'kevin@gmail.com', '(0622)23765', '2021-05-24 16:46:55'),
(38, 9548627103, 0, 'owen', '$2y$10$SgXQqpN1Dj8/6desfY0TceFBtzfCPkjtP1efOEjCk/kYFggF2ScQ6', 'Owen', 'owen@gmail.com', '081263218892', '2021-05-24 16:39:02'),
(39, 9185346720, 0, 'juan', '$2y$10$9ua5xkb2cgWusmKp/oCx6OwZ/zgDnJFeND.gltCBausMXBQF.OCyi', 'Juan', 'ju4n@gmail.com', '08981234765', '2021-05-24 16:41:35'),
(40, 6091425738, 0, 'goriorio', '$2y$10$pLlaCK9HJYQAQ2pFytiFfemx6ZxuxfSxNX/pbzEq0B9CA5urHe9oW', 'Rio', 'goriorio@gmail.com', '08235467342', '2021-05-24 17:06:14'),
(41, 9206487153, 0, 'filbert', '$2y$10$EWjrkwpjxNr2JWAPek7wvueuhweV/RBdlGucHGQHgoY7P6qSe.DDq', 'Filbert', 'filbertshu@gmail.com', '085261324354', '2021-05-24 17:09:36'),
(42, 9284036157, 0, 'kurnia', '$2y$10$vV963wmfU7VzdBbVMOaxf.PZIYPxr6.d1WoPxPiHF1DpryfK/xcKi', 'Kurnia', 'kurniaaditya@gmail.com', '082165604571', '2021-05-24 17:12:06'),
(43, 1860932754, 0, 'steven', '$2y$10$PDleCsuJfJjw4ZII.LcL1uSAxDdigDyrgTQw9TUTLug0WMDNODLTi', 'Steven', 'steven@gmail.com', '08526165784', '2021-05-24 17:14:09'),
(44, 7082315946, 0, 'pardono', '$2y$10$t1VNBPyaN5nkJAn1nQFMZOtPBbcybaVSZVSx5XzcPIgEROT126LEm', 'Pardono', 'pardono@gmail.com', '08217395939', '2021-05-24 17:17:55'),
(45, 3528916740, 0, 'marpaung', '$2y$10$2qxdP.DlwzuFAW0v3lAODOGPh5qgOU1KkN2SScYBbnmAk2JRGwr3y', 'Marpaung', 'marpaung@gmail.com', '085234654750', '2021-05-24 17:20:58'),
(46, 6509483271, 0, 'sudung', '$2y$10$Rlj7jqa5xMzfxmkTZ.ahaOt2AFL9QaqG.3kX2wquq7JpSf0jh94aO', 'Sudung Simatupang', 'sudungsimatupang@gmail.com', '087865498705', '2021-05-24 17:23:00'),
(47, 892465371, 1, 'brianzw', '$2y$10$0nltCpGIswrewvRYfeHhr.vn73G921Wf1xFs/8mNQxmS1mKMEDeam', 'Brian Wijaya', 'brianwijaya2003@gmail.com', '082167110099', '2021-05-24 17:40:07'),
(48, 8761254039, 0, 'felix', '$2y$10$dOfEOIdQmWwiUeGl1Mv/uu6PSQ5JfBSVMq1Bp9PpgjbQE6bqdCT1K', 'Felix Maxwell', 'felixmaxwell@gmail.com', '087652348783', '2021-05-24 17:43:54'),
(49, 4687059321, 0, 'bernad', '$2y$10$yIXcUe7pllJUv6n2TngaV.RbIsevbJnZ9XChjJitbbKQQVC1Jlejy', 'Bernad', 'bertold@gmail.com', '0852443567534', '2021-05-24 19:50:54'),
(50, 6980723415, 0, 'christine', '$2y$10$lP6M6Sojo8vOkuqa2P7XPecuO6npBOBsmYZAjWNSQHd45CHq7Js.i', 'Christine', 'chris_tine@gmail.com', '0852443567534', '2021-05-24 19:53:26'),
(51, 5293784016, 0, 'yuni', '$2y$10$0mX3uLJdoHZdPwraseCLJOPJ/7KPP.iBWHSHKef/eWgl2EzpNsMnm', 'Yuni Sinaga', 'yunisinaga@gmail.com', '08524364785', '2021-05-24 19:55:55'),
(52, 2567394108, 0, 'nico', '$2y$10$kXN0IMlI7xVJJ3lqpnB5p.PDYwves69waZSzAyj5CGimbIGAeVKQi', 'Nico Sitinjak', 'nico_sitinjak@gmail.com', '089596934135', '2021-05-24 19:58:13'),
(53, 9847351602, 0, 'devin', '$2y$10$2Lw2phtw4d8xKqNWMrEcFONs68qjW45fEfZeGD8vnkSPnIUTKVLcG', 'Devin Hongo', 'devinhongo@gmail.com', '0811623145', '2021-05-24 20:00:06'),
(54, 2043715986, 0, 'michael', '$2y$10$W4l7HFm9drqtNw/WEYfD3ee5e83ZRYzkuP.S2CUIGMTGGkR64tp6C', 'Michael Chris', 'miczchris@gmail.com', '081371255135', '2021-05-24 20:02:51'),
(55, 5604327819, 0, 'angel', '$2y$10$kg7DKiCU/vF/QznUZIsObepURW62JxBVypcU/MmEDC1PbiIVPqDBu', 'Angel Djingga', 'angeldjingga@gmail.com', '087865467654', '2021-05-24 20:05:05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_jual`
--
ALTER TABLE `daftar_jual`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_jual`
--
ALTER TABLE `daftar_jual`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
