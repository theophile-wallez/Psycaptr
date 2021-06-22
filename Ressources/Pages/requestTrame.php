<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>
  <link rel="stylesheet" href="../Style/dashboard.css"/>
  <link rel="icon" href="../Images/Logo_light.png" type="image/icon type">

  <title>Lancer un test • Psycaptr</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php require_once('dashboardHeaderNav.php');?>

<body>
  <div class="dashboard_container">
    <label for="capteur-select">Choose a capteur mon bro:</label>

    <form action="" method="post">
      <select name="Capteur">
          <option value="" disabled selected>Choose option</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
      </select>

      <input type="submit" name="submit" value="Choose options">
    </form>

    <?php


    if(isset($_POST['submit'])) { 
      if(!empty($_POST['Capteur'])) {
          $selected = $_POST['Capteur'];
          echo 'You have chosen: ' . $selected;

          $typeTrame="1";
          $numObjet="G9Dy"; 
          $typeRequest="2"; 

          $typeCapteur=$_POST['Capteur'];
          $numCapteur="01";

          $valeurLue="0000";

          $numTrame="FEDC";
          $checkSum="15";

          $trame=$typeTrame.$numObjet.$typeRequest.$typeCapteur.$numCapteur.$valeurLue.$numTrame.$checkSum;

          $monUrl="http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=G9Dy&TRAME=$trame";

          header("Location: $monUrl");
          exit;

          
      } else {
          echo 'Please select the value.';
      }
    }

    ?>
  </div>
  
</body>
</html>





<!-- Ces balises de script fixent un bug de Chrome qui déclanche les
animations des :hover au lancement de la page -->
<script>
  function adjustHeight(el){
      el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight)+"px" : "60px";
  }
</script>
