<?php
require_once 'header.php';
//Select from user
$qry = "SELECT * FROM user";
//run query
$result = queryRUN($qry);
//get number row
$total = $result->num_rows;
//check if number row > 1 will delete
if($total > 1){
    $id = $_POST["id"];
    //query
    $qry = "DELETE FROM user WHERE user_id = '$id'";
    //run query
    $result = queryRUN($qry);
    //check true or false
    if($result){//True
        ?>
            <script>
                alert("Delete user successfully !");
                window.location.href = "manager-user.php";
            </script>
        <?php
    }else{//False
        ?>
            <script>
                alert("Delete user failed !");
                window.location.href = "manager-user.php";
            </script>
        <?php
    }
}else{//number row <= 1
    ?>
        <script>
            alert("Delete user failed! The number of accounts reaching the limit cannot be deleted");
            window.location.href = "manager-user.php";
        </script>
    <?php
}
?>