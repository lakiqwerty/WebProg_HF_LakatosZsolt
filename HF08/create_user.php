<?php

require_once 'db_connect.php';

$password = 'admin';

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$username = 'admin';

try {
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->execute();

    echo "Felhasználó sikeresen létrehozva!";
} catch (PDOException $e) {
    die("Hiba a felhasználó létrehozásakor: " . $e->getMessage());
}

$conn = null;
?>
