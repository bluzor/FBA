<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<form action="index_process.php" method="post">
    <h2>Order Form</h2>
        <label for="number">Name</label>
        <input type="text" name="name" id="name" placeholder="Massukan Nama Anda" required>
        <label for="product">Product:</label>
        <select id="product" name="product_id" required>
            <option value="">Select Product</option>
            <?php
            // Ambil daftar produk dari database
            include '../../function.php';
            $query = "SELECT * FROM produk";
            $result = mysqli_query($mysqli, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['ID_Produk']}' > {$row['Nama_Produk']} - Rp.{$row['Harga']}</option>";
            }
            ?>
        </select>
        <br>
        <label for="quantity">Jumlah Pembelian:</label>
        <input type="number" id="quantity" name="quantity" min="1" value="1" required>
        <br>
        <input type="submit" value="Submit Order" name="submit">
    </form>
</body>
</html>