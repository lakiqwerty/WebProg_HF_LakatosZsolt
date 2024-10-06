<?php

$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So")
);

$kiemeltNapok = array(
    "HU" => array("K", "Cs", "Szo"),
    "EN" => array("Tu", "Th", "Sa"),
    "DE" => array("Di", "Do", "Sa")
);

foreach ($napok as $orszag => $napokListaja) {
    echo "$orszag: ";
    foreach ($napokListaja as $e) {
        if (in_array($e, $kiemeltNapok[$orszag])) {
            echo "<strong>, $e, </strong>";
        } else {
            echo $e;
        }
    }
    echo "<br>";
}