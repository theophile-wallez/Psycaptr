<?php
  require_once('algo.php');
  session_start();

  unset($_SESSION['login']);
  unset($_SESSION['login_Admin']);
  unset($_SESSION['lastActivity']);
  unset($_SESSION['Prenom']);
  unset($_SESSION['Nom']);
  unset($_SESSION['Mail']);

  $Id     = IdGenerator(10); //Un Id est généré par une méthode
  //On récupère les données rentrées par l'utilisateur
  $Mdp    = convertInput($_POST['Mdp']);
  $MdpBis = convertInput($_POST['MdpBis']);
  $Nom    = convertInput($_POST['Nom']);
  $Prenom = convertInput($_POST['Prenom']);
  $Mail   = convertInput($_POST['Mail']);
  $Date   = date('Y-m-d H:i:s');
  $IP = password_hash($_SERVER['REMOTE_ADDR'], PASSWORD_DEFAULT);

  $_SESSION['Mail']  = $Mail;
  $_SESSION['Nom']   = $Nom;
  $_SESSION['Prenom']= $Prenom;

  // On vérifie si le mot de passe est le même que celui de confirmation,
  // sinon on reviens vers la page d'inscription

  if($MdpBis != $Mdp){
    header('Location:../Ressources/Pages/inscription');
    exit();
  }

  //Le mot de passe est crypté
  $CryptedMdp= password_hash($Mdp, PASSWORD_DEFAULT);

  $servername = 'localhost';
  $bddname    = 'ttwawain_Psycaptr';
  $username   = 'theophile';
  $password   = 'psycaptrisep2023';

  //Message d'erreur en cas d'accès impossible à la database
  $bdd = new mysqli($servername, $username, $password, $bddname);
  if($bdd->connect_errno){

  // Est-ce qu'on ne redirige pas l'utilisateur vers la page d'inscription ?
    echo 'Error connexion : impossible to access the data base' . $bdd -> connect_error;
    exit();
  }

  //On sélectionne la table Utilisateurs dans la database
  $sql = 'SELECT * FROM Utilisateurs';

  if(!$result = $bdd -> query($sql)){
    echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
  }

  else {
    while($row = $result -> fetch_row()) {
      // On vérifie que le mail n'est pas déjà utilisé
      if($Mail == $row[1]) {
        header('Location:../Ressources/Pages/connexion');
        exit();
      }

      while($Id == $row[0]){
        $Id = IdGenerator(10);
      }
    }
  }

  $result -> free_result();

  $sql = "INSERT INTO `ValidationMedecin` (`Id`, `Mail`, `CryptedMdp`, `Date_Inscription`, `Nom`, `Prenom`,`IP`) VALUES ('$Id','$Mail','$CryptedMdp','$Date','$Nom','$Prenom','$IP')";

  if(!$bdd -> query($sql)){
    echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
    echo " |".$Id;
  }

  else {
    $_SESSION['login'] = 1;
    $_SESSION['lastActivity'] = time();
    $_SESSION["Nom"] = $Nom;
    $_SESSION["Prenom"] = $Prenom;

    header("Location:../");
    exit();
  }

  $bdd -> close();
 ?>
