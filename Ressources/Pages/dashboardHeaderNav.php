<?php  
  session_start();
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../Style/dashboardHeaderNav.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<header class="centered">
  <div class="home_logo">
    <a href="../../index.php#" draggable="false">
      <img src="../Images/Logo_light.png" draggable="false" alt="logo">
    </a>
  </div>
  <div class="welcome-text">
    <?php
      echo "<p>";
      echo "Bonjour ".$_SESSION["Prenom"];
      echo "</p>";
     ?>
  </div>
</header>

<nav>
  <a href="profil.php" class="icon-container">
    <div class="line"></div>
    <i class="fas fa-user"></i>
    <!-- <p>Profil</p> -->
  </a>

  <a href="modifyUsers.php" class="icon-container">
    <div class="line"></div>
    <i class="fas fa-users"></i>
    <p></p>
  </a>
  
  <!-- Icon de déconnexion -->
  <a href="/PHP/disconnect.php" class="icon-container">
    <div class="line"></div>
    <i class="fas fa-sign-out-alt"></i>
  </a>
</nav>

</html>

<!-- Ces balises de script fixent un bug de Chrome qui déclanche les  
animations des :hover au lancement de la page -->
<script> </script>
