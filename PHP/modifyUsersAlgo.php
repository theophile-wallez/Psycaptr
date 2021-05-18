<?php 
    require_once('algo.php');
    require_once('connectDatabase.php');

    $search = convertInput($_POST['search']);

    if(isset($search)){ 
        echo 'il y a quelque chose';
        $sql = 'SELECT * FROM Utilisateurs where name like '$search%' order by Nom asc';
        unset($search);
    }
    else{
        echo 'il y a rien dans la barre de recherche';
        $sql = 'SELECT * FROM Utilisateurs order by Nom asc';
    }

    // $sql = 'SELECT * FROM Utilisateurs order by Nom asc';

    if(!$result = $bdd -> query($sql)){
      echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
    }

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
    ?>
