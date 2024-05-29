<?php
session_start();
include 'function.php'; // Pastikan file function.php ada dan terhubung dengan benar

// Koneksi ke database
$host = "localhost";
$username = "root";
$pass = "";
$db = "peras_susu_sapi";
$mysqli = mysqli_connect($host, $username, $pass, $db);

if (!$mysqli) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    $username = $_POST["USERNAME"];
    $password = $_POST["PASSWORD"];

    // Menggunakan prepared statements untuk mencegah SQL Injection
    $stmt = $mysqli->prepare("SELECT * FROM customer WHERE USERNAME = ? AND PASSWORD = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $cek = $result->num_rows;

    if ($cek >= 1) {
        $data = $result->fetch_assoc();

        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        if ($data['role'] == "Admin") {
            $_SESSION['role'] = "admin";
            header("Location: Admin/admin/index.php");
            exit();
        } else if ($data['role'] == "User") {  // Kondisi lain untuk user non-admin
            $_SESSION['role'] = "user";
            header("Location: ../User/user/index.php");
            exit();
        } else {
            header("Location: User/halamanlogin.php");
            exit();
        }
    } else {
        header("Location: login.php");
        exit();
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Contoh Website</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="USERNAME" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="PASSWORD" required>
            </div>
            <div class="submit">
                <button type="submit" name="submit" value="login">Submit</button>
            </div>
        </form>
        <div class="register-link">
            <p>Belum punya akun? <a href="register.php">Daftar disini</a></p>
        </div>
    </div>

    <footer>
    </footer>
</body>
</html>
