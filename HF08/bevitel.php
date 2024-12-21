<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nev = $_POST['nev'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];

    $stmt = $conn->prepare("INSERT INTO hallgatok (nev, szak, atlag) VALUES (:nev, :szak, :atlag)");
    $stmt->bindParam(':nev', $nev);
    $stmt->bindParam(':szak', $szak);
    $stmt->bindParam(':atlag', $atlag);

    if ($stmt->execute()) {
        echo "Hallgató sikeresen hozzáadva!";
    } else {
        echo "Hiba: " . $stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hallgató felvitele</title>
</head>
<body>
<h2>Új hallgató felvétele</h2>
<form method="post">
    Név: <input type="text" name="nev" required><br>
    Szak: <input type="text" name="szak" required><br>
    Átlag: <input type="number" step="0.1" name="atlag" required><br>
    <input type="submit" value="Hozzáadás">
</form>
<p><a href="listazas.php">Vissza a listához</a></p>
</body>
</html>
