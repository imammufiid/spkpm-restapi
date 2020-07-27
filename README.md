# Sistem Pendukung Keputusan Menggunakan Metode Profile Matching
Proses perhitungan pada metode Profile Matching, diawali dengan pendefinisian nilai minimum untuk setiap variabel-variabel penilaian. Selisih setiap nilai data testing terhadap nilai minimum masing-masing variabel, merupakan gap yang kemudian diberi bobot. Bobot setiap variabel akan dihitung rata-rata berdasarkan kelompok variabel Core Factor (CF) dan Secondary Factor (SF). Komposisi CF ditambah SF adalah 100%, tergantung dari kepentingan pengguna metode ini. Tahap terakhir dari metode ini, adalah proses akumulasi nilai CF dan SF berdasarkan nilai-nilai variabel data testing.

# Memulai Program
Pada instruksi di bawah ini, anda akan mendapatkan salinan program dan menjalankan aplikasi pada server development lokal untuk berbagai kebutuhan.

### Kebutuhan Program
1. Apache 2
2. PHP versi 7.x
3. Mariadb versi 10.x
4. Chrome versi 80.x

### Pemasangan Program
1. Copy folder aplikasi ke dalam root folder `/var/www/html/` pada linux atau `C:\\xampp\htdocs\` pada windows xampp.
2. Buatlah database bernama `matching` kemudian export file di dalam folder database.
3. Edit file di dalam applications/config/database.php untuk menyesuaikan identitas database lokal anda.
4. Jalankan program pada browser anda dengan alamat `http://localhost/profile-matching/` atau `http://<ip_address>/profile-matching`.

# Di Bangun Menggunakan
* [Codeigniter versi 3.1.11](https://codeigniter.com/) - Sebagai Framework PHP.
* [AdminLTE versi 3](https://adminlte.io) - Sebagai Template Frontend.

# Kontributor
* Afiah Solihah - Konseptor
* [Gilang Pratama Priadi](https://blog.kodepanda.id/) - Penulis Script.
