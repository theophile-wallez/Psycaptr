<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>
  <link rel="stylesheet" href="../Style/dashboard.css"/>
  <link rel="stylesheet" href="../Style/lunchTest.css"/>

  <link rel="icon" href="../Images/Logo_light.png" type="image/icon type">

  <title>Lancer un test • Psycaptr</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php require_once('dashboardHeaderNav.php');
?>

<body>
  <div class="dashboard_container">
    <h1 class="test_title">Choisissez le test que vous désirez effectuer</h1>
    <section class="content-container">
    <div class="line-container">
        <a class="test-container" href="http://bing.com" target="theframe" onclick="window.open('attenteTest')" >
          <div class="testIcon-container">
            <i class="fas fa-music"></i>
          </div>
          <div class="title-container">
           <h3>Reconnaissance d'un son</h3>
           <p>Mesure de votre capacité à reconnaitre une note</p>
          </div>
        </a>
        <a href="http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=G9Dy&TRAME=1G9Dy23010000FEDC15" target="theframe" onclick="window.open('attenteTest')" class="test-container" draggable="false">
          <div class="testIcon-container">
            <i class="fas fa-assistive-listening-systems"></i>
          </div>
          <div class="title-container">
            <h3>Stimulus sonore</h3>
            <p>Mesure de votre temps de réaction à un stimulus sonore</p>
          </div>
        </a>
        <a href="http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=G9Dy&TRAME=1G9Dy23010000FEDC15" target="theframe" onclick="window.open('attenteTest')" class="test-container" draggable="false">
          <div class="testIcon-container">
            <i class="far fa-eye"></i>
          </div>
          <div class="title-container">
            <h3>Stimulus visuel</h3>
            <p>Mesure de votre temps de réaction à un stimulus visuel</p>
          </div>
        </a>
      </div>
      <div class="line-container">
        <a href="http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=G9Dy&TRAME=1G9Dy23010000FEDC15" target="theframe" onclick="window.open('attenteTest')" class="test-container" draggable="false">
          <div class="testIcon-container">
            <i class="fas fa-heartbeat"></i>
          </div>
          <div class="title-container">
            <h3>Fréquence cardiaque</h3>
            <p>Mesure de votre fréquence cardiaque</p>
          </div>
        </a>
        <a href="http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=G9Dy&TRAME=1G9Dy23010000FEDC15" target="theframe" onclick="window.open('attenteTest')" class="test-container" draggable="false">
          <div class="testIcon-container">
            <i class="fas fa-thermometer-half"></i>
          </div>
          <div class="title-container">
            <h3>Température de la peau</h3>
            <p>Mesure de la température de votre peau</p>
          </div>
        </a>
        <a href="dashboard" class="test-container">
          <div class="testIcon-container">
            <i class="fas fa-home"></i>
          </div>
          <div class="title-container">
            <h3>Retour au dashboard</h3>
            <p>Revenez au dashboard si vous ne voulez pas faire de test</p>
          </div>
        </a>
      </div>
    </section>
    <!-- <label for="capteur-select">Choose a capteur mon bro:</label>

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

    // if(isset($_POST['submit'])) { 
    //   if(!empty($_POST['Capteur'])) {
    //       $selected = $_POST['Capteur'];
    //       echo 'You have chosen: ' . $selected;

    //       $typeTrame="1";
    //       $numObjet="G9Dy"; 
    //       $typeRequest="2"; 

    //       $typeCapteur=$_POST['Capteur'];
    //       $numCapteur="01";

    //       $valeurLue="0000";

    //       $numTrame="FEDC";
    //       $checkSum="15";

    //       $trame=$typeTrame.$numObjet.$typeRequest.$typeCapteur.$numCapteur.$valeurLue.$numTrame.$checkSum;

    //       $monUrl="http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=G9Dy&TRAME=$trame";

    //       header("Location: $monUrl");
    //       exit;
    //   } else {
    //       echo 'Please select the value.';
    //   }
    // }
    ?>
  </div> -->
  <iframe width=1000 height=1000 marginwidth=0 marginheight=0 frameborder=0 name="theframe" src="https://psycaptr.tk"></iframe>
</body>
</html>

<!-- Ces balises de script fixent un bug de Chrome qui déclanche les
animations des :hover au lancement de la page -->
<script>
  function adjustHeight(el){
      el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight)+"px" : "60px";
  }
</script>
<script language="JavaScript">
function changeiframe(urlFrame){
  theframe.location = "https://psycaptr.tk/Ressources/Pages/modifyUsers";
}
</script>

