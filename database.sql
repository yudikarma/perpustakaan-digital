-- Database schema for Perpustakaan Buku Digital
-- You can import this file directly into phpMyAdmin or MySQL CLI

CREATE DATABASE IF NOT EXISTS `perpustakaan_digital` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `perpustakaan_digital`;

-- Table structure for table `users`
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `books`
CREATE TABLE IF NOT EXISTS `books` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `author` VARCHAR(150) NOT NULL,
  `publisher` VARCHAR(150) NOT NULL,
  `year` INT(4) NOT NULL,
  `category` VARCHAR(100) NOT NULL,
  `isbn` VARCHAR(50) NOT NULL,
  `synopsis` TEXT DEFAULT NULL,
  `cover` VARCHAR(255) DEFAULT 'default-cover.jpg',
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default admin account (username: admin, password: adminpassword)
INSERT INTO `users` (`id`, `username`, `password`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$tZ261jV065Q5o0h3r5NUuuXl0vjJ5.k5p3B9zK0L4WwI85P1XGeq9g3u', 'Administrator Perpustakaan', NOW(), NOW())
ON DUPLICATE KEY UPDATE `username` = `username`;

-- Insert initial books for demonstration
INSERT INTO `books` (`id`, `title`, `author`, `publisher`, `year`, `category`, `isbn`, `synopsis`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'Clean Code: A Handbook of Agile Software Craftsmanship', 'Robert C. Martin', 'Prentice Hall', 2008, 'Teknologi', '9780132350884', 'Bahkan kode buruk pun bisa berfungsi. Tetapi jika kode itu tidak bersih, hal itu dapat melumpuhkan organisasi pengembang. Setiap tahun, waktu dan sumber daya yang tak terhitung jumlahnya hilang karena kode yang ditulis dengan buruk. Buku ini mengajarkan prinsip-prinsip menulis kode yang bersih, efisien, dan mudah dirawat.', 'default-cover.jpg', NOW(), NOW()),
(2, 'The Pragmatic Programmer: Your Journey to Mastery', 'David Thomas, Andrew Hunt', 'Addison-Wesley Professional', 1999, 'Teknologi', '9780201616224', 'Salah satu buku pemrograman paling ikonik di dunia. Menjelaskan tentang proses inti pengembangan perangkat lunak, mulai dari menganalisis kebutuhan pengguna hingga menghasilkan kode yang dapat dipelihara dan memberikan kepuasan bagi penggunanya.', 'default-cover.jpg', NOW(), NOW()),
(3, 'Introduction to Algorithms', 'Thomas H. Cormen, Charles E. Leiserson', 'MIT Press', 2009, 'Sains & Matematika', '9780262033848', 'Buku panduan utama untuk mempelajari algoritma komputer secara mendalam dan terstruktur. Cocok untuk mahasiswa sains komputer, peneliti, maupun praktisi rekayasa perangkat lunak.', 'default-cover.jpg', NOW(), NOW()),
(4, 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Hasta Mitra', 1980, 'Sastra & Novel', '9789799731234', 'Bumi Manusia merupakan buku pertama dari tetralogi Buru yang ditulis oleh Pramoedya Ananta Toer selama masa pengasingan di Pulau Buru. Mengisahkan romansa Minke dan Annelies dengan latar belakang pergerakan nasional dan kolonialisme Belanda.', 'default-cover.jpg', NOW(), NOW());
