<?php
	session_start();

	unset($_SESSION['login']);
	unset($_SESSION['login_Admin']);
	unset($_SESSION['lastActivity']);
	unset($_SESSION['Prenom']);
	unset($_SESSION['Nom']);
	unset($_SESSION['Mail']);

	function convertInput ($input) {
		$input = trim ($input);
		$input = Stripslashes ($input);
		$input = Htmlspecialchars ($input); 
		return $input;
	}

	$Mail = convertInput($_POST['Mail']);
	$Mdp  = convertInput($_POST['Mdp']);

	$_SESSION['Mail']=$Mail;

	$servername = 'localhost';
	$bddname = 'ttwawain_Psycaptr';
	$username = 'theophile';
	$password = 'psycaptrisep2023';

	$bdd = new mysqli($servername, $username, $password, $bddname);
	if($bdd->connect_errno){
		echo 'Error connexion : impossible to access the data base' . $bdd -> connect_error;
		exit();
	}

	$sql = 'SELECT * FROM Admin';

	if($result = $bdd -> query($sql)){
		while($row = $result -> fetch_row()) {
			if($Mail == $row[0] && $Mdp == $row[1]){
				$_SESSION['login_Admin'] = 0;
				$_SESSION['lastActivity'] = time();
				$_SESSION['Nom'] = $row[2];
			    $_SESSION['Prenom'] = $row[3];
				header('Location:../Ressources/Pages/admin.php');
				exit();
			}
		}
	}

	$result -> free_result();


	$sql = 'SELECT * FROM Utilisateurs';


	if($result = $bdd -> query($sql)) {
		while($row = $result -> fetch_row())  {
			if($Mail == $row[1] && password_verify($Mdp, $row[2])) {
				$_SESSION['login'] = 0;
				$_SESSION['lastActivity'] = time();
				$_SESSION['Nom'] = $row[4];
			    $_SESSION['Prenom'] = $row[5];
				header('Location:../Ressources/Pages/dashboard.php');
				exit();
			}
		}
	}

	header('Location:../Ressources/Pages/connexion.php');
	exit();


	$result -> free_result();

	$bdd -> close();
 ?>
