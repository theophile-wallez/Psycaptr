<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="Ressources/Style/style.css"/>
  <link rel="stylesheet" href="Ressources/Style/admin.css"/>
  <link rel="icon" href="Ressources/Images/Logo_simple.png" type="image/icon type">
  <title>DashBoard • Psycaptr</title>
</head>

<header>
  <div class="home_logo">
    <a href="home.html" draggable="false">
      <img src="Ressources/Images/Logo_simple.png" draggable="false" alt="logo">
    </a>

  </div>
  <div class="welcome-text">
    <?php
      session_start();
      echo "<p>";
      echo "Bonjour ".$_SESSION["Prenom"];
      echo "</p>";
     ?>
  </div>
</header>

<nav class="slide-menu">
  <a><img src="Ressources/Images/User_icons/utilisateur.png"></a>
  <a><img src="Ressources/Images/liste-de-controle.png"></a>
  <a><img src="Ressources/Images/liste-de-taches.png"></a>
</nav>

<body>
  <div class="dashboard_container">
    <h1 class="dashboard_title">Votre tableau de bord</h1>
    <div class="main_part_container">
        <div class="part_1_container ">
          <div class="graph graph-1">
            <h2 class="canvas_title">Fréquentation de la plateforme</h2>
            <div class="canvas_container">
             <canvas id="line-chart"></canvas>
            </div>
          </div>
        </div>
        <div class="part_2_container">
          <div class="graph graph-2">
            <h2>Gestion des Utilisateurs</h2>
            <a><img src="Ressources/Images/liste-de-controle.png"></a>
          </div>
        </div>
    </div>
    <div class="main_part_container">
      <div class="part_1_container">
          <div class="graph graph-double graph-3">
            <h2>Mon Profil</h2>
            <a><img src="Ressources/Images/User_icons/sharky.png"></a>
          </div>

          <div class="graph graph-double graph-4">
            <h2>Répartition des Utilisateurs</h2>
            <div class="canvas_container">
             <canvas id="doughnut-chart" width="750" height="450"></canvas>
            </div>
          </div>
      </div>
      <div class="part_2_container">
        <div class="graph graph-5">
          <h2>Validations en attente</h2>
          <a><img src="Ressources/Images/liste-de-taches.png"></a>
        </div>
      </div>
  </div>
  </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="javascripts/Graph/graph.js"></script>
<script>
  graph1();
  doughnut();
</script>
</html>
