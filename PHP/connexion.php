<?php
	session_start();

	$Mail = htmlspecialchars($_POST['Mail']);
	$Mdp = htmlspecialchars($_POST['Mdp']);

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
			if($Mail == $row[1] && $Mdp == $row[2]){
				//printf("connexion administrateur réussi : Bonjour %s %s", $row[3], $row[2]);
				$_SESSION['login'] = 0;
				$_SESSION['lastActivity'] = time();
				$_SESSION["Nom"] = $row[3];
			    $_SESSION["Prenom"] = $row[4];
				header('Location:../admin.php');
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
				$_SESSION["Nom"] = $row[4];
			    $_SESSION["Prenom"] = $row[5];
				header('Location:../dashboard.php');
				exit();
			}
		}
	}

	header('Location:../connexion.php');
	exit();

	$result -> free_result();

	$bdd -> close();
 ?>
