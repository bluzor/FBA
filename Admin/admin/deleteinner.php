<?php

include_once("../../function.php");

$id = $_GET['ID'];

$result = mysqli_query($mysqli, "DELETE FROM transaksi WHERE ID_Transaksi=$id");

header("location:Innerjoin.php");

?>