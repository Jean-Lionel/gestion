<?php

// Le "i" après le délimiteur du pattern indique que la recherche ne sera pas sensible à la casse
// if (preg_match("/kcb/i", " est le meilleur  langage de script du web.")) {
//     echo "Un résultat a été trouvé. <br>";
// } else {
//     echo "Aucun résultat n'a été trouvé.<br>";
// }


// $periodeGet =['annee'=>date('Y'),'mois'=>date('m')];
// $time = ['annee'=>2020,'mois'=>04];


$str = 'RETENIR SALAIRE NZOYISHIMA MARIE LOUISE KCB BANK CPTE N°6690405850';

preg_match('/(\d+)/', $str, $matches);

/* This also works in PHP 5.2.2 (PCRE 7.0) and later, however 
 * the above form is recommended for backwards compatibility */
// preg_match('/(?<name>\w+): (?<digit>\d+)/', $str, $matches);

var_dump($matches);