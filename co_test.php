<?php

  session_start();

  $_SESSION["Nom"] = "Delerue";
  $_SESSION["Prenom"]  ="Arthur";

  header("Location:admin.php");
  exit();


 ?>
