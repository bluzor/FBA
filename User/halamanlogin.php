<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Jika sesi tidak ditemukan, redirect ke halaman login
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Website</title>
    <link rel="stylesheet" href="halamanlogin.css">
</head>
<body>
    <header>
        <h1>FLUZOR</h1>
        <nav>
            <ul>
                <li><a href="halamanlogin.php">Beranda</a></li>
                <li><a href="tentang.php">Tentang</a></li>
                <li><a href="produk.php">Produk</a></li>
                <li><a href="../login.php">Login</a></li>
                <li><a href="../register.php">Register</a></li>
                <li><a href="riwayat.php">Riwayat</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <div class="kotak2">
            <div class="kotak">
                <h1 id="halamanlogin.php">SELAMAT DATANG <?php echo htmlspecialchars($username); ?></h1>
                <img class="gambar" src="../gambar/Screenshot 2024-05-20 094730.png" alt="Farel" width="250px" height="250px">
                <p></p>
            </div>
        </div>
        <p></p>
    </section>

    <footer>
        <h2>Usaha Peras Susu Sapi</h2>
    </footer>
</body>
</html>
