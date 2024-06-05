<?php
session_start();
include '../../function.php';

if(isset($_SESSION['id_user'])){
    $user_id = $_SESSION['id_user'];

if (isset($_POST['submit'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $usern = $_POST['name'];

    // Query untuk mendapatkan harga produk
    $query = "SELECT Nama_Produk, Harga FROM produk WHERE ID_Produk = $product_id";
    $result = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_assoc($result);
    $price = $row['Harga'];
    $nama_img = $row['Nama_Produk'];

    // Hitung total harga   
    $total_price = $price * $quantity;

    // Simpan order ke dalam database
    $insert_query = "INSERT INTO transaksi (Nama_Pelanggan, Nama_Produk, ID_Produk, Jumlah, Total_Price, id_user) 
                     Values('$usern','$nama_img','$product_id','$quantity','$total_price','$user_id')";
    if (mysqli_query($mysqli, $insert_query)) {
        // Ambil ID pesanan terakhir yang dimasukkan
        $orderID = mysqli_insert_id($mysqli);
        // Simpan ID pesanan di sesi
        $_SESSION['ID_Transaksi'] = $orderID;
        echo "<script>alert('Order successfully submitted!');</script>";
        header("Refresh: 1.2;url=order_sukses.php");
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($mysqli);
    }
} else {
    echo "No data submitted.";
    }
} else{
    echo "session ID not Found";
}
?>