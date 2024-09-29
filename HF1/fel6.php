<?php
// if-el megoldva
$honap = 9;

if ($honap == 12 or $honap == 1 or $honap == 2) {
    echo "$honap. honapban Tel van";
} else if ($honap == 3 or $honap == 4 or $honap == 5) {
    echo "$honap. honapban Tavasz van";
} else if ($honap == 6 or $honap == 7 or $honap == 8) {
    echo "$honap. honapban Nyar van";
} else if ($honap == 9 or $honap == 10or $honap == 11) {
    echo "$honap. honapban Osz van";
}