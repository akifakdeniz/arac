-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 05 Haz 2020, 09:26:52
-- Sunucu sürümü: 5.6.41
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `vntwebak_arac`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_amir`
--

CREATE TABLE `tbl_amir` (
  `ID` int(11) NOT NULL,
  `ad_soyad` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `unvan` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `sube` int(11) NOT NULL,
  `durum` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `tbl_amir`
--

INSERT INTO `tbl_amir` (`ID`, `ad_soyad`, `unvan`, `sube`, `durum`) VALUES
(1, 'Seyfettin BAYDAR', 'İl Müdürü', 12, 1),
(2, 'Mehmet TUĞAY', 'İl Müdür Yardımcısı', 12, 1),
(3, 'Orhan TAT', 'İl Müdür Yardımcısı', 12, 1),
(4, 'Mehmet AKKUŞ', 'Şube Müdürü', 1, 1),
(5, 'Kerim MUZAÇ', 'Şube Müdürü', 6, 1),
(6, 'Ramazan DİDİN', 'Şube Müdürü', 4, 1),
(7, 'Ramazan SOBAYOĞLU', 'Şube Müdürü', 5, 1),
(8, 'Yücel DOĞAN', 'Şube Müdürü', 8, 1),
(9, 'Ahmet TETİK', 'Şube Müdürü', 9, 1),
(10, 'Fevzi TOSUN', 'İl Müdür Yardımcısı', 12, 1),
(11, 'Fazlı ARITÜRK', 'Şube Müdürü', 3, 1),
(12, 'Süleyman ÖZCAN', 'Şube Müdürü', 2, 1),
(13, 'Bilal KALE', 'Şube Müdürü', 7, 1),
(14, 'Mustafa İNCEKARA', 'Hukuk Birimi', 10, 1),
(15, 'Gürcan GÜR', 'Döner Sermaye', 11, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_arac`
--

CREATE TABLE `tbl_arac` (
  `ID` int(11) NOT NULL,
  `plaka` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `marka` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `durum` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `tbl_arac`
--

INSERT INTO `tbl_arac` (`ID`, `plaka`, `marka`, `model`, `durum`) VALUES
(1, 'Otomobil', '', '', 1),
(2, '4x4 Arazi', '', '', 1),
(3, 'Minibüs', '', '', 1),
(4, 'Hafif Ticari', '', '', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_arac_liste`
--

CREATE TABLE `tbl_arac_liste` (
  `ID` int(11) NOT NULL,
  `plaka` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `marka` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `durum` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `tbl_arac_liste`
--

INSERT INTO `tbl_arac_liste` (`ID`, `plaka`, `marka`, `model`, `durum`) VALUES
(1, 'Otomobil', '', '', 1),
(2, '4x4 Pikap', '', '', 1),
(3, '42 DNC 02', 'Renault Fluence', '2016', 1),
(4, '42 DNC 01', 'Renault Fluence', '2016', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_gorev`
--

CREATE TABLE `tbl_gorev` (
  `ID` int(11) NOT NULL,
  `gtarih` date DEFAULT NULL,
  `gyerID` int(11) DEFAULT NULL,
  `aracID` int(11) DEFAULT NULL,
  `soforID` int(11) UNSIGNED DEFAULT NULL,
  `aciklama` text COLLATE utf8_bin,
  `sevkID` int(11) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `amirID` int(11) DEFAULT NULL,
  `durum` int(11) DEFAULT NULL,
  `onay` int(11) DEFAULT NULL COMMENT 'User Onay',
  `A_Onay` int(11) DEFAULT NULL COMMENT 'Amir Onay',
  `S_Onay` int(11) DEFAULT NULL COMMENT 'Sevk Onay',
  `M_Onay` int(11) DEFAULT NULL COMMENT 'Mod Onay',
  `A_Aciklama` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `S_Aciklama` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `M_Aciklama` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `tbl_gorev`
--

INSERT INTO `tbl_gorev` (`ID`, `gtarih`, `gyerID`, `aracID`, `soforID`, `aciklama`, `sevkID`, `userID`, `amirID`, `durum`, `onay`, `A_Onay`, `S_Onay`, `M_Onay`, `A_Aciklama`, `S_Aciklama`, `M_Aciklama`) VALUES
(1, '2018-10-16', 1, 1, 0, 'Test 1 Kullanıcı Oluştursun/ Bekletsin', 1, 0, 9, 1, 0, 0, 0, 0, NULL, NULL, NULL),
(2, '2018-10-16', 1, 1, 0, 'Test 2 Kullanıcı oluştursun/Silsin/', 1, 0, 9, 1, 0, 0, 0, 0, NULL, NULL, NULL),
(3, '2018-10-16', 1, 1, 0, 'Test 3 Kullanıcı onaylasın/Amire Sunsun/Amir Bekletsin', 1, 0, 9, 1, 1, 0, 0, 0, NULL, NULL, NULL),
(4, '2018-10-16', 1, 1, 0, 'Test 4 Kullanıcı Amire Sunsun/Amir iptal etsin', 1, 0, 9, 1, 1, 2, 0, 0, 'Sonraki haftaya ertelensin', NULL, NULL),
(5, '2018-10-16', 1, 1, 0, 'Test 5 Kullanıcı oluştursun/Amir olnaylasın/Sevk Amiri iptal etsin', 1, 0, 9, 1, 1, 1, 2, 0, NULL, 'Araç yetersizliği', NULL),
(6, '2018-10-16', 1, 1, 0, 'Test 6 /Kullanıcı olşutrusun/Amir onaylasın/ Sevk Amiri onaylasın/Mod İptal etsin', 1, 0, 9, 1, 1, 1, 1, 2, NULL, NULL, 'Hava muhalefeti sebebiyle göreve çıkılamamıştır.'),
(7, '2018-10-16', 1, 1, 0, 'Test 7 kullanıvı olustursun/Amir onaylasın/Sevk onaylasın/Mod bilgileri girsin dosya kapansın', 1, 0, 9, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(8, '2018-10-23', 2, 1, 0, 'Akörende Arazi kontrolu', 1, 0, 9, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(9, '2019-07-01', 26, 1, 1, 'deneme', 1, 0, 1, 1, 1, 0, 0, 0, NULL, NULL, NULL),
(10, '2019-07-02', 2, 1, 0, 'asdasd', 1, 0, 1, 1, 0, 0, 0, 0, NULL, NULL, NULL),
(11, '2020-05-01', 1, 2, 1, 'Derbent', 1, 0, 7, 1, 1, 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_gorev_arac`
--

CREATE TABLE `tbl_gorev_arac` (
  `ID` int(11) NOT NULL,
  `GorevID` int(11) NOT NULL,
  `AracID` int(11) NOT NULL,
  `SoforID` int(11) NOT NULL,
  `CTarih` varchar(30) COLLATE utf8_bin NOT NULL,
  `CSaat` varchar(30) COLLATE utf8_bin NOT NULL,
  `CKm` varchar(30) COLLATE utf8_bin NOT NULL,
  `DTarih` varchar(30) COLLATE utf8_bin NOT NULL,
  `DSaat` varchar(30) COLLATE utf8_bin NOT NULL,
  `DKm` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `tbl_gorev_arac`
--

INSERT INTO `tbl_gorev_arac` (`ID`, `GorevID`, `AracID`, `SoforID`, `CTarih`, `CSaat`, `CKm`, `DTarih`, `DSaat`, `DKm`) VALUES
(1, 7, 4, 99, '17/10/2018', '9:15', '12222', '17/10/2018', '12:15', '12333'),
(2, 8, 3, 11, '23/10/2018', '9:45', '12222', '23/10/2018', '15:45', '12333');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_gorev_person`
--

CREATE TABLE `tbl_gorev_person` (
  `ID` int(11) NOT NULL,
  `GorevID` int(11) DEFAULT NULL,
  `PersonID` int(11) DEFAULT NULL,
  `durum` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=FIXED;

--
-- Tablo döküm verisi `tbl_gorev_person`
--

INSERT INTO `tbl_gorev_person` (`ID`, `GorevID`, `PersonID`, `durum`) VALUES
(1, 1, 274, 1),
(2, 1, 333, 1),
(3, 1, 341, 1),
(4, 2, 66, 0),
(5, 2, 116, 0),
(6, 3, 82, 1),
(7, 3, 118, 1),
(8, 3, 176, 1),
(9, 4, 322, 1),
(10, 4, 98, 1),
(11, 5, 284, 1),
(12, 5, 287, 1),
(13, 5, 283, 1),
(14, 6, 296, 1),
(15, 6, 73, 1),
(16, 7, 99, 1),
(17, 7, 100, 1),
(18, 2, 116, 1),
(19, 2, 66, 1),
(20, 8, 11, 1),
(21, 8, 13, 1),
(22, 9, 333, 1),
(23, 11, 118, 1),
(24, 11, 170, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_ilce`
--

CREATE TABLE `tbl_ilce` (
  `ID` int(11) NOT NULL,
  `ilce` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `tbl_ilce`
--

INSERT INTO `tbl_ilce` (`ID`, `ilce`) VALUES
(1, 'AHIRLI'),
(2, 'AKÖREN'),
(3, 'AKŞEHİR'),
(4, 'ALTINEKİN'),
(5, 'BEYŞEHİR'),
(6, 'BOZKIR'),
(7, 'CİHANBEYLİ'),
(8, 'ÇELTİK'),
(9, 'ÇUMRA'),
(10, 'DERBENT'),
(11, 'DEREBUCAK'),
(12, 'DOĞANHİSAR'),
(13, 'EMİRGAZİ'),
(14, 'EREĞLİ'),
(15, 'GÜNEYSINIR'),
(16, 'HADİM'),
(17, 'HALKAPINAR'),
(18, 'HÜYÜK'),
(19, 'ILGIN'),
(20, 'KADINHANI'),
(21, 'KARAPINAR'),
(22, 'KARATAY'),
(23, 'KULU'),
(24, 'MERAM'),
(25, 'SARAYÖNÜ'),
(26, 'SELÇUKLU'),
(27, 'SEYDİŞEHİR'),
(28, 'TAŞKENT'),
(29, 'TUZLUKÇU'),
(30, 'YALIHÜYÜK'),
(31, 'YUNAK');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_kapsam`
--

CREATE TABLE `tbl_kapsam` (
  `ID` int(11) NOT NULL,
  `kapsam` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `durum` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `tbl_kapsam`
--

INSERT INTO `tbl_kapsam` (`ID`, `kapsam`, `durum`) VALUES
(1, '', NULL),
(2, 'Personel', NULL),
(3, 'Özel Araç', NULL),
(4, 'Diğer', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_log`
--

CREATE TABLE `tbl_log` (
  `ID` int(11) NOT NULL,
  `Log_islem` varchar(30) COLLATE utf8_bin NOT NULL,
  `Log_text` text COLLATE utf8_bin NOT NULL,
  `GuncelTarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `tbl_log`
--

INSERT INTO `tbl_log` (`ID`, `Log_islem`, `Log_text`, `GuncelTarih`) VALUES
(1, ' Kullanıcı Görev Onay İşlemi', 'Tablo : tbl_gorev ID : 3 /Gören Numarası 3', '2018-10-16 05:25:17'),
(2, ' Kullanıcı Görev Onay İşlemi', 'Tablo : tbl_gorev ID : 4 /Gören Numarası 4', '2018-10-16 05:27:32'),
(3, ' Kullanıcı Görev Onay İşlemi', 'Tablo : tbl_gorev ID : 5 /Gören Numarası 5', '2018-10-16 05:29:39'),
(4, ' Kullanıcı Görev Onay İşlemi', 'Tablo : tbl_gorev ID : 6 /Gören Numarası 6', '2018-10-16 05:31:18'),
(5, ' Kullanıcı Görev Onay İşlemi', 'Tablo : tbl_gorev ID : 7 /Gören Numarası 7', '2018-10-16 05:33:02'),
(6, 'Silme', 'Tablo :tbl_gorev_person ID : 66', '2018-10-16 05:49:11'),
(7, 'Silme', 'Tablo :tbl_gorev_person ID : 116', '2018-10-16 05:49:13'),
(8, ' Amir Onay İptal İşlemi', 'Tablo : tbl_gorev ID : 4 /Gören Numarası ', '2018-10-16 05:55:33'),
(9, ' Kullanıcı Görev Onay İşlemi', 'Tablo : tbl_gorev ID : 8 /Gören Numarası 8', '2018-10-16 07:33:59'),
(10, ' Kullanıcı Görev Onay İşlemi', 'Tablo : tbl_gorev ID : 9 /Gören Numarası 9', '2019-07-04 05:41:42'),
(11, ' Kullanıcı Görev Onay İşlemi', 'Tablo : tbl_gorev ID : 11 /Gören Numarası 11', '2020-05-26 15:23:01'),
(12, 'Düzeltme', '373 / Zafer Şafak GÜMÜŞ / Ayniyat Saymanı', '2020-05-26 15:25:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_personel`
--

CREATE TABLE `tbl_personel` (
  `ID` int(11) NOT NULL,
  `ad_soyad` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `unvan` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `subeID` int(11) DEFAULT NULL,
  `durum` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `tbl_personel`
--

INSERT INTO `tbl_personel` (`ID`, `ad_soyad`, `unvan`, `subeID`, `durum`) VALUES
(1, 'Abdulkadir ALTAŞ', 'Sürekli İşçi', 3, 1),
(2, 'Abdülkadir HOŞGÖR', 'Büro Personeli', 1, 1),
(3, 'Abdullah APİL', 'Veteriner Sağlık Teknisyeni', 2, 1),
(4, 'Abdullah ARSLAN', 'Mühendis', 4, 1),
(5, 'Abdullah ŞENTÜRK', 'Veteriner Sağlık Teknikeri', 2, 1),
(6, 'Abdurrahim ZENGİN', 'Sağlık Memuru', 1, 1),
(7, 'Adem ÇÖĞÜRCÜ', 'Veteriner Hekim', 2, 1),
(8, 'Adem DERE', 'Veteriner Sağlık Teknikeri', 2, 1),
(9, 'Adnan ÖZTÜRK', 'Veteriner Hekim', 2, 1),
(10, 'Ahmet Ali AKAN', 'Tekniker', 4, 1),
(11, 'Ahmet ALTUĞ', 'Mühendis', 4, 1),
(12, 'Ahmet ARSLANTAŞ', 'Sürekli İşçi', 1, 1),
(13, 'Ahmet BAŞLAK', 'Mühendis', 3, 1),
(14, 'Ahmet BAYRAK', 'Büro Personeli', 5, 1),
(15, 'Ahmet EVCİ', 'Veteriner Hekim', 2, 1),
(16, 'Ahmet GÜLEÇ', 'Mühendis', 5, 1),
(17, 'Ahmet Hakan KARABIYIK', 'Mühendis', 3, 1),
(18, 'Ahmet IŞIK', 'Veteriner Hekim', 5, 1),
(19, 'Ahmet KIRÇİCEK', 'Büro Personeli', 1, 1),
(20, 'Ahmet ÖZSARI', 'Tekniker', 6, 1),
(21, 'Ahmet PARLAYICI', 'Mühendis', 7, 1),
(22, 'Ahmet TETİK', 'Şube Müdürü', 9, 1),
(23, 'Ahmet YILDIRIMER', 'Mühendis', 9, 1),
(24, 'Alaettin EKİCİ', 'Tekniker', 3, 1),
(25, 'Ali ARICI', 'Büro Personeli', 12, 1),
(26, 'Ali ÇAKAL', 'Büro Personeli', 1, 1),
(27, 'Ali GÜLER', 'Veteriner Hekim', 2, 1),
(28, 'Ali İĞDELER', 'Büro Personeli', 2, 1),
(29, 'Ali İhsan YILDIRIM', 'Mühendis', 7, 1),
(30, 'Ali KICIK', 'Koruma ve Güvenlik Görevlisi', 1, 1),
(31, 'Ali KIŞ', 'Büro Personeli', 12, 1),
(32, 'Ali SARIGÜL', 'Veteriner Hekim', 2, 1),
(33, 'Ali Selçuk BİLİR', 'Tekniker', 1, 1),
(34, 'Ali UYSAL', 'Sağlık Memuru', 1, 1),
(35, 'Ali YAŞA', 'Veteriner Sağlık Teknisyeni', 2, 1),
(36, 'Ali YILMAZ', 'Şoför', 1, 1),
(37, 'Alime Ülkü ERMETİN', 'Mühendis', 7, 1),
(38, 'Arif EKEN', 'Şoför', 1, 1),
(39, 'Arzu Zeynep ÇALI', 'Memur', 12, 1),
(40, 'Atila TOKGÖZ', 'Veteriner Sağlık Teknisyeni', 2, 1),
(41, 'Avni KÖKDEN', 'Koruma ve Güvenlik Görevlisi', 1, 1),
(42, 'Ayhan GÖK', 'Veteriner Sağlık Teknisyeni', 1, 1),
(43, 'Ayhan ÖZDEN', 'Bilgisayar İşletmeni', 1, 1),
(44, 'Ayşe BOYDAŞ', 'Mühendis', 3, 1),
(45, 'Ayşe Hüma YAVUZ', 'Mühendis', 12, 1),
(46, 'Ayşe ŞAFAK', 'Mühendis', 3, 1),
(47, 'Ayşe USLUER', 'Mühendis', 4, 1),
(48, 'Ayşegül AKSOY', 'Mühendis', 3, 1),
(49, 'Bahadır CIRIK', 'Veteriner Sağlık Teknisyeni', 2, 1),
(50, 'Bahtiyar PARLADI', 'Memur', 1, 1),
(51, 'Bekir Fatih ÖZFAKİH', 'Mühendis', 3, 1),
(52, 'Bekir İLHAN', 'Sürekli İşçi', 6, 1),
(53, 'Bekir YAŞAR', 'Mühendis', 4, 1),
(54, 'Beran GEZGİN', 'Mühendis', 7, 1),
(55, 'Berna DAĞNİLAK', 'Mühendis', 5, 1),
(56, 'Beytullah ATEŞ', 'Sosyolog', 7, 1),
(57, 'Bilal BÜYÜKBARDAKÇI', 'Teknisyen', 1, 1),
(58, 'Bilal COŞKUN', 'Sağlık Teknikeri', 2, 1),
(59, 'Bilal GEDİK', 'Koruma ve Güvenlik Görevlisi', 1, 1),
(60, 'Bilal KALE', 'Şube Müdürü', 7, 1),
(61, 'Birgül YILMAZLAR ERDOĞAN', 'Mühendis', 9, 1),
(62, 'Bülent BAYRAM', 'Mühendis', 3, 1),
(63, 'Bülent Hamit DİLCİOĞLU', 'Mühendis', 4, 1),
(64, 'Burhan Candan YILMAN', 'Mühendis', 8, 1),
(65, 'Çağatay ÖZDİL', 'Tekniker', 8, 1),
(66, 'Cem AKSU', 'Veri Hazırlama ve Kontrol İşletmeni', 1, 1),
(67, 'Cem ÇETİN', 'Veteriner Hekim', 2, 1),
(68, 'Cemalettin KEÇECİ', 'Mühendis', 4, 1),
(69, 'Cengiz ELİÇABUK', 'Mühendis', 3, 1),
(70, 'Cengiz TANGUR', 'Sürekli İşçi', 1, 1),
(71, 'Çetin FIRTINA', 'Hizmetli', 1, 1),
(72, 'Davut KOPUTAN', 'Memur', 1, 1),
(73, 'Dilek TUNALI', 'Mühendis', 4, 1),
(74, 'Durmuş Ali ŞAHİN', 'Mühendis', 3, 1),
(75, 'Durmuş AVCI', 'İç Kontrol Sorumlusu', 12, 1),
(76, 'Durşen BULUT', 'Veteriner Hekim', 6, 1),
(77, 'Dursun YALÇIN', 'Şoför', 1, 1),
(78, 'Ebru ÇİÇEK', 'Mühendis', 12, 1),
(79, 'Ekrem HUĞLU', 'Mühendis', 5, 1),
(80, 'Emetullah Zehra İLHAN', 'Tekniker', 11, 1),
(81, 'Emin KARA', 'Büro Personeli', 1, 1),
(82, 'Emre ZEYBEK', 'Büro Personeli', 1, 1),
(83, 'Enver ERGİN', 'Sürekli İşçi', 1, 1),
(84, 'Enver GÜL', 'Memur', 4, 1),
(85, 'Enver KARADENİZ', 'Mühendis', 6, 1),
(86, 'Erdinç KAYA', 'Veri Hazırlama ve Kontrol İşletmeni', 9, 1),
(87, 'Erol NUR', 'Sürekli İşçi', 1, 1),
(88, 'Esin AYAZ', 'Tekniker', 5, 1),
(89, 'Fadime KANAÇ', 'Mühendis', 12, 1),
(90, 'Fahrettin KILIÇ', 'Mühendis', 1, 1),
(91, 'Fahrettin YİĞİT', 'Veteriner Sağlık Teknisyeni', 1, 1),
(92, 'Fahrettin Zeki GÜREL', 'Mühendis', 3, 1),
(93, 'Fahri ARDIÇ', 'Büro Personeli', 1, 1),
(94, 'Faruk GÜNDÜZ', 'Teknisyen', 3, 1),
(95, 'Faruk SEÇME', 'Mühendis', 3, 1),
(96, 'Fatih DEMİRCİ', 'Mühendis', 9, 1),
(97, 'Fatih KÖSE', 'Mühendis', 4, 1),
(98, 'Fatih NİZAMOĞLU', 'Büro Personeli', 12, 1),
(99, 'Fatma BOLAT', 'Mühendis', 3, 1),
(100, 'Fatma DEMET', 'Sosyolog', 7, 1),
(101, 'Fatma Gül ERDOĞAN', 'Mühendis', 3, 1),
(102, 'Fatma SAKA', 'Mühendis', 6, 1),
(103, 'Fatma TEKELİ', 'Mühendis', 7, 1),
(104, 'Fatma UYSAL', 'Mühendis', 4, 1),
(105, 'Fazlı ARITÜRK', 'Şube Müdürü', 3, 1),
(106, 'Fevzi TOSUN', 'İl Müdür Yardımcısı', 12, 1),
(107, 'Figen AYNACI', 'Mühendis', 5, 1),
(108, 'Fikret İSMETOĞLU', 'Mühendis', 4, 1),
(109, 'Gökhan DİNÇER', 'Veteriner Hekim', 2, 1),
(110, 'Gonca GÖRGÜLÜ', 'Mühendis', 6, 1),
(111, 'Gözde ÇAPAN', 'Tekniker', 1, 1),
(112, 'Gülderen TANRIVERDİ', 'Mühendis', 3, 1),
(113, 'Gümrahi GÜRBÜZ', 'Hizmetli', 4, 1),
(114, 'Gürcan GÜR', 'Tekniker', 11, 1),
(115, 'Habib GÖKMEN', 'Tekniker', 1, 1),
(116, 'Hacer TÜRKMEN', 'Memur', 1, 1),
(117, 'Hacı Mehmet ÇİNAR', 'Mühendis', 4, 1),
(118, 'Hakan BORAN', 'Büro Personeli', 1, 1),
(119, 'Hakan TÜFEKCİ', 'Mühendis', 3, 1),
(120, 'Hakan YILMAZ', 'Tekniker', 1, 1),
(121, 'Halil ERGEN', 'Veteriner Hekim', 2, 1),
(122, 'Halil İbrahim KURTGÖZ', 'Veteriner Sağlık Teknisyeni', 1, 1),
(123, 'Halil İbrahim TAŞKIRAN', 'Memur', 2, 1),
(124, 'Halil KALAYCI', 'Sürekli İşçi', 1, 1),
(125, 'Halil YUŞAN', 'Şoför', 1, 1),
(126, 'Halime ÖZALP', 'Mühendis', 2, 1),
(127, 'Halit UYSAL', 'Teknisyen', 9, 1),
(128, 'Halit YAZICI', 'Mühendis', 5, 1),
(129, 'Hamdi YILMAZ', 'Büro Personeli', 4, 1),
(130, 'Hanifi HANÇER', 'Mühendis', 4, 1),
(131, 'Hanifi KEÇECİ', 'Mühendis', 7, 1),
(132, 'Harun NAVRUZ', 'Daktilograf', 1, 1),
(133, 'Hasan DERE', 'Büro Personeli', 1, 1),
(134, 'Hasan EREN', 'Mühendis', 3, 1),
(135, 'Hasan ERİK', 'Tekniker', 2, 1),
(136, 'Hasan GÜRLER', 'Veri Hazırlama ve Kontrol İşletmeni', 12, 1),
(137, 'Hasan Hüseyin KÖKATAN', 'Koruma ve Güvenlik Görevlisi', 1, 1),
(138, 'Hasan İNAR', 'Veteriner Hekim', 2, 1),
(139, 'Hatice ÇAM', 'Veteriner Hekim', 2, 1),
(140, 'Havva KORKMAZ', 'Veteriner Hekim', 2, 1),
(141, 'Haydar KURT', 'Mühendis', 7, 1),
(142, 'Hicran ÇETİNKAYA', 'Avukat', 10, 1),
(143, 'Hikmet ERDEM', 'Tekniker', 4, 1),
(144, 'Hikmet KEÇECİ', 'Mühendis', 3, 1),
(145, 'Hülya UÇAR', 'Mühendis', 9, 1),
(146, 'Huriye KARAHAN ÖZDEMİR', 'Mühendis', 6, 1),
(147, 'Hüseyin DOĞANÇUKURU', 'Mühendis', 4, 1),
(148, 'Hüseyin KAPLAN', 'Mühendis', 6, 1),
(149, 'Hüseyin ÖZBAY', 'Hizmetli', 9, 1),
(150, 'Hüseyin ŞAFAK', 'Mühendis', 3, 1),
(151, 'Hüseyin Selami ÖZÇELİK', 'Mühendis', 1, 1),
(152, 'İbrahim AKÇAKAYA', 'Büro Personeli', 1, 1),
(153, 'İbrahim ATALAY', 'Hizmetli', 4, 1),
(154, 'İbrahim HARMANCI', 'Mühendis', 5, 1),
(155, 'İbrahim KARAGEDİK', 'Tekniker', 1, 1),
(156, 'İbrahim ÖLMEZ', 'Koruma ve Güvenlik Görevlisi', 1, 1),
(157, 'İbrahim SARIALTIN', 'Mühendis', 4, 1),
(158, 'İbrahim TEKER', 'Mühendis', 4, 1),
(159, 'İbrahim TÖKE', 'Mühendis', 4, 1),
(160, 'İdris AKHAN', 'Mühendis', 4, 1),
(161, 'İlhan AKGÜN', 'Veteriner Sağlık Teknisyeni', 2, 1),
(162, 'İmdat BOZKAYA', 'Mühendis', 3, 1),
(163, 'İmran KOÇ', 'Şef', 11, 1),
(164, 'İrfan ÇAM', 'Mühendis', 6, 1),
(165, 'İrfan YILMAZER', 'Veteriner Hekim', 5, 1),
(166, 'İrfan YURTDAKAL', 'Mühendis', 4, 1),
(167, 'İsa KAPLAN', 'Veteriner Hekim', 2, 1),
(168, 'İsa Onur ULUÇAY', 'Mühendis', 4, 1),
(169, 'İsa YAPAR', 'Sürekli İşçi', 1, 1),
(170, 'İsmail AKTÜRK', 'Büro Personeli', 10, 1),
(171, 'İsmail ATA', 'Tekniker', 6, 1),
(172, 'İsmail DAYANDI', 'Veteriner Hekim', 2, 1),
(173, 'İsmail ER', 'Tekniker', 4, 1),
(174, 'İsmail Hakkı AYDIN', 'Tekniker', 3, 1),
(175, 'İsmail TAŞTEKİN', 'Sürekli İşçi', 1, 1),
(176, 'İsmail YAZGAN', 'Personel Birim Sorumlusu', 1, 1),
(177, 'İsmehan AKDENİZ', 'Büro Personeli', 1, 1),
(178, 'İsmet DURMAZ', 'Mühendis', 3, 1),
(179, 'İsmet ERDEM', 'Mühendis', 6, 1),
(180, 'İzzet TANI', 'Memur', 12, 1),
(181, 'Kadir ALICI', 'Mühendis', 4, 1),
(182, 'Kadir DEMİR', 'Mühendis', 5, 1),
(183, 'Kadir SAKA', 'Memur', 12, 1),
(184, 'Kemal BEKMEZCİ', 'Veteriner Hekim', 5, 1),
(185, 'Kenan ERDOĞAN', 'Mühendis', 4, 1),
(186, 'Kerim MUZAÇ', 'Şube Müdürü', 6, 1),
(187, 'Levent DENİZ', 'Şoför', 1, 1),
(188, 'Leyla KOCAMAN', 'Veteriner Hekim', 2, 1),
(189, 'Lütfi KÜÇÜKKESKİN', 'Sürekli İşçi', 1, 1),
(190, 'Mahir KELEŞ', 'Mühendis', 4, 1),
(191, 'Mehmet AKKUŞ', 'Şube Müdürü', 1, 1),
(192, 'Mehmet ARIKAN', 'Veteriner Hekim', 2, 1),
(193, 'Mehmet Berat OFLAZ', 'Teknisyen', 11, 1),
(194, 'Mehmet ÇİFTKAT', 'Veteriner Sağlık Teknisyeni', 2, 1),
(195, 'Mehmet ÇINAR', 'Veteriner Sağlık Teknikeri', 1, 1),
(196, 'Mehmet CİVELEK', 'Tekniker', 3, 1),
(197, 'Mehmet DURMAZ', 'Şoför', 1, 1),
(198, 'Mehmet GÜLTEKİN', 'Veteriner Sağlık Teknikeri', 7, 1),
(199, 'Mehmet HARMANKAYA', 'Mühendis', 4, 1),
(200, 'Mehmet KAVAS', 'Sürekli İşçi', 2, 1),
(201, 'Mehmet KOÇ', 'Büro Personeli', 2, 1),
(202, 'Mehmet MAVİ', 'Sürekli İşçi', 4, 1),
(203, 'Mehmet ÖZKAYA', 'Büro Personeli', 1, 1),
(204, 'Mehmet PİRZADE', 'Mühendis', 9, 1),
(205, 'Mehmet Sadık OTURANÇ', 'Mühendis', 9, 1),
(206, 'Mehmet SARIŞAHİN', 'Sağlık Teknikeri', 7, 1),
(207, 'Mehmet Selim İĞNELİ', 'Şoför', 1, 1),
(208, 'Mehmet ŞENARSLAN', 'Veteriner Hekim', 2, 1),
(209, 'Mehmet Tevfik ÖZKILAVUZOĞLU', 'Araştırmacı', 1, 1),
(210, 'Mehmet TUĞAY', 'İl Müdür Yardımcısı', 12, 1),
(211, 'Mehmet TURAN', 'Veteriner Sağlık Teknisyeni', 2, 1),
(212, 'Mehmet TÜRKYILMAZ', 'Mühendis', 6, 1),
(213, 'Meltem ÇALIK SAĞLAM', 'Mühendis', 6, 1),
(214, 'Menşure EKİCİ', 'Mühendis', 4, 1),
(215, 'Meral YAKA', 'Mühendis', 5, 1),
(216, 'Mesut ACIBADEM', 'Veteriner Sağlık Teknikeri', 2, 1),
(217, 'Metin ÇAKMAK', 'Veri Hazırlama ve Kontrol İşletmeni', 10, 1),
(218, 'Metin YAYICI', 'Şoför', 1, 1),
(219, 'Mevlüt IŞIK', 'Mühendis', 1, 1),
(220, 'Mevlüt KARA', 'Mühendis', 4, 1),
(221, 'Mevlüt VANOĞLU', 'Mühendis', 7, 1),
(222, 'Mevlüt YAKIŞIR', 'Mühendis', 3, 1),
(223, 'Müge ÖNDER', 'Mühendis', 4, 1),
(224, 'Muhammed Ali UYSAL', 'Büro Personeli', 7, 1),
(225, 'Muhammet Emre ERDEM', 'Mühendis', 6, 1),
(226, 'Muhittin KOL', 'Teknisyen', 1, 1),
(227, 'Münir ÖZTÜRK', 'Mühendis', 7, 1),
(228, 'Murat AKDENİZ', 'Tekniker', 1, 1),
(229, 'Murat ALKAN', 'Mühendis', 3, 1),
(230, 'Murat EKİCİ', 'Mühendis', 4, 1),
(231, 'Murat ELİBOL', 'Mühendis', 4, 1),
(232, 'Murat GÜVEN', 'Veteriner Hekim', 2, 1),
(233, 'Murat HARMANKAYA', 'Mühendis', 6, 1),
(234, 'Murat KART', 'Mühendis', 4, 1),
(235, 'Murat KILIÇ', 'Teknisyen', 4, 1),
(236, 'Murat ŞEN', 'Mühendis', 4, 1),
(237, 'Musa GÜRBÜZ', 'Sürekli İşçi', 1, 1),
(238, 'Müslüm NALLI', 'Veteriner Hekim', 2, 1),
(239, 'Mustafa AKDAŞ', 'Mühendis', 7, 1),
(240, 'Mustafa Ali TUFAN', 'Koruma ve Güvenlik Görevlisi', 1, 1),
(241, 'Mustafa ÇALIŞKAN', 'Mühendis', 4, 1),
(242, 'Mustafa DİRİK', 'Veteriner Hekim', 2, 1),
(243, 'Mustafa GÜNEŞ', 'Büro Personeli', 1, 1),
(244, 'Mustafa GÜVENDİK', 'Veteriner Hekim', 2, 1),
(245, 'Mustafa İNCEKARA', 'Avukat', 10, 1),
(246, 'Mustafa IŞIK', 'Teknisyen', 3, 1),
(247, 'Mustafa Tuna DEMİR', 'Veteriner Sağlık Teknisyeni', 2, 1),
(248, 'Mustafa UYSAL', 'Mühendis', 4, 1),
(249, 'Mustafa Yavuz ÇOLAK', 'Veteriner Sağlık Teknisyeni', 7, 1),
(250, 'Mutlu SÖĞÜT', 'Veteriner Hekim', 5, 1),
(251, 'Muzaffer BERK', 'Memur', 12, 1),
(252, 'Nagihan KARASAKAL', 'Memur', 12, 1),
(253, 'Naim GÜRBÜZ', 'Veteriner Hekim', 2, 1),
(254, 'Nasıf TÜLEK', 'Koruma ve Güvenlik Görevlisi', 1, 1),
(255, 'Nazen ALTINTOP', 'Büro Personeli', 12, 1),
(256, 'Nazif CEYLAN', 'Tekniker', 1, 1),
(257, 'Nazife Çiğdem DİNÇER', 'Veteriner Hekim', 2, 1),
(258, 'Nazmiye SEVEN', 'Mühendis', 5, 1),
(259, 'Nebi GÖKÇAY', 'Sürekli İşçi', 5, 1),
(260, 'Necati DURAN', 'Veteriner Hekim', 6, 1),
(261, 'Necati ERDOĞDU', 'Koruma ve Güvenlik Görevlisi', 1, 1),
(262, 'Nedim ÜÇLER', 'Memur', 12, 1),
(263, 'Neşe BİLİCİ', 'Mühendis', 6, 1),
(264, 'Neşe SÜER', 'Mühendis', 5, 1),
(265, 'Neslihan ELBİ KAŞ', 'Şehir Plancısı', 3, 1),
(266, 'Neslihan ÖZALIR', 'Mühendis', 4, 1),
(267, 'Nilgün KIVRAK', 'Mühendis', 3, 1),
(268, 'Nilüfer COŞAR', 'Teknisyen', 11, 1),
(269, 'Nuran KARABULUT', 'Memur', 10, 1),
(270, 'Nurdan YÖRÜK YAPICI', 'Mühendis', 5, 1),
(271, 'Nuri ÖZKAN', 'Büro Personeli', 12, 1),
(272, 'Nuriye ERDİ', 'Mühendis', 4, 1),
(273, 'Nursen ÖZDEMİR', 'Mühendis', 5, 1),
(274, 'Nurullah DOĞAN', 'Büro Personeli', 1, 1),
(275, 'Oğuz ÖNAL', 'Memur', 5, 1),
(276, 'Oğuz ÖNAL', 'Mühendis', 5, 1),
(277, 'Ömer BACAK', 'Büro Personeli', 1, 1),
(278, 'Ömer DANACIOĞLU', 'Mühendis', 5, 1),
(279, 'Ömer ERDİ', 'Mühendis', 3, 1),
(280, 'Ömer KARA', 'Mühendis', 3, 1),
(281, 'Orhan ÇORUH', 'Mühendis', 4, 1),
(282, 'Orhan TAT', 'İl Müdür Yardımcısı', 12, 1),
(283, 'Osman BIÇAKCI', 'Büro Personeli', 12, 1),
(284, 'Osman BOYACI', 'İç Kontrol Sorumlusu', 12, 1),
(285, 'Osman IŞIK', 'Ekonomist', 6, 1),
(286, 'Osman KARACA', 'Mühendis', 4, 1),
(287, 'Osman PINARCI', 'Büro Personeli', 1, 1),
(288, 'Oya ATEŞ', 'Mühendis', 6, 1),
(289, 'Özgür SEZER', 'Mühendis', 4, 1),
(290, 'Rahime DEMİR', 'Avukat', 10, 1),
(291, 'Ramazan DİDİN', 'Şube Müdürü', 4, 1),
(292, 'Ramazan HELVACI', 'Koruma ve Güvenlik Görevlisi', 1, 1),
(293, 'Ramazan KARAKULAK', 'Koruma ve Güvenlik Görevlisi', 1, 1),
(294, 'Ramazan SOBAYOĞLU', 'Şube Müdürü', 5, 1),
(295, 'Ramazan TIMRAŞ', 'Sürekli İşçi', 1, 1),
(296, 'Raziye AYSAN', 'Büro Personeli', 12, 1),
(297, 'Recep GÜNDÜZ', 'Mühendis', 6, 1),
(298, 'Recep KULCU', 'Mühendis', 4, 1),
(299, 'Recep ÖZGÜL', 'Mühendis', 4, 1),
(300, 'Rifat ERDOĞAN', 'Büro Personeli', 1, 1),
(301, 'Rüveyda KARAAYHAN', 'Mühendis', 4, 1),
(302, 'Sabri YAĞLICI', 'Mühendis', 5, 1),
(303, 'Sadullah DEMİR', 'Şef', 1, 1),
(304, 'Şafak ATEŞ', 'Mühendis', 8, 1),
(305, 'Şahin KILIÇ', 'Tekniker', 1, 1),
(306, 'Şahin ÖZYÜREK', 'Mühendis', 7, 1),
(307, 'Şakir KAYA', 'Şoför', 1, 1),
(308, 'Salih ÖLMEZ', 'Mühendis', 5, 1),
(309, 'Salih ÖZER', 'Veteriner Hekim', 5, 1),
(310, 'Salih ŞAN', 'Tekniker', 8, 1),
(311, 'Salim AKCAN', 'Veteriner Sağlık Teknisyeni', 2, 1),
(312, 'Sami ÖZ', 'Mühendis', 6, 1),
(313, 'Saniye Kübra DEMİR', 'Veteriner Hekim', 7, 1),
(314, 'Saynur YAĞCI', 'Veteriner Hekim', 2, 1),
(315, 'Sebahattin SEZER', 'Mühendis', 3, 1),
(316, 'Sedat TÜFEK', 'Tekniker', 3, 1),
(317, 'Selahattin KÜTÜK', 'Sürekli İşçi', 1, 1),
(318, 'Selman KOYUNCU', 'Mühendis', 4, 1),
(319, 'Semiha PIRLAK', 'Mühendis', 7, 1),
(320, 'Şemseddin KILIÇ', 'Veteriner Hekim', 5, 1),
(321, 'Şenol AYDOĞMUŞ', 'Mühendis', 5, 1),
(322, 'Şenol TAŞBAŞI', 'Büro Personeli', 12, 1),
(323, 'Şerben KAYA', 'Mühendis', 6, 1),
(324, 'Serhan ATAM', 'Veteriner Hekim', 8, 1),
(325, 'Şerife Büşra TALO', 'Teknisyen', 6, 1),
(326, 'Şerife Nur OLGUN', 'Mühendis', 4, 1),
(327, 'Şerife UYANÖZ', 'Mühendis', 3, 1),
(328, 'Serkan GÖK', 'Mühendis', 4, 1),
(329, 'Serkan GÖK', 'Memur', 4, 1),
(330, 'Sevim KÜPELİ', 'Sürekli İşçi', 2, 1),
(331, 'Seyfettin BAYDAR', 'İl Müdürü', 12, 1),
(332, 'Seyfullah ERİŞ', 'Koruma ve Güvenlik Görevlisi', 1, 1),
(333, 'Seyit Akif AKDENİZ', 'Büro Personeli', 1, 1),
(334, 'Şeyma BAŞAR', 'Mühendis', 7, 1),
(335, 'Siyaser ALATAŞ', 'Mühendis', 3, 1),
(336, 'Suat KÖKSOY', 'Mühendis', 4, 1),
(337, 'Süheyla KARA', 'Mühendis', 3, 1),
(338, 'Şule KILINÇ', 'Mühendis', 5, 1),
(339, 'Süleyman AKKAYA', 'Mühendis', 3, 1),
(340, 'Süleyman ARSLAN', 'Mühendis', 3, 1),
(341, 'Süleyman GÖZEL', 'Büro Personeli', 1, 1),
(342, 'Süleyman KUYUCUOĞLU', 'Mühendis', 3, 1),
(343, 'Süleyman ÖZCAN', 'Şube Müdürü', 2, 1),
(344, 'Süleyman ÖZCAN', 'Şube Müdürü', 2, 1),
(345, 'Süleyman Sırrı ERDOĞAN', 'Mühendis', 3, 1),
(346, 'Tahir Cemil EFE', 'Mühendis', 5, 1),
(347, 'Tahsin YONCALIK', 'Teknisyen', 1, 1),
(348, 'Tufan KAYA', 'Mühendis', 9, 1),
(349, 'Tuncay BOYDAŞ', 'Mühendis', 4, 1),
(350, 'Ufuk YAYLA', 'Mühendis', 7, 1),
(351, 'Uğur AVLAY', 'Mühendis', 8, 1),
(352, 'Ülkü GÜNHAN', 'Veteriner Hekim', 7, 1),
(353, 'Üzeyir ARIK', 'Mühendis', 4, 1),
(354, 'Üzeyir TOMBUL', 'Mühendis', 4, 1),
(355, 'Veysel KARAHAN', 'Bilgisayar İşletmeni', 12, 1),
(356, 'Veysel KARAYEL', 'Koruma ve Güvenlik Görevlisi', 1, 1),
(357, 'Veysel KÜÇÜKKILIÇ', 'Mühendis', 7, 1),
(358, 'Vildan TOKGÖZ', 'Teknisyen', 9, 1),
(359, 'Yakup SEZGİN', 'Mühendis', 3, 1),
(360, 'Yalçın FAKI', 'Veteriner Hekim', 2, 1),
(361, 'Yaprak BAHAR', 'Avukat', 10, 1),
(362, 'Yasemin AKDENİZ KIZILTAŞ', 'Sosyolog', 7, 1),
(363, 'Yasemin DEVECİ', 'Veteriner Hekim', 2, 1),
(364, 'Yasemin ERASLAN', 'Tekniker', 6, 1),
(365, 'Yavuz BALLI', 'Memur', 9, 1),
(366, 'Yavuz BALLI', 'Mühendis', 9, 1),
(367, 'Yücel DOĞAN', 'Şube Müdürü', 8, 1),
(368, 'Yücel DOĞAN', 'Şube Müdürü', 8, 1),
(369, 'Yüksel ALP', 'Veri Hazırlama ve Kontrol İşletmeni', 1, 1),
(370, 'Yusuf AYDIN', 'Mühendis', 4, 1),
(371, 'Yusuf SÜTCÜ', 'Memur', 12, 1),
(372, 'Zafer AKKUŞ', 'Mühendis', 6, 1),
(373, 'Zafer Şafak GÜMÜŞ', 'Ayniyat Saymanı', 11, 1),
(374, 'Zeki ÇOŞKUN', 'Sağlık Memuru', 5, 1),
(375, 'Zeynep AKTER', 'Büro Personeli', 6, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_sevk`
--

CREATE TABLE `tbl_sevk` (
  `ID` int(11) NOT NULL,
  `ad_soyad` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `unvan` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `durum` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `tbl_sevk`
--

INSERT INTO `tbl_sevk` (`ID`, `ad_soyad`, `unvan`, `durum`) VALUES
(1, 'Mehmet AKKUŞ', 'Şube Müdürü', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_sofor`
--

CREATE TABLE `tbl_sofor` (
  `ID` int(11) NOT NULL,
  `ad_soyad` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `unvan` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `durum` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `tbl_sofor`
--

INSERT INTO `tbl_sofor` (`ID`, `ad_soyad`, `unvan`, `durum`) VALUES
(1, 'Sof', 'Ara', 0),
(2, 'Şoförsüz', 'Ara', 1),
(3, 'Dursun YALÇIN', 'Şoför', 1),
(4, 'Halil YUŞAN', 'Şoför', 1),
(5, 'Levent DENİZ', 'Şoför', 1),
(6, 'Mehmet Selim İĞNELİ', 'Şoför', 1),
(7, 'Şakir KAYA', 'Şoför', 1),
(8, 'İsmail AKTÜRK', 'İşçi', 1),
(9, 'Abdulkadir HOŞGÖR', 'İşçi', 1),
(10, 'Ali YILMAZ', 'İşçi', 1),
(11, 'Arif ERKEN', 'İşçi', 1),
(12, 'Durmuş UĞUZ', 'İşçi', 1),
(13, 'Hasan DERE', 'İşçi', 1),
(14, 'Mehmet DURMAZ', 'İşçi', 1),
(15, 'Mehmet DURMAZ', 'İşçi', 1),
(16, 'Metin YAYICI', 'İşçi', 1),
(17, 'Rıfat ERDOĞAN', 'İşçi', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_sube`
--

CREATE TABLE `tbl_sube` (
  `ID` int(11) NOT NULL,
  `sube` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `durum` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `tbl_sube`
--

INSERT INTO `tbl_sube` (`ID`, `sube`, `durum`) VALUES
(1, 'İdari ve Mali İşler Şube Müdürlüğü', 1),
(2, 'Hayvan Sağlığı ve Yetiştiriciliği Şube Müdürlüğü', 1),
(3, 'Arazi Toplulaştırma ve Tarımsal Altyapı Şube Müdürlüğü', 1),
(4, 'Bitkisel Üretim ve Bitki Sağlığı Şube Müdürlüğü', 1),
(5, 'Gıda ve Yem Şube Müdürlüğü', 1),
(6, 'Kırsal Kalkınma ve Örgütlenme Şube Müdürlüğü', 1),
(7, 'Koordinasyon ve Tarımsal Veriler Şube Müdürlüğü', 1),
(8, 'Balıkçılık ve Su Ürünleri Şube Müdürlüğü', 1),
(9, 'Çayır, Mera ve Yem Bitkileri Şube Müdürlüğü', 1),
(10, 'Hukuk Birimi', 1),
(11, 'Döner Sermaye Birimi', 1),
(12, 'Konya İl Tarım ve Orman Müdürlüğü', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_users`
--

CREATE TABLE `tbl_users` (
  `ID` int(11) NOT NULL,
  `YetkiID` int(11) NOT NULL,
  `User` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `Pass` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `AdSoyad` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `Sube` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `tbl_users`
--

INSERT INTO `tbl_users` (`ID`, `YetkiID`, `User`, `Pass`, `AdSoyad`, `Sube`) VALUES
(1, 1, 'AkifSa', '6188629', 'S. Akif AKDENİZ', 0),
(2, 2, 'Sevk', '123', 'Sevk Soyadı', 0),
(4, 3, 'Amir9', '123', 'Amir Soyadı', 9),
(5, 4, 'Mod', '123', 'Selçuk BİLİR', 0),
(6, 5, 'Kalem4', '123', 'BitkiKoruma Soyadı', 4),
(7, 5, 'Kalem2', '123', 'Arazi Kalem', 2),
(8, 5, 'Kalem9', '123', 'Kalem9 Sube', 9),
(9, 5, 'Kalem11', '123', 'Kalem11 Sube', 11),
(10, 3, 'Amir4', '123', 'Amir Soyadı', 4);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tbl_amir`
--
ALTER TABLE `tbl_amir`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Tablo için indeksler `tbl_arac`
--
ALTER TABLE `tbl_arac`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Tablo için indeksler `tbl_arac_liste`
--
ALTER TABLE `tbl_arac_liste`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Tablo için indeksler `tbl_gorev`
--
ALTER TABLE `tbl_gorev`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Tablo için indeksler `tbl_gorev_arac`
--
ALTER TABLE `tbl_gorev_arac`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tbl_gorev_person`
--
ALTER TABLE `tbl_gorev_person`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Tablo için indeksler `tbl_ilce`
--
ALTER TABLE `tbl_ilce`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Tablo için indeksler `tbl_kapsam`
--
ALTER TABLE `tbl_kapsam`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Tablo için indeksler `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Tablo için indeksler `tbl_personel`
--
ALTER TABLE `tbl_personel`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tbl_sevk`
--
ALTER TABLE `tbl_sevk`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Tablo için indeksler `tbl_sofor`
--
ALTER TABLE `tbl_sofor`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Tablo için indeksler `tbl_sube`
--
ALTER TABLE `tbl_sube`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Tablo için indeksler `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tbl_amir`
--
ALTER TABLE `tbl_amir`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_arac`
--
ALTER TABLE `tbl_arac`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_arac_liste`
--
ALTER TABLE `tbl_arac_liste`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_gorev`
--
ALTER TABLE `tbl_gorev`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_gorev_arac`
--
ALTER TABLE `tbl_gorev_arac`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_gorev_person`
--
ALTER TABLE `tbl_gorev_person`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_ilce`
--
ALTER TABLE `tbl_ilce`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_kapsam`
--
ALTER TABLE `tbl_kapsam`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_personel`
--
ALTER TABLE `tbl_personel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_sevk`
--
ALTER TABLE `tbl_sevk`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_sofor`
--
ALTER TABLE `tbl_sofor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_sube`
--
ALTER TABLE `tbl_sube`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
