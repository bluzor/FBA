<?php
    include("../../function.php");

    if(!isset($_GET['id'])){
        header('location: index.php');
    }

    $id = $_GET['id'];

    $result =  mysqli_query($mysqli, "SELECT  * FROM customer WHERE id_user=$id");

    while($user = mysqli_fetch_assoc($result)){

        $username = $user['USERNAME'];
        $email = $user['EMAIL'];
        $pass = $user['PASSWORD'];
        $role = $user['role'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <form action="edit2.php" method="post">
        <label for="">Username</label>
        <input type="text" name="username" value="<?php echo $username;?>">
        <label for="">Email</label>
        <input type="email" name="email" value="<?php echo $email;?>">
        <label for="">Password</label>
        <input type="password" name="password" value="<?php echo $pass;?>">
        <select name="role" id="" value = "<?php echo $role;?>">
            <option value="" disabled selected>Choose Role</option>
            <option value="Admin">admin</option>
            <option value="User">user</option>
        </select>
        <input type="hidden" name="id" value = <?php echo $_GET['id'];?>>
        <input type="submit" name="Save" value="Save">
    </form>
</body>
</html>