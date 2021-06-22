<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<?php 
$typeTrame="1";
$numObjet="G9Dy"; 
$typeRequest="2"; 

$typeCapteur=$_POST['Capteur'];
$numCapteur="01";

$valeurLue="0000";

$numTrame="FEDC";
$checkSum="15";

$trame=$typeTrame.$numObjet.$typeRequest.$typeCapteur.$numCapteur.$valeurLue.$numTrame.$checkSum;

echo $trame;?>

<a href="http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=G9Dy&TRAME= <?php echo str_replace('%20', ' ', $trame); ?>"> Test d'envoi d'une trame Site-Objet</a>
    
</body>
</html>