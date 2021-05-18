<?php 
	session_start();
    

    require('algo.php'); //Ajout de la méthode convertInput()
    require('connectDatabase.php'); //Connexion à la database


    $search = convertInput($_POST['search']);
    // if (contains_at_least_one_word($search)){
    //     echo '<h5>Voici les résultats de votre recherche pour "'.$search.'"</h5>';
    // } 

    if(isset($search)) { 
        $sql = "SELECT * FROM Utilisateurs where Nom like '$search%' or Prenom like '$search%' or Mail like '$search%' or Id like '$search%' order by Nom asc";
    }
    else {
        $sql = 'SELECT * FROM Utilisateurs order by Nom asc';
    }

    // if(!$result = $bdd -> query($sql)){
    // }
    $result = mysql_query($sql) or die($sql.mysql_error());
    // echo 'Les résultats sont : '.$result;

    // if (mysql_num_rows(query($sql))==0) { 
    //     echo '<p>Aucun résultat ne correspond à la recherche effectuée</p>';
    // }   
    // else {
    //     echo '<div class="user-container user-description">';
    //     echo '<div class="nom-container">Nom</div>';
    //     echo '<div class="prenom-container">Prénom</div>';
    //     echo '<div class="mail-container">Adresse mail</div>';
    //     echo '<div class="id-container">Identifiant</div>';
    //     echo '<div class="date-container">Date d',"'inscription</div>";
    //     echo '</div>';
    // }
    

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

    $_SESSION['search'] = $search;

    exit();
	$result -> free_result();

	$bdd -> close(); 

    ?>
