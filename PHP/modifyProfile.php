<?php

session_start();

if(isset($_POST['modifyProfile'])){
  require('connectDatabase.php');
  require('algo.php');
  //On récupère les données rentrées par l'utilisateur
  
  $Nom    = convertInput($_POST['Nom']);
  $Prenom = convertInput($_POST['Prenom']);
  $Mail   = convertInput($_POST['Mail']);
  $Mdp    = convertInput($_POST['Mdp']);
  $newMdp = convertInput($_POST['newMdp']);
  $newMdpBis = convertInput($_POST['newMdpBis']);
  $MailOrigin = $_SESSION['Mail'];

  if(!empty($newMdp) && !empty($newMdp)) {
    if($newMdpBis == $newMdp){
      $CryptedMdp = password_hash($newMdp, PASSWORD_DEFAULT);
    }
    else {
      header('Location:../Ressources/Pages/profil');
      exit();
    }
  }
  else {
    $CryptedMdp = password_hash($Mdp, PASSWORD_DEFAULT);
  }

  if($_SESSION['userType']=='medecin'){
    $IdMedecin  = $_SESSION['IdMedecin'];
    $sql = "SELECT * FROM Utilisateurs WHERE Id='$IdMedecin'";
    if(!$result = $bdd -> query($sql)){
      echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
    }
    $row = $result -> fetch_row();

    if(password_verify($Mdp, $row[2])){
      $sql = "UPDATE Utilisateur SET Mail='$Mail', Nom='$Nom', Prenom='$Prenom', CryptedMdp='$CryptedMdp' WHERE Id='$IdMedecin'";
      if(!$bdd -> query($sql)){
        echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
      }
      else {
        $_SESSION["modifyProfile"] = 0;
        header("Location:../Ressources/Pages/profil");
        exit();
      }
    } 
    else {
      header("Location:../Ressources/Pages/profil");
      exit();
    }
  }

  if($_SESSION['userType']=='admin'){
    $sql = "SELECT * FROM Admin WHERE Mail='$MailOrigin'";
    if(!$result = $bdd -> query($sql)){
      echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
    }
    $row = $result -> fetch_row();
    if($Mdp == $row[1]){
      $sql = "UPDATE Admin SET Mail='$Mail', Nom='$Nom', Prenom='$Prenom', Mdp='$Mdp' WHERE Mail='$MailOrigin'";
      if(!$bdd -> query($sql)){
        echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
      }
      else {
        $_SESSION["modifyProfile"] = 0;
        header("Location:../Ressources/Pages/profil");
        exit();
      }
    } 
    else {
      header("Location:../Ressources/Pages/profil");
      exit();
    }
  }

  header("Location:../Ressources/Pages/profil");
  exit;
}

  $_SESSION["modifyProfile"] = 1;
  header("Location:../Ressources/Pages/profil");
  exit;
?>
