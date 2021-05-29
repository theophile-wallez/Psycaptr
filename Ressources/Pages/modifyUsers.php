<?php  
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>
  <link rel="stylesheet" href="../Style/profil.css"/>
  <link rel="stylesheet" href="../Style/modifyUsers.css"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="icon" href="../Images/Logo_light.png" type="image/icon type">
  <title>Gestion des utilisateurs • Psycaptr</title>
</head>

<script>
  document.addEventListener("DOMContentLoaded", function(event) { 
      var scrollpos = localStorage.getItem('scrollpos');
      if (scrollpos) window.scrollTo(0, scrollpos);
  });

  window.onbeforeunload = function(e) {
      localStorage.setItem('scrollpos', window.scrollY);
  };
</script>

<?php require_once('dashboardHeaderNav.php');?>

<body>
    <!-- Affichage de la liste des utilisateurs -->
    <?php require('../../PHP/modifyUsersAlgo.php');?>
    
  </section>
</body>
</html>

<!-- Ces balises de script fixent un bug de Chrome qui déclanche les  
animations des :hover au lancement de la page -->
<script> </script>