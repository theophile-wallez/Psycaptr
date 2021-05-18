<?php 
    require_once('algo.php');
    require_once('connectDatabase.php');

    
    echo '<p>Search est '.$search.'</p>';
    if(isset($_POST['search'])) { 
        $search = convertInput($_POST['search']);
        echo '<p>il y a quelque chose</p>';
        $sql = "SELECT * FROM Utilisateurs where Nom like '$search%'";
        // order by Nom asc
        // header('Location:../Ressources/Pages/modifyUsers.php'); //pas sur de ça
        header("Refresh:0; url=../Ressources/Pages/modifyUsers.php");

        // unset($_POST['search']);
    }
    else {
        echo '<p>il y a rien dans la barre de recherche</p>';
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
