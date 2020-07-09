<?php
require_once 'header.php';
if(isset($_POST['add'])){
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
    }

    $qry = "INSERT product(product_img, product_name, brand_id, product_price) VALUES ('$image', '$name', '$brand', '$price')";
    $result = queryRUN($qry);
    if($result){
        ?>
            <script>
                alert("Add product successfully!");
                window.location.href = "manager-product.php";
            </script>
        <?php
    }else{
        ?>
            <script>
                alert("Add product failed!");
                window.location.href = "manager-product.php";
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
    <link rel="stylesheet" href="css/admin.css?version=5.0">
    <link rel="shortcut icon" href="img/ficon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <center>
        <h1>Add Product</h1>
        <form action="" method="POST" enctype="multipart/form-data" class="add-product">
            Name <input type="text" name="name" required maxlength="50">
            <?php
                $qry = "SELECT * FROM brand";
                $result = queryRUN($qry);
            ?>
            Brand <select name="brand">
                <?php
                    while($row = mysqli_fetch_array($result)){
                        ?>
                            <option value="<?= $row['brand_id'] ?>">
                            <?= $row['brand_name'] ?>
                            </option>
                        <?php
                    }
                ?>
            </select>
            Price <input type="number" name="price" required maxlength="11">
            Image <input type="file" name="image" required>
            <input type="submit" value="Add Product" name="add" class="btn-add">
        </form>
    </center>
</body>
</html>