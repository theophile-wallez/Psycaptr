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
$Date = date('j F Y h:i:s H');
$IdUser = 0;

$sql = 'SELECT * FROM Message';

if($result = $bdd -> query($sql)){
  while($row = $result -> fetch_row()) {
    if($Id == $row[0]){
      $Id = IdGenerator(11);
    }
  }
}

$result -> free_result();

$sql = "INSERT INTO `Message-Utilisateur` (`Id`, `IdUser`, `Nom`, `Prenom`, `Mail`, `Message`, `Date`) VALUES ('$Id','$IdUser','$Nom','$Prenom','$Mail','$Message','$Date')";

if (!mysql_query($sql,$bdd)) {
	die('impossible d’ajouter cet enregistrement : ' . mysql_error());
}

$bdd -> close();

header("Location:/");
exit();
?>
