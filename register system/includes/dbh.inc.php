<?php 
$serverName = "localhost";
$dBUserName = "root";
$dBPasword = "";
$dBName = "phpproject"; 

$conn = mysqli_connect($serverName, $dBUserName, $dBPasword, $dBName); 
if (!$conn) { 
    die("connect failled " . mysqli_connect_error());
} 
