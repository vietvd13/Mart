<?php
require_once "header.php";
if(isset($_POST['add'])){
    $username = $_POST['user_us'];
    $password = $_POST['user_pw'];
    $token = md5($password);
    $qry = "SELECT user_us FROM user";
    $result = queryRUN($qry);

    $check = TRUE;
    while($row = mysqli_fetch_array($result)){
        if($row['user_us'] == $username){
            ?>
                <script>
                    alert("Username is alrady exited !");
                    window.location.href ="add-user.php";
                </script>
            <?php
            $check = FALSE;
        }
    }

    if($check == TRUE){
        $qry = "INSERT INTO user(user_us, user_pw) VALUES('$username', '$token')";
        $result = queryRUN($qry);
        if($result){
            ?>
                <script>
                    alert("Add user successfully !");
                    window.location.href = "manager-user.php";
                </script>
            <?php
        }else{
            ?>
                <script>
                    alert("Add user failed !");
                    window.location.href = "manager-user.php";
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
    <link rel="stylesheet" href="css/admin.css?version=5.0">
    <link rel="shortcut icon" href="img/ficon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <center>
        <h1>Add User</h1>
        <form action="add-user.php" method="POST" class="adding">
            <input type="text" name="user_us" placeholder="Username" required class="frm-add-user" maxlength="20"><br><br>
            <input type="password" name="user_pw" placeholder="Password" required class="frm-add-user" maxlength="50"><br><br>
            <input type="submit" name="add" value="Add User" class="btn-add">
        </form>
    </center>
</body>
</html>