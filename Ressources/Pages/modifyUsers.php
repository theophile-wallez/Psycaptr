<?php

  //ON GARDE ÇA ?
  
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>
  <link rel="stylesheet" href="../Style/input.css"/>

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
    <div class="user-container user-description">
      <div class="nom-container">Nom</div>
      <div class="prenom-container">Prénom</div>
      <div class="mail-container">Adresse mail</div>
      <div class="id-container">Identifiant</div>
      <div class="date-container">Date d'inscription</div>
    </div>
    <?php 
    
    require_once('../../PHP/connectDatabase.php');

    $sql = 'SELECT * FROM Utilisateurs order by Nom asc';

    if(!$result = $bdd -> query($sql)){
      echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
    }
    // Recuperation des resultats
    while($row = $result -> fetch_row()){
        $Id=$row[0];
        $Mail=$row[1];
        $Date_Inscription = date("d-m-Y",strtotime($row[3]));
        $Nom = $row[4];
        $Prenom = $row[5];

        echo '<div class="user-container">';
        echo '<div class="nom-container">'.$Nom.'</div>';
        echo '<div class="prenom-container">'.$Prenom.'</div>';
        echo '<div class="mail-container">'.$Mail.'</div>';
        echo '<div class="id-container">'.$Id.'</div>';
        echo '<div class="date-container">'.$Date_Inscription.'</div>';
        echo '</div>';
    }
    ?>


    <!-- <div class="user-container">
      <div class="nom-container">Wallez</div>
      <div class="prenom-container">Théophile</div>
      <div class="mail-container">theophile.wall@gmail.com</div>
      <div class="id-container">2141241</div>
      <div class="date-container">12/12/2012</div>
    </div>
    <div class="user-container">
      <div class="nom-container">Delerue</div>
      <div class="prenom-container">Arthur</div>
      <div class="mail-container">arthur.delerue@gmail.com</div>
      <div class="id-container">2141241</div>
      <div class="date-container">12/12/2012</div>
    </div>
    <div class="user-container">
      <div class="nom-container">Delerue</div>
      <div class="prenom-container">Arthur</div>
      <div class="mail-container">arthur.delerue@gmail.com</div>
      <div class="id-container">2141241</div>
      <div class="date-container">12/12/2012</div>
    </div>
    <div class="user-container">
      <div class="nom-container">Delerue</div>
      <div class="prenom-container">Arthur</div>
      <div class="mail-container">arthur.delerue@gmail.com</div>
      <div class="id-container">2141241</div>
      <div class="date-container">12/12/2012</div>
    </div>
    <div class="user-container">
      <div class="nom-container">Delerue</div>
      <div class="prenom-container">Arthur</div>
      <div class="mail-container">arthur.delerue@gmail.com</div>
      <div class="id-container">2141241</div>
      <div class="date-container">12/12/2012</div>
    </div> -->
  </section>
  
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="../../javascripts/Graph/graph.js"></script>

<script>
  graph1();
  graph2();
</script>
</html>

<?php
	// session_start();
	// if($_SESSION['login'] != 1 | !isset($_SESSION['login'])) {
	// 	if(!isset($_SESSION['lastActivity']) && (time()-$_SESSION['lastActivity'])>1800){
	// 		unset($_SESSION['login']);
	// 		header('Location:home.html');
	// 		exit();
	// 	}
	// }
	// $_SESSION['lastActivity']= time();
?>
