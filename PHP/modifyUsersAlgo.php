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

?>

    <h2>Ajout d'un utilisateur</h2>

    <form class="line-container user-container addUser" action="modifyUsers.php" method="POST">
      <input type="text" name="Nom" placeholder="Nom" required>
      <input type="text" name="Prenom" placeholder="Prenom" required>
      <input input type="email" name="Mail" placeholder="Adresse mail" required>
      <input input type="text" name="Mdp" placeholder="Mot de passe" required>
      <input input type="text" name="MdpBis" placeholder="Confirmer le mdp" required>

      <div class="valider_changement"><button type="submit" name="addUser"><i class="fas fa-plus"></i></button></div>
    </form>
    
<?php
    echo '<h2>Liste des utilisateurs</h2>';

    if ($num_row==0) { 
        echo '<p>Aucun résultat ne correspond à la recherche effectuée.</p>';
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
        echo '<form class="line-container user-container" action="../../PHP/modifyUsersAlgo.php" method="POST">';
        echo    '<input type="text" name="Nom" value="'.$Nom.'" required>';
        echo    '<input type="text" name="Prenom" value="'.$Prenom.'" required>';
        echo    '<input input type="email" name="Mail" value="'.$Mail.'" required>';
        echo    '<input input type="text" name="Id" readonly="readonly" value="'.$Id.'" required>';
        echo    '<input input type="text" name="Date" readonly="readonly" value="'.$Date_Inscription.'" required>';
        echo    '<div class="valider_changement"><button type="submit" name="modifyUser"><i class="fa fa-check"></i></button></div>';
        echo '</form>';
    }

    $_SESSION['search'] = $search;

    // 
    //Script qui permet d'ajouter un utilisateur
    // 
    if(isset($_POST['addUser'])){
        
        $Id     = IdGenerator(10); //Un Id est généré par une méthode
        $Mdp    = convertInput($_POST['Mdp']);
        $MdpBis = convertInput($_POST['MdpBis']);
        $Nom    = convertInput($_POST['Nom']);
        $Prenom = convertInput($_POST['Prenom']);
        $Mail   = convertInput($_POST['Mail']);
        $Date   = date('Y-m-d');

        if($MdpBis != $Mdp){
            // header('Location:../Ressources/Pages/modifyUsers.php');
            exit();
        }

        $CryptedMdp= password_hash($Mdp, PASSWORD_DEFAULT);

        //On sélectionne la table Utilisateurs dans la database
        $sql = 'SELECT * FROM Utilisateurs';

        if(!$result = $bdd -> query($sql)){
        echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
        }

        else {
            while($row = $result -> fetch_row()) {
                // On vérifie que le mail n'est pas déjà utilisé
                if($Mail == $row[1]) {
                    // header('Location:../Ressources/Pages/modifyUsers.php');
                    exit();
                }

                while($Id == $row[0]){
                    $Id = IdGenerator(10);
                }
            }
        }

        $result -> free_result();

        $_POST['addUser'] = array(); 

        $sql = "INSERT INTO `Utilisateurs` (`Id`, `Mail`, `CryptedMdp`, `Date_Inscription`, `Nom`, `Prenom`) VALUES ('$Id','$Mail','$CryptedMdp','$Date','$Nom','$Prenom')";


        if(!$bdd -> query($sql)){
            echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
            echo " |".$Id;
        }
        // else {
        //     header("Location:../Ressources/Pages/modifyUsers.php");
        //     exit();
        // }

        $bdd -> close();
        exit();
    }

    //
    //Script qui permet de modifier les informations d'un utilisateur
    // 
    if(isset($_POST['modifyUser'])){
        //A retirer si ça sert à rien vu que déjà en haut
        require('connectDatabase.php'); //Connexion à la database

        $Nom    = convertInput($_POST['Nom']);
        $Prenom = convertInput($_POST['Prenom']);
        $Mail   = convertInput($_POST['Mail']);
        $Id     = convertInput($_POST['Id']);

        echo 'L\'Id en question est '.$Id;

        $sql = "UPDATE Utilisateurs SET Mail='$Mail', Nom='$Nom', Prenom='$Prenom' WHERE Id='$Id'";

        if(!$bdd -> query($sql)){
            echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
            echo " |".$Id;
        } 
        else {
            header("Location:../Ressources/Pages/modifyUsers.php");
            exit();
        }

        $_POST['addUser'] = array(); 

        $result -> free_result();
        $bdd -> close();
        exit();
    }

	$result -> free_result();

	$bdd -> close(); 
    exit();
?>
