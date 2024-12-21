<?php
session_start();
require_once 'db_connect.php';

if (isset($_SESSION['user_id'])) {
    header("Location: listazas.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: listazas.php");
        exit;
    } else {
        $error = "Érvénytelen felhasználónév vagy jelszó!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bejelentkezés</title>
</head>
<body>
<h2>Bejelentkezés</h2>
<form method="post">
    Felhasználónév: <input type="text" name="username" required><br>
    Jelszó: <input type="password" name="password" required><br>
    <input type="submit" value="Bejelentkezés">
</form>

<?php if (isset($error)): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

</body>
</html>
