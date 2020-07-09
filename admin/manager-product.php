<?php
require_once 'header.php';

$qry = "SELECT * FROM product";

if(isset($_POST['search'])){
    $keyword = $_POST['keyword'];
    $qry .= " WHERE product_name LIKE '%$keyword%' OR product_price LIKE '%$keyword%'";
    $result = queryRUN($qry);
    if($result->num_rows == 0){
        ?>
            <script>
                alert("Product not found");
                window.location.href = "";
            </script>
        <?php
    }
}

$result = queryRUN($qry);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KKK Supermarket</title>
    <link rel="stylesheet" href="css/admin.css?version=12.0">
    <link rel="shortcut icon" href="img/ficon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <center>
        <h1>Manager Product</h1>
        <?php
            $qry_view = "SELECT * FROM product";
            $result_view = queryRUN($qry_view);
            $toal_view = $result->num_rows;
        ?>
        <h2>Total: <?= $toal_view ?></h2>
        <form action="" class="search-product" method="POST">
            <h3>Search Product</h3>
            <input type="text" name="keyword" placeholder="Input name of price of product">
            <input type="submit" value="Search" name="search">
        </form>
        <table class="tbl-product">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Options</th>
            </tr>
            <?php
                while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?php echo $row[0]; ?></td>
                        <td class="cl-img">
                            <img src="img\product\<?= $row['product_img'] ?>" alt="" width="200" height="200">
                        </td>
                        <td>
                            <?php echo $row[2]; ?>
                        </td>
                        <td>
                            <?php
                                $qry_brand = "SELECT * FROM brand";
                                $result_brand = queryRUN($qry_brand);
                                while($row_brand = mysqli_fetch_array($result_brand)){
                                    if($row['brand_id'] == $row_brand['brand_id']){
                                        $brand = $row_brand['brand_name'];
                                    }
                                }
                            ?>
                            <?= $brand ?>
                        </td>
                        <td>
                            <?php
                                echo $row[4];
                            ?>
                        </td>
                        <td>
                            <form action="update-product.php" class="btn-option" method="POST">
                                <input type="hidden" name="id" value="<?= $row[0] ?>">
                                <input type="submit" value="Update Product">
                            </form>
                            <form action="delete-product.php" class="btn-option" method="POST" onsubmit="return cfDelete();">
                                <input type="hidden" name="id" value="<?= $row[0] ?>">
                                <input type="submit" value="Delete Product">
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </center>
    <script>
        function cfDelete(){
            var del = confirm("Do you want to delete this product?");
            if(del){
                return true;
            }else{
                return false;
            }
        }
    </script>
</body>
</html>