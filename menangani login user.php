<?php
// mengaktifkan session pada php

include 'function.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

// query untuk mengecek username dan password pada database
$login = mysqli_query($mysqli,"SELECT * FROM customer WHERE USERNAME='$username' AND PASSWORD='$password'");
// $row = mysqli_fetch_assoc
$cek = mysqli_num_rows($login);

if($cek > 0){
   $data = mysqli_fetch_assoc($login);
   echo $data["id_user"];
   // cek jika user login sebagai admin
   if($data['role']=="admin"){
    // buat session login dan username
    $_SESSION['USERNAME']= $username;
    $_SESSION['role']= "admin";
    $_SESSION['id_user']= $data["id_user"];
    // alihkan ke halaman dashboard admin
    header("location:Admin/halamanlogin.php");

    // cek jika user login sebagai user
   }elseif($data['role']=="user"){
    // buat session login dan username
    $_SESSION['USERNAME']= $username;
    $_SESSION['role']= "user";
     // alihkan ke halaman dashboard user
     header("location: ./User/halamanlogin.php");
   }
}else{ 
     // alihkan ke halaman login kembali
     echo "Error";
}