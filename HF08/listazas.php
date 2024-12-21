<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
require_once 'db_connect.php';

$stmt = $conn->prepare("SELECT * FROM hallgatok");
$stmt->execute();
$hallgatok = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hallgatók listázása</title>
</head>
<body>
<h2>Hallgatók listája</h2>
<?php if (count($hallgatok) > 0): ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Név</th>
            <th>Szak</th>
            <th>Átlag</th>
            <th>Műveletek</th>
        </tr>
        <?php foreach ($hallgatok as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['nev']) ?></td>
                <td><?= htmlspecialchars($row['szak']) ?></td>
                <td><?= htmlspecialchars($row['atlag']) ?></td>
                <td>
                    <a href="modositas.php?id=<?= $row['id'] ?>">Módosítás</a>
                    <a href="torles.php?id=<?= $row['id'] ?>">Törlés</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Nincs megjeleníthető adat!</p>
<?php endif; ?>
<p><a href="bevitel.php">Új hallgató felvétele</a></p>
<p><a href="logout.php">Kijelentkezés</a></p>
</body>
</html>
