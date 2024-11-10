<?php

if (!isset($_COOKIE['veletlen_szam'])) {
    $veletlen_szam = rand(1, 100);
    setcookie('veletlen_szam', $veletlen_szam, time() + 3600);
} else {
    $veletlen_szam = (int)$_COOKIE['veletlen_szam'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $szam1 = isset($_POST['szam1']) ? (int)$_POST['szam1'] : 0;
    $szam2 = isset($_POST['szam2']) ? (int)$_POST['szam2'] : 0;
    $muv = isset($_POST['muv']) ? $_POST['muv'] : '+';

    switch ($muv) {
        case '+':
            $eredmeny = $szam1 + $szam2;
            break;
        case '-':
            $eredmeny = $szam1 - $szam2;
            break;
        case '*':
            $eredmeny = $szam1 * $szam2;
            break;
        case '/':
            $eredmeny = $szam2 != 0 ? $szam1 / $szam2 : null;
            break;
        default:
            $eredmeny = null;
    }

    if ($eredmeny === $veletlen_szam) {
        echo "<p>Eltalaltad a szamot: $veletlen_szam.</p>";
        setcookie('veletlen_szam', '', time() - 3600);
    } else {
        echo "<p>Nem talalt, probald ujra!</p>";
    }
}
?>

<form method="POST" action="">
    <br>Az első szám:
    <input type="number" name="szam1" required>
    <br>A második szám:
    <input type="number" name="szam2" required>
    <br>Műveleti jel:
    <select name="muv">
        <option>+</option>
        <option>-</option>
        <option>*</option>
        <option>/</option>
    </select><br>
    <input type="submit" name="elkuld" value="Számol">
</form>
