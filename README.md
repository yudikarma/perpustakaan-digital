# Tugas Perpustakaan Buku Digital - Pemrograman Web II

## Informasi Mahasiswa & Kelas
* **Nama Mahasiswa** : YUDI KARMA
* **NIM**            : 250401020118
* **Mata Kuliah**    : Pemrograman Web II
* **Kelas**          : IF405
* **Kode Kelas**     : IF405
* **Dosen Pengajar** : Alun Sujjada, S.Kom., M.T

---

## Deskripsi Aplikasi: Perpustakaan Buku Digital

Aplikasi web Perpustakaan Buku Digital ini dibangun menggunakan framework **CodeIgniter 4** dengan database relational. Aplikasi ini mengintegrasikan seluruh fitur yang disyaratkan dalam soal tugas proyek.

### Fitur Utama Aplikasi
1. **Create, Read, Update, Delete (CRUD)**:
   - Manajemen katalog buku lengkap bagi Administrator.
   - Mendukung upload file gambar untuk cover buku (disimpan di `public/uploads/covers/`).
   - Sistem auto-cleanup: menghapus cover lama secara otomatis jika buku dihapus atau diperbarui dengan cover baru.
2. **Penanganan Session (Autentikasi & Otorisasi)**:
   - Login halaman khusus admin dengan verifikasi password terenkripsi (`password_verify`).
   - Pembatasan akses: Pengunjung publik hanya dapat mencari dan membaca buku, sedangkan fitur CRUD (tambah, edit, hapus) dilindungi pengecekan session admin (`session()->has('user_id')`).
   - Fungsi logout untuk menghancurkan session dengan aman.
3. **Searching & Pagination**:
   - Kolom pencarian buku dinamis di portal publik dan dashboard admin. Pencarian mencakup kata kunci pada Judul, Penulis, Kategori, atau ISBN.
   - Paginasi data menggunakan library `Pager` bawaan CodeIgniter 4 untuk merender buku secara bertahap (6 buku per halaman di portal publik, 10 buku di tabel admin) tanpa membebani memori server.
4. **User Experience & Notifikasi**:
   - Integrasi **SweetAlert2** untuk notifikasi aksi sukses/gagal secara modern.
   - Dialog konfirmasi interaktif sebelum menghapus data untuk mencegah kesalahan klik.

---

## Konfigurasi Aplikasi & Database

* **URL Lokal**: `http://localhost:8080`
* **Pilihan Database**:
  1. **SQLite (Default / Siap Pakai)**:
     Aplikasi telah terkonfigurasi menggunakan SQLite (`writable/database.db`) secara out-of-the-box agar dapat langsung dijalankan tanpa menyalakan MySQL.
  2. **MySQL (XAMPP)**:
     - Nama Database: `perpustakaan_digital`
     - Gunakan file dump SQL yang disertakan: `database.sql` dan import ke phpMyAdmin Anda.
     - Ubah konfigurasi database di file `.env` ke:
       ```env
       database.default.DBDriver = MySQLi
       database.default.database = perpustakaan_digital
       database.default.username = root
       database.default.password = 
       database.default.hostname = localhost
       database.default.port = 3306
       ```

---

## Langkah Menjalankan Aplikasi Secara Lokal

1. **Persiapan Dependensi**:
   Buka terminal di folder `perpustakaan-digital` dan jalankan:
   ```bash
   composer install
   ```
2. **Migrasi dan Seed Data**:
   Jalankan perintah berikut untuk menginisialisasi database dan memasukkan akun admin bawaan beserta contoh buku:
   ```bash
   php spark migrate
   php spark db:seed DatabaseSeeder
   ```
   *Akun Admin Bawaan:*
   * **Username**: `admin`
   * **Password**: `adminpassword`
3. **Mulai Server Lokal**:
   Jalankan server CodeIgniter:
   ```bash
   php spark serve
   ```
   Buka browser dan akses [http://localhost:8080](http://localhost:8080).
