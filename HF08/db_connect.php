<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "egyetem";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    die("Kapcsolódási hiba: " . $e->getMessage());
}
?>
