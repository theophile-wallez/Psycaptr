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
  <link rel="stylesheet" href="../Style/input.css"/>

  <link rel="stylesheet" href="../Style/profil.css"/>

  <link rel="icon" href="../Images/Logo_light.png" type="image/icon type">
  <title>Gestion de votre profil • Psycaptr</title>
</head>

<?php require_once('dashboardHeaderNav.php');?>

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
          <input name="Prenom" type="text" <?php  if($_SESSION["modifyProfile"] != 1){ echo "readonly='readonly'";}?> value="<?php $PrenomPatient ?>"/>
        </div>

        <div class="item nom-container">
            <h4>Nom</h4>
            <input name="Nom" type="text" <?php  if($_SESSION["modifyProfile"] != 1){ echo "readonly='readonly'";}?> value="<?php $NomPatient ?>"/>
        </div>

      </section>

      <section class="categorie information-container">

        <h2>Mes coordonnées</h2>
        <div class="item mail-container">
          <h4>Votre adresse mail</h4>
          <input name="Mail" type="mail" <?php  if($_SESSION["modifyProfile"] != 1){ echo "readonly='readonly'";}?> value="<?php $MailPatient ?>"/>
        </div>

        <div class="item tel-container">
            <h4>Votre numéro de téléphone</h4>
            <input name="Tel" type="tel" <?php  if($_SESSION["modifyProfile"] != 1){ echo "readonly='readonly'";}?> value="<?php echo $_SESSION["modifyProfile"]; ?>"/>
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
