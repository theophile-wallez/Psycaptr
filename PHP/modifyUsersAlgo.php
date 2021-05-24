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
        echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
    }
    //echo 'Les résultats sont : '.$result;

    $num_row = mysqli_num_rows($result);

    if ($num_row==0) { 
        echo '<p>Aucun résultat ne correspond à la recherche effectuée</p>';
    }   
    else {
        echo '<div class="user-container user-description">';
        echo '<div class="nom-container">Nom</div>';
        echo '<div class="prenom-container">Prénom</div>';
        echo '<div class="mail-container">Adresse mail</div>';
        echo '<div class="id-container">Identifiant</div>';
        echo '<div class="date-container">Date d',"'inscription</div>";
        echo '</div>';
    }
    ?>

    <form class="line-container user-container" onsubmit="addUser()" method="POST">
      <input type="text" name="Nom" placeholder="Nom" required>
      <input type="text" name="Nom" placeholder="Prenom" required>
      <input input type="email" name="Nom" placeholder="Adresse mail" required>
      <div class="valider_changement"><button type="submit"><i class="fas fa-plus"></i></button></div>
    </form>
    
    <?php

    // Recuperation des resultats
    while($row = $result -> fetch_row()){
        $Id=$row[0];
        $Mail=$row[1];
        $Date_Inscription = date("d-m-Y",strtotime($row[3]));
        $Nom = $row[4];
        $Prenom = $row[5];

        //On génère une ligne qui correpond à chaque utilisateurs
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

	$result -> free_result();

	$bdd -> close(); 
    exit();
    ?>
