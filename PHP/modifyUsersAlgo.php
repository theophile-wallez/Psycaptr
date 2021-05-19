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

    if(!$result = $bdd -> query($sql)){
    }
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
    
    echo '<div class="user-container user-description">';
    echo '<div class="nom-container">Nom</div>';
    echo '<div class="prenom-container">Prénom</div>';
    echo '<div class="mail-container">Adresse mail</div>';
    echo '<div class="id-container">Identifiant</div>';
    echo '<div class="date-container">Date d',"'inscription</div>";
    echo '</div>';
    // Recuperation des resultats
    while($row = $result -> fetch_row()){
        $Id=$row[0];
        $Mail=$row[1];
        $Date_Inscription = date("d-m-Y",strtotime($row[3]));
        $Nom = $row[4];
        $Prenom = $row[5];

        // echo '<div class="line-container user-container">';
        // echo '<div class="nom-container">'.$Nom.'</div>';
        // echo '<div class="prenom-container">'.$Prenom.'</div>';
        // echo '<div class="mail-container">'.$Mail.'</div>';
        // echo '<div class="id-container">'.$Id.'</div>';
        // echo '<div class="date-container">'.$Date_Inscription.'</div>';
        // echo '</div>';

        echo '<form class="line-container user-container" action="modifyUsers.php" method="POST">';
        echo    '<input type="text" name="Nom" value="'.$Nom.'" required>';
        echo    '<input type="text" name="Nom" value="'.$Prenom.'" required>';
        echo    '<input input type="email" name="Nom" value="'.$Mail.'" required>';
        echo    '<div class="id-container">'.$Id.'</div>';
        echo    '<div class="date-container">'.$Date_Inscription.'</div>';
        echo    '<div class="valider_changement"><button type="submit"><i class="fa fa-check"></i></button></div>';
        echo '</form>';
    }

    $_SESSION['search'] = $search;

    exit();
	$result -> free_result();

	$bdd -> close(); 

    ?>
