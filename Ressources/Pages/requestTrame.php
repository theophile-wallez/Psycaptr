<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>
  <link rel="stylesheet" href="../Style/profil.css"/>
  <link rel="stylesheet" href="../Style/modifyFAQ.css"/>
  <link rel="stylesheet" href="../Style/title.css"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>



<body>
	
  <label for="pet-select">Choose a pet:</label>

  <form action="sent" method="post">
    <select name="Capteur">
        <option value="" disabled selected>Choose option</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>

    <input type="submit" name="submit" vlaue="Choose options">
  </form>

  <?php


  if(isset($_POST['submit'])) { 
    if(!empty($_POST['Capteur'])) {
        $selected = $_POST['Capteur'];
        echo 'You have chosen: ' . $selected;
        $typeTrame="1";
        $numObjet="G9Dy"; 
        $typeRequest="2"; 

        $typeCapteur=$selected;
        $numCapteur="01";

        $valeurLue="0000";

        $numTrame="FEDC";
        $checkSum="15";

        $trame=$typeTrame.$numObjet.$typeRequest.$typeCapteur.$numCapteur.$valeurLue.$numTrame.$checkSum;
    } else {
        echo 'Please select the value.';
    }
  }

  ?>

  </section>
</body>
</html>





<!-- Ces balises de script fixent un bug de Chrome qui déclanche les
animations des :hover au lancement de la page -->
<script>
  function adjustHeight(el){
      el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight)+"px" : "60px";
  }
</script>
