<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
require_once 'db_connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM hallgatok WHERE id = :id");
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: listazas.php");
        exit;
    } else {
        echo "Hiba a törlés során: " . $stmt->errorInfo()[2];
    }
}
?>
