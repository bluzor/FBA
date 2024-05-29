<?php
        include("../../function.php");

        if (isset($_POST['Save'])) {
            $id = $_POST['id'];
            $username= $_POST['username'];
            $password= $_POST['password'];
            $level= $_POST['level'];
            $email= $_POST['email'];

            $result = mysqli_query($mysqli,"UPDATE customer SET USERNAME='$username' ,PASSWORD='$password',role='$level' ,EMAIL='$email' WHERE id_user=$id");
            header('Location:index.php');       

            // header("location:index.php");
        }
        ?>