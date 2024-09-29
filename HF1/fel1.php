<?php
$tomb = [5,'5','05',12.3,'16.7','five','true',0xDECAFBAD,'10e200'];
foreach ($tomb as $e) {
    $tipus = gettype($e);
    $numerikus_e = is_numeric($e) ? "igen" : "nem";

    echo"$e tipusa: $tipus, numerikus-e: $numerikus_e <br>";
}