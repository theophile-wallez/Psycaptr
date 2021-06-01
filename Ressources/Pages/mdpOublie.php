<!-- Pas besoin de session start car deja dans l'algo php-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>
  <link rel="stylesheet" href="../Style/nav_bar.css"/>
  <link rel="stylesheet" href="../Style/footer.css"/>
  <link rel="stylesheet" href="../Style/mdpOublie.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900">

  <link rel="icon" href="../Images/Logo_light.png" size="32x32" type="image/icon type">
  <title>Connexion • Psycaptr</title>
</head>

<nav id="navi" class="nav_absolute" >
  <?php 
    require_once('../../PHP/navBar.php');
    displayNavBar("../../");
  ?>
</nav>

<body>

  <form class="backup_container" action="../../PHP/mdpOublieAlgo.php" method="POST">
      <!-- Titre -->
      <div class="title_container">
        <h3 draggable="false">Mot de passe oublié</h3>
      </div>

      <!-- Boites d'input -->
      <div class="form_container">
      <input name="recup_mail" type="email" placeholder="Adresse mail" value="<?php
          if(isset($_SESSION['Mail'])){
            echo $_SESSION['Mail'];
          }
        ?>" required/>
        <div class="back_to_connect_container">
          <a href="connexion.php">Retour</a>
        </div>
      </div>

      <!-- Boutton de connexion -->
      <div class="connexion_button">
          <button type="submit"name="recup_submit">Envoyer</button>
      </div>
  </form>
  <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } else { echo ""; } ?>

</body>
</html>

<!-- Ces balises de script fixent un bug de Chrome qui déclanche les  
animations des :hover au lancement de la page -->
<script> </script>
