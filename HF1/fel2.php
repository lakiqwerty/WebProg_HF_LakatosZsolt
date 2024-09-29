<?php
$sec = 3601;
$hour = $sec / 3600;
if ($hour === intval($hour)) {
    echo "<b>$sec</b> masodperc atszamitva oraba: <b>$hour</b> ora";
}else {
    echo "$sec masodperc atszamitva oraba: $hour ora";
    echo "<br>";
    echo "az ora nem egesz szam!";
}
