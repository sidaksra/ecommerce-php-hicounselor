<?php

function ConnectDB(){
    $servername = "localhost:3307";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "ecommerce"; // Replace with your database name
    
    // Create connection
    try{
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Database Connected!";
    }catch(PDOException $e){
        die("Connection Failed " .$e->getMessage());
    
    }
    return $pdo;
}


?>