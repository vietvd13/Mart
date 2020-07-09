<?php
require_once 'header.php';

$id = $_POST['id'];

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $qry = "UPDATE brand SET brand_name = '$name' WHERE brand_id = '$id'";
    $result = queryRUN($qry);
    if($result){
        ?>
            <script type="text/javascript">
                alert("Update brand successfully!");
                window.location.href = "manager-brand.php";
            </script>
        <?php
    }else{
        ?>
            <script type="text/javascript">
                alert("Update brand failed!");
                Window.location.href = "manager-brand.php";
            </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>KKK Supermarket</title>
    <link rel="stylesheet" href="css/admin.css?version=11.0">
    <link rel="shortcut icon" href="img/ficon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <center>
        <h1>Update Brand</h1>
        <form action="update-brand.php" method="POST" class="update-brand">
        <?php
            $qry = "SELECT * FROM brand WHERE brand_id = '$id'";
            $result = queryRUN($qry);
            $brand = mysqli_fetch_array($result);
        ?>
            <input type="hidden" name="id" value="<?= $brand[0] ?>">
            <input type="text" name="name" value="<?= $brand[1] ?>" size="30"><br><br>
            <input type="submit" name='update' value="Update Brand">
        </form>
    </center>
</body>
</html>
