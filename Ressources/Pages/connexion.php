<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>
  <link rel="stylesheet" href="../Style/nav_bar.css"/>
  <link rel="stylesheet" href="../Style/footer.css"/>
  <link rel="stylesheet" href="../Style/connexion.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900">

  <link rel="icon" href="../Images/Logo_simple.png" size="32x32" type="image/icon type">
  <title>Connexion • Psycaptr</title>
</head>

<nav id="navi" class="nav_absolute" >

</nav>

<body>

  <form class="connect_container" action="../../PHP/connexion.php" method="POST">
      <!-- Titre -->
      <div class="title_container">
        <h3 draggable="false">Connectez-vous</h3>
      </div>

      <!-- Boites d'input -->
      <div class="form_container">
        <input name="Mail" type="email" placeholder="Adresse mail"/>
        <input name="Mdp" type="password" placeholder="Mot de passe" />

        <div class="forgot_container">
          <a href="#">Mot de passe oublié</a>
          <a href="inscription.html">Créer un compte</a>
        </div>
      </div>

      <!-- Boutton de connexion -->

      <div class="connexion_button">
          <button type="submit">Connexion</button>
      </div>
  </form>

  <script> var rellax = new Rellax('.rellax',{ center : true }); </script>

</body>

<footer class="bottom" id="footer"></footer>

<script src="../../javascripts/nav_bar.js"></script>
<script>nav_page_function()</script>
</html>


<?php
	session_start();
	unset($_SESSION['login']);
  unset($_SESSION['lastActivity']);
  unset($_SESSION['Prenom']);
  unset($_SESSION['Nom']);
?>
