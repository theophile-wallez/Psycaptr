<?php 
	session_start();
    

    require('algo.php'); //Ajout de la méthode convertInput()
    require('connectDatabase.php'); //Connexion à la database


    $search = convertInput($_POST['search']);
    if (contains_at_least_one_word($search)){
        echo '<h5>Voici les résultats de votre recherche pour "'.$search.'"</h5>';
    } 

    if(isset($search)) { 
        $sql = "SELECT * FROM Utilisateurs where Nom like '$search%' order by Nom asc";
    }
    else {
        $sql = 'SELECT * FROM Utilisateurs order by Nom asc';
    }

    if(!$result = $bdd -> query($sql)){
    }
    // echo 'Les résultats sont : '.$result;

    // Recuperation des resultats
    while($row = $result -> fetch_row()){
        $Id=$row[0];
        $Mail=$row[1];
        $Date_Inscription = date("d-m-Y",strtotime($row[3]));
        $Nom = $row[4];
        $Prenom = $row[5];

        echo '<div class="line-container user-container">';
        echo '<div class="nom-container">'.$Nom.'</div>';
        echo '<div class="prenom-container">'.$Prenom.'</div>';
        echo '<div class="mail-container">'.$Mail.'</div>';
        echo '<div class="id-container">'.$Id.'</div>';
        echo '<div class="date-container">'.$Date_Inscription.'</div>';
        echo '</div>';
    }

    exit();
	$result -> free_result();

	$bdd -> close(); 

    ?>
