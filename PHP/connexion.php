<?php
	session_start();
	
	$id = htmlspecialchars($_POST['id']);
	$Mdp = htmlspecialchars($_POST['Mdp']);
	

	
	$servername = 'localhost';
	$bddname = 'Psycaptr';
	$username = 'AD';
	$password = 'Karma';

	$bdd = new mysqli($servername, $username, $password, $bddname);
	if($bdd->connect_errno){
		echo 'Error connexion : impossible to access the data base' . $bdd -> connect_error;
		exit();	
	}
	
	$sql = 'SELECT * FROM Admin';

	if($result = $bdd -> query($sql)){
		while($row = $result -> fetch_row()) {
			if($id ==$row[0] && $Mdp ==$row[1]){
				printf("connexion administrateur réussi : Bonjour %s %s", $row[3], $row[2]);
				//header('Location:admin.php');
				//exit();
			}
		}
	}
	
	$result -> free_result();
	
	
	$sql = 'SELECT * FROM Utilisateurs';

	
	if($result = $bdd -> query($sql)) {
		while($row = $result -> fetch_row())  {
			if($id == $row[1] && $Mdp == $row[2]) {
				//printf("connexion utilisateur réussi");
				header('Location:../dashboard.html');
				exit();
			}
			else {
				header('Location:../connexion.html');
				exit();			
			}
		}
	}
		

	$result -> free_result();

	$bdd -> close();
	




 ?>
