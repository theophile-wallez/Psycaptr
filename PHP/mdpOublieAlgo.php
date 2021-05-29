<?php
session_start();
require('algo.php'); //Connexion à la database
require('connectDatabase.php'); //Connexion à la database

$Mail = convertInput($_POST['recup_mail']);

$sql = "SELECT * FROM Utilisateurs WHERE Mail='$Mail'";

if(!$result = $bdd -> query($sql)){
   echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
}

$num_row = mysqli_num_rows($result);

$_SESSION['Msg'] = '';

if($num_row==0){
   $_SESSION['Msg'] = 'Il ny a pas de compte associés à ce mail.';
   header("Location:../Ressources/Pages/mdpOublie");
   exit();
}

$result -> free_result();

$sql = 'SELECT * FROM Utilisateurs';

if($result = $bdd -> query($sql)) {
   while($row = $result -> fetch_row())  {
      if($Mail == $row[1]) {
         $Nom = $row[4];
         $Prenom = $row[5];
      }
   }
}

$result -> free_result();

$recup_code = IdGenerator(8);

$header="MIME-Version: 1.0\r\n";
$header.='From:"Psycaptr"<support@psycaptr.com>'."\n";
$header.='Content-Type:text/html; charset="utf-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';
$message = '
<html>
<head>
    <title>Récupération de mot de passe - Psycaptr</title>
    <meta charset="utf-8" />
</head>
<body>
    <font color="#303030";>
    <div align="center">
      <table width="600px">
          <tr>
          <td>
            
            <div align="center">Bonjour <b>'.$Prenom.' '.$Nom.'</b>,</div>
            Voici votre code de récupération: <b>'.$recup_code.'</b>
            A bientôt sur <a href="https://psycaptr.tk">Psycaptr</a> !
            
          </td>
          </tr>
          <tr>
          <td align="center">
            <font size="2">
                Ceci est un email automatique, merci de ne pas y répondre
            </font>
          </td>
          </tr>
      </table>
    </div>
    </font>
</body>
</html>
';

mail($Mail, "Récupération de mot de passe - Psycaptr", $message, $header);

header('../Ressources/Pages/recupCode.php');
?>