<?php
  session_start();
    $IdMedecin     = $_SESSION['IdMedecin'];
    $IdPatient     = $_SESSION['IdPatient'];
    $NomPatient    = $_SESSION['NomPatient'];
    $PrenomPatient = $_SESSION['PrenomPatient'];
    $MailPatient   = $_SESSION['MailPatient'];

    if (in_array(strtolower($PrenomPatient{0}), ['a','e','i','o','u','é','y'])) {
      $de = 'd\'';
     }
     else {
       $de = 'de ';
     }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>
  <link rel="stylesheet" href="../Style/dashboard.css"/>
  <link rel="icon" href="../Images/Logo_light.png" type="image/icon type">

  <title>DashBoard • Psycaptr</title>
</head>

<?php require_once('dashboardHeaderNav.php');?>

<body>

  <div class="dashboard_container">
    <h1 class="dashboard_title">Voici les données <?php echo $de.$PrenomPatient?></h1>
    <div class="main_part_container">
        <div class="part_1_container ">
          <div class="graph graph-1">
            <h4 class="canvas_title">Évolution du score <?php echo $de.$PrenomPatient?></h4>
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

  var Data = [];

  <?php
    require('../../PHP/connectDatabase.php');

    $sql = "SELECT Resultats FROM Test WHERE Id_Medecin = '$IdMedecin' AND Id_Patient = '$IdPatient' ORDER BY Date_Test ASC";

  	$result = $bdd -> query($sql);

    $i = 0;
    while($row = $result -> fetch_row()){
      echo "Data[".$i."] = ".$row[0].";\n";
      $i++;
    }
  ?>

  console.log(Data);
  graph(Data);

</script>
</html>