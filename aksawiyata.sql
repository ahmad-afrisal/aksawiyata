-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2023 at 12:26 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aksawiyata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 1, 'Eka Liana', '2023-07-21 07:36:24', '2023-07-29 01:30:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adviser_scores`
--

CREATE TABLE `adviser_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `adviser_id` bigint(20) UNSIGNED NOT NULL,
  `exercise_score` int(11) NOT NULL,
  `report_score` int(11) NOT NULL,
  `presentation_score` int(11) NOT NULL,
  `final_score` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('sudah daftar','sedang berjalan','selesai','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sudah daftar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mentor_id` bigint(20) UNSIGNED NOT NULL,
  `examiner_id` bigint(20) UNSIGNED NOT NULL,
  `adviser_id` bigint(20) UNSIGNED NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ceo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_employees` int(11) NOT NULL,
  `website_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `slug`, `mentor_id`, `examiner_id`, `adviser_id`, `about`, `ceo`, `number_of_employees`, `website_link`, `street`, `postal_code`, `district`, `regency`, `province`, `logo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bangk.id', 'bangkid', 6, 12, 9, '<p>Bangk.id adalah perusahaan yang berfokus pada penyediaan pelatihan dan pengembangan keterampilan di bidang teknologi informasi. Startup ini dapat menawarkan berbagai jenis kursus dan program pelatihan, seperti pengembangan web, data science, keamanan siber, pengembangan aplikasi seluler, dan lain sebagainya.</p>', 'Ahmad Afrisal', 100, 'https://www.bangk.id', 'Jl. Poros Majene Mamuju No 39', '91353', 'Banggae Timur', 'Majene', 'Sulawesi Barat', 'assets/logo/0PcBs8Em7sJRfrjQt8li6NMmmyElcserbr6zN1xa.png', '2023-07-22 12:19:18', '2023-07-22 12:29:24', NULL),
(2, 'Radio Kampus', 'radio-kampus', 7, 11, 10, '<p>Radio Kampus adalah&nbsp; situs web yang menyediakan platform untuk mengadakan dan mengikuti webinar.</p>', 'Wawan Firgiawan', 20, 'https://www.radiokampus.com', 'Jalan Andi Pangeran Pettarani No. 67', '90222', 'Rappocini', 'Makassar', 'Sulawesi Barat', 'assets/logo/48YHrLvYHwqkLSTjw8vujy4kZuiC11CfLLu3jTeK.png', '2023-07-22 12:44:54', '2023-07-22 12:44:54', NULL),
(3, 'Laodinawang', 'laodinawang', 8, 10, 11, '<p>laodinawang adalah usaha yang menyediakan alat dan perlengkapan camping untuk kegiatan di alam bebas, seperti tenda, sleeping bag, matras, kompor gas, pisau lipat, dan aksesori lainnya</p>', 'Ayana See', 10, 'https://www.laodinawang.com', 'Jalan Hasanuddin No. 10', '91964', 'Mamuju', 'Mamuju', 'Sulawesi Barat', 'assets/logo/uVJUFt9WNVK5wG057Nmhmb79t8si684sgE5OlbaZ.jpg', '2023-07-22 12:48:09', '2023-07-22 12:48:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_galleries`
--

CREATE TABLE `company_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `companies_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_galleries`
--

INSERT INTO `company_galleries` (`id`, `photos`, `companies_id`, `created_at`, `updated_at`) VALUES
(1, 'assets/company/LbJsHGvMLbgdFB8cuYaswh9edioh1kJnXREuLVfH.jpg', 1, '2023-07-22 12:19:18', '2023-07-22 12:19:18'),
(2, 'assets/company/q9KWT2yHNlrAHB9bS2WIAW5cQKwxv8WERdCXpcUv.jpg', 2, '2023-07-22 12:44:54', '2023-07-22 12:44:54'),
(3, 'assets/company/SuZlQkEaquCuigxrKAf6DD9Aqd5muI2ZXsWACNjv.jpg', 3, '2023-07-22 12:48:09', '2023-07-22 12:48:09'),
(5, 'assets/company/fa3uUWKpQvnQ4sYfBdRi1kc6oH1pcgMnL6w4d6ig.jpg', 1, '2023-07-22 12:48:56', '2023-07-22 12:48:56'),
(6, 'assets/company/3D8OXB4rU4TKEG0ecZIksy6ThKHsBjtvyDUXwsYh.jpg', 1, '2023-07-22 12:49:06', '2023-07-22 12:49:06'),
(7, 'assets/company/O4ckJnET9SY1aVG6vIpWhz8O6ZhsauEK9TZgiI5x.jpg', 1, '2023-07-22 12:49:20', '2023-07-22 12:49:20'),
(8, 'assets/company/sWOLwJeXHU6QEDQZseosCC0GIAsJuuxbx3BRHlqQ.jpg', 2, '2023-07-22 12:49:52', '2023-07-22 12:49:52'),
(9, 'assets/company/L7UqsTg3fiqC64A5Su4XtLZyGfFuw2fZVKLA9TMx.jpg', 2, '2023-07-22 12:50:02', '2023-07-22 12:50:02'),
(10, 'assets/company/QzgeFkqf3KAkFb8FcUBgGf4dXULSw5qOZdVgMiXz.jpg', 3, '2023-07-22 12:50:41', '2023-07-22 12:50:41'),
(11, 'assets/company/5IgJr33F49JU5Qw0ZjVu29eLDO7kJlk5QwvlQjaG.jpg', 3, '2023-07-22 12:50:52', '2023-07-22 12:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_accepted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examinees`
--

CREATE TABLE `examinees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `checkout_id` bigint(20) UNSIGNED NOT NULL,
  `adviser_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examiner_scores`
--

CREATE TABLE `examiner_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `examiner_id` bigint(20) UNSIGNED NOT NULL,
  `exercise_score` int(11) NOT NULL,
  `report_score` int(11) NOT NULL,
  `presentation_score` int(11) NOT NULL,
  `final_score` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedules`
--

CREATE TABLE `exam_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `exam_date` date NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_open` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_schedules`
--

INSERT INTO `exam_schedules` (`id`, `admin_id`, `exam_date`, `place`, `is_open`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2023-07-20', 'HP 3', 0, '2023-07-22 06:20:59', '2023-07-22 06:21:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_roles`
--

CREATE TABLE `group_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_roles`
--

INSERT INTO `group_roles` (`id`, `nama_role`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '2023-07-21 07:23:42', '2023-07-21 07:23:42'),
(2, 'dosen', 'Dosen', '2023-07-21 07:23:42', '2023-07-21 07:23:42'),
(3, 'mentor', 'Mentor', '2023-07-21 07:23:42', '2023-07-21 07:23:42'),
(4, 'mahasiswa', 'Mahasaiswa', '2023-07-21 07:23:42', '2023-07-21 07:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_of_activities` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `develop_competencies` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `participant_criteria` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_information` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quota` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `name`, `slug`, `details_of_activities`, `develop_competencies`, `participant_criteria`, `additional_information`, `quota`, `status`, `created_at`, `updated_at`, `deleted_at`, `semester_id`) VALUES
(1, 1, 'Full-Stack Web Develeper', 'full-stack-web-develeper', '<p>Seorang full stack web developer bertanggung jawab untuk mengembangkan sebuah website secara keseluruhan, baik dari sisi front-end maupun back-end. Pekerjaan seorang full stack web developer meliputi beberapa tugas antara lain membangun website dari awal hingga selesai, memastikan website yang dibuat responsif dan mudah diakses di berbagai perangkat, dan mengoptimalkan kinerja website agar dapat diakses dengan cepat.</p>', '<p>Commit &amp; Push Kode, Review Kode, Implementasi API, Unit tes kode, kolaborasi antar divisi</p>', '<p>Jurusan: Teknologi Informasi, Informatika, Ilmu Komputer, atau Jurusan yang Berkaitan<br />\r\nJenjang: D3 / D4 / S1,<br />\r\nSemester: Minimal semester 6 Kriteria: - Memiliki kemampuan GIT - Memiliki kemampuan Javascript - Memiliki kemampuan Python - Memiliki Kemampuan SQL (MySQL, PostgreSQL) Kriteria soft skills: - Komunikasi - Bekerja dalam tim - Memiliki inisiatif tinggi - Negosiasi - Berpikir strategis</p>', '<p>Sehat jasmani dan rohani serta siap melaksanakan program magang secara offline di kantor PT Widya Inovasi Indonesia</p>', 8, 1, '2023-07-22 12:56:54', '2023-07-30 11:07:40', NULL, 1),
(2, 1, 'Web Designer', 'web-designer', 'Seorang web designer memiliki peran penting dalam menciptakan pengalaman pengguna yang baik di sebuah website. Tugas utama seorang web designer adalah merancang tampilan visual dan fungsionalitas dari sebuah website. Mereka harus mampu memperhatikan aspek keamanan, kinerja, dan kegunaan website agar pengguna merasa nyaman dalam mengaksesnya.', 'Commit & Push Kode, Review Kode, Implementasi API, Unit tes kode, kolaborasi antar divisi', '\n                Jurusan: Teknologi Informasi, Informatika, Ilmu Komputer, atau Jurusan yang Berkaitan<br>Jenjang: D3 / D4 / S1, <br>Semester: Minimal semester 6\n                Kriteria:\n                - Memiliki kemampuan GIT\n                - Memiliki kemampuan Javascript\n                - Memiliki kemampuan Python\n                - Memiliki Kemampuan SQL (MySQL, PostgreSQL)\n                \n                \n                Kriteria soft skills:\n                - Komunikasi\n                - Bekerja dalam tim\n                - Memiliki inisiatif tinggi\n                - Negosiasi\n                - Berpikir strategis', 'Sehat jasmani dan rohani serta siap melaksanakan program magang secara offline di kantor PT Widya Inovasi Indonesia', 4, 1, '2023-07-22 12:56:54', '2023-07-28 06:34:25', NULL, 1),
(3, 2, 'Scrum Master', 'scrum-master', 'Seorang Scrum Master adalah seorang pemimpin dalam tim pengembangan software yang menggunakan metodologi Agile. Tugas utama seorang Scrum Master adalah memastikan bahwa tim memahami dan menerapkan prinsip-prinsip Agile dengan benar dan efektif. Seorang Scrum Master bertanggung jawab untuk memfasilitasi proses pengembangan software, memastikan tim bekerja secara kolaboratif dan terus meningkatkan kualitas produk yang dibuat.', 'Commit & Push Kode, Review Kode, Implementasi API, Unit tes kode, kolaborasi antar divisi', '\n                Jurusan: Teknologi Informasi, Informatika, Ilmu Komputer, atau Jurusan yang Berkaitan<br>Jenjang: D3 / D4 / S1, <br>Semester: Minimal semester 6\n                Kriteria:\n                - Memiliki kemampuan GIT\n                - Memiliki kemampuan Javascript\n                - Memiliki kemampuan Python\n                - Memiliki Kemampuan SQL (MySQL, PostgreSQL)\n                \n                \n                Kriteria soft skills:\n                - Komunikasi\n                - Bekerja dalam tim\n                - Memiliki inisiatif tinggi\n                - Negosiasi\n                - Berpikir strategis', 'Sehat jasmani dan rohani serta siap melaksanakan program magang secara offline di kantor PT Widya Inovasi Indonesia', 19, 1, '2023-07-22 12:56:54', '2023-07-28 10:53:35', NULL, 1),
(4, 3, 'Project Manager', 'project-manager', '<p>Mahasiswa peserta magang pada aktivitas ini akan mengerjakan pada lingkup office pada umumnya.</p>', '<p>Communication and Teamwork, Decision Making, Leadership, Critical Thinking, palnning And Analyze</p>', '<p>- Mahasiswa teknik dan atau yang berhubungan, minimal sedang menempuh semester 6</p>\r\n\r\n<p>- Memiliki kemampuan manajemen proyek dan negosiasi yang baik</p>\r\n\r\n<p>- Mampu merencanakan, menganalisis dan mengontrol suatu proyek</p>\r\n\r\n<p>- Dapat bekerjasama secara mandiri ataupun tim</p>', '<p>sehat</p>', 8, 1, '2023-07-22 13:37:58', '2023-07-30 11:14:02', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nidn_dosen` int(11) DEFAULT NULL,
  `nip_dosen` int(11) DEFAULT NULL,
  `nama_dosen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_dosen` int(11) DEFAULT NULL,
  `konsentrasi_dosen` int(11) DEFAULT NULL,
  `jafung_dosen` int(11) DEFAULT NULL,
  `hp_dosen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi_dosen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktif` int(11) NOT NULL,
  `bidang_peminatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`id`, `user_id`, `nidn_dosen`, `nip_dosen`, `nama_dosen`, `status_dosen`, `konsentrasi_dosen`, `jafung_dosen`, `hp_dosen`, `prodi_dosen`, `aktif`, `bidang_peminatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 9, NULL, NULL, 'Muzaki, S.Kom.,M.M', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-22 10:40:47', '2023-07-22 10:40:47', NULL),
(3, 10, NULL, NULL, 'Nuralamsah Zulkarnaim, S.Kom., M.Kom', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-22 10:41:32', '2023-07-22 10:41:32', NULL),
(4, 11, NULL, NULL, 'Muh. Fahmi Rustan, S.Kom., M.T', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-22 10:42:15', '2023-07-22 10:42:15', NULL),
(5, 12, NULL, NULL, 'Ir. Sugiarto Cokrowibowo, S.Si., M.T', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-22 10:43:00', '2023-07-22 10:43:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logbooks`
--

CREATE TABLE `logbooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_activity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id`, `user_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 'Adnan Fadli', '2023-07-22 10:37:40', '2023-07-22 10:37:40', NULL),
(2, 7, 'sulkipli', '2023-07-22 10:39:12', '2023-07-22 10:39:12', NULL),
(3, 8, 'Ibnu Munzir', '2023-07-22 10:40:00', '2023-07-22 10:40:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mentor_scores`
--

CREATE TABLE `mentor_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mentor_id` bigint(20) UNSIGNED NOT NULL,
  `attitude_score` int(11) NOT NULL,
  `diligent_score` int(11) NOT NULL,
  `performance_score` int(11) NOT NULL,
  `final_score` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_07_21_101538_create_group_roles_table', 1),
(2, '2014_08_21_103232_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_09_064906_create_companies_table', 1),
(7, '2023_04_09_064948_create_jobs_table', 1),
(8, '2023_04_09_065113_create_checkouts_table', 1),
(9, '2023_04_27_083117_create_company_galleries_table', 1),
(10, '2023_04_27_193014_create_user_reviews_table', 1),
(11, '2023_05_04_040736_create_reports_table', 1),
(12, '2023_05_04_040809_create_logbooks_table', 1),
(13, '2023_07_01_150834_create_consultations_table', 1),
(14, '2023_07_02_220759_create_mentor_scores_table', 1),
(15, '2023_07_02_222136_create_adviser_scores_table', 1),
(16, '2023_07_02_222207_create_examiner_scores_table', 1),
(17, '2023_07_02_222347_create_score_recaps_table', 1),
(18, '2023_07_07_183138_create_exam_schedules_table', 1),
(19, '2023_07_07_183232_create_examinees_table', 1),
(20, '2023_07_07_184207_create_semesters_table', 1),
(21, '2023_07_17_121310_add_job_id_to_consultations', 1),
(22, '2023_07_17_211913_add_job_id_to_report', 1),
(23, '2023_07_21_091846_create_admins_table', 1),
(24, '2023_07_21_092554_create_mentors_table', 1),
(25, '2023_07_21_092741_create_lectures_table', 1),
(26, '2023_07_21_100734_create_students_table', 1),
(27, '2023_07_22_190322_add_semester_id_to_jobs', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `report` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Belum Upload','Sedang Diperiksa','Diterima','Ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Upload',
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `score_recaps`
--

CREATE TABLE `score_recaps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mentor_score` double(8,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `adviser_score` double(8,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `examiner_score` double(8,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2022/2023 Ganjil', '2023-07-22 06:13:49', '2023-07-22 06:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nim_mhs` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_mhs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan_mhs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi_mhs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_mhs` tinyint(1) NOT NULL DEFAULT '1',
  `concentration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transkip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `avatar`, `role_id`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin455', 'admin@aksawiyata.com', '2023-07-21 07:36:24', '$2y$10$rAyYZuoJHBWqMl5ypCmHQeFCTuwIq/n/2xF5Tfn.WmuD4CfZ9NfJm', NULL, 1, 1, NULL, '2023-07-21 07:36:24', '2023-07-29 01:34:03', NULL),
(6, 'adnan_fadli', 'adnanfadli@gmail.com', '2023-07-22 10:37:40', '$2y$10$0lHVYPkNvL2vjWTqT4U.jOT0Yd2pEcvpJ5pT4vYeoN0Ff6tDFLauS', NULL, 3, 2, NULL, '2023-07-22 10:37:40', '2023-07-22 10:37:40', NULL),
(7, 'sulkipli', 'sulkipli@gmail.com', '2023-07-22 10:39:12', '$2y$10$Mbembw9wR4YnUQfF.wRpwuDEgbaw0KUwk9syBIS4YVBcz66hTtAbK', NULL, 3, 2, NULL, '2023-07-22 10:39:12', '2023-07-22 10:39:12', NULL),
(8, 'ibnu_munzir', 'ibnumunzir@gmail.com', '2023-07-22 10:40:00', '$2y$10$CJta24ViXgKa24GdvSa62OfSDzBJnxwyl4B/SX3tmhk9C0S7p8lWm', NULL, 3, 2, NULL, '2023-07-22 10:40:00', '2023-07-22 10:40:00', NULL),
(9, 'muzakki', 'muzaki@unsulbar.ac.id', '2023-07-22 10:40:46', '$2y$10$BwI8uQfLVp9jvVSt9Dm99OB6JCdlYSHd31Yi5btZaSC11h3j/DNUm', NULL, 2, 2, NULL, '2023-07-22 10:40:47', '2023-07-22 10:40:47', NULL),
(10, 'nuralamsah', 'nuralamsah@unsulbar.ac.id', '2023-07-22 10:41:32', '$2y$10$7CZ9g3cvg9bwgTK9O7r6DO3Seieekar8iv2XUUwlswQfHcbRRVj4G', NULL, 2, 2, NULL, '2023-07-22 10:41:32', '2023-07-22 10:41:32', NULL),
(11, 'fahmi', 'muhfahmi@unsulbar.ac.id', '2023-07-22 10:42:15', '$2y$10$3ALLN700smqigCUWo/9ai.NLwa/Y5PBg81tIIctbOe4D0IU6wlHma', NULL, 2, 2, NULL, '2023-07-22 10:42:15', '2023-07-22 10:42:15', NULL),
(12, 'sugiarto1', 'sugiarto.cokrowibowo@unsulbar.ac.id', '2023-07-22 10:42:59', NULL, NULL, 2, 2, NULL, '2023-07-22 10:43:00', '2023-07-28 22:49:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_reviews`
--

CREATE TABLE `user_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `adviser_scores`
--
ALTER TABLE `adviser_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adviser_scores_user_id_foreign` (`user_id`),
  ADD KEY `adviser_scores_adviser_id_foreign` (`adviser_id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkouts_user_id_foreign` (`user_id`),
  ADD KEY `checkouts_job_id_foreign` (`job_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_name_unique` (`name`),
  ADD KEY `companies_mentor_id_foreign` (`mentor_id`),
  ADD KEY `companies_examiner_id_foreign` (`examiner_id`),
  ADD KEY `companies_adviser_id_foreign` (`adviser_id`);

--
-- Indexes for table `company_galleries`
--
ALTER TABLE `company_galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_galleries_photos_unique` (`photos`),
  ADD KEY `company_galleries_companies_id_foreign` (`companies_id`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultations_user_id_foreign` (`user_id`),
  ADD KEY `consultations_job_id_foreign` (`job_id`);

--
-- Indexes for table `examinees`
--
ALTER TABLE `examinees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examinees_student_id_foreign` (`student_id`),
  ADD KEY `examinees_checkout_id_foreign` (`checkout_id`),
  ADD KEY `examinees_exam_id_foreign` (`exam_id`),
  ADD KEY `examinees_adviser_id_foreign` (`adviser_id`);

--
-- Indexes for table `examiner_scores`
--
ALTER TABLE `examiner_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examiner_scores_user_id_foreign` (`user_id`),
  ADD KEY `examiner_scores_examiner_id_foreign` (`examiner_id`);

--
-- Indexes for table `exam_schedules`
--
ALTER TABLE `exam_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_schedules_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `group_roles`
--
ALTER TABLE `group_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_company_id_foreign` (`company_id`),
  ADD KEY `jobs_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lectures_user_id_foreign` (`user_id`);

--
-- Indexes for table `logbooks`
--
ALTER TABLE `logbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logbooks_user_id_foreign` (`user_id`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentors_user_id_foreign` (`user_id`);

--
-- Indexes for table `mentor_scores`
--
ALTER TABLE `mentor_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentor_scores_user_id_foreign` (`user_id`),
  ADD KEY `mentor_scores_mentor_id_foreign` (`mentor_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_user_id_foreign` (`user_id`),
  ADD KEY `reports_job_id_foreign` (`job_id`);

--
-- Indexes for table `score_recaps`
--
ALTER TABLE `score_recaps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `score_recaps_user_id_foreign` (`user_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `semesters_name_unique` (`name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_reviews`
--
ALTER TABLE `user_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_reviews_user_id_foreign` (`user_id`),
  ADD KEY `user_reviews_job_id_foreign` (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `adviser_scores`
--
ALTER TABLE `adviser_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_galleries`
--
ALTER TABLE `company_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `examinees`
--
ALTER TABLE `examinees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `examiner_scores`
--
ALTER TABLE `examiner_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_schedules`
--
ALTER TABLE `exam_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_roles`
--
ALTER TABLE `group_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logbooks`
--
ALTER TABLE `logbooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mentors`
--
ALTER TABLE `mentors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mentor_scores`
--
ALTER TABLE `mentor_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `score_recaps`
--
ALTER TABLE `score_recaps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_reviews`
--
ALTER TABLE `user_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `adviser_scores`
--
ALTER TABLE `adviser_scores`
  ADD CONSTRAINT `adviser_scores_adviser_id_foreign` FOREIGN KEY (`adviser_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `adviser_scores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD CONSTRAINT `checkouts_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `checkouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_adviser_id_foreign` FOREIGN KEY (`adviser_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `companies_examiner_id_foreign` FOREIGN KEY (`examiner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `companies_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_galleries`
--
ALTER TABLE `company_galleries`
  ADD CONSTRAINT `company_galleries_companies_id_foreign` FOREIGN KEY (`companies_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `consultations`
--
ALTER TABLE `consultations`
  ADD CONSTRAINT `consultations_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `consultations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `examinees`
--
ALTER TABLE `examinees`
  ADD CONSTRAINT `examinees_adviser_id_foreign` FOREIGN KEY (`adviser_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `examinees_checkout_id_foreign` FOREIGN KEY (`checkout_id`) REFERENCES `checkouts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `examinees_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exam_schedules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `examinees_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `examiner_scores`
--
ALTER TABLE `examiner_scores`
  ADD CONSTRAINT `examiner_scores_examiner_id_foreign` FOREIGN KEY (`examiner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `examiner_scores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `exam_schedules`
--
ALTER TABLE `exam_schedules`
  ADD CONSTRAINT `exam_schedules_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `jobs_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`);

--
-- Constraints for table `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `lectures_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `logbooks`
--
ALTER TABLE `logbooks`
  ADD CONSTRAINT `logbooks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mentors`
--
ALTER TABLE `mentors`
  ADD CONSTRAINT `mentors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mentor_scores`
--
ALTER TABLE `mentor_scores`
  ADD CONSTRAINT `mentor_scores_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mentor_scores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `score_recaps`
--
ALTER TABLE `score_recaps`
  ADD CONSTRAINT `score_recaps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `group_roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_reviews`
--
ALTER TABLE `user_reviews`
  ADD CONSTRAINT `user_reviews_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `user_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
