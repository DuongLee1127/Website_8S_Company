-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Dec 18, 2024 at 11:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ico_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `lien_he`
--

CREATE TABLE `lien_he` (
  `Ten` varchar(200) NOT NULL,
  `SDT` varchar(200) NOT NULL,
  `Diachi` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `FB` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ql_baner`
--

CREATE TABLE `ql_baner` (
  `baner` longtext NOT NULL,
  `pl` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_baner`
--

INSERT INTO `ql_baner` (`baner`, `pl`, `id`) VALUES
('http://hanquoc.icogroup.vn/images/user/12145/xuntitleda1.png.pagespeed.ic.i903nkSIt4.webp', 'dhhq', 1),
('http://nhatban.icogroup.vn/images/user/12145/xz3426560416455a67a041962baf4d39bfee5343a80e66df.jpg.pagespeed.ic.60RbgPG109.webp', 'dhnb', 2),
('https://duhocducico.edu.vn/wp-content/uploads/2023/04/Blue-Modern-Travel-Banner-1.png', 'dhduc', 3),
('https://ohataiwan.com/wp-content/uploads/2020/12/Du-hoc-Dai-Loan-he-vua-hoc-vua-lam-co-con-duoc-ua-chuong.jpg', 'dhdl', 4),
('https://duhocucico.edu.vn/wp-content/uploads/2024/06/duhocuc.png', 'dhuc', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ql_khoahoc`
--

CREATE TABLE `ql_khoahoc` (
  `id` int(255) NOT NULL,
  `img` longtext NOT NULL,
  `ten_lop` varchar(255) NOT NULL,
  `lich_hoc` varchar(255) NOT NULL,
  `gio_hoc` varchar(255) NOT NULL,
  `khu_vuc` varchar(2000) NOT NULL,
  `chi_nhanh` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_khoahoc`
--

INSERT INTO `ql_khoahoc` (`id`, `img`, `ten_lop`, `lich_hoc`, `gio_hoc`, `khu_vuc`, `chi_nhanh`) VALUES
(1, '..', 'ghgnb', 'sdsg', 'ẻtrry', 'ggnbf', 'vnb'),
(2, 'https://nhatban24h.vn/public/media/images/tu-van-xuat-khau-lao-dong-nhat-ban.jpg', 'dfghjkl', 'dfghjk', 'dfghkj', 'dfghjk', 'dfghjk');

-- --------------------------------------------------------

--
-- Table structure for table `ql_noidung`
--

CREATE TABLE `ql_noidung` (
  `img` longtext NOT NULL,
  `noi_dung` text NOT NULL,
  `id` int(255) NOT NULL,
  `tieu_de` varchar(2000) NOT NULL,
  `pl` varchar(50) NOT NULL,
  `font-styleP` varchar(50) NOT NULL,
  `marginP` varchar(50) NOT NULL,
  `sizei` int(11) NOT NULL,
  `margini` varchar(50) NOT NULL,
  `note` longtext NOT NULL,
  `useredit` longtext NOT NULL,
  `baner` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `ql_noidung`
--

INSERT INTO `ql_noidung` (`img`, `noi_dung`, `id`, `tieu_de`, `pl`, `font-styleP`, `marginP`, `sizei`, `margini`, `note`, `useredit`, `baner`) VALUES
('https://th.bing.com/th/id/OIP.BO1KBgqC0LARa7_JO5aQMQHaEK?rs=1&pid=ImgDetMain', 'àasfsafdsfdsfsdf fsdfsdf dsfsdf s dfs dfsd sdf sdfsd fsd fsd fsd fs dfs dfsdfsd fs dfsd fsdf s\r\n\r\nfkdjskjfkjkas\r\ntryedtyhgjfhjhjk\r\njasdkjfsdjjfkdjkajfkjdkjfsdf ládkfja sdfjaskdfalkdsflj alskd fasjdkfj ádjf adj fa dfkajdkf àd lakd fkaj dkfj aldfjlakjdf ádj fkd sflkasdj lfja sdkfjklafsjdlk', 42, 'sadfsdfyufyufhj', 'xkldnhat', 'false|false|false|time new roman||14', '0px 0px 0px 0px', 100, '', '', 'Người sửa: <strong>admin</strong> - Time: 2024-12-18 10:35:40', ''),
('https://icoeuro.vn/vnt_upload/news/04_2024/image.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis sed quod unde cumque animi ipsa eum pariatur rem? Ab molestiae fugit, nam dolore, nihil ipsam eius error veniam minus corporis reiciendis distinctio id consequuntur porro harum soluta architecto possimus? Perferendis, aperiam dolorem at eos similique, iusto exercitationem obcaecati minus quae corrupti excepturi? Adipisci illo totam cum odit odio, distinctio modi, porro dignissimos nihil esse nisi dolore quaerat sapiente. Cupiditate, porro? Iure dicta officiis tenetur, perspiciatis delectus doloribus tempora quibusdam officia, repudiandae explicabo laboriosam? Sed consequuntur temporibus exercitationem facilis ullam excepturi rem, nam quasi recusandae eveniet amet. Facilis eos culpa tempora. In saepe voluptas, cumque mollitia eligendi quis rerum animi non eveniet magni? Iure, suscipit reprehenderit voluptas maxime modi similique praesentium ullam deserunt velit, dignissimos dolor qui soluta iusto tempore dolorem ipsa consectetur sed at ad eaque assumenda nisi veniam mollitia? Sequi repellendus earum modi quae nemo voluptate quam cumque, facilis cupiditate tempore, accusantium similique repellat facere vel eos? Autem debitis, ut sapiente nesciunt commodi odit est pariatur nihil laudantium eaque voluptatem. Expedita quibusdam optio explicabo ea earum atque quae quidem dolorum nam voluptates asperiores modi assumenda nihil fuga, reiciendis error numquam repudiandae eveniet placeat? Omnis facilis voluptates ad assumenda non velit reprehenderit, quibusdam sed corrupti laudantium fuga, nisi ipsum iste in repellendus incidunt nemo eligendi optio deleniti reiciendis. Impedit est ullam nisi repellendus sit ex accusamus incidunt. Laudantium dolorum dolore rerum iste! Repudiandae, deleniti! Perferendis, ea. Saepe animi reprehenderit molestias! Ipsum odio consectetur porro consequuntur commodi distinctio nesciunt corrupti ducimus dolorum id voluptatibus, ut non impedit, iste temporibus quaerat itaque ipsa nobis, placeat nam! Corrupti, ab iusto magni maxime quam vitae cupiditate minima. Deleniti eaque esse error, reprehenderit asperiores vitae soluta. Unde ab autem, culpa eaque expedita voluptate exercitationem adipisci nam magni aliquid harum fugit nobis qui perspiciatis animi laboriosam.', 44, 'tôi yêu ai chứ không yêu em', 'dhduc', 'true|false|false|calibri|clep|20', '10px 20px 2px 50px', 95, 'centeri', 'Người tạo: <strong>duong</strong> - Time: 2024-12-16 11:19:44', 'Người sửa: <strong>admin</strong> - Time: 2024-12-18 11:03:05', ''),
('', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis sed quod unde cumque animi ipsa eum pariatur rem? Ab molestiae fugit, nam dolore, nihil ipsam eius error veniam minus corporis reiciendis distinctio id consequuntur porro harum soluta architecto possimus? Perferendis, aperiam dolorem at eos similique, iusto exercitationem obcaecati minus quae corrupti excepturi? Adipisci illo totam cum odit odio, distinctio modi, porro dignissimos nihil esse nisi dolore quaerat sapiente. Cupiditate, porro? Iure dicta officiis tenetur, perspiciatis delectus doloribus tempora quibusdam officia, repudiandae explicabo laboriosam? Sed consequuntur temporibus exercitationem facilis ullam excepturi rem, nam quasi recusandae eveniet amet. Facilis eos culpa tempora. In saepe voluptas, cumque mollitia eligendi quis rerum animi non eveniet magni? Iure, suscipit reprehenderit voluptas maxime modi similique praesentium ullam deserunt velit, dignissimos dolor qui soluta iusto tempore dolorem ipsa consectetur sed at ad eaque assumenda nisi veniam mollitia? Sequi repellendus earum modi quae nemo voluptate quam cumque, facilis cupiditate tempore, accusantium similique repellat facere vel eos? Autem debitis, ut sapiente nesciunt commodi odit est pariatur nihil laudantium eaque voluptatem. Expedita quibusdam optio explicabo ea earum atque quae quidem dolorum nam voluptates asperiores modi assumenda nihil fuga, reiciendis error numquam repudiandae eveniet placeat? Omnis facilis voluptates ad assumenda non velit reprehenderit, quibusdam sed corrupti laudantium fuga, nisi ipsum iste in repellendus incidunt nemo eligendi optio deleniti reiciendis. Impedit est ullam nisi repellendus sit ex accusamus incidunt. Laudantium dolorum dolore rerum iste! Repudiandae, deleniti! Perferendis, ea. Saepe animi reprehenderit molestias! Ipsum odio consectetur porro consequuntur commodi distinctio nesciunt corrupti ducimus dolorum id voluptatibus, ut non impedit, iste temporibus quaerat itaque ipsa nobis, placeat nam! Corrupti, ab iusto magni maxime quam vitae cupiditate minima. Deleniti eaque esse error, reprehenderit asperiores vitae soluta. Unde ab autem, culpa eaque expedita voluptate exercitationem adipisci nam magni aliquid harum fugit nobis qui perspiciatis animi laboriosam.', 45, 'tôi yêu em', 'dhduc', 'false|false|false|arial|clep|12', 'px px px px', 100, '', 'Người tạo: <strong>duong</strong> - Time: 2024-12-16 11:20:57', 'Người sửa: <strong>admin</strong> - Time: 2024-12-18 10:53:54', ''),
('https://icoeuro.vn/vnt_upload/news/04_2024/image.png', '\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis sed quod unde cumque animi ipsa eum pariatur rem? Ab molestiae fugit, nam dolore, nihil ipsam eius error veniam minus corporis reiciendis distinctio id consequuntur porro harum soluta architecto possimus? Perferendis, aperiam dolorem at eos similique, iusto exercitationem obcaecati minus quae corrupti excepturi? Adipisci illo totam cum odit odio, distinctio modi, porro dignissimos nihil esse nisi dolore quaerat sapiente. Cupiditate, porro? Iure dicta officiis tenetur, perspiciatis delectus doloribus tempora quibusdam officia, repudiandae explicabo laboriosam? Sed consequuntur temporibus exercitationem facilis ullam excepturi rem, nam quasi recusandae eveniet amet. Facilis eos culpa tempora. In saepe voluptas, cumque mollitia eligendi quis rerum animi non eveniet magni? Iure, suscipit reprehenderit voluptas maxime modi similique praesentium ullam deserunt velit, dignissimos dolor qui soluta iusto tempore dolorem ipsa consectetur sed at ad eaque assumenda nisi veniam mollitia? Sequi repellendus earum modi quae nemo voluptate quam cumque, facilis cupiditate tempore, accusantium similique repellat facere vel eos? Autem debitis, ut sapiente nesciunt commodi odit est pariatur nihil laudantium eaque voluptatem. Expedita quibusdam optio explicabo ea earum atque quae quidem dolorum nam voluptates asperiores modi assumenda nihil fuga, reiciendis error numquam repudiandae eveniet placeat? Omnis facilis voluptates ad assumenda non velit reprehenderit, quibusdam sed corrupti laudantium fuga, nisi ipsum iste in repellendus incidunt nemo eligendi optio deleniti reiciendis. Impedit est ullam nisi repellendus sit ex accusamus incidunt. Laudantium dolorum dolore rerum iste! Repudiandae, deleniti! Perferendis, ea. Saepe animi reprehenderit molestias! Ipsum odio consectetur porro consequuntur commodi distinctio nesciunt corrupti ducimus dolorum id voluptatibus, ut non impedit, iste temporibus quaerat itaque ipsa nobis, placeat nam! Corrupti, ab iusto magni maxime quam vitae cupiditate minima. Deleniti eaque esse error, reprehenderit asperiores vitae soluta. Unde ab autem, culpa eaque expedita voluptate exercitationem adipisci nam magni aliquid harum fugit nobis qui perspiciatis animi laboriosam.', 46, 'tôi yêu em', 'xkldnhat', 'true|true|false|arial|clep|23', '0px 0px 0px 0px', 100, '', 'Người tạo: <strong>duong</strong> - Time: 2024-12-16 11:22:01', '', ''),
('https://photo2.tinhte.vn/data/attachment-files/2016/10/3893837_1_1.jpg', 'ádasdasd', 47, 'ádasdasdasdasdas', 'dhduc', 'true|false|false|time new roman|clep|14', '0px 0px 0px 59px', 95, '', 'Người tạo: <strong>duong</strong> - Time: 2024-12-18 02:54:50', 'Người sửa: <strong>admin</strong> - Time: 2024-12-18 10:14:02', ''),
('https://lh3.googleusercontent.com/pw/AP1GczO0COVv0w4oluNgGhG0cgOqRw66lZs3FXCorPKjayQm-p4hEmJyWIjMjla3Fup_XuPbzYMhgzvtt--Vqtpcyx4UmJiqZhxTIFT-MfvxPx9qDmnrIWIFeIF2CANY46R3S9sxwxoHbBFGH-C8zB2rlIEx=w919-h', 'https://lh3.googleusercontent.com/pw/AP1GczO0COVv0w4oluNgGhG0cgOqRw66lZs3FXCorPKjayQm-p4hEmJyWIjMjla3Fup_XuPbzYMhgzvtt--Vqtpcyx4UmJiqZhxTIFT-MfvxPx9qDmnrIWIFeIF2CANY46R3S9sxwxoHbBFGH-C8zB2rlIEx=w919-h919-s-no-gm?authuser=0', 48, 'sadfsd', 'dhduc', 'false|false|false|time new roman||14', '0px 0px 0px 0px', 100, '', 'Người tạo: <strong>admin</strong> - Time: 2024-12-18 03:41:10', '', ''),
('https://lh3.googleusercontent.com/pw/AP1GczO0COVv0w4oluNgGhG0cgOqRw66lZs3FXCorPKjayQm-p4hEmJyWIjMjla3Fup_XuPbzYMhgzvtt--Vqtpcyx4UmJiqZhxTIFT-MfvxPx9qDmnrIWIFeIF2CANY46R3S9sxwxoHbBFGH-C8zB2rlIEx=w919-h', 'iojijj', 49, 'sadfsd', 'dhduc', 'true|false|false|time new roman|leftp|21', '60px 0px 0px 50px', 95, '', 'Người tạo: <strong>admin</strong> - Time: 2024-12-18 03:42:32', 'Người sửa: <strong>admin</strong> - Time: 2024-12-18 11:03:41', ''),
('', 'asdasd', 50, '', 'dhduc', 'false|false|false|time new roman||14', '0px 0px 0px 0px', 100, '', 'Người tạo: <strong>admin</strong> - Time: 2024-12-18 07:56:17', 'Người sửa: <strong>admin</strong> - Time: 2024-12-18 09:17:34', ''),
('https://www.google.com/url?sa=i&url=https%3A%2F%2Fgermanlink.vn%2Ftu-van-du-hoc-duc%2Fdieu-kien-du-hoc-dai-hoc-duc-moi-nhat-2024.html&psig=AOvVaw2cuV-04Fx9BtXDBVum6F9-&ust=1734101602422000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCPDpgYK-oooDFQAAAAAdAAAAABAE', '', 51, 'sadfsd', 'dhduc', 'true|true|false|time new roman|clep|14', '2px 5px 11px 6px', 92, 'centeri', 'Người tạo: <strong>admin</strong> - Time: 2024-12-18 08:39:18', '', ''),
('', 'qưeqwe', 52, 'sadfsd', 'dhduc', 'false|false|false|time new roman|centerp|14', '0px 0px 0px 0px', 75, 'lefti', 'Người tạo: <strong>admin</strong> - Time: 2024-12-18 08:55:43', '', ''),
('', '', 53, '', 'dhduc', 'false|false|false|time new roman||14', '0px 0px 0px 0px', 100, '', 'Người tạo: <strong>admin</strong> - Time: 2024-12-18 08:59:12', '', ''),
('', '', 54, '', 'dhduc', 'false|false|false|time new roman||14', '0px 0px 0px 0px', 100, '', 'Người tạo: <strong>admin</strong> - Time: 2024-12-18 09:09:57', '', ''),
('', '', 55, '', 'dhduc', 'false|false|false|time new roman||14', '0px 0px 0px 0px', 100, '', 'Người tạo: <strong>admin</strong> - Time: 2024-12-18 09:18:02', '', ''),
('', '', 56, '', 'dhduc', 'false|false|false|time new roman||14', '0px 0px 0px 0px', 100, '', 'Người tạo: <strong>admin</strong> - Time: 2024-12-18 11:00:43', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ql_sanpham`
--

CREATE TABLE `ql_sanpham` (
  `id` int(255) NOT NULL,
  `ten_nuoc` varchar(255) NOT NULL,
  `mo_ta` varchar(255) NOT NULL,
  `Nguoi_tu_van` varchar(255) NOT NULL,
  `SDT` int(255) NOT NULL,
  `img` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_sanpham`
--

INSERT INTO `ql_sanpham` (`id`, `ten_nuoc`, `mo_ta`, `Nguoi_tu_van`, `SDT`, `img`) VALUES
(1, 'Nhật Bản', 'Tuyển 10 lao động nam làm việc gia công công cơ khí tại Nhật Bản', 'Mai Hoa', 306373, '...'),
(2, 'Nhật Bản', 'Tuyển 10 lao động Nam/Nữ ngành điều dưỡng tại Nhật Bản', 'Mai Hoa', 574848, '...');

-- --------------------------------------------------------

--
-- Table structure for table `ql_thanh_tabar`
--

CREATE TABLE `ql_thanh_tabar` (
  `Ten` varchar(200) NOT NULL,
  `Ma_Thanh_Tabar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ql_thanh_tabar_phu`
--

CREATE TABLE `ql_thanh_tabar_phu` (
  `Ma_Thanh_Tabar` varchar(200) NOT NULL,
  `Ten` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `use` varchar(50) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `level` int(11) NOT NULL,
  `note` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `use`, `pass`, `level`, `note`) VALUES
(1, 'admin', '123', 1, 'abc'),
(2, 'duong', '123', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`SDT`);

--
-- Indexes for table `ql_baner`
--
ALTER TABLE `ql_baner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ql_khoahoc`
--
ALTER TABLE `ql_khoahoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ql_noidung`
--
ALTER TABLE `ql_noidung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ql_sanpham`
--
ALTER TABLE `ql_sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ql_thanh_tabar`
--
ALTER TABLE `ql_thanh_tabar`
  ADD PRIMARY KEY (`Ma_Thanh_Tabar`);

--
-- Indexes for table `ql_thanh_tabar_phu`
--
ALTER TABLE `ql_thanh_tabar_phu`
  ADD PRIMARY KEY (`Ma_Thanh_Tabar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ql_baner`
--
ALTER TABLE `ql_baner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ql_khoahoc`
--
ALTER TABLE `ql_khoahoc`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ql_noidung`
--
ALTER TABLE `ql_noidung`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `ql_sanpham`
--
ALTER TABLE `ql_sanpham`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
