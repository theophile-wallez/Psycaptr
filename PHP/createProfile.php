<?php

$Id = IdGenerator(5);
$Mdp = htmlspecialchars($_POST['Mdp']);
$MdpBis = htmlspecialchars($_POST['MdpBis']);
$Nom = htmlspecialchars($_POST['Nom']);
$Prenom = htmlspecialchars($_POST['Prenom']);
$Mail = htmlspecialchars($_POST['Mail']);
$Date = date('Y-m-d');

if($MdpBis != $Mdp){
  header('Location:../inscription.html');
  exit();
}

$CryptedMdp= password_hash($Mdp, PASSWORD_DEFAULT);


$servername = 'localhost';
$bddname = 'ttwawain_Psycaptr';
$username = 'theophile';
$password = 'psycaptrisep2023';

$bdd = new mysqli($servername, $username, $password, $bddname);
if($bdd->connect_errno){
  echo 'Error connexion : impossible to access the data base' . $bdd -> connect_error;
  exit();
}

$sql = 'SELECT * FROM Utilisateurs';

if($result = $bdd -> query($sql)){
  while($row = $result -> fetch_row()) {
    if($Mail == $row[1]) {
      header('Location:../connexion.php');
      exit();
    }
    //Inversion de l'ordre des deux if pour la performance de l'algorithme
    if($Id == $row[0]){
      $Id = IdGenerator(5);
    }
  }
}

$result -> free_result();


$sql = "INSERT INTO `Utilisateurs` (`Id`, `Mail`, `CryptedMdp`, `Date_Inscription`, `Nom`, `Prenom`) VALUES ('$Id','$Mail','$CryptedMdp','$Date','$Nom','$Prenom')";


$bdd -> query($sql);


$bdd -> close();



$_SESSION['login'] = 0;
$_SESSION['lastActivity'] = time();
$_SESSION["Nom"] = $Nom;
$_SESSION["Prenom"] = $Prenom;

header("Location:../dashboard.php");
exit();



function IdGenerator($taille)
   {
     // Liste des caractères possibles
     $cars="0123456789";
     $dd='';
     $long=strlen($cars);

     srand((double)microtime()*1000000);
     //Initialise le générateur de nombres aléatoires

     for($i=0;$i<$taille;$i++)$dd=$dd.substr($cars,rand(0,$long-1),1);

     return $dd;
   }
 ?>
