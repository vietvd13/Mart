<?php
require_once 'header.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $qry = "SELECT * FROM product WHERE brand_id = '$id'";
    $result = queryRUN($qry);
    if($result->num_rows > 0){
        ?>
            <script>
                alert("Delete brand failed!");
                window.location.href = 'manager-brand.php';
            </script>
        <?php
    }else{
        $qry = "DELETE FROM brand WHERE brand_id = '$id'";
        $result = queryRUN($qry);
        ?>
            <script>
                alert("Delete brand successfully!");
                window.location.href = 'manager-brand.php';
            </script>
        <?php
    }
}


?>