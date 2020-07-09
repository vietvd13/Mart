<?php
require_once 'header.php';
$id = $_POST['id'];
if(isset($_POST['change'])){
    $pass = $_POST['pass'];
    $cfpass = $_POST['cfpass'];
    if($pass != $cfpass){
        ?>
            <script>
                alert("Update password faild! Password and Confirm Password is not same");
                window.location.href('manager-user.php');
            </script>
        <?php
    }else{
        $token = md5($pass);
        $qry = "UPDATE user SET user_pw = '$token' WHERE user_id = '$id'";
        $result = queryRUN($qry);
        if($result){
            ?>
                <script>
                    alert("Update password successfully !");
                    window.location.href = 'manager-user.php';
                </script>
            <?php
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KKK Supermarket</title>
    <link rel="stylesheet" href="css/admin.css?version=7.0">
    <link rel="shortcut icon" href="img/ficon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <center>
        <h1>Update Password</h1>
        <form action="update-pass.php" class="update-password" method="POST">
            <input type="password" name="pass" placeholder="Password..." required maxlength="50"><br><br>
            <input type="password" name="cfpass" placeholder="Confirm Password..." required maxlength="50">
            <input type="hidden" name="id" value="<?= $id ?>"><br><br><br>
            <input type="submit" name="change" value="Change Password">
        </form>
    </center>
</body>
</html>