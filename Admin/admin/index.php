<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>   
    <h1>Table User</h1>
    <table border = '2'>
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Email</td>
            <td>Password</td>
            <td>Role</td>
        </tr>
        <a href="Innerjoin.php"><button>Innerjoin</button></a>
        <?php
        include "../../function.php";
        $query = mysqli_query ($mysqli, "SELECT *FROM customer ") or die(mysqli_error());

        while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $data ['id_user'];?></td>
            <td><?php echo $data ['USERNAME'];?></td>
            <td><?php echo $data ['EMAIL'];?></td>
            <td><?php echo $data ['PASSWORD'];?></td>
            <td><?php echo $data ['role'];?></td>
            <td><a href='edit.php?id=<?php echo $data['id_user'];?>'>EDIT</a></td>
            <td><a href='delete.php?id=<?php echo $data['id_user'];?>'>DELETE</a></td>
        </tr>
        <?php }?>
    </table>
    <a href="../halamanlogin.php"><button>BACK</button></a>
</body>
</html>