<?php
session_start();
require('algo.php'); 

// Lecture, analyse et affichage des trames :

$ch = curl_init();
curl_setopt(
    $ch,
    CURLOPT_URL,
    "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=G9Dy");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);

$data = substr($data, 91);
$data_tab = str_split($data,33);
$data_tab = array_slice($data_tab, 2041);

// Connexion à la database
require('connectDatabase.php'); //Connexion à la database

// Dernière trame reçue :
$trame = $data_tab[count($data_tab)-2];

echo "Dernière trame reçue : ";
echo $trame;

list($typeTrame, $numObjet, $typeRequest, $typeCapteur, $numCapteur, $valeurLue, $numTrame, $checkSum, $year, $month, $day, $hour, $min, $sec) =
    sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");


$sqlDelete="DELETE FROM `Trames`";
if ($bdd -> query($sqlDelete)) {
    // echo "Ajout OK";
    
} 
else {
    echo "Error: " . $sqlDelete . "<br>" . $conn->error;
}

foreach ($data_tab as $trameISEP) {
    list($typeTrame, $numObjet, $typeRequest, $typeCapteur, $numCapteur, $valeurLue, $numTrame, $checkSum, $year, $month, $day, $hour, $min, $sec) =
        sscanf($trameISEP,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");

    $Id=IdGenerator(11);

    $sqlAjout = "INSERT INTO `Trames` (`ID`,`TypeTrame`, `NumObjet`, `TypeRequete`, `TypeCapteur`, `NumCapteur`, `ValeurLue`, `NumTrame`, `Checksum`, `Annee`, `Mois`, `Jour`, `Heure`, `Minutes`, `Secondes`) VALUES ('$Id','$typeTrame','$numObjet','$typeRequest','$typeCapteur','$numCapteur','$valeurLue','$numTrame','$checkSum','$year','$month','$day','$hour','$min','$sec')";
    if ($bdd -> query($sqlAjout)) {
        // echo "Ajout OK";
    } 
    else {
        echo "Error: " . $sqlAjout . "<br>" . $conn->error;
    }     
} 

?>