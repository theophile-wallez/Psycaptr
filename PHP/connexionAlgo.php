<?php
	require_once('algo.php');
	session_start();

	$_SESSION = array(); 

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
				$_SESSION['login'] = 1;
				$_SESSION['userType'] = 'admin';
				$_SESSION['lastActivity'] = time();
				$_SESSION['Nom'] = $row[2];
			    $_SESSION['Prenom'] = $row[3];
				header('Location:../Ressources/Pages/admin');
				exit();
			}
		}
	}

	$result -> free_result();

	$sql = 'SELECT * FROM Utilisateurs';

	if($result = $bdd -> query($sql)) {
		while($row = $result -> fetch_row())  {
			if($Mail == $row[1] && password_verify($Mdp, $row[2])) {
				$_SESSION['Id'] = $row[0];
				$_SESSION['Nom'] = $row[4];
			    $_SESSION['Prenom'] = $row[5];

				$_SESSION['login'] = 1;
				$_SESSION['userType'] = 'medecin';
				$_SESSION['lastActivity'] = time();
				
				header('Location:../Ressources/Pages/dashboard');
				exit();
			}
		}
	}

	header('Location:../Ressources/Pages/connexion');

	$result -> free_result();

	$bdd -> close();
	exit();
 ?>
