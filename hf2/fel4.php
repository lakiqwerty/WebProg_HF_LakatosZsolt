<?php
$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');

function atalakit($tomb, $tipus) {
    foreach ($tomb as $e => $szin) {
        if ($tipus === "kis_betus") {
            $tomb[$e] = strtolower($szin);
        } elseif ($tipus === "nagy_betus") {
            $tomb[$e] = strtoupper($szin);
        }
    }
    return $tomb;
}

$szinek_kisbetus = atalakit($szinek, "kis_betus");
echo "kis betus: ";
print_r($szinek_kisbetus);

echo "<br>";

$szinek_nagybetus = atalakit($szinek, "nagy_betus");
echo "nagy betus: ";
print_r($szinek_nagybetus);