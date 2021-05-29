<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../../Style/style.css"/>
  <link rel="stylesheet" href="../../Style/dashboard.css"/>
  <link rel="icon" href="../../Images/Logo_light.png" type="image/icon type">

  <title>DashBoard • Psycaptr</title>
</head>


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
<script src="../../../javascripts/Graph/test_Graph.js"></script>

<script>

  <?php
    $servername = 'localhost';
    $bddname = 'ttwawain_Psycaptr';
    $username = 'theophile';
    $password = 'psycaptrisep2023';

    $bdd = new mysqli($servername, $username, $password, $bddname);
    if($bdd->connect_errno){
      echo 'Error connexion : impossible to access the data base' . $bdd -> connect_error;
      exit();
    }

    $sql = "SELECT Resultats FROM Test WHERE Id_Medecin = '434201016' ORDER BY Resultats ASC";

  	$result = $bdd -> query($sql);

  ?>

  var Data = [];
  var Length = <?php echo $result -> num_rows; ?>;

  for(let i=0; i<Length; i++){
    <?php $row = $result -> fetch();?>
    Data[i] = <?php echo $row; ?>;
  }

  console.log(Data);
  graph(Data);

</script>
</html>
