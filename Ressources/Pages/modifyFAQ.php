<?php  
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>
  <link rel="stylesheet" href="../Style/profil.css"/>
  <link rel="stylesheet" href="../Style/modifyFAQ.css"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="icon" href="../Images/Logo_light.png" type="image/icon type">
  <title>Gestion de la FAQ • Psycaptr</title>
</head>

<script>
  function adjustHeight(el){
      el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight)+"px" : "60px";
  }
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
  <section class="content-container">
    <h2>Gestion des utilisateurs</h2>

   <form class="container-form" action="../../PHP/modifyUsersAlgo.php" method="POST">
      <div class="inputs_container">
        <div class="line-container user-container">
          <input class="question-container" type="text" placeholder="Contenu de la question" name="Nom" required>
          <!-- <div class="valider_changement modify"><button type="submit" name="modifyFAQ"><i class="fa fa-check"></i></button></div> -->
          <div class="valider_changement remove"><button type="submit" name="removeFAQ"><i class="fa fa-trash"></i></button></div>
        </div>
        <textarea class="reponse-container" onkeyup="adjustHeight(this)" type="text" name="Prenom" placeholder="Contenu de la réponse " required>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis impedit quas, ex molestiae qui possimus praesentium ratione beatae dolores nemo porro ad eveniet. Quam eveniet odio nostrum inventore reiciendis quLorem ipsum dolor sit amet consectetur adipisicing elit. Nobis impedit quas, ex molestiae qui possimus praesentium ratione beatae dolores nemo porro ad eveniet. Quam eveniet odio nostrum inventore reiciendis quiis.</textarea>
      </div>
    </form>

    <!-- Affichage de la liste des utilisateurs -->
    <?php require('../../PHP/modifyFAQAlgo.php');?>
    
  </section>
</body>
</html>

<!-- Ces balises de script fixent un bug de Chrome qui déclanche les  
animations des :hover au lancement de la page -->
<script> 
  function adjustHeight(el){
      el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight)+"px" : "60px";
  }
</script>