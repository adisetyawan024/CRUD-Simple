 CRUD Data Mahasiswa dengan PHP, MySQL, dan JavaScript
🚀 Aplikasi CRUD (Create, Read, Update, Delete) Data Mahasiswa ini dibangun menggunakan PHP Native dengan MySQL sebagai database dan JavaScript modern untuk fitur Live Search dan Modal Form.

🎯 Fitur Aplikasi : <br>
✅ Tambah Mahasiswa menggunakan modal popup <br>
✅ Edit Data Mahasiswa langsung dari tabel dengan modal <br>
✅ Hapus Data Mahasiswa dengan konfirmasi <br>
✅ Live Search menggunakan AJAX Fetch API <br>
✅ Tampilan Modern & Responsif menggunakan CSS <br>
✅ Clean Code & Modular dengan Functional Programming <br>

📂 Struktur Folder <br>
/crud-php<br>
│── assets/
│   ├── style.css      # Styling tampilan<br>
│── config.php         # Koneksi database & fungsi CRUD<br>
│── index.php          # Tampilan utama (1 halaman CRUD)<br>
│── script.js          # Live Search & Modal Form<br>

📥 Instalasi & Cara Menjalankan : <br>
1️⃣ Clone Repository<br>
git clone https://github.com/username/crud-php.git<br>
cd crud-php<br>

2️⃣ Import Database<br>
- Buka phpMyAdmin<br>
- Buat database baru, misalnya: kampus_db<br>
- Jalankan query berikut untuk membuat tabel:<br>
CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nim VARCHAR(20) NOT NULL UNIQUE,
    jurusan VARCHAR(50) NOT NULL
);<br>

Tambahkan data dummy (opsional):<br>
INSERT INTO mahasiswa (nama, nim, jurusan) VALUES
('Aldi Saputra', '210001', 'Teknik Informatika'),
('Budi Santoso', '210002', 'Sistem Informasi'),
('Citra Dewi', '210003', 'Teknik Komputer');
<br>

3️⃣ Jalankan di Server Lokal<br>
Gunakan XAMPP / MAMP / Laragon lalu buka browser:<br>
http://localhost/crud-php/

## 🖥️ Screenshot Tampilan  
![Tampilan CRUD Mahasiswa](crud.png)

