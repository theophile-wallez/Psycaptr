<?php  
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>

  <link rel="stylesheet" href="../Style/profil.css"/>
  <link rel="stylesheet" href="../Style/modifyUsers.css"/>

  <link rel="icon" href="../Images/Logo_light.png" type="image/icon type">
  <title>DashBoard • Psycaptr</title>
</head>

<header>
  <div class="home_logo">
    <a href="../../index.php" draggable="false">
      <img src="../Images/Logo_simple.png" draggable="false" alt="logo">
    </a>
  </div>
  <div class="welcome-text">
    <?php
      //session_start();
      echo "<p>";
      echo "Bonjour, Theo".$_SESSION["Prenom"];
      echo "</p>";
     ?>
  </div>
</header>

<nav></nav>

<body>
  <section class="content-container">
    <h2>Liste des utilisateurs</h2>

    <form class="search_bar-container" action="modifyUsers.php" method="POST">
      <input  type="text" name="search" placeholder="Rechercher parmis les utilisateurs">
      <div class="button-container"><button type="submit">Recherche</button></div>
    </form>

    <div class="user-container user-description">
      <div class="nom-container">Nom</div>
      <div class="prenom-container">Prénom</div>
      <div class="mail-container">Adresse mail</div>
      <div class="id-container">Identifiant</div>
      <div class="date-container">Date d'inscription</div>
    </div>

    <!-- Affichage de la liste des utilisateurs -->
    <?php require('../../PHP/modifyUsersAlgo.php');?>

  </section>
</body>
</html>