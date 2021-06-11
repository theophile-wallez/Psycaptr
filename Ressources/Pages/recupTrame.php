<?php

$ch = curl_init();
curl_setopt(
    $ch,
    CURLOPT_URL,
    "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=G9Dy");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);
echo "Raw Data:<br />";
echo("$data");

$data_tab = substr($data, 91);
$data_tab = str_split($data_tab,33);
echo "Tabular Data:<br />";
for($i=0, $size=count($data_tab); $i<$size; $i++){
    echo "Trame $i:<br />";
    echo "TypeTrame: ",substr($data_tab[$i],0,1)," | NumObjet: ",substr($data_tab[$i],1,4)," | TypeRequete: ",substr($data_tab[$i],5,1)," | TypeCapteur: ",substr($data_tab[$i],6,1)," | NumCapteur: ",substr($data_tab[$i],7,2)," | ValeurLue: ",substr($data_tab[$i],9,4)," | NumTrame: ",substr($data_tab[$i],13,4)," | Checksum: ",substr($data_tab[$i],17,2)," | Annee: ",substr($data_tab[$i],19,4)," | Mois: ",substr($data_tab[$i],23,2)," | Jour: ",substr($data_tab[$i],25,2)," | Heure: ",substr($data_tab[$i],27,2)," | Minutes: ",substr($data_tab[$i],29,2)," | Secondes: ",substr($data_tab[$i],31,2);
}


$trame = $data_tab[1];
// décodage avec des substring
$t = substr($trame,0,1);
$o = substr($trame,1,4);
// …
// décodage avec sscanf
list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
    sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");

?>