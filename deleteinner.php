<?php
// mengaktifkan session pada php
session_start();    

// Database connection
$host = "localhost";
$usernamess = "root";
$pass = "";
$db = "peras_susu_sapi";

$mysqli = mysqli_connect($host, $usernamess, $pass, $db);

// Check if ID is set in the URL
if (isset($_GET['ID'])) {
    $id_transaksi = $_GET['ID'];
    
    // Delete query
    $delete_query = "DELETE FROM transaksi WHERE ID_Transaksi = '$id_transaksi'";
    
    if (mysqli_query($mysqli, $delete_query)) {
        // Redirect to the previous page after deletion
        header("Location: user/riwayat.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
} else {
    echo "ID not set in URL.";
}
?>
