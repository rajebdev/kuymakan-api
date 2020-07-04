-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2020 pada 11.11
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuymakan_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buyercoupons`
--

CREATE TABLE `buyercoupons` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `claimed` datetime NOT NULL,
  `expired` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buyernotifs`
--

CREATE TABLE `buyernotifs` (
  `id` int(11) NOT NULL,
  `label` text NOT NULL,
  `icon` text NOT NULL,
  `images` text NOT NULL,
  `link` text NOT NULL,
  `created` datetime NOT NULL,
  `buyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buyers`
--

CREATE TABLE `buyers` (
  `id` int(11) NOT NULL,
  `names` text NOT NULL,
  `images` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buyers`
--

INSERT INTO `buyers` (`id`, `names`, `images`, `user_id`) VALUES
(1, 'Wijanarko Putra Rajeb', 'img/buyer/1.png', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `label` varchar(20) NOT NULL,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `label`, `images`) VALUES
(1, 'Baru Minggu Ini', 'img/category/minggu.png'),
(2, 'Promosi', 'img/category/promosi.png'),
(3, 'Terdekat', 'img/category/terdekat.png'),
(4, 'Terlaris', 'img/category/terlaris.png'),
(5, 'Promo Antar', 'img/category/promoantar.png'),
(6, '24 Jam', 'img/category/24jam.png'),
(7, 'Menu Hemat', 'img/category/menuhemat.png'),
(8, 'Menu Sehat', 'img/category/menusehat.png'),
(9, 'Terfavorit', 'img/category/terfavorit.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `names` varchar(255) NOT NULL,
  `expired` datetime NOT NULL,
  `syarat` text NOT NULL,
  `carapakai` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `coupons`
--

INSERT INTO `coupons` (`id`, `names`, `expired`, `syarat`, `carapakai`, `deskripsi`) VALUES
(1, 'Diskon 10%', '2020-07-31 00:00:00', 'Tidak Ada Syarat', 'Tinggal Klaim', 'Untuk diskon apa saja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `flippers`
--

CREATE TABLE `flippers` (
  `id` int(11) NOT NULL,
  `images` text NOT NULL,
  `link` text NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foodorders`
--

CREATE TABLE `foodorders` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foodorders`
--

INSERT INTO `foodorders` (`id`, `food_id`, `order_id`, `amount`) VALUES
(1, 2, 1, 1),
(2, 1, 1, 1),
(3, 2, 3, 1),
(4, 2, 3, 1),
(5, 4, 4, 1),
(6, 5, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `names` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `prices` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `foodtype_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foods`
--

INSERT INTO `foods` (`id`, `names`, `details`, `prices`, `stock`, `foodtype_id`, `category_id`, `restaurant_id`) VALUES
(1, 'Josua', 'Extra Joss susu', 6500, 10, 1, 3, 2),
(2, 'Extrajoss', 'Minuman Extrajoss Murni', 6500, 15, 1, 3, 2),
(3, 'Nasi Pecel', 'Nasi + Sayur + Bumbu Pecel + Tahu Goreng', 7000, 100, 4, 3, 2),
(4, 'Paket Ayam Geprek', '', 15000, 100, 4, 3, 1),
(5, 'Geprek Telur Asin', 'Telur Bebek diasinkan', 22500, 50, 5, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foodtypes`
--

CREATE TABLE `foodtypes` (
  `id` int(11) NOT NULL,
  `label` text NOT NULL,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foodtypes`
--

INSERT INTO `foodtypes` (`id`, `label`, `images`) VALUES
(1, 'Minuman', 'img/foodtype/minuman.png'),
(2, 'Jajanan', 'img/foodtype/jajanan.png'),
(3, 'Sweets', 'img/foodtype/sweets.png'),
(4, 'Aneka Nasi', 'img/foodtype/anekanasi.png'),
(5, 'Ayam & Bebek', 'img/foodtype/ayambebek.png'),
(6, 'Cepat Saji', 'img/foodtype/cepatsaji.png'),
(7, 'Roti', 'img/foodtype/roti.png'),
(8, 'Jepang', 'img/foodtype/jepang.png'),
(9, 'Bakso & Soto', 'img/foodtype/baksosoto.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `orderstatus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location_send` text NOT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `code`, `created`, `orderstatus_id`, `user_id`, `location_send`, `restaurant_id`) VALUES
(1, 'KMF000001', '2020-07-04 00:00:00', 1, 2, 'Sumobito', 2),
(3, 'KMF5f0041c5d08bb', '2020-07-04 08:45:57', 1, 2, 'Bangkalan', 2),
(4, 'KMF5f00449ce10bd', '2020-07-04 08:58:04', 1, 2, 'Jombang', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderstatus`
--

CREATE TABLE `orderstatus` (
  `id` int(11) NOT NULL,
  `label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderstatus`
--

INSERT INTO `orderstatus` (`id`, `label`) VALUES
(1, 'proses'),
(2, 'complete'),
(3, 'cancel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `names` text NOT NULL,
  `location` text NOT NULL,
  `opentime` time NOT NULL,
  `closetime` time NOT NULL,
  `closed` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `restaurants`
--

INSERT INTO `restaurants` (`id`, `names`, `location`, `opentime`, `closetime`, `closed`, `user_id`) VALUES
(1, 'Ayam Geprek Bangsus', 'Mojoagung', '10:00:00', '22:00:00', 0, 3),
(2, 'Warung Rizka Rizky', 'Peterongan', '10:00:00', '22:00:00', 0, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'buyer'),
(2, 'restaurant');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tokens`
--

INSERT INTO `tokens` (`id`, `code`, `user_id`) VALUES
(1, '5ecb0a95e2eedf22be654bec4eb6f569', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role_id`, `created`, `modified`) VALUES
(2, '085852838253', '$2y$10$xouDMJSVR1GIY5s6xInZ0.KeRyjK55Lsmp1mpjul0WHVRm/Kk.qYq', 'wijanarko.rajeb@gmail.com', 1, '2020-07-02 23:59:39', '2020-07-02 23:59:39'),
(3, '085852838251', '$2y$10$50FtTUqZiJOL6VCPqvXOuueO38Uk.Gi.CJ18UsOTyOwbN7Zf6kH2G', '170411100061@student.trunojoyo.ac.id', 2, '2020-07-03 21:12:05', '2020-07-03 21:12:05'),
(4, '085852838252', '$2y$10$br2MEredBQzxwhqyR6EQDuqJzkFVUrGDH/iq1B2WaBo/IF2BvG5D.', '170411100087@student.trunojoyo.ac.id', 2, '2020-07-03 21:12:54', '2020-07-03 21:12:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buyercoupons`
--
ALTER TABLE `buyercoupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `buyercoupons_ibfk_2` (`coupon_id`);

--
-- Indeks untuk tabel `buyernotifs`
--
ALTER TABLE `buyernotifs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indeks untuk tabel `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `flippers`
--
ALTER TABLE `flippers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indeks untuk tabel `foodorders`
--
ALTER TABLE `foodorders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `foodtype_id` (`foodtype_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `foodtypes`
--
ALTER TABLE `foodtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderstatus_id` (`orderstatus_id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buyercoupons`
--
ALTER TABLE `buyercoupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `buyernotifs`
--
ALTER TABLE `buyernotifs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `flippers`
--
ALTER TABLE `flippers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `foodorders`
--
ALTER TABLE `foodorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `foodtypes`
--
ALTER TABLE `foodtypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buyercoupons`
--
ALTER TABLE `buyercoupons`
  ADD CONSTRAINT `buyercoupons_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `buyers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `buyercoupons_ibfk_2` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `buyernotifs`
--
ALTER TABLE `buyernotifs`
  ADD CONSTRAINT `buyernotifs_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `buyers` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `buyers`
--
ALTER TABLE `buyers`
  ADD CONSTRAINT `buyers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `flippers`
--
ALTER TABLE `flippers`
  ADD CONSTRAINT `flippers_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foodorders`
--
ALTER TABLE `foodorders`
  ADD CONSTRAINT `foodorders_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `foodorders_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `foods_ibfk_2` FOREIGN KEY (`foodtype_id`) REFERENCES `foodtypes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `foods_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`orderstatus_id`) REFERENCES `orderstatus` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
