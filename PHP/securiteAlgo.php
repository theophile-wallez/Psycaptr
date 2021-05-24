<!-- Ou est-ce que ce php est appelé ? -->
<?php 
	session_start();
    if($_SESSION['login'] != 1 | !isset($_SESSION['login'])) {
      if(!isset($_SESSION['lastActivity']) && (time()-$_SESSION['lastActivity'])>1800){
<<<<<<< HEAD
		// $_SESSION = array(); 
=======
        unset($_SESSION);
>>>>>>> parent of 84c7046 (ajout securite)
        header('Location:../index.php#');
        exit();
      }
    }
    $_SESSION['lastActivity']= time();
?>