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
   $_SESSION['Msg'] = "Aucun compte n'est associé à ce mail";
   header("Location:../Ressources/Pages/mdpOublie");
   exit();
}

$result -> free_result();

$sql = 'SELECT * FROM Utilisateurs';

if($result = $bdd -> query($sql)) {
   while($row = $result -> fetch_row())  {
      if($Mail == $row[1]) {
         $Id = $row[0];
         $Nom = $row[4];
         $Prenom = $row[5];
      }
   }
}

$result -> free_result();

$recup_code = IdGenerator(8);

$header="MIME-Version: 1.0\r\n";
$header.='From:"Psycaptr"<support@psycaptr.tk>'."\n";
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
          <td align="center">
            <img src ="https://psycaptr.tk/Ressources/Images/Logo_simple.png" height="70px" width="70px"><br><br>
            <div align="center">Bonjour <b>'.$Prenom.' '.$Nom.'</b>,</div>
            <div align="center"> Voici votre code de récupération: <b>'.$recup_code.'</b>
            A bientôt sur <a href="https://psycaptr.tk">Psycaptr</a> ! </div>
            
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

// Pas ici, après.


// --------------  NE FONCTIONNE PAS RIEN N APPARAIT DANS LA BDD ------------------------

$sql = "SELECT * FROM RecupMotDePasse WHERE Id='$Id'";

if(!$result = $bdd -> query($sql)){
   echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
}

$num_row = mysqli_num_rows($result);
if($num_row>=1){     //Supérieur uniquement par précaution en theorie ça ne dépasse pas 1
   // $sql = "UPDATE RecupMotdePasse SET code = '$recup_code' WHERE mail = '$Mail'";
   $_SESSION['Msg'] = 'Vérifiez vos spam.';
   header("Location:../Ressources/Pages/recupCode");
   exit();
}
else{
   $sql = "INSERT INTO `RecupMotDePasse` (`Id`, `Mail`, `Code`) VALUES ('$Id','$Mail','$recup_code')";
}

if(!$result = $bdd -> query($sql)){
   echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
}
header("Location:../Ressources/Pages/recupCode");


// ----  JE PENSE NE FONCTIONNE PAS CAR VALIDATION EN BUTTON ET PAS INPUT ET DONC BAH $POST....(?) ------------------------

/*if(isset($_POST['verif_submit'],$_POST['enter_code'])) {
   if(!empty($_POST['enter_code'])) {
      $entered_code = htmlspecialchars($_POST['enter_code']);
      $sql = "SELECT * FROM RecupMotDePasse WHERE Mail='$Mail' AND code='$entered_code";
      $result -> free_result();
      $num_row = mysqli_num_rows($result);
      if($num_row==1){
         header("Location:../Ressources/Pages/nouveauMdp");
      }
      else{
         $_SESSION['Msg'] = 'Code invalide';
      }
   }
}

if(isset($_POST['mdp_submit'],$_POST['new_mdp'],$_POST['new_mdp_conf']){
   if(!empty($_POST['new_mdp']) && !empty($_POST['new_mdp_conf'])) {
      //ajouter à la bdd
   } 
   else{
      $_SESSION['Msg'] = 'Les mots de passe ne correspondent pas';
   }
}*/
?>