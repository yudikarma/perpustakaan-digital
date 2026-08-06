<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // 1. Seed Users Table (Admin Account)
        $admin = [
            'username'   => 'admin',
            'password'   => password_hash('adminpassword', PASSWORD_DEFAULT),
            'name'       => 'Administrator Perpustakaan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Insert admin account
        $db->table('users')->insert($admin);

        // 2. Seed Books Table
        $books = [
            [
                'title'     => 'Clean Code: A Handbook of Agile Software Craftsmanship',
                'author'    => 'Robert C. Martin',
                'publisher' => 'Prentice Hall',
                'year'      => 2008,
                'category'  => 'Teknologi',
                'isbn'      => '9780132350884',
                'synopsis'  => 'Bahkan kode buruk pun bisa berfungsi. Tetapi jika kode itu tidak bersih, hal itu dapat melumpuhkan organisasi pengembang. Setiap tahun, waktu dan sumber daya yang tak terhitung jumlahnya hilang karena kode yang ditulis dengan buruk. Buku ini mengajarkan prinsip-prinsip menulis kode yang bersih, efisien, dan mudah dirawat.',
                'cover'     => 'default-cover.jpg',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],
            [
                'title'     => 'The Pragmatic Programmer: Your Journey to Mastery',
                'author'    => 'David Thomas, Andrew Hunt',
                'publisher' => 'Addison-Wesley Professional',
                'year'      => 1999,
                'category'  => 'Teknologi',
                'isbn'      => '9780201616224',
                'synopsis'  => 'Salah satu buku pemrograman paling ikonik di dunia. Menjelaskan tentang proses inti pengembangan perangkat lunak, mulai dari menganalisis kebutuhan pengguna hingga menghasilkan kode yang dapat dipelihara dan memberikan kepuasan bagi penggunanya.',
                'cover'     => 'default-cover.jpg',
                'created_at'=> date('Y-m-d H:i:s', strtotime('-1 hour')),
                'updated_at'=> date('Y-m-d H:i:s', strtotime('-1 hour'))
            ],
            [
                'title'     => 'Introduction to Algorithms',
                'author'    => 'Thomas H. Cormen, Charles E. Leiserson',
                'publisher' => 'MIT Press',
                'year'      => 2009,
                'category'  => 'Sains & Matematika',
                'isbn'      => '9780262033848',
                'synopsis'  => 'Buku panduan utama untuk mempelajari algoritma komputer secara mendalam dan terstruktur. Cocok untuk mahasiswa sains komputer, peneliti, maupun praktisi rekayasa perangkat lunak.',
                'cover'     => 'default-cover.jpg',
                'created_at'=> date('Y-m-d H:i:s', strtotime('-2 hours')),
                'updated_at'=> date('Y-m-d H:i:s', strtotime('-2 hours'))
            ],
            [
                'title'     => 'Bumi Manusia',
                'author'    => 'Pramoedya Ananta Toer',
                'publisher' => 'Hasta Mitra',
                'year'      => 1980,
                'category'  => 'Sastra & Novel',
                'isbn'      => '9789799731234',
                'synopsis'  => 'Bumi Manusia merupakan buku pertama dari tetralogi Buru yang ditulis oleh Pramoedya Ananta Toer selama masa pengasingan di Pulau Buru. Mengisahkan romansa Minke dan Annelies dengan latar belakang pergerakan nasional dan kolonialisme Belanda.',
                'cover'     => 'default-cover.jpg',
                'created_at'=> date('Y-m-d H:i:s', strtotime('-3 hours')),
                'updated_at'=> date('Y-m-d H:i:s', strtotime('-3 hours'))
            ],
            [
                'title'     => 'Laskar Pelangi',
                'author'    => 'Andrea Hirata',
                'publisher' => 'Bentang Pustaka',
                'year'      => 2005,
                'category'  => 'Sastra & Novel',
                'isbn'      => '9789793062792',
                'synopsis'  => 'Kisah penuh inspirasi tentang perjuangan sepuluh anak miskin di Pulau Belitung untuk mendapatkan pendidikan yang layak di sekolah dasar Muhammadiyah setempat. Sarat akan nilai kemanusiaan, persahabatan, dan harapan.',
                'cover'     => 'default-cover.jpg',
                'created_at'=> date('Y-m-d H:i:s', strtotime('-4 hours')),
                'updated_at'=> date('Y-m-d H:i:s', strtotime('-4 hours'))
            ],
            [
                'title'     => 'Filosofi Teras',
                'author'    => 'Henry Manampiring',
                'publisher' => 'Kompas Penerbit Buku',
                'year'      => 2018,
                'category'  => 'Self Improvement',
                'isbn'      => '9786024125189',
                'synopsis'  => 'Sebuah buku pengantar Stoikisme (filsafat Yunani kuno) yang disesuaikan secara praktis untuk menjawab tantangan kesehatan mental dan emosi negatif di kehidupan masyarakat modern perkotaan.',
                'cover'     => 'default-cover.jpg',
                'created_at'=> date('Y-m-d H:i:s', strtotime('-5 hours')),
                'updated_at'=> date('Y-m-d H:i:s', strtotime('-5 hours'))
            ],
            [
                'title'     => 'Sapiens: A Brief History of Humankind',
                'author'    => 'Yuval Noah Harari',
                'publisher' => 'Harper',
                'year'      => 2011,
                'category'  => 'Sejarah',
                'isbn'      => '9780062316097',
                'synopsis'  => 'Menjelaskan sejarah umat manusia dari sudut pandang biologi, sosiologi, dan evolusi. Mengupas tiga revolusi besar: Revolusi Kognitif, Revolusi Pertanian, dan Revolusi Ilmiah yang membentuk jalan hidup spesies Homo Sapiens.',
                'cover'     => 'default-cover.jpg',
                'created_at'=> date('Y-m-d H:i:s', strtotime('-6 hours')),
                'updated_at'=> date('Y-m-d H:i:s', strtotime('-6 hours'))
            ],
            [
                'title'     => 'Atomic Habits',
                'author'    => 'James Clear',
                'publisher' => 'Penguin Random House',
                'year'      => 2018,
                'category'  => 'Self Improvement',
                'isbn'      => '9780735211292',
                'synopsis'  => 'Sebuah panduan praktis luar biasa yang mengajarkan bagaimana perubahan sekecil apa pun yang dilakukan secara konsisten (1% setiap hari) dapat menghasilkan perbaikan hidup yang signifikan di masa mendatang.',
                'cover'     => 'default-cover.jpg',
                'created_at'=> date('Y-m-d H:i:s', strtotime('-7 hours')),
                'updated_at'=> date('Y-m-d H:i:s', strtotime('-7 hours'))
            ]
        ];

        $db->table('books')->insertBatch($books);
    }
}
