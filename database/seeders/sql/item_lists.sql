-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2023 pada 04.28
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `decompany`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_lists`
--
--
-- Dumping data untuk tabel `item_lists`
--

INSERT INTO `item_lists` (`id`, `name`, `slug`, `description`, `price`, `image`, `type`, `category_id`, `created_at`, `updated_at`, `stock`) VALUES
(1, 'Mini Garden\r\n', 'Mini-Garden-1', 'Bisa Custom design dan bahan Indoor maupun outdoor Konsultasikan terlebih dahulu kebutuhan anda', 350000, 'item_images/mini-garden.png', 'Rent', 8, NULL, NULL, 12),
(2, 'Decoration', 'decoration-1', 'Bisa Custom design dan bahan Indoor maupun outdoor Konsultasikan terlebih dahulu kebutuhan anda', 350000, 'item_images/decoration-1.png', 'Rent', 8, NULL, NULL, 10),
(3, 'Genset 60 kVA', 'genset-60-kva-1', 'Kapasitas: 60 kVA/48 KW\r\nTipe: Silent\r\nPhase: 3 phase\r\nVoltase: 220/380V\r\nPutaran: 1500 rpm', 3000000, 'item_images/Genset-60-KVA.png', 'Rent', 2, NULL, NULL, 33),
(4, 'Mic Delegate', 'mic-delegate', 'Mic Delegate Unit memungkinkan peserta untuk secara aktif bergabung dalam diskusi (misalkan berbicara dan mendengarkan) dengan menggunakan microphone, dikendalikan oleh tombol on / off dan built-in loudspeaker atau headphone eksternal.', 250000, 'item_images/8.-Mic-Delegate.jpg', 'Sell', 5, NULL, NULL, 12),
(5, 'Edifier T5 Audio Sound System', 'edifier-t5-audio-sound-system', 'Subwoofer home theater ini dapat diintegrasikan dengan mulus ke dalam rumah Anda dengan desain sederhana dan elegan yang dapat Anda letakkan di bawah TV atau di mana pun Anda suka di rumah Anda. Ini akan meningkatkan keseluruhan suara TV secara signifikan, sehingga Anda dapat menikmati musik atau film favorit yang belum pernah ada sebelumnya.', 1500000, 'item_images/edifier-t5-audio-sound-system.jpg', 'Sell', 5, NULL, NULL, 2),
(6, 'Mic Lidi Wireless', 'mic-lidi-wireless', 'Rotationally symmetrical Hyper-Cardioid Polar Pattern for good feedback rejection, bullet RF Output 10mW, bullet Frequency Response 50Hz – 16.5 KHz, bullet Steel Mesh Windscreen, bullet Moving Coil Dynamic Microphone, bullet Uses 2 x AA batteries (included), bullet Set of 7 different coloured identifying covers designed for use with multiple systems.', 500000, 'item_images/Mic-Lidi-Wireless.jpg', 'Sell', 5, NULL, NULL, 20),
(7, 'Speaker Aubern Professional Portable Sound', 'speaker-aubern-professional-portable-sound', 'PA Speaker 12\" Subwoofer 120W RMS\r\nAubern merupakan brand audio ternama asal Germany, di awal tahun 2018 ini kembali mengeluarkan\r\n3 (Tiga) produk terbarunya yang jauh lebih \"gahar\" dan \"sangar\" dibanding seri-seri sebelumnya, yaitu PS-8CT (8 Inch),\r\nBE-12CX (12 Inch), dan BE-15CX (15 Inch).\r\nKetiga Portable Speaker ini menghasilkan suara yang super jernih dengan dentuman bass yang sangat terasa, juga cocok\r\nbagi anda para penikmat musik accoustic sebab suara yang dihasilkan sangat bersih dan detil.', 4000000, 'item_images/speaker-aubern-professional-portable-sound.jpg', 'Sell', 5, NULL, NULL, 30);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `item_lists`
--
ALTER TABLE `item_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_lists_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `item_lists`
--
ALTER TABLE `item_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `item_lists`
--
ALTER TABLE `item_lists`
  ADD CONSTRAINT `item_lists_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
