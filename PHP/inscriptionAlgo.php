<?php

session_start();

unset($_SESSION['login']);
unset($_SESSION['login_Admin']);
unset($_SESSION['lastActivity']);
unset($_SESSION['Prenom']);
unset($_SESSION['Nom']);
unset($_SESSION['Mail']);

$Id = IdGenerator(11); //Un Id est généré par une méthode

//On récupère les données rentrées par l'utilisateur
$Mdp = htmlspecialchars($_POST['Mdp']);
$MdpBis = htmlspecialchars($_POST['MdpBis']);
$Nom = htmlspecialchars($_POST['Nom']);
$Prenom = htmlspecialchars($_POST['Prenom']);
$Mail = htmlspecialchars($_POST['Mail']);
$Date = date('Y-m-d');

$_SESSION['Mail']= $Mail;
$_SESSION['Nom']= $Nom;
$_SESSION['Prenom']= $Prenom;

// On vérifie si le mot de passe est le même que celui de confirmation,
// sinon on reviens vers la page d'inscription

if($MdpBis != $Mdp){
  header('Location:../Ressources/Pages/inscription.php');
  exit();
}

//Le mot de passe est crypté
$CryptedMdp= password_hash($Mdp, PASSWORD_DEFAULT);

$servername = 'localhost';
$bddname = 'ttwawain_Psycaptr';
$username = 'theophile';
$password = 'psycaptrisep2023';

//Message d'erreur en cas d'accès impossible à la database
$bdd = new mysqli($servername, $username, $password, $bddname);
if($bdd->connect_errno){

// Est-ce qu'on ne redirige pas l'utilisateur vers la page d'inscription ?

  echo 'Error connexion : impossible to access the data base' . $bdd -> connect_error;
  exit();
}

//On sélectionne la table Utilisateurs dans la database
$sql = 'SELECT * FROM Utilisateurs';

if($result = $bdd -> query($sql)){
  while($row = $result -> fetch_row()) {
    // On vérifie que le mail n'est pas déjà utilisé
    if($Mail == $row[1]) {
      header('Location:../Ressources/Pages/connexion.php');
      exit();
    }
    // On vérifie que l'Id généré n'existe pas déjà
    if($Id == $row[0]){
      // On vérifie que l'Id généré n'existe pas déjà
      $Id = IdGenerator(11);
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

header("Location:../Ressources/Pages/dashboard.php");
exit();

function IdGenerator($taille){
  // Liste des caractères possibles
  $chars="0123456789";
  $Id='';
  $length=strlen($chars);

  srand((double)microtime()*1000000);
  //Initialise le générateur de nombres aléatoires

  for($i=0;$i<$taille;$i++)$Id=$Id.substr($chars,rand(0,$length-1),1);

  return $Id;
}
 ?>
