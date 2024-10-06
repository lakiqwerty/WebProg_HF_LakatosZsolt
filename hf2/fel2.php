<?php

$orszagok = array("Magyarország" => "Budapest", "Románia" => "Bukarest", "Belgium" => "Brussels", "Austria" => "Vienna", "Poland" => "Warsaw");

foreach ($orszagok as $e => $fovaros) {
    echo "$e fovarosa <span style='color: red;'>$fovaros</span><br>";
}