-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 Nis 2023, 21:03:26
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `konser`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dynamic_contents`
--

CREATE TABLE `dynamic_contents` (
  `id` int(11) NOT NULL,
  `flag_type` varchar(30) DEFAULT NULL,
  `flag_name` varchar(50) DEFAULT NULL,
  `flag_value` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `dynamic_contents`
--

INSERT INTO `dynamic_contents` (`id`, `flag_type`, `flag_name`, `flag_value`, `created_at`, `updated_at`) VALUES
(1, 'countdown', 'show_countdown', '1', NULL, NULL),
(2, 'countdown', 'start_datetime', '2020-06-30 00:00:00', NULL, NULL),
(3, 'countdown', 'end_datetime', '2021-12-31 23:59:59', NULL, NULL),
(4, 'countdown', 'expired_text', 'Konsere Kalan Süre', NULL, NULL),
(5, 'homepage', 'home_subtitle', 'Kırşehir Duman Konseri', NULL, NULL),
(6, 'homepage', 'home_title', 'DUMAN SEVENLERİYLE BULUŞUYOR', NULL, NULL),
(7, 'homepage', 'text_logo', 'Crad.', NULL, NULL),
(8, 'homepage', 'enable_text_logo', '0', NULL, NULL),
(9, 'homepage', 'show_logo_image', '1', NULL, NULL),
(10, 'homepage', 'logo_image', 'logo_image.jpg', NULL, NULL),
(11, 'homepage', 'show_logo_favicon', '1', NULL, NULL),
(13, 'callus', 'show_callus', '1', NULL, NULL),
(14, 'callus', 'display_text', 'Bize Ulaşın', NULL, NULL),
(15, 'callus', 'phone_number', '+90 543 173 80 34', NULL, NULL),
(41, 'aboutpage', 'show_aboutpage', '1', NULL, NULL),
(42, 'aboutpage', 'about_subtitle', 'Duman', NULL, NULL),
(43, 'aboutpage', 'about_title', 'DUMAN KONSERİ', NULL, NULL),
(44, 'aboutpage', 'about_content', '<p>1999 yılında İstanbul\'da kurulan ve aynı yıl yayımlanan \"Eski Köprünün Altında\" albümüyle hızlı bir başlangıç yapan Türk Rock grubu Duman; \"Köprüaltı\", \"Hayatı Yaşa\", \" Yalnızlık Paylaşılmaz\" gibi şarkılarıyla müzik listelerinde üst sıralarda yerini aldı. Müzik piyasasında iz bırakan şarkılarla konserlerine devam eden Duman; unutulmaz bir konser için sizleri bekliyor. \r\n.</blockquote>', NULL, NULL),
(45, 'aboutpage', 'show_about_button_1', '0', NULL, NULL),
(46, 'aboutpage', 'about_button_1_txt', 'Download', NULL, NULL),
(47, 'aboutpage', 'show_about_button_2', '0', NULL, NULL),
(48, 'aboutpage', 'about_button_2_txt', 'Email Us', NULL, NULL),
(49, 'aboutpage', 'about_button_2_link', 'mailto:info@domain.com', NULL, NULL),
(50, 'aboutpage', 'about_img_1', 'about_img_1.jpg', NULL, NULL),
(51, 'aboutpage', 'about_img_2', 'about_img_2.jpeg', NULL, NULL),
(52, 'aboutpage', 'about_img_3', 'about_img_3.jpeg', NULL, NULL),
(53, 'aboutpage', 'about_img_4', 'about_img_4.jpeg', NULL, NULL),
(54, 'aboutpage', 'about_img_1', 'about_img_1.jpg', NULL, NULL),
(55, 'aboutpage', 'about_img_2', 'about_img_2.jpeg', NULL, NULL),
(56, 'aboutpage', 'about_img_3', 'about_img_3.jpeg', NULL, NULL),
(57, 'aboutpage', 'about_img_4', 'about_img_4.jpeg', NULL, NULL),
(58, 'aboutpage', 'show_about_images', '1', NULL, NULL),
(59, 'contactpage', 'show_contactpage', '1', NULL, NULL),
(60, 'contactpage', 'contact_subtitle', 'Duman', NULL, NULL),
(61, 'contactpage', 'contact_title', 'Lütfen Bizimle İletişime Geçin', NULL, NULL),
(62, 'contactpage', 'fullname_field_txt', 'Adınız', NULL, NULL),
(63, 'contactpage', 'phone_field_txt', 'Telefon Numaranız', NULL, NULL),
(64, 'contactpage', 'email_field_txt', 'E-Mailiniz', NULL, NULL),
(65, 'contactpage', 'msg_field_txt', 'Mesajınız', NULL, NULL),
(66, 'contactpage', 'send_btn_txt', 'Gönder', NULL, NULL),
(67, 'contactpage', 'contact_success_msg', 'Mesajınız Bize İletilmiştir.', NULL, NULL),
(68, 'contactpage', 'contact_error_msg', 'Üzgünüm.Bir Şeyler Ters Gitti Tekrar Dener Misin?', NULL, NULL),
(70, 'design_templates', 'dt_home_style', '', NULL, NULL),
(71, 'design_templates', 'dt_default_background_img', 'default_background_img.jpg', NULL, NULL),
(72, 'design_templates', 'dt_backgrownd_style', 'particles-style-2', NULL, NULL),
(73, 'design_templates', 'yt_link', 'https://www.youtube.com/watch?v=gYO1uk7vIcc', NULL, NULL),
(74, 'design_templates', 'yt_auto_play', 'true', NULL, NULL),
(75, 'design_templates', 'yt_loop', 'true', NULL, NULL),
(76, 'design_templates', 'yt_mute', 'true', NULL, NULL),
(77, 'design_templates', 'dt_default_background', 'bg-img', NULL, NULL),
(78, 'design_templates', 'dt_default_background_color', '#224275', NULL, NULL),
(79, 'subscribers', 'show_subscriber', '1', NULL, NULL),
(80, 'subscribers', 'subs_btn_txt', 'Abone Olun!', NULL, NULL),
(81, 'subscribers', 'subs_placeholder_txt', 'abone@hotmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`) VALUES
(1, '7110emir@gmail.com', '2023-04-22 20:07:27'),
(2, '111admin@hotmail.com', '2023-04-22 20:47:53'),
(3, 'admin@hotmail.com', '2023-04-22 20:48:04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@app.com', 'password', NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `dynamic_contents`
--
ALTER TABLE `dynamic_contents`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id` (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `dynamic_contents`
--
ALTER TABLE `dynamic_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Tablo için AUTO_INCREMENT değeri `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
