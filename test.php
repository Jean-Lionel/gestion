<?php

// Le "i" après le délimiteur du pattern indique que la recherche ne sera pas sensible à la casse
if (preg_match("/kcb/i", " est le meilleur  langage de script du web.")) {
    echo "Un résultat a été trouvé. <br>";
} else {
    echo "Aucun résultat n'a été trouvé.<br>";
}


$periodeGet =['annee'=>date('Y'),'mois'=>date('m')];
$time = ['annee'=>2020,'mois'=>04];


var_dump($time);
echo "</br>";
echo $periodeGet == $time;
echo "</br>";

var_dump($periodeGet);