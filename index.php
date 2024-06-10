<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliniqueue</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="./assetss/logo1.png" alt="Cliniqueue Logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="schedule.php">Temukan Dokter</a></li>
                <li><a href="history.php">Riwayat Reservasi</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="hero d-flex align-items-center justify-content-between p-5">
            <div class="hero-text">
                <h1>Pesan Dokter dengan Mudah:</h1>
                <p>Solusi Kesehatan Anda di Ujung Jari</p>
            </div>
            <div class="hero-image">
                <img src="./assetss/doctorbg.png" alt="Doctor Image" class="img-fluid">
            </div>
        </section>
        <section class="features d-flex justify-content-around flex-wrap p-5">
            <a href="users.php" class="feature d-flex flex-column align-items-center text-center p-3 m-2">
                <img src="./assetss/userc.png" alt="Pendaftaran Pasien">
                <h2>Pendaftaran Pasien</h2>
                <p>Daftar sebagai pasien untuk mendapatkan fasilitas layanan yang lebih banyak</p>
            </a>
            <a href="schedule.php" class="feature d-flex flex-column align-items-center text-center p-3 m-2">
                <img src="./assetss/calender.png" alt="Temukan Jadwal Dokter">
                <h2>Temukan Jadwal Dokter</h2>
                <p>Lihat jadwal dokter untuk menentukan jadwal konsultasi yang tepat</p>
            </a>
            <a href="queue.php" class="feature d-flex flex-column align-items-center text-center p-3 m-2">
                <img src="./assetss/user.png" alt="Antrian Pasien">
                <h2>Antrian Pasien</h2>
                <p>Lihat antrian pasien untuk mengetahui urutan konsultasi Anda</p>
            </a>
            <a href="reservation.php" class="feature d-flex flex-column align-items-center text-center p-3 m-2">
                <img src="./assetss/stet.png" alt="Buat Reservasi Dokter">
                <h2>Buat Reservasi Dokter</h2>
                <p>Reservasi jadwal konsultasi dengan dokter Anda hanya dari layar gadget Anda</p>
            </a>
        </section>
    </main>
    <footer>
        <div class="footer-logo">
            <img src="./assetss/logo2.png" alt="Cliniqueue Logo">
        </div>
        <div class="contact-info">
            <p><img src="./assetss/phone.png" alt="Phone Icon"> Call us at: 123-456-7890</p>
        </div>
    </footer>
</body>
</html>
