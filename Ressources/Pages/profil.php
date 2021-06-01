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

?>

<body>
  <section class="content-container">
    <form class="form-container" method="post" action="../../PHP/modifyProfile.php">
      <a class="modif_button" href="../../PHP/modifyProfile.php">Modifier votre profil</a>

      <section class="categorie information-container">
        <h2>Mes informations</h2>
        <div class="item prenom-container">
          <h4>Prénom</h4>
          <input name="Prenom" type="text" <?php if($_SESSION["modifyProfile"] != 1){ echo "readonly='readonly' class='noModify'";}?> value="<?php echo $_SESSION['Prenom']; ?>"/>
        </div>
       
        <div class="item nom-container">
            <h4>Nom</h4>
            <input name="Nom" type="text" <?php  if($_SESSION["modifyProfile"] != 1){ echo "readonly='readonly' class='noModify'";}?> value="<?php echo $_SESSION['Nom']; ?>"/>
        </div>

      </section>

      <section class="categorie information-container">

        <h2>Mes coordonnées</h2>
        <div class="item mail-container">
          <h4>Votre adresse mail</h4>
          <input name="Mail" type="mail" <?php  if($_SESSION["modifyProfile"] != 1){ echo "readonly='readonly' class='noModify'";}?> value="<?php echo $_SESSION['Mail']; ?>"/>
        </div>

        <div class="item tel-container">
            <h4>Votre Mot de passe</h4>
            <input name="Mdp" type="text" <?php if($_SESSION["modifyProfile"] != 1){ echo "readonly='readonly' class='noModify'";}?>"/>
        </div>

				<?php
					if($_SESSION["modifyProfile"] == 1){
						echo "<button type='submit' name='modifyProfile'>Valider les modifications</button>";
					}
				?>

      </section>
    </form>
  </section>

</body>
</html>
<script></script>
