<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="Ressources/Style/style.css"/>
  <link rel="stylesheet" href="Ressources/Style/dashboard.css"/>
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
      // session_start();
      echo "<p>";
      echo "Bonjour, Théophile".$_SESSION["Prenom"];
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
          <div class="graph graph-2"></div>
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
<script>
  new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: [1,2,3,4,5,6,7,8],
    datasets: [{ 
        data: [2,4,3,6,5,8,7,9],
        borderColor: "#FF589E",
        fill: true,
        backgroundColor	:"rgba(255, 88, 158,0.1)",
        pointBackgroundColor: "#FF589E"
      }
    ]
  },


  options: {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
    display: false,
    },
    scales: {
        xAxes: [{
            gridLines: {
                display:false
            }
        }],
        yAxes: [{
            gridLines: {
                display:false
            }   
        }]
    }
    
  }
});
</script>
</html>
