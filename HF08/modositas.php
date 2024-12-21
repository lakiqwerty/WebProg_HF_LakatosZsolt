<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
require_once 'db_connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM hallgatok WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $hallgato = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $nev = $_POST['nev'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];

    $stmt = $conn->prepare("UPDATE hallgatok SET nev = :nev, szak = :szak, atlag = :atlag WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nev', $nev);
    $stmt->bindParam(':szak', $szak);
    $stmt->bindParam(':atlag', $atlag);

    if ($stmt->execute()) {
        header("Location: listazas.php");
        exit;
    } else {
        echo "Hiba a módosítás során: " . $stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html>
<body>
<h1>Hallgató módosítása</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($hallgato['id']) ?>">
    Név: <input type="text" name="nev" value="<?= htmlspecialchars($hallgato['nev']) ?>" required><br>
    Szak: <input type="text" name="szak" value="<?= htmlspecialchars($hallgato['szak']) ?>" required><br>
    Átlag: <input type="number" name="atlag" value="<?= htmlspecialchars($hallgato['atlag']) ?>" required><br>
    <input type="submit" value="Módosítás">
</form>
<p><a href="listazas.php">Vissza a listához</a></p>
</body>
</html>
