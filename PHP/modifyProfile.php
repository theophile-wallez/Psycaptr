<?php

session_start();

if(isset($_POST['modifyProfile'])){

  require('connectDatabase.php');

  
  if($_SESSION['userType']=='admin'){
      $sql = "UPDATE Utilisateurs SET Mail='$Mail', Nom='$Nom', Prenom='$Prenom' WHERE Id='$Id'";
  }
  else if($_SESSION['userType']=='medecin'){
      $sql = "UPDATE Patient SET Mail='$Mail', Nom='$Nom', Prenom='$Prenom' WHERE Id='$Id'";
  }

  if(!$bdd -> query($sql)){
      echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
      echo " |".$Id;
  } else {
      header("Location:../Ressources/Pages/profil.php");
      exit();
  }

  $_SESSION["modifyProfile"] = 0;
  header("Location:../Ressources/Pages/profil.php");
  exit;

}

  $_SESSION["modifyProfile"] = 1;
  //echo $_SESSION["modifyProfile"];
  header("Location:../Ressources/Pages/profil.php");
  exit;



?>
