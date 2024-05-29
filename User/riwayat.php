<?php

    // mengaktifkan session pada php
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
            <th>username</th>
            <th>ID Transaksi</th>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Delete</th>
        </tr>
        <?php
            include '../function.php';
            $query = mysqli_query($mysqli, "SELECT transaksi.Nama_Pelanggan,transaksi.ID_Transaksi, produk.ID_Produk, transaksi.Nama_Produk,transaksi.Jumlah, transaksi.Total_Price
            FROM transaksi  
            INNER JOIN produk ON produk.ID_Produk = transaksi.ID_Produk
            where transaksi.id_user = 1") or die(mysqli_error($mysqli));
            while($data = mysqli_fetch_assoc($query)){
        ?>
        <tr>
            <td><?php echo $data['Nama_Pelanggan'];?></td>
            <td><?php echo $data['ID_Transaksi'];?></td>
            <td><?php echo $data['ID_Produk'];?></td>
            <td><?php echo $data['Nama_Produk'];?></td>
            <td><?php echo $data['Jumlah'];?></td>
            <td><?php echo $data['Total_Price'];?></td>
            <td><a href='deleteinner.php?ID=<?php echo $data['ID_Transaksi']?>'>DELETE</a></td>
        </tr>
        <?php }?>
    </table>
    <a href="halamanlogin.php"><button class="back-button">BACK</button></a>
</body>
</html>
