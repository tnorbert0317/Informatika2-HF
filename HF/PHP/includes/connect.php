<?php
//Szkript amivel csatlakozunk az adatbázishoz

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = 'ecarz4sale';

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Connection failed!");
mysqli_query($conn, "SET character_set_results='utf8'");
?>