<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KKK Supermarket</title>
    <link rel="shortcut icon" href="admin/img/ficon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/home.css?version=5.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="main">
        <div id="header">
            <div id="top-header">
                <div id="top-header-left">
                    <ul class="show-top-header-left">
                        <li id="hotline">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>Hotline: 19001310</span>
                        </li>
                    </ul>
                </div>
                <div id="top-header-right">
                    <ul class="show-top-header-right">
                        <li class="login">
                            <a href="admin/index.php">
                                <i class="fa fa-sign-in" aria-hidden="true"></i>
                                <span>Login</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <nav id="nav-home">
                <div class="crop-nav-home">
                    <div id="logo-nav-home">
                        <a href="index.php"><img src="admin/img/logo.png" alt=""></a>
                    </div>
                    <div id="menu-home">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="">Contact Us</a></li>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Feedback</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div id="content">
            <div class="crop">
                <div class="show-brand">
                    <h2>List of Brands</h2>
                    <ul class="list-brand">
                        <?php
                            include_once ('admin/dbconnect.php');
                            $qry = "SELECT * FROM brand";
                            $result = queryRUN($qry);
                            while($row = mysqli_fetch_array($result)){
                                ?>
                                    <li>
                                        <a href="brand-detail.php?BrandID=<?= $row['brand_id'] ?>"><?= $row['brand_name'] ?></a>
                                    </li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
                <div class="show-product">
                    <?php
                        if(isset($_GET['ProductID'])){
                            $ProductID = $_GET['ProductID'];
                            $qry = "SELECT product.product_id, product.product_img, product.product_name, product.brand_id, brand.brand_name, product.product_price FROM product INNER JOIN brand ON product.brand_id = brand.brand_id WHERE product_id = '$ProductID'";
                            $result = queryRUN($qry);

                            while($row = mysqli_fetch_array($result)){
                                ?>
                                    <center>
                                        <div class="detail-product">
                                                <img src="admin\img\product\<?= $row['product_img'] ?>" alt="" width="300" height="300"><br><br>
                                                Name: <?= $row['product_name'] ?><br><br>
                                                Brand: <?= $row['brand_name'] ?><br><br>
                                                Price: <?= $row['product_price'] ?><br><br>
                                        </div>
                                    </center>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
</body>
</html>