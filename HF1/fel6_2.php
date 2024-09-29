<?php
// switch-el megoldva
$honap = 9;

switch ($honap) {
    case 12:
    case 1:
    case 2:
        echo "$honap. honapban Tel van.";
        break;
    case 3:
    case 4:
    case 5:
        echo "$honap. honapban Tavasz van.";
        break;
    case 6:
    case 7:
    case 8:
        echo "$honap. honapban Nyar van.";
        break;
    case 9:
    case 10:
    case 11:
        echo "$honap. honapban Osz van.";
}       
