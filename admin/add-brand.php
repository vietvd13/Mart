<?php
require_once 'header.php';

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $qry = "INSERT INTO brand (brand_name) VALUES ('$name')";
    $result = queryRUN($qry);
    if($result){
        ?>
            <script type="text/javascript">
                alert("Add brand successfully!");
                window.location.href = "manager-brand.php";
            </script>
        <?php
    }else{
        ?>
            <script type="text/javascript">
                alert("Add brand failed!");
                window.location.href = "manager-brand.php";
            </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>KKK Supermarket</title>
    <link rel="stylesheet" href="css/admin.css?version=10.0">
    <link rel="shortcut icon" href="img/ficon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <center>
        <h1>Add Brand</h1>
        <form action="add-brand.php" method="POST" class="add-brand">
            <input type="text" name="name" placeholder="Name Brand" required maxlength="30"><br><br>
            <input type="submit" name="add" value="Add Brand">
        </form>
    </center>
</body>
</html>