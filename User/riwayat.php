<?php
    // Mengaktifkan session pada PHP
    $host = "localhost";
    $usernamess = "root";
    $pass = "";
    $db = "peras_susu_sapi";

    $mysqli = mysqli_connect($host, $usernamess, $pass, $db);
    session_start();    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="riwayat.css">
</head>
<body>
    <table border='2'>
        <tr>
            <th>Username</th>
            <th>ID Transaksi</th>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Delete</th>
        </tr>
        <?php
            session_start();
            include_once("../function.php");

            if(isset($_SESSION['id_user']))            
        ?>
        <?php }?>
    </table>
    <a href="halamanlogin.php"><button class="back-button">BACK</button></a>
</body>
</html>
                