<?php
function openCon(){
    $servername = 'localhost';
    $dbname = 'jobby';
    $username = 'root';
    $password = '';
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    }catch(PDOException $pe){
        die("could not connect to database $dbname" . $pe->getMessage());
    }
    return $conn;
}
function closeCon($conn){
    $conn->close();
}
?>