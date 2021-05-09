<?php
session_start();
echo '<a class="link-logo" href="index.php#">';
echo '<img class="header-logo" src="Ressources/Images/logo.png" alt="Logo Psycaptr" draggable="false">';
echo '</a>';
echo '<div class="header-link-container" draggable="false">';
echo '<a class="header-link Acceuil" href="index.php#" draggable="false">Accueil</a>';
echo '<a class="header-link Tests" href="index.php#test-section" draggable="false">Tests</a>';
echo '<a class="header-link FAQ" href="index.php#FAQ-link" draggable="false">FAQ</a>';
echo '<a class="header-link Contact" href="index.php#contact_link" draggable="false">Contact</a>';
echo '</div>';

if($_SESSION['login'] == 1) {
    echo 'connecté!';
    echo '<a class="header-connect-container" href="Ressources/Pages/dashboard.php#" draggable="false">Dashboard</a>';
}
else{
    echo '<a class="header-connect-container" href="Ressources/Pages/connexion.php#" draggable="false">Connexion</a>';
}








?>