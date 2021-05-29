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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="icon" href="../Images/Logo_light.png" type="image/icon type">
  <title>Gestion des utilisateurs • Psycaptr</title>
</head>

<script>
  document.addEventListener("DOMContentLoaded", function(event) { 
      var scrollpos = localStorage.getItem('scrollpos');
      if (scrollpos) window.scrollTo(0, scrollpos);
  });

  window.onbeforeunload = function(e) {
      localStorage.setItem('scrollpos', window.scrollY);
  };
</script>

<?php require_once('dashboardHeaderNav.php');?>

<body>
<!-- Affichage de la liste des utilisateurs -->
<?php 

session_start();

require('../../PHP/algo.php'); //Ajout de la méthode convertInput()
require('../../PHP/connectDatabase.php'); //Connexion à la database

// 
//Script qui permet d'ajouter un utilisateur
// 

if($_SESSION['userType']=='medecin'){
    $IdMedecin = $_SESSION['IdMedecin'];
}

unset($search);
$search = convertInput($_POST['search']);
// if (contains_at_least_one_word($search)){
//     echo '<h5>Voici les résultats de votre recherche pour "'.$search.'"</h5>';
// } 

if(isset($search)) { 
    if($_SESSION['userType']=='admin'){
        $sql = "SELECT * FROM Utilisateurs WHERE Nom like '$search%' or Prenom like '$search%' or Mail like '$search%' or Id like '$search%' order by Date_inscription desc";
    }
    else if($_SESSION['userType']=='medecin'){
        $sql = "SELECT * FROM Patient WHERE Id_Medecin = '$IdMedecin' and (Nom like '$search%' or Prenom like '$search%' or Mail like '$search%' or Id like '$search%') order by Date_inscription desc";
    }
}

if(!$result = $bdd -> query($sql)){
    echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
}
//echo 'Les résultats sont : '.$result;

$num_row = mysqli_num_rows($result);

echo '<section class="content-container">';
// Script qui permet d'afficher les utilisateurs
if($_SESSION['userType']=='admin'){
    echo '<h2>Ajout d\'un utilisateur</h2>';
} else if($_SESSION['userType']=='medecin'){
    echo '<h2>Ajout d\'un patient</h2>';
}
?>

    <form class="line-container user-container addUser" action="../../PHP/modifyUsersAlgo" method="POST">
    <input type="text" name="Nom" placeholder="Nom" required>
    <input type="text" name="Prenom" placeholder="Prenom" required>
    <input input type="email" name="Mail" placeholder="Adresse mail" required>
    <?php if($_SESSION['userType']=='admin'){ ?>
    <input input type="text" name="Mdp" placeholder="Mot de passe" required>
    <input input type="text" name="MdpBis" placeholder="Confirmer le mdp" required>
    <?php } ?>
    <div class="valider_changement remove"><button type="submit" name="addUser"><i class="fas fa-plus"></i></button></div>
    </form>
</section>

<?php
echo '<section class="content-container">';

if($_SESSION['userType']=='admin'){
    echo '<h2>Liste des utilisateurs</h2>';
    if ($num_row==0) { 
        echo '<p>Aucun utilisateur ne correspond à la recherche effectuée.</p>';
    } 
} else if($_SESSION['userType']=='medecin'){
    echo '<h2>Liste de vos patients</h2>';
    if ($num_row==0) { 
        echo '<p>Aucun patient ne correspond à la recherche effectuée.</p>';
    } 
}
else {
    echo '<div class="user-container user-description">';
    echo '<div class="nom-container">Nom</div>';
    echo '<div class="prenom-container">Prénom</div>';
    echo '<div class="mail-container">Adresse mail</div>';
    echo '<div class="id-container">Identifiant</div>';
    echo '<div class="date-container">Date d',"'inscription</div>";
    echo '</div>';
}
?>
<!-- Barre de recherche -->
<form class="search_bar-container" action="modifyUsers" method="POST">
    <?php
    if($_SESSION['userType']=='admin'){
      echo '<input type="text" name="search" placeholder="Rechercher parmis les utilisateurs">';
    } else if($_SESSION['userType']=='medecin'){
      echo '<input type="text" name="search" placeholder="Rechercher parmis vos patients">';
    }
    ?>
    <input  type="text" name="search" placeholder="Rechercher parmis les utilisateurs">
    <div class="button-container"><button type="submit">Recherche</button></div>
</form>
<?php

// Recuperation des resultats
while($row = $result -> fetch_row()){
    $Id=$row[0];
    $Mail=$row[1];
    $Date_Inscription = date("d-m-Y",strtotime($row[3]));
    $Nom = $row[4];
    $Prenom = $row[5];

    //On génère une ligne qui correpond à chaque utilisateurs
    echo '<form class="form_all" action="../../PHP/modifyUsersAlgo" method="POST">';
    echo    '<div class="user"><button type="submit" name="accessUser"><i class="fas fa-chart-area"></i>      </button></div>';
    echo  '<div class="line-container user-container">';
    echo    '<input type="text" name="Nom" value="'.$Nom.'" required>';
    echo    '<input type="text" name="Prenom" value="'.$Prenom.'" required>';
    echo    '<input input type="email" name="Mail" value="'.$Mail.'" required>';
    echo    '<input input type="text" name="Id" readonly="readonly" value="'.$Id.'" required>';
    echo    '<input input type="text" name="Date" readonly="readonly" value="'.$Date_Inscription.'" required>';
    echo    '<div class="valider_changement modify"><button type="submit" name="modifyUser"><i class="fa fa-check"></i></button></div>';
    echo    '<div class="valider_changement remove"><button type="submit" name="removeUser"><i class="fa fa-trash"></i></button></div>';
    echo   '</div>';
    echo '</form>';
}
echo  '</section>';


$_SESSION['search'] = $search;

$result -> free_result();

$bdd -> close();
exit();
?>
    
</body>
</html>

<!-- Ces balises de script fixent un bug de Chrome qui déclanche les  
animations des :hover au lancement de la page -->
<script> </script>