<?php

include_once("../../function.php");

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM customer WHERE id_user=$id");

header("location:index.php");

?>