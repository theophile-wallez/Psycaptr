<?php 
session_start();
// unset($_SESSION['login']);
// unset($_SESSION['login_Admin']);
// unset($_SESSION['lastActivity']);
// unset($_SESSION['Prenom']);
// unset($_SESSION['Nom']);
// unset($_SESSION['Mail']);
// unset($_SESSION);

// J'ai lu qu'il était mieux d'utiliser $_SESSION = array(); plutot que unset($_SESSION);
$_SESSION = array(); 

header('Location:../index.php#');
$result -> free_result();

exit();
?>
