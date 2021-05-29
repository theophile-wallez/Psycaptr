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
  <section class="content-container">
    <h2>Gestion des utilisateurs</h2>

    <form class="search_bar-container" action="modifyUsers" method="POST">
      <input  type="text" name="search" placeholder="Rechercher parmis les utilisateurs">
      <div class="button-container"><button type="submit">Recherche</button></div>
    </form>

    <!-- Ces lignes servent aux tests en localhost (sans BDD) -->
    
    <!-- <form class="line-container user-container addUser" onsubmit="addUser()" method="POST">
      <input type="text" name="Nom" placeholder="Nom" required>
      <input type="text" name="Prenom" placeholder="Prenom" required>
      <input input type="email" name="Mail" placeholder="Adresse mail" required>
      <input input type="text" name="Mdp" placeholder="Mot de passe" required>
      <input input type="text" name="MdpBis" placeholder="Confirmer le mdp" required>

      <div class="valider_changement"><button type="submit"><i class="fas fa-plus"></i></button></div>
    </form> -->

    <?php 
      // echo '<form class="form_all" action="../../PHP/modifyUsersAlgo" method="POST">';
      // echo    '<div class="user"><button type="submit" name="accessUser"><i class="fas fa-chart-area"></i>      </button></div>';
      // echo  '<div class="line-container user-container">';
      // echo    '<input type="text" name="Nom" value=".$Nom." required>';
      // echo    '<input type="text" name="Prenom" value=".$Prenom." required>';
      // echo    '<input input type="email" name="Mail" value=".$Mail." required>';
      // echo    '<input input type="text" name="Id" readonly="readonly" value=".$Id." required>';
      // echo    '<input input type="text" name="Date" readonly="readonly" value=".$Date_Inscription." required>';
      // echo    '<div class="valider_changement modify"><button type="submit" name="modifyUser"><i class="fa fa-check"></i></button></div>';
      // echo    '<div class="valider_changement remove"><button type="submit" name="removeUser"><i class="fa fa-trash"></i></button></div>';
      // echo   '</div>';
      // echo '</form>';
    ?>

    <!-- Affichage de la liste des utilisateurs -->
    <?php require('../../PHP/modifyUsersAlgo.php');?>
    
  </section>
</body>
</html>

<!-- Ces balises de script fixent un bug de Chrome qui déclanche les  
animations des :hover au lancement de la page -->
<script> </script>