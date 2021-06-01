<?php

if(isset($_POST['modifyProfile'])){

  $_SESSION["modifyProfile"] = 0;
  header("Location:../Ressources/Pages/profil.php");
  exit;

}

  $_SESSION["modifyProfile"] = 1;
  header("Location:../Ressources/Pages/profil.php");
  exit;



?>
