<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE DATABASE IF NOT EXISTS egyetem";
    $conn->exec($sql);
    echo "Az 'egyetem' adatbázis sikeresen létrehozva vagy már létezik!<br>";

    $conn->exec("USE egyetem");

    $sql = "CREATE TABLE IF NOT EXISTS hallgatok (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nev VARCHAR(255) NOT NULL,
        szak VARCHAR(255) NOT NULL,
        atlag DOUBLE NOT NULL
    )";
    $conn->exec($sql);
    echo "A 'hallgatok' tábla sikeresen létrehozva vagy már létezik!<br>";

    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    )";
    $conn->exec($sql);
    echo "A 'users' tábla sikeresen létrehozva vagy már létezik!<br>";

} catch (PDOException $e) {
    die("Hiba az adatbázis vagy a tábla létrehozásakor: " . $e->getMessage());
}

$conn = null;
?>
