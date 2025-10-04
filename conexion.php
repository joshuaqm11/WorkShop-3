<?php
$host = "localhost";
$user = "root";
$password = "DJQM251202";
$dbname = "WorkShop3";

$conn = new mysqli("localhost", "joshua11", "DJQM251202", "WorkShop3");


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
