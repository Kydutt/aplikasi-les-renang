<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquaSwim - Les Renang Profesional</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Animated Background -->
    <div class="wave-background">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>

    <!-- Navigation -->
    <nav>
        <div class="logo">AQUASWIM</div>
        <ul class="nav-links">
            <li><a href="#home">Beranda</a></li>
            <li><a href="#features">Keunggulan</a></li>
            <li><a href="#programs">Program</a></li>
            <li><a href="#contact">Kontak</a></li>
            <li><a href="halaman_login/login.php" class="btn-nav">Login</a></li>
        </ul>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
            <h1>
                BELAJAR RENANG
                <span class="highlight">BERSAMA AHLI</span>
            </h1>
            <p>Tingkatkan kemampuan renang Anda dengan pelatih profesional bersertifikat. Dari pemula hingga atlet.</p>
            <div class="cta-buttons">
                <a href="halaman_login/register.php" class="btn btn-primary">Daftar Sekarang</a>
                <a href="#programs" class="btn btn-secondary">Lihat Program</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <h2 class="section-title">Keunggulan Kami</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🏊‍♂️</div>
                <h3>Pelatih Bersertifikat</h3>
                <p>Semua instruktur kami memiliki sertifikasi internasional dan pengalaman mengajar lebih dari 5 tahun.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🏅</div>
                <h3>Program Terstruktur</h3>
                <p>Kurikulum lengkap dari dasar hingga tingkat kompetisi dengan metode pembelajaran yang terbukti efektif.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">👥</div>
                <h3>Kelas Kecil</h3>
                <p>Maksimal 6 peserta per kelas untuk memastikan perhatian personal dari instruktur kepada setiap peserta.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🏊‍♀️</div>
                <h3>Fasilitas Premium</h3>
                <p>Kolam renang standar olimpik dengan sistem filtrasi modern dan area yang bersih serta aman.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Tracking Progress</h3>
                <p>Sistem monitoring perkembangan digital untuk memantau kemajuan belajar Anda secara real-time.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⏰</div>
                <h3>Jadwal Fleksibel</h3>
                <p>Berbagai pilihan waktu latihan dari pagi hingga malam sesuai dengan kesibukan Anda.</p>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="programs" class="programs">
        <h2 class="section-title">Program Les Renang</h2>
        <div class="programs-grid">
            <div class="program-card">
                <h3>Paket Pemula</h3>
                <div class="price">RP 500K</div>
                <ul>
                    <li>8 Sesi Pertemuan</li>
                    <li>Durasi 60 menit/sesi</li>
                    <li>Teknik dasar renang</li>
                    <li>Kelas maksimal 6 orang</li>
                    <li>Sertifikat kelulusan</li>
                </ul>
                <a href="halaman_login/register.php?program=pemula" class="btn btn-primary">Pilih Paket</a>
            </div>
            <div class="program-card">
                <h3>Paket Menengah</h3>
                <div class="price">RP 750K</div>
                <ul>
                    <li>12 Sesi Pertemuan</li>
                    <li>Durasi 60 menit/sesi</li>
                    <li>4 Gaya renang lengkap</li>
                    <li>Teknik pernapasan advanced</li>
                    <li>Video analisis gerakan</li>
                    <li>Sertifikat kelulusan</li>
                </ul>
                <a href="halaman_login/register.php?program=menengah" class="btn btn-primary">Pilih Paket</a>
            </div>
            <div class="program-card">
                <h3>Paket Profesional</h3>
                <div class="price">RP 1.2JT</div>
                <ul>
                    <li>16 Sesi Pertemuan</li>
                    <li>Durasi 90 menit/sesi</li>
                    <li>Personal training</li>
                    <li>Program latihan khusus</li>
                    <li>Persiapan kompetisi</li>
                    <li>Konsultasi nutrisi</li>
                    <li>Sertifikat & merchandise</li>
                </ul>
                <a href="halaman_login/register.php?program=profesional" class="btn btn-primary">Pilih Paket</a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <h2 class="section-title">Hubungi Kami</h2>
        <div class="contact-container">
            <form action="contact/process_contact.php" method="POST" id="contactForm">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Nomor Telepon</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="program">Program yang Diminati</label>
                    <select id="program" name="program" required>
                        <option value="">Pilih Program</option>
                        <option value="pemula">Paket Pemula</option>
                        <option value="menengah">Paket Menengah</option>
                        <option value="profesional">Paket Profesional</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message">Pesan</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-full">Kirim Pesan</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>AquaSwim</h3>
                <p>Les renang profesional untuk segala usia. Wujudkan impian Anda menjadi perenang handal.</p>
            </div>
            <div class="footer-section">
                <h4>Kontak</h4>
                <p>📍 Jl. Renang Indah No. 123, Jakarta</p>
                <p>📞 +62 812-3456-7890</p>
                <p>✉️ info@aquaswim.com</p>
            </div>
            <div class="footer-section">
                <h4>Jam Operasional</h4>
                <p>Senin - Jumat: 06.00 - 21.00</p>
                <p>Sabtu - Minggu: 07.00 - 19.00</p>
            </div>
            <div class="footer-section">
                <h4>Media Sosial</h4>
                <div class="social-links">
                    <a href="#">Instagram</a>
                    <a href="#">Facebook</a>
                    <a href="#">YouTube</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 AquaSwim. All rights reserved.</p>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>