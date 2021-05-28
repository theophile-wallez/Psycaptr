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
   $_SESSION['Msg'] = 'Il n''y a pas de compte associés à ce mail.'
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
$header.='From:"[VOUS]"<votremail@mail.com>'."\n";
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

if(mail($Mail, "Récupération de mot de passe - Psycaptr", $message, $header)){
   echo 'email envoyé';
}
header("Location:http://127.0.0.1/path/recuperation.php?section=code");


// if(isset($_POST['verif_submit'],$_POST['verif_code'])) {
// if(!empty($_POST['verif_code'])) {
//    $verif_code = htmlspecialchars($_POST['verif_code']);
//    $verif_req = $bdd->prepare('SELECT id FROM recuperation WHERE mail = ? AND code = ?');
//    $verif_req->execute(array($_SESSION['recup_mail'],$verif_code));
//    $verif_req = $verif_req->rowCount();
//    if($verif_req == 1) {
//       $up_req = $bdd->prepare('UPDATE recuperation SET confirme = 1 WHERE mail = ?');
//       $up_req->execute(array($_SESSION['recup_mail']));
//       header('Location:http://127.0.0.1/path/recuperation.php?section=changemdp');
//    } else {
//       $error = "Code invalide";
//    }
// } else {
//    $error = "Veuillez entrer votre code de confirmation";
// }
// }
// if(isset($_POST['change_submit'])) {
// if(isset($_POST['change_mdp'],$_POST['change_mdpc'])) {
//    $verif_confirme = $bdd->prepare('SELECT confirme FROM recuperation WHERE mail = ?');
//    $verif_confirme->execute(array($_SESSION['recup_mail']));
//    $verif_confirme = $verif_confirme->fetch();
//    $verif_confirme = $verif_confirme['confirme'];
//    if($verif_confirme == 1) {
//       $mdp = htmlspecialchars($_POST['change_mdp']);
//       $mdpc = htmlspecialchars($_POST['change_mdpc']);
//       if(!empty($mdp) AND !empty($mdpc)) {
//          if($mdp == $mdpc) {
//             $mdp = sha1($mdp);
//             $ins_mdp = $bdd->prepare('UPDATE membres SET motdepasse = ? WHERE mail = ?');
//             $ins_mdp->execute(array($mdp,$_SESSION['recup_mail']));
//            $del_req = $bdd->prepare('DELETE FROM recuperation WHERE mail = ?');
//            $del_req->execute(array($_SESSION['recup_mail']));
//             header('Location:http://127.0.0.1/path/connexion/');
//          } else {
//             $error = "Vos mots de passes ne correspondent pas";
//          }
//       } else {
//          $error = "Veuillez remplir tous les champs";
//       }
//    } else {
//       $error = "Veuillez valider votre mail grâce au code de vérification qui vous a été envoyé par mail";
//    }
// } else {
//    $error = "Veuillez remplir tous les champs";
// }
?>