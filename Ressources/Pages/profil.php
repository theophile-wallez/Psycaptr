<?php
	session_start();
	$IdMedecin  = $_SESSION["IdMedecin"];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>
  <link rel="stylesheet" href="../Style/input.css"/>

  <link rel="stylesheet" href="../Style/profil.css"/>

  <link rel="icon" href="../Images/Logo_light.png" type="image/icon type">
  <title>Gestion de votre profil • Psycaptr</title>
</head>

<?php require_once('dashboardHeaderNav.php');

	require('../../PHP/connectDatabase.php');

	$sql = "SELECT * FROM Utilisateurs WHERE Id='$IdMedecin'";

	if(!$result = $bdd -> query($sql)){
			echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
			echo " |".$Id;
	}

	$row = $result -> fetch_row();

?>

<body>
  <section class="content-container">

    <div class="profil-container">
      <div class="img-container">
        <div class="img2-container">
          <img src="" alt="">
        </div>
      </div>
      <div class="nom-container"></div>
    </div>

    <form class="form-container" method="post" action="../../PHP/modifyProfile.php">
      <a class="modif_button" href="../../PHP/modifyProfile.php">Modifier votre profil</a>

      <section class="categorie information-container">

        <h2>Mes informations</h2>
        <div class="item prénom-container">
          <h4>Prénom</h4>
          <input name="Prenom" type="text" <?php  if($_SESSION["modifyProfile"] != 1){ echo "readonly='readonly'";}?> value="<?php echo $row[5]; ?>"/>
        </div>

        <div class="item nom-container">
            <h4>Nom</h4>
            <input name="Nom" type="text" <?php  if($_SESSION["modifyProfile"] != 1){ echo "readonly='readonly'";}?> value="<?php echo $row[4]; ?>"/>
        </div>

      </section>

      <section class="categorie information-container">

        <h2>Mes coordonnées</h2>
        <div class="item mail-container">
          <h4>Votre adresse mail</h4>
          <input name="Mail" type="mail" <?php  if($_SESSION["modifyProfile"] != 1){ echo "readonly='readonly'";}?> value="<?php echo $row[1]; ?>"/>
        </div>

        <div class="item tel-container">
            <h4>Votre Mot de passe</h4>
            <input name="Tel" type="tel" <?php  if($_SESSION["modifyProfile"] != 1){ echo "readonly='readonly'";}?> value="<?php echo $row[2] ?>"/>
        </div>

				<?php
					if($_SESSION["modifyProfile"] == 1){
						echo "<button type='submit' name='modifyProfile'>Valider</button>";
					}
				?>

      </section>

    </form>
  </section>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="../../javascripts/Graph/graph.js"></script>

<script>
  graph1();
  graph2();
</script>
</html>

<?php
	// session_start();
	// if($_SESSION['login'] != 1 | !isset($_SESSION['login'])) {
	// 	if(!isset($_SESSION['lastActivity']) && (time()-$_SESSION['lastActivity'])>1800){
	// 		unset($_SESSION['login']);
	// 		header('Location:home.html');
	// 		exit();
	// 	}
	// }
	// $_SESSION['lastActivity']= time();
?>
