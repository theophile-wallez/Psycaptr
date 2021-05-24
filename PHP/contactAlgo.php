<?php

$Id = IdGenerator(11); //Un Id est généré par une méthode

//On récupère les données rentrées par l'utilisateur
$Nom = htmlspecialchars($_POST['Nom']);
$Prenom = htmlspecialchars($_POST['Prenom']);
$Mail = htmlspecialchars($_POST['Mail']);
$Message = htmlspecialchars($_POST['Message']);
$Date = date('j F Y');

//Connexion à la database
$servername = 'localhost';
$bddname = 'ttwawain_Psycaptr';
$username = 'theophile';
$password = 'psycaptrisep2023';

//Message d'erreur en cas d'accès impossible à la database
$bdd = new mysqli($servername, $username, $password, $bddname);
if($bdd->connect_errno){
  echo 'Error connexion : impossible to access the data base' . $bdd -> connect_error;
  exit();
}

$sql = 'SELECT * FROM Message';

if($result = $bdd -> query($sql)){
  while($row = $result -> fetch_row()) {
    if($Id == $row[0]){
      $Id = IdGenerator(11);
    }
  }
}

$result -> free_result();

$sql = "INSERT INTO `Message` (`Id`, `Nom`, `Prenom`, `Mail`, `Message`, `Date`) VALUES ('".$Id."','".$Nom."','".$Prenom."','".$Mail."','".$Message."','".$Date."')";

if (!mysql_query($sql,$bdd)) {
	die('impossible d’ajouter cet enregistrement : ' . mysql_error());
	}

$bdd -> close();

header("Location:../Ressources/Pages/connexion.php");
exit();

?>
