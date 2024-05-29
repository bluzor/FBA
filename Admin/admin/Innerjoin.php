<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="innerjoin.css">
</head>
<body>
    <table border='2'>
        <tr>
            <th>ID Transaksi</th>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Harga</th>
        </tr>
        <?php
            include '../../function.php';
            $query = mysqli_query($mysqli, "SELECT transaksi.ID_Transaksi, produk.ID_Produk, transaksi.Nama_Produk, transaksi.Total_Price
            FROM transaksi
            INNER JOIN produk ON produk.ID_Produk = transaksi.ID_Produk") or die(mysqli_error($mysqli));
            while($data = mysqli_fetch_assoc($query)){
        ?>
        <tr>
            <td><?php echo $data['ID_Transaksi'];?></td>
            <td><?php echo $data['ID_Produk'];?></td>
            <td><?php echo $data['Nama_Produk'];?></td>
            <td><?php echo $data['Total_Price'];?></td>
            <td><a href='deleteinner.php?ID=<?php echo $data['ID_Transaksi']?>'>DELETE</a></td>
        </tr>
        <?php }?>
    </table>
    <a href="index.php"><button class="back-button">BACK</button></a>
</body>
</html>
