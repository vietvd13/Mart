<?php
require_once 'dbconnect.php';
require_once 'checklogin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KKK Supermarket</title>
    <link rel="stylesheet" href="css/admin.css?version=2.0">
    <link rel="shortcut icon" href="img/ficon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <ul>
        <li>
            <a href="home.php">Home</a>
        </li>
        <li>
            <a href="javascript:void(0)">Products<i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
            <ul class="sub-menu">
                <li>
                    <a href="manager-product.php">Manager Products</a>
                </li>
                <li>
                    <a href="add-product.php">Add Product</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0)">Brands<i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
            <ul class="sub-menu">
                <li>
                    <a href="manager-brand.php">Manager Brands</a>
                </li>
                <li>
                    <a href="add-brand.php">Add Brand</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0)">Users<i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
            <ul class="sub-menu">
                <li>
                    <a href="manager-user.php">Manager Users</a>
                </li>
                <li>
                    <a href="add-user.php">Add User</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="\Mart/index.php">Back to Home Page</a>
        </li>
        <li>
            <a onclick="about();">About</a>
        </li>
        <li>
            <a href="logout.php">Logout</a>
        </li>
        <script type="text/javascript">
            function about() {
                alert("Copyright by Vu Duc Viet !");
            }
        </script>
    </ul>
</body>
</html>