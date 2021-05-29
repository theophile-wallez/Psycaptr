<?php 
	session_start();

    require('algo.php'); //Ajout de la méthode convertInput()
    require('connectDatabase.php'); //Connexion à la database

    // 
    //Script qui permet d'ajouter un utilisateur
    // 

    if($_SESSION['userType']=='medecin'){
        $IdMedecin = $_SESSION['IdMedecin'];
    }
    

    if(isset($_POST['addUser'])){
        $Id = IdGenerator(7); //Un Id est généré par une méthode

        if($_SESSION['userType']=='admin'){
            $Mdp    = convertInput($_POST['Mdp']);
            $MdpBis = convertInput($_POST['MdpBis']);
            if($MdpBis != $Mdp){
                header("Location:../Ressources/Pages/modifyUsers");
                exit();
            }
            $CryptedMdp = password_hash($Mdp, PASSWORD_DEFAULT);
        }

        $Nom    = convertInput($_POST['Nom']);
        $Prenom = convertInput($_POST['Prenom']);
        $Mail   = convertInput($_POST['Mail']);
        $Date   = date('Y-m-d');


        if($_SESSION['userType']=='admin'){
            $sql = "SELECT * FROM Utilisateurs";
        }
        else if($_SESSION['userType']=='medecin'){
            $sql = "SELECT * FROM Patient WHERE Id='$IdMedecin'";
        }

        if(!$result = $bdd -> query($sql)){
            echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
        }

        else {
            while($row = $result -> fetch_row()) {
                // On vérifie que le mail n'est pas déjà utilisé
                if($Mail == $row[1]) {
                    header("Location:../Ressources/Pages/modifyUsers");
                    exit();
                }
                while($Id == $row[0]){
                    $Id = IdGenerator(7);
                }
            }
        }

        $result -> free_result();
        $_POST['addUser'] = array(); 


        if($_SESSION['userType']=='admin'){
            $sql = "INSERT INTO `Utilisateurs` (`Id`, `Mail`, `CryptedMdp`, `Date_Inscription`, `Nom`, `Prenom`) VALUES ('$Id','$Mail','$CryptedMdp','$Date','$Nom','$Prenom')";
        }
        else if($_SESSION['userType']=='medecin'){
            $sql = "INSERT INTO `Patient` (`Id`, `Mail`, `Id_Medecin`, `Date_Inscription`, `Nom`, `Prenom`) VALUES ('$Id','$Mail','$IdMedecin','$Date','$Nom','$Prenom')";
        }
        if(!$bdd -> query($sql)){
            echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
            echo " |".$Id;
        }else {
            header("Location:../Ressources/Pages/modifyUsers");
            exit();
        }
        $bdd -> close();
        exit();
    }

    //
    //Script qui permet de modifier les informations d'un utilisateur
    // 

    if(isset($_POST['modifyUser'])){
        $Nom    = convertInput($_POST['Nom']);
        $Prenom = convertInput($_POST['Prenom']);
        $Mail   = convertInput($_POST['Mail']);
        $Id     = convertInput($_POST['Id']);

        if($_SESSION['userType']=='admin'){
            $sql = "UPDATE Utilisateurs SET Mail='$Mail', Nom='$Nom', Prenom='$Prenom' WHERE Id='$Id'";
        }
        else if($_SESSION['userType']=='medecin'){
            $sql = "UPDATE Patient SET Mail='$Mail', Nom='$Nom', Prenom='$Prenom' WHERE Id='$Id'";
        }

        if(!$bdd -> query($sql)){
            echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
            echo " |".$Id;
        } else {
            header("Location:../Ressources/Pages/modifyUsers");
            exit();
        }

        $_POST['modifyUser'] = array(); 
        $result -> free_result();
        $bdd -> close();
        exit();
    }

    if(isset($_POST['removeUser'])){
        $Id     = convertInput($_POST['Id']);

        if($_SESSION['userType']=='admin'){
            $sql = "DELETE FROM Utilisateurs WHERE Id='$Id'" ;
        }
        else if($_SESSION['userType']=='medecin'){
            $sql = "DELETE FROM Patient WHERE Id='$Id'" ;
        }

        if(!$bdd -> query($sql)){
            echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
            echo " |".$Id;
        } else {
            header("Location:../Ressources/Pages/modifyUsers");
            exit();
        }

        $_POST['removeUser'] = array(); 
        $result -> free_result();
        $bdd -> close();
        exit();
    }


    unset($search);
    $search = convertInput($_POST['search']);
    // if (contains_at_least_one_word($search)){
    //     echo '<h5>Voici les résultats de votre recherche pour "'.$search.'"</h5>';
    // } 

    if(isset($search)) { 
        if($_SESSION['userType']=='admin'){
            $sql = "SELECT * FROM Utilisateurs WHERE Nom like '$search%' or Prenom like '$search%' or Mail like '$search%' or Id like '$search%' order by Date_inscription desc";
        }
        else if($_SESSION['userType']=='medecin'){
            $sql = "SELECT * FROM Patient WHERE Id_Medecin = '$IdMedecin' and (Nom like '$search%' or Prenom like '$search%' or Mail like '$search%' or Id like '$search%') order by Date_inscription desc";
        }
    }

    if(!$result = $bdd -> query($sql)){
        echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
    }
    //echo 'Les résultats sont : '.$result;

    $num_row = mysqli_num_rows($result);


    // Script qui permet d'afficher les utilisateurs
    if($_SESSION['userType']=='admin'){
        echo '<h2>Ajout d\'un utilisateur</h2>';
    } else if($_SESSION['userType']=='medecin'){
        echo '<h2>Ajout d\'un patient</h2>';
    }
    ?>

    <form class="line-container user-container addUser" action="../../PHP/modifyUsersAlgo" method="POST">
      <input type="text" name="Nom" placeholder="Nom" required>
      <input type="text" name="Prenom" placeholder="Prenom" required>
      <input input type="email" name="Mail" placeholder="Adresse mail" required>
      <?php if($_SESSION['userType']=='admin'){ ?>
      <input input type="text" name="Mdp" placeholder="Mot de passe" required>
      <input input type="text" name="MdpBis" placeholder="Confirmer le mdp" required>
      <?php } ?>
      <div class="valider_changement remove"><button type="submit" name="addUser"><i class="fas fa-plus"></i></button></div>
    </form>
    
<?php
    if($_SESSION['userType']=='admin'){
        echo '<h2>Liste des utilisateurs</h2>';
        if ($num_row==0) { 
            echo '<p>Aucun utilisateur ne correspond à la recherche effectuée.</p>';
        } 
    } else if($_SESSION['userType']=='medecin'){
        echo '<h2>Liste de vos patients</h2>';
        if ($num_row==0) { 
            echo '<p>Aucun patient ne correspond à la recherche effectuée.</p>';
        } 
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

    // Recuperation des resultats
    while($row = $result -> fetch_row()){
        $Id=$row[0];
        $Mail=$row[1];
        $Date_Inscription = date("d-m-Y",strtotime($row[3]));
        $Nom = $row[4];
        $Prenom = $row[5];

        //On génère une ligne qui correpond à chaque utilisateurs
        echo '<form class="form_all" action="../../PHP/modifyUsersAlgo" method="POST">';
        echo    '<div class="user"><button type="submit" name="accessUser"><i class="fas fa-chart-area"></i>      </button></div>';
        echo  '<div class="line-container user-container">';
        echo    '<input type="text" name="Nom" value="'.$Nom.'" required>';
        echo    '<input type="text" name="Prenom" value="'.$Prenom.'" required>';
        echo    '<input input type="email" name="Mail" value="'.$Mail.'" required>';
        echo    '<input input type="text" name="Id" readonly="readonly" value="'.$Id.'" required>';
        echo    '<input input type="text" name="Date" readonly="readonly" value="'.$Date_Inscription.'" required>';
        echo    '<div class="valider_changement modify"><button type="submit" name="modifyUser"><i class="fa fa-check"></i></button></div>';
        echo    '<div class="valider_changement remove"><button type="submit" name="removeUser"><i class="fa fa-trash"></i></button></div>';
        echo   '</div>';
        echo '</form>';

        // echo '<form class="line-container user-container" action="../../PHP/modifyUsersAlgo" method="POST">';
        // echo    '<input type="text" name="Nom" value="'.$Nom.'" required>';
        // echo    '<input type="text" name="Prenom" value="'.$Prenom.'" required>';
        // echo    '<input input type="email" name="Mail" value="'.$Mail.'" required>';
        // echo    '<input input type="text" name="Id" readonly="readonly" value="'.$Id.'" required>';
        // echo    '<input input type="text" name="Date" readonly="readonly" value="'.$Date_Inscription.'" required>';
        // echo    '<div class="valider_changement modify"><button type="submit" name="modifyUser"><i class="fa fa-check"></i></button></div>';
        // echo    '<div class="valider_changement remove"><button type="submit" name="removeUser"><i class="fa fa-trash"></i></button></div>';
        // echo '</form>';
    }

    $_SESSION['search'] = $search;

	$result -> free_result();

	$bdd -> close();
    exit();
?>
