<?php
session_start();
require('algo.php'); //Connexion à la database
require('connectDatabase.php'); //Connexion à la database


$Id = IdGenerator(11); //Un Id est généré par une méthode

//On récupère les données rentrées par l'utilisateur
$Nom = convertInput($_POST['Nom']);
$Prenom = convertInput($_POST['Prenom']);
$Mail = convertInput($_POST['Mail']);
$Message = convertInput($_POST['Message']);
$Date = date('j-F-Y H-i-s');
$IdUser = 0;

$sql = 'SELECT * FROM Message';

if($result = $bdd -> query($sql)){
  while($row = $result -> fetch_row()) {
    if($Id == $row[0]){
      $Id = IdGenerator(11);
    }
  }
}

$sql = "INSERT INTO `Message-Utilisateur` (`Id`, `IdUser`, `Nom`, `Prenom`, `Mail`, `Message`, `Date`) VALUES ('$Id','$IdUser','$Nom','$Prenom','$Mail','$Message','$Date')";

if(!$result = $bdd -> query($sql)){
  echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
}


$bdd -> close();

header("Location:/");
exit();
?>
