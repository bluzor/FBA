<?php
include_once("function.php");

if (isset($_POST['Submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $result = mysqli_query($mysqli, 
    "INSERT INTO customer (email, username, password, role) VALUES ('$email', '$username', '$password', '$role')");
    if ($result) {
        echo "Redirection is about to occur."; // Debugging output
        // header("Location:User/halamanlogin.php");
        header("location: login.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>