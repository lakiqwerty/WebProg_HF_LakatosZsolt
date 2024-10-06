<?php

$szin = "Aqua";

$szorzoTabla = function($n) use ($szin) {
    echo "<table border = 1>";
    for ($i = 1; $i <= $n; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= $n; $j++) {
            if ($i == $j) {
                echo "<td style='background-color: $szin'>" . ($i * $j) . "</td>";
            } else {
                echo "<td>" . ($i * $j) . "</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
};

$n = 10;
$szorzoTabla($n);

