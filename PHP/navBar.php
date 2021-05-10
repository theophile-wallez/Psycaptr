<?php
session_start();

function displayNavBar(string $url=""){
    if($url==""){
        $url2="Ressources";
    }
    else{
        $url2="..";
    }
    echo '<a class="link-logo" href="'.$url.'index.php#">';
    echo '<img class="header-logo" src="'.$url2.'/Images/logo.png" alt="Logo Psycaptr" draggable="false">';
    echo '</a>';
    echo '<div class="header-link-container" draggable="false">';
    echo '<a class="header-link Acceuil" href="'.$url.'index.php#" draggable="false">Accueil</a>';
    echo '<a class="header-link Tests" href="'.$url.'index.php#test-section" draggable="false">Tests</a>';
    echo '<a class="header-link FAQ" href="'.$url.'index.php#FAQ-link" draggable="false">FAQ</a>';
    echo '<a class="header-link Contact" href="'.$url.'index.php#contact_link" draggable="false">Contact</a>';
    echo '</div>';

    if($_SESSION['login'] == 1) {
        echo '<a class="header-connect-container" href="'.$url2.'/Pages/dashboard.php#" draggable="false">Votre Dashboard</a>';
    }
    else{
        echo '<a class="header-connect-container" href="'.$url2.'/Pages/connexion.php#" draggable="false">Connexion</a>';
    }
}
?>