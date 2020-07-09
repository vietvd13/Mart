<?php
//Show header page
require_once "header.php";

//query
$qry = "SELECT * FROM user";
$result = queryRUN($qry);
//Count number users 
$total = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KKK Supermarket</title>
    <link rel="stylesheet" href="css/admin.css?version=4.0">
    <link rel="shortcut icon" href="img/ficon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <center>
        <h1>Manager Users</h1>
        <h2>Total: <?= $total ?></h2>
        <table class="tbl">
            <tr>
                <th>Username</th>
                <th>Options</th>
            </tr>
            <?php
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo '<td>' . $row["user_us"] . '</td>';
                
                ?>
                <td>
                    <form action="update-pass.php" method="POST" class="btn-option">
                        <input type="hidden" name="id" value='<?= $row['user_id'] ?>'>
                        <input type="submit" value="Update Password">
                    </form>
                    <form action="delete-user.php" method="POST" class="btn-option" onsubmit="return cfDelete();">
                        <input type="hidden" name="id" value='<?= $row['user_id'] ?>'>
                        <input type="submit" value="Delete User">
                    </form>
                </td>
            <?php } ?>

        </table>
    </center>

    <script>
        function cfDelete(){
            var del = confirm("Do you want to delete this user?");
            if(del){
                return true;
            }else{
                return false;
            }
        }
    </script>
    
</body>
</html>