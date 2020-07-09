<?php
//Information of Database
$hostname = 'localhost';
$dbport = 3306;
$dbname = 'mart';
$username = 'root';
$password = 'root';

//Setting connect database
$connection = new mysqli($hostname, $username, $password, $dbname, $dbport);
if($connection->connect_error){
    die($connection->connect_error); //Show error connect
}

//Function run query
function queryRUN($qry){
    global $connection; //Set variable $connection to global
    $result = $connection->query($qry);
    if(!$result){
        die($connection->error);
    }

    return $result;
}

?>