<?php
require_once 'header.php';

$id = $_POST['id'];
$qry = "SELECT * FROM product WHERE product_id = '$id'";
$result = queryRUN($qry);
$row = mysqli_fetch_array($result);
$name = $row['product_name'];
$brand = $row['brand_id'];
$price = $row['product_price'];
$image = $row['product_img'];

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $image = "";  

    if(isset($_FILES['image']) && $_FILES['image']['size'] != 0){
        $temp_name = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        $parts = explode(".", $img_name);
        $lastIndex = count($parts) - 1;
        $extension = $parts[$lastIndex];
        $image = $price . "_" . $brand . "_" . $extension;
        $img_url = $_SERVER['DOCUMENT_ROOT'] . "/Mart/admin/img/product/";
        $destination = $img_url . $image;

        move_uploaded_file($temp_name, $destination);
    }else{
        $image = $row['product_img'];
    }

$qry_update = "UPDATE product SET product_img = '$image', product_name = '$name', brand_id = '$brand', product_price = '$price' WHERE product_id = '$id'";
$result_update = queryRUN($qry_update);

if($result_update){
    ?> 
        <script>
            alert("Update product successfully!");
            window.location.href = 'manager-product.php';
        </script>
    <?php
}else{
    ?>
        <script>
            alert("Update product failed!");
        </script>
    <?php
} 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KKK Supermarket</title>
    <link rel="stylesheet" href="css/admin.css?version=13.0">
    <link rel="shortcut icon" href="img/ficon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <center>
        <h1>Update Product</h1>
        <form action="" class="update-product" method="POST" enctype="multipart/form-data">
            Name <input type="text" name="name" value="<?= $name ?>" maxlength="50">
            <?php
                $qry = "SELECT * FROM brand";
                $result = queryRUN($qry);
            ?>
            Brand <select name="brand">
                <?php
                    while($row = mysqli_fetch_array($result)){
                        if($row['brand_id'] == $brand){
                            ?>
                                <option value="<?= $brand ?>" selected><?= $row['brand_name'] ?></option>
                            <?php
                        }else{
                            ?>
                                <option value="<?= $row['brand_id'] ?>"><?= $row['brand_name'] ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
            Price <input type="number" name="price" value="<?= $price ?>" maxlength="11">
            Image <br><br>
            <img src='img\product\<?= $image ?>' width="200" height="200">
            <input type="file" name="image">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" value="Update Product" name="update" class="btn-add">
        </form>
    </center>

</body>
</html>