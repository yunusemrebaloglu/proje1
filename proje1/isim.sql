-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 21 Ara 2016, 20:17:08
-- Sunucu sürümü: 10.1.19-MariaDB
-- PHP Sürümü: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `isim`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `paylasilan`
--

CREATE TABLE `paylasilan` (
  `id` int(11) NOT NULL,
  `kullanici` int(11) NOT NULL,
  `text` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `paylasilan`
--

INSERT INTO `paylasilan` (`id`, `kullanici`, `text`) VALUES
(35, 1, 'dd'),
(36, 1, 'dasd'),
(37, 1, '1'),
(38, 6, '11'),
(39, 2, '1'),
(40, 6, 'ss'),
(41, 6, '123'),
(42, 7, 'dd'),
(43, 7, 'sadsdasda');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `takip`
--

CREATE TABLE `takip` (
  `id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `takip_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `kadi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '1',
  `dikkat` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `kadi`, `sifre`, `eposta`, `admin`, `dikkat`) VALUES
(1, 'dd', 'dd', 'dd@hotmail.com', 3, 1),
(2, 'aa', 'aa', 'aa@hotmail.com', 2, 2),
(6, 'ad', 'ad', 'add', 1, 2),
(7, 'da', 'da', 'da', 1, 2),
(8, 'ddd', 'ddd', 'dd@hotmail.comd', 1, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorum`
--

CREATE TABLE `yorum` (
  `id` int(11) NOT NULL,
  `paylasim` int(11) NOT NULL,
  `yazan` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorum`
--

INSERT INTO `yorum` (`id`, `paylasim`, `yazan`, `mesaj`) VALUES
(29, 36, 'dd', 'dsa');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `paylasilan`
--
ALTER TABLE `paylasilan`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `takip`
--
ALTER TABLE `takip`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kadi` (`kadi`),
  ADD UNIQUE KEY `eposta` (`eposta`);

--
-- Tablo için indeksler `yorum`
--
ALTER TABLE `yorum`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `paylasilan`
--
ALTER TABLE `paylasilan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- Tablo için AUTO_INCREMENT değeri `takip`
--
ALTER TABLE `takip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Tablo için AUTO_INCREMENT değeri `yorum`
--
ALTER TABLE `yorum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
