<?php

if(isset($_POST['modifyProfile'])){

  $_SESSION["modifyProfile"] = 0;
  header("Location:../Ressources/Pages/profil.php");
  exit;

}

  $_SESSION["modifyProfile"] = 1;
  echo $_SESSION["modifyProfile"];
  //header("Location:../Ressources/Pages/profil.php");
  //exit;



?>
