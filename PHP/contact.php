<?php
$Id = Password(5);
$Nom = htmlspecialchars($_POST['Nom']);
$Prenom = htmlspecialchars($_POST['Prenom']);
$Mail = htmlspecialchars($_POST['Mail']);
$Message = htmlspecialchars($_POST['Message']);
$Date = date('j F Y');

$servername = 'localhost';
$bddname = 'ttwawain_Psycaptr';
$username = 'theophile';
$password = 'psycaptrisep2023';

$bdd = new mysqli($servername, $username, $password, $bddname);
if($bdd->connect_errno){
  echo 'Error connexion : impossible to access the data base' . $bdd -> connect_error;
  exit();
}

$sql = 'SELECT * FROM Message';

if($result = $bdd -> query($sql)){
  while($row = $result -> fetch_row()) {
    if($Id == $row[0]){
      $Id = Password(5);
    }
  }
}

$result -> free_result();


$sql = "INSERT INTO `Message` (`Id`, `Nom`, `Prenom`, `Mail`, `Message`, `Date`) VALUES ('".$Id."','".$Nom."','".$Prenom."','".$Mail."','".$Message."','".$Date."')";

if (!mysql_query($sql,$bdd)) {
	die('impossible d’ajouter cet enregistrement : ' . mysql_error());
	}



$bdd -> close();





header("Location:../connexion.php");
exit();



function Password($taille)
   {
     // Liste des caractères possibles
     $cars="0123456789";
     $mdp='';
     $long=strlen($cars);

     srand((double)microtime()*1000000);
     //Initialise le générateur de nombres aléatoires

     for($i=0;$i<$taille;$i++)$mdp=$mdp.substr($cars,rand(0,$long-1),1);

     return $mdp;
   }
 ?>
