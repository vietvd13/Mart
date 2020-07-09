<?php
require_once 'header.php';
$qry = "SELECT * FROM brand";
$result = queryRUN($qry);
$total = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>KKK Supermarket</title>
    <link rel="stylesheet" href="css/admin.css?version=8.0">
    <link rel="shortcut icon" href="img/ficon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <center>
        <h1>Manager Brands</h1>
        <h2>Total: <?= $total ?></h2>
        <table class="tbl-brand">
            <tr>
                <th>Brand ID</th>
                <th>Brand Name</th>
                <th>Options</th>
            </tr>
            <?php
                while($row = mysqli_fetch_array($result)){
                    $id = $row['brand_id'];
                    $name = $row['brand_name'];
            ?>
            <tr>
                <td> <?= $id ?> </td>
                <td> <?= $name ?> </td>
                <td>
                    <form action="update-brand.php" class="btn-option" method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="submit" value="Update Brand">
                    </form>
                    <form action="delete-brand.php" class="btn-option" onsubmit="return cfDelete();" method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="submit" value="Delete Brand">
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </center>
    <script>
        function cfDelete(){
            var del = confirm("Do you want delete brand?");

            if(del){
                return true;
            }else{
                return false;
            }
        }
    </script>
</body>
</html>
