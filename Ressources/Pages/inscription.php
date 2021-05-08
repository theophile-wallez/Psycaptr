<?php
	session_start();
	unset($_SESSION['login']);
  unset($_SESSION['login_Admin']);
  unset($_SESSION['lastActivity']);
  // unset($_SESSION['Prenom']);
  // unset($_SESSION['Nom']);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />

  <link rel="stylesheet" href="../Style/footer.css"/>
  <link rel="stylesheet" href="../Style/inscription.css"/>
  <link rel="stylesheet" href="../Style/nav_bar.css"/>
  <link rel="stylesheet" href="../Style/style.css"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900">

  <link rel="icon" href="Ressources/Images/Logo_simple.png" size="32x32" type="image/icon type">
  <title>Inscription • Psycaptr</title>
</head>

<nav id="navi" class="nav_absolute" >

</nav>

<body>

  <div id="contact-container">
    <form class="contact_form_container" action="../../PHP/inscriptionAlgo.php" method="POST">
      <div class="abstract_container" id="contact_link"></div>
      <div class="title_container">
        <h3 draggable="false">Création de votre compte</h3>
      </div>
      <div class="input_container input_container_1">
        <input name="Prenom" type="text" placeholder="Prénom" value="<?php
          if(isset($_SESSION['Prenom'])){
            echo $_SESSION['Prenom'];
          }
        ?>" required/>
        <input name="Nom" type="text" placeholder="Nom" value="<?php
          if(isset($_SESSION['Nom'])){
            echo $_SESSION['Nom'];
          }
        ?>" required/>
      </div>

      <div class="input_container input_container_2">
        <input name="Mail" type="email" placeholder="Votre mail" value="<?php
          if(isset($_SESSION['Mail'])){
            echo $_SESSION['Mail'];
          }
        ?>" required/>
      </div>

      <div class="input_container input_container_3">
        <input name="Mdp" type="password" placeholder="Mot de passe"/>
        <input name="MdpBis" type="password" placeholder="Confirmation"/>
      </div>


      <div class="envoyer_button">
        <button type="submit">Valider</button>
      </div>
    </form>
  </div>

  <footer class="bottom" id="footer"></footer>
</body>

<script src="../../javascripts/nav_bar.js"></script>
<script>nav_page_function()</script>
</html>
