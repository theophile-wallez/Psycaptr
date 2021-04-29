<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="Ressources/Style/style.css"/>
  <link rel="stylesheet" href="Ressources/Style/admin.css"/>
  <link rel="icon" href="Ressources/images/logo_simple.png" type="image/icon type">
  <title>DashBoard • Psycaptr</title>
</head>

<header>
  <div class="home_logo">
    <a href="home.html" draggable="false">
      <img src="Ressources/images/logo_simple.png" draggable="false" alt="logo">
    </a>
  </div>
  <div class="welcome-text">
    <?php

      session_start();

      echo "<p>";
      echo "Bonjour ".$_SESSION["Prenom"]."\n".$_SESSION["Nom"];
      echo "</p>";
     ?>
  </div>
</header>


<nav class="slide-menu"></nav>

<body>
  <div class="dashboard_container">
    <h1 class="dashboard_title">Votre tableau de bord</h1>
    <div class="main_part_container">
        <div class="part_1_container ">
          <div class="graph graph-1"></div>
        </div>
        <div class="part_2_container">
          <div class="graph graph-2">
            <h2>Validations</h2>
            <a><img src="Ressources/Images/liste.png"></a>
          </div>
        </div>
    </div>

    <div class="main_part_container">
      <div class="part_1_container">
          <div class="graph graph-double graph-3"></div>
          <div class="graph graph-double graph-4"></div>
      </div>
      <div class="part_2_container">
        <div class="graph graph-5"></div>
      </div>
  </div>
  </div>
</body>

</html>
