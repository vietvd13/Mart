<?php
require_once 'dbconnect.php';

session_start();

if(isset($_POST['user_us'])){
    $username = mysqli_real_escape_string($connection, $_POST['user_us']);
    $password = mysqli_real_escape_string($connection, $_POST['user_pw']);

    $token = md5($password);

    $qry = "SELECT * FROM user WHERE user_us = '$username' AND user_pw = '$token'";

    $result = queryRUN($qry);

    $row = mysqli_fetch_array($result);

    if(is_array($row)){
        $_SESSION['user_us'] = $username;
    }else{
        ?>
            <script type="text/javascript">
                alert("Login failed !");
                window.location.href = "index.php";
            </script>
        <?php } }

    if(isset($_SESSION['user_us'])){
        header("Location: home.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KKK Supermarket</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="shortcut icon" href="img/ficon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <center>
        <form action="" class="form-login" method="POST">
            <img src="img/icon-user.png" alt="">
            <h2 id="title-login">Login System</h2>
            <input type="text" name="user_us" placeholder="Username" required="">
            <input type="password" name="user_pw" placeholder="Password" required="">
            <input type="submit" id="inp_login" value="Login">
        </form>
    </center>
</body>
</html>