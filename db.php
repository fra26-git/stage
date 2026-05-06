<?php
$host = "localhost";
$user = "root";      
$password = "";     
$dbname = "mydatabase";

$conn = new mysqli("localhost", "root", "", "mydatabase");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>