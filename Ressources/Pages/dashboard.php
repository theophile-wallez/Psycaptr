<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>
  <link rel="stylesheet" href="../Style/dashboard.css"/>
  <link rel="icon" href="../Images/Logo_simple.png" type="image/icon type">
  <title>DashBoard • Psycaptr</title>
</head>

<header>
  <div class="home_logo">
    <a href="../../index.php#" draggable="false">
      <img src="../Images/Logo_simple.png" draggable="false" alt="logo">
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

<nav></nav>

<body>

  <div class="dashboard_container">
    <h1 class="dashboard_title">Votre tableau de bord</h1>
    <div class="main_part_container">
        <div class="part_1_container ">
          <div class="graph graph-1">
            <h4 class="canvas_title">Évolution de votre score</h4>
            <div class="canvas_container">
             <canvas id="line-chart"></canvas>
            </div>
          </div>
        </div>
        <div class="part_2_container">
          <div class="graph graph-2">
            <h4 class="canvas_title">Tests par catégorie</h4>
            <div class="canvas_container">
             <canvas id="doughnut-chart"></canvas>
            </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="../../javascripts/Graph/graph.js"></script>

<script>
  graph1();
  graph2();
</script>
</html>

<?php

	session_start();
	if($_SESSION['login'] != 1 | !isset($_SESSION['login'])) {
		if(!isset($_SESSION['lastActivity']) && (time()-$_SESSION['lastActivity'])>1800){
			unset($_SESSION['login']);
			header('Location:../../index.php');
			exit();
		}
	}
	$_SESSION['lastActivity']= time();

?>
