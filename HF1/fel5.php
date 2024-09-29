<?php

$szam1 = 10;
$szam2 = 2;
$muvelet = '*';

switch ($muvelet) {
    case '+':
        echo "$szam1 + $szam2 = " . ($szam1 + $szam2);
        break;
    case '-':
        echo "$szam1 - $szam2 = " . ($szam1 - $szam2);
        break;
    case '*':
        echo "$szam1 * $szam2 = " . ($szam1 * $szam2);
        break;
    case '/':
        if ($szam2 == 0) {
            echo "0-val nem lehet osztani, adj meg masik szamot!";
        } else {
            echo "$szam1 / $szam2 = " . ($szam1 / $szam2);
        }
        break;
    default:
        echo "Ervenytelen muveleti jel, csereld +,-,* vagy /-re!";
        break;
}
