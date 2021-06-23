<?php

  //Cette méthode permet d'empêcher les injections SQL dans nos inputs
  function convertInput ($input) {
      $input = trim ($input);
      $input = Stripslashes ($input);
      $input = Htmlspecialchars ($input); 
      // $input = mysqli_real_escape_string($input);
      return $input;
  }

  /**
   * Check if a string contains at least one word.
   *
   * @param string $input_string
   * @return boolean
   *  true if there is at least one word, false otherwise.
   */   
  function contains_at_least_one_word($input_string) {
      foreach (explode(' ', $input_string) as $word) {
        if (!empty($word)) {
          return true;
        }
      }
      return false;
  }

  //Cette méthode permet vérifier si l'utilisateur est connnecté
  function checkLogin(){
    session_start();
    if($_SESSION['login'] != 1 | !isset($_SESSION['login'])) {
      if(!isset($_SESSION['lastActivity']) && (time()-$_SESSION['lastActivity'])>1800){
        unset($_SESSION['login']);
        header('Location:../');
        exit();
      }
    }
    $_SESSION['lastActivity']= time();
  }

  //Cette méthode permet de générer des identifiants pour notre BDD

  function IdGenerator($taille){
    // Liste des caractères possibles
    $chars="0123456789";
    $IdGen='';
    $length=strlen($chars);
  
    srand((double)microtime()*1000000);
    //Initialise le générateur de nombres aléatoires
  
    for($i=0;$i<$taille;$i++)$IdGen=$IdGen.substr($chars,rand(0,$length-1),1);
  
    return $IdGen;
  }

  function lastScore(){
    $ch = curl_init();
    curl_setopt(
      $ch,
      CURLOPT_URL,
      "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=G9Dy"
    );
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);
    $data = substr($data, 91);

    
    
    return hexdec(substr($data_tab[count(str_split($data,33))-2],9,4));
  }
?>